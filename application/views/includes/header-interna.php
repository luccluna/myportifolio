<!doctype html>
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
  <title>SWE</title>
  <!--meta info-->
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta name="theme-color" content="#FF4000" />
  <meta name="description" content="Somos uma linha de suplementos que atendera a todo o publico que estão em busca de um objetivo de um corpo perfeito! Estamos aqui 24hrs para ajudar a você!">
  <meta name="author" content=" Apollo / BrPlim">
  <meta name="keywords" content="SWE, loja, suplementos"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.css" type="text/css">
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png">
  <!--[if !IE 9]><!-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/effect.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animation.css" type="text/css">
  <!--<![endif]-->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/masterslider.css" type="text/css">
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/css/owl.transitions.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.custombox.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/color.css" type="text/css">
  <script src="<?php echo base_url() ?>assets/js/galeria/fotorama.js"></script>
  <link href="<?php echo base_url() ?>assets/js/galeria/fotorama.css" rel="stylesheet">

  <style type="text/css">
  ::-webkit-scrollbar {
    width: 10px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #555; 
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #ff4000; 
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #ffffff; 
  }
  @media only screen and (max-width: 1022px) {
    #nome_perfil{
      display: none;
    }
  }
</style>

</head> 
<body id="page-top" class="" data-offset="90" data-target=".navigation" data-spy="scroll">
  <div class="wrapper hide-main-content"> 
    <section class="page page-product">
      <!--Menu Mobile-->
      <div class="menu-wrap">
        <div class="main-menu">
          <h4 class="title-menu">Menu</h4>
          <button class="close-button" id="close-button"><i class="fa fa-times"></i></button>
        </div>
        <ul class="nav-menu">
          <li><a href="<?php echo base_url('login') ?>"><?php if (!$this->auth->existe_sessao()){ ?>
            Entrar & Registrar
            <?php }else{ ?>
            <?php echo $string= character_limiter($this->auth->get_nome_perfil(), 15) ?>
            <?php } ?></a></li>

            <li class="selected active">
              <a href="<?php echo base_url() ?>">Home</a>
            </li>
            <li>
              <a href="<?php echo base_url('produtos') ?>/masculino">Masculino</a>

            </li>
            <li>
              <a href="<?php echo base_url('produtos') ?>/feminino">Feminino</a>

            </li>
            <li>
              <a href="<?php echo base_url('produtos') ?>/acessorios">Acessórios</a>

            </li>

            <li>
              <a href="<?php echo base_url('blog') ?>">Blog</a>
            </li>
            <li><a href="<?php echo base_url('contato') ?>">Contato</a></li>
          </ul>
        </div>
        <!--Menu Mobile-->
        <div class="content-wrapper">
          <!--Header-->
          <section class="main-menu-wrapper has-border fullscreen  home-menu " id="top-menu" data-transform data-from="opacity: 0, condition:home-menu" data-to="opacity:1, duration:1.4, delay:1.3, animation:Power4.easeOut, condition:home-menu">
            <header id="header" class="header header-container alt reveal">
              <div class="container">
                <div class="row">
                  <div class="col-md-2 col-sm-3 col-xs-3 logo">
                    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo.png" alt=""></a>
                  </div>
                  <div class="col-md-8 nav-container" style="padding: 0px">
                   <nav class="megamenu collapse navbar-collapse bs-navbar-collapse navbar-right mainnav col-md-10" role="navigation">
                    <ul class="nav-menu">
                      <li class="selected active">
                        <a href="<?php echo base_url() ?>">Home</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('produtos') ?>/masculino">Masculino</a>

                      </li>
                      <li>
                        <a href="<?php echo base_url('produtos') ?>/feminino">Feminino</a>

                      </li>
                      <li>
                        <a href="<?php echo base_url('produtos') ?>/acessorios">Acessórios</a>

                      </li>

                      <li>
                        <a href="<?php echo base_url('blog') ?>">Blog</a>
                      </li>
                      <li><a href="<?php echo base_url('contato') ?>">Contato</a></li>
                    </ul>
                  </nav>             
                </div>
                <div class="quick-access col-md-2 col-sm-2 col-xs-3" style="padding: 0px">   
                  <div style="padding: 0px" class="col-md-10" id="nome_perfil">
                    <a href="<?php echo base_url('login') ?>" class="link_conta" style="padding-right: 16px;font-weight: 900"><?php if (!$this->auth->existe_sessao()){ ?>
                      Entrar & Registrar
                      <?php }else{ ?>
                      <?php echo $string= character_limiter($this->auth->get_nome_perfil(), 15) ?>
                      <?php } ?>
                    </a>   
                  </div>         
                  <div style="padding: 0px" class="col-md-2 shopping-cart">
                    <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a>
                    <div class="mini-cart product-popular">                     
                      <h3 class="title">Seu Carrinho</h3>
                      <ul class="carrinho-barra" style="overflow-y: scroll; max-height: 400px;">
                        <?php if (isset($carrinho)): ?>

                          <?php foreach ($carrinho as $key => $produto): ?>

                            <li>
                              <div class="product-image">
                                <a href="javascript:void(0)"><img class="img-carrinho" src="<?php echo base_url() ?>assets/images/product/<?php echo $produto->imagem ?>" alt=""></a>
                              </div>
                              <div class="info-products">
                                <div class="product-name"><?php echo $produto->titulo ?></div>
                                <div class="price-box">                                                   
                                  <span class="regular-price">R$<?php echo $produto->valor ?></span>
                                </div>

                              </div>
                            </li>
                          <?php endforeach ?>

                        <?php endif ?>
                      </ul>
                      <button class="check" title="Check out" type="button">
                       <a href="<?php echo base_url('carrinho') ?>"> <span>Carrinho</span></a>
                     </button>
                   </div>
                 </div>

               </div>
               <button class="menu-button" id="open-button"></button>
             </div>
           </div>
         </header>

         <style type="text/css">
         .img-carrinho{
          max-width: 69px !important;
          object-fit: cover !important;
          object-position: 50% 50% !important;
        }
        .link_conta:hover{
          color: #FF4000;
          font-weight: 900;
        }
      </style>



