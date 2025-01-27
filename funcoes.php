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
      return $str;
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
    
    function cadastrarNoticia($titulo,$imagem,$descricao,$categoria)
    {
        if(!$titulo ||!$imagem || !$descricao || !$categoria){return;}
        $sql = "INSERT INTO `noticias_tb` (`titulo`,`imagem`,`descricao`,`id_categoria`)
        VALUES(:titulo,:imagem,:descricao,:categoria)";

        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':imagem', $imagem);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':categoria', $categoria);
        $result = $stmt->execute();
        return ($result)?true:false;
    }

function buscarNoticiaPorId($id){
            if(!$id){return;}
            $sql = "SELECT * FROM noticias_tb WHERE `id` = :id";
            $pdo = Database::conexao();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $result = $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result[0];
        }
        
            function Sugestoes($categoria,$titulo)
            {
                $pdo = Database::conexao();
                $sql = "SELECT * FROM noticias_tb WHERE `titulo` != '$titulo' AND id_categoria LIKE '%$categoria%' LIMIT 4";
                $stmt = $pdo->prepare($sql);
                $list = $stmt->execute();
                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $list;
            }
            function cadastrarCategoria($nomeCategoria)
            {
                if(!$nomeCategoria){return;}
                $sql = "INSERT INTO `categoria_tb` (`nome`)
                VALUES(:nome)";
                $pdo = Database::conexao();
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $nomeCategoria);
                $result = $stmt->execute();
                return ($result)?true:false;
            }
            function verificarCategoriaDuplicada($termo)
            {
                $pdo = Database::conexao();
                $sql = "SELECT * FROM `categoria_tb` WHERE `nome` = '$termo'";
                $stmt = $pdo->prepare($sql);
                $list = $stmt->execute();
                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return ($list)?true:false;
            }
            
            function listarCategoria()
            {
                $pdo = Database::conexao();
                $sql = "SELECT * FROM categoria_tb";
                $stmt = $pdo->prepare($sql);
                $list = $stmt->execute();
                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $list;
            }
            
            function gerarNumeros(){
                return date('Y').date('m').date('d').date('h').date(':i').'-'.date('sa').rand();
            }

            function upload($imagem){
            if(!isset($_FILES["fileToUpload"])){return;}
            
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if(isset($_POST["submit"])){
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if($check !==false){
                echo "File is an image - " . $check["mime"].".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if($imageFileType != "jpg" && $imageFileType !=  "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            echo "Sorry, only JPG, JPGE, PNG & GIF files are allowed.";
            $uploadOk = 0;       
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                return $_FILES["fileToUpload"]["name"];
            } else {
                return false;
        }
    }
  }