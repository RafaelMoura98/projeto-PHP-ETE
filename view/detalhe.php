<div class="container">
    <header class="header">
      <a class="logo" href="<?=constant('URL_LOCAL_SITE_PAGINA').'principal'?>">InfoSports</a>
      <div class="headerBtnGroup">
        <?php include_once("menuTopo.php");?>
        <div>
          <input type="checkbox" class="check" id="chk"/>

          <label class="label" for="chk">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="bola"></div>
          </label>
        </div>
      </div>
      <div class="hamburguer-menu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </header>
  <p class="sectionTitle" id="backToTop">BEM VINDO A INFOSPORTS!</p>
    <p class="sectionDescription">Aqui é onde você encontra todos os itens mais novos e modernos do seu esporte
        preferido.</p>
<section class="gridContainer">
    <div class="mainContent">
        <div class="categorycard">
            <img src= "./uploads/<?=$noticia['imagem']?>" alt="mainCardImg" class="maincardimg" width=1280px>
            <h1 class="mainCategoryCardTitle"><?=$noticia['titulo']?></h1>
            <p class="mainCategoryCardDescription" Align="justify"><?=$noticia['descricao']?></p>
        </div>
    </div>
</section> 
</div>
<br>
<div class="noticia">
<h3><strong>Noticias Relacionadas:</strong></h3>
<h4></h4>
</div>    
<div class="conteiner">
      <?php 
        $Sugestoes = Sugestoes($noticia['id_categoria'],$noticia['titulo']); 
        foreach($Sugestoes as $s):
          ?>
        <a class="link" href="<?=constant('URL_LOCAL_SITE_DETALHE').$s['id']?>">
          <div class="card">
            <img src="./uploads/<?=$s['imagem']?>" alt="CardImg" class="cardimg" width=320px height=180px>
            <p class="CardTitle"><?=$s['titulo']?></p>
            <p class="CardDescription"><?= reduzirStr($s['descricao'],180)?></p>
          </div>
        </a>
        <?php endforeach?>
    </div> 
<footer class="footer">
      <span>InfoSports</span>
      <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
    </footer>
  </div>

