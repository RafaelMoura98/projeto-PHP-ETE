<?php

/**
 * TimeZone
 * Retorna o fuso horario local
 * que definira a hora e a data
 */
function timeZone(){
    date_default_timezone_set("America/Recife");
}
/**
 * DataAtual
 * Retorna a data atualizada
 */
function dataAtual(){
    return date("d/m/Y"); 
}
/**
 * horaAtual
 * Retorna a hora atualizada
 */
function horaAtual(){
    return date("h:i:sa");
}

/**
 * @param $texto
 * É o texto que será manupulado
 * Retorna Texto maiúsculo
 */
function textoMaiusculo($texto){
    if($texto){
        return strtoupper($texto);
    }
}
/**
 * @param $texto
 * É o texto que será manupulado
 * @param  $tipo
 * É o Número que indica o tipo de 
 * manipulação da string
 * Tipos:
 * 1 - Quantidade de caracters de um texto
 * 2 - Quantidade de palavras de um texto
 * 3 - Busca Posição da palavra na string
 */
function contar($texto, $tipo){
    if($texto && $tipo === 1){
        return strlen($texto);
    }
    if($texto && $tipo === 2){
        return str_word_count($texto);
    }
    if($texto && $tipo === 3){
        return strpos($texto, "Diogo");
    }
    return false;
}

/**
 * ReduzirStr
 * Reduzir o tamanho de um texto
 * @param $str que representa o texto a ser reduzido
 * @param $quantidade que reprenta quantos caracters vão ser exibidos
 */
function reduzirStr($str,$quantidade){
    $tamanho = strlen($str);
    if($str && $tamanho >= $quantidade){
      return substr($str,0,$quantidade)." [...]";
    }else{
      return substr($str,0,$tamanho)." [...]";
    }
  }

  function calcularImc($peso, $altura){
    $resposta = 0;
    if($peso && $altura){
        $resposta = $peso / ($altura * $altura);  
    }
    return round($resposta,2);
  }

  function imcBuscarPorId($id)
  {
      $pdo = Database::conexao();
      $sql = "SELECT * FROM imc WHERE id = $id";
      $stmt = $pdo->prepare($sql);
      $list = $stmt->execute();
      $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $list;
  }

  function cadastrar($nome,$email,$peso,$altura,$imc,$classificacao)
    {
        if(!$nome || !$email || !$peso || !$altura || !$imc || !$classificacao){return;}
        $sql = "INSERT INTO `imc_tb` (`nome`,`email`,`peso`,`altura`,`imc`,`classificacao`)
        VALUES(:nome,:email,:peso,:altura,:imc,:classificacao)";

        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':peso', $peso);
        $stmt->bindParam(':altura', $altura);
        $stmt->bindParam(':imc', $imc);
        $stmt->bindParam(':classificacao', $classificacao);
        $result = $stmt->execute();
        return ($result)?true:false;
    }

  function cadastrarRegistro($nome,$email,$telefone,$login,$senha)
    {
        if(!$nome || !$email || !$telefone || !$login || !$senha){return;}
        $sql = "INSERT INTO `registro_tb` (`nome`,`email`,`telefone`,`login`,`senha`)
        VALUES(:nome,:email,:telefone,:login,:senha)";

        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        $result = $stmt->execute();
        return ($result)?true:false;
    }

    function cadastrarContato($nome,$sobrenome,$email,$telefone,$mensagem)
    {
        // var_dump($nome,$sobrenome,$email,$telefone,$mensagem);die;
        if(!$nome ||!$sobrenome || !$email || !$telefone || !$mensagem){return;}
        $sql = "INSERT INTO `contato_tb` (`nome`,`sobrenome`,`email`,`telefone`,`mensagem`)
        VALUES(:nome,:sobrenome,:email,:telefone,:mensagem)";

        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':mensagem', $mensagem);
        $result = $stmt->execute();
        return ($result)?true:false;
    }

    function classificarImc($imc){
        if($imc <= 16){
            return "magreza grave;";
        }elseif($imc > 16 && $imc <= 17){
            return "magreza moderada";
        }elseif($imc > 17 && $imc <= 18.5){
            return "magreza leve";
        }elseif($imc >= 18.6 && $imc<= 24.9){
            return "Peso Ideal";
        }elseif($imc >= 25 && $imc <= 29.9 ){
             return "Sobre Peso";
        }elseif($imc >= 30 && $imc <= 34.9){
            return "Obesidade grau 1";
        }elseif($imc >= 35 && $imc <= 39.9){
            return "Obesidade grau 2 ou severa";
        }elseif($imc >= 40){
            return "Obesidade grau 3 ou morbida";
        }
    }

    function criptografia($senha){
        if(!$senha)return false;
        return sha1($senha);
    }

    function listarNoticias()
    {
        $pdo = Database::conexao();
        $sql = "SELECT * FROM noticias_tb";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
    
    function cadastrarNoticia($titulo,$img,$descricao)
    {
        if(!$titulo ||!$img || !$descricao){return;}
        $sql = "INSERT INTO `noticia_tb` (`titulo`,`img`,`descricao`)
        VALUES(:titulo,:img,:descricao)";

$pdo = Database::conexao();
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':img', $img);
$stmt->bindParam(':descricao', $descricao);
$result = $stmt->execute();
return ($result)?true:false;
}

function verificarLogin($login){
    $pdo = Database::conexao();
    $sql = "SELECT `id`,`nome`,`login`,`senha` FROM registro_tb WHERE `login` = '$login'";
    // var_dump($sql);die;
    $stmt = $pdo->prepare($sql);
    $list = $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list[0];
}

function validaSenha($senhaDigitada, $senhaBd){
    if(!$senhaDigitada || !$senhaBd){return false;}
    if($senhaDigitada == $senhaBd){return true;}
    return false;
    }
    
    function protegerTela(){
        if(
            !$_SESSION || 
            !$_SESSION["usuario"]["status"] === 'logado'
            ){
                header('Location:'.constant("URL_LOCAL_SITE_PAGINA_LOGIN"));
            }
        }
        
        function registrarAcessoValido($usuarioCadastrado){
            $_SESSION["usuario"]["nome"] = $usuarioCadastrado['nome'];
            $_SESSION["usuario"]["id"] = $usuarioCadastrado['id'];
            $_SESSION["usuario"]["status"] = 'logado';
        }
        
        function limparSessao(){
            unset($_SESSION["usuario"]);
            header('Location:'.constant("URL_LOCAL_SITE_PAGINA_LOGIN"));
        }
        
        function NoticiasInd($id)
        {
            $pdo = Database::conexao();
            $sql = "SELECT * FROM noticias_tb WHERE `id` = '$id'";
            $stmt = $pdo->prepare($sql);
            $list = $stmt->execute();
            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }