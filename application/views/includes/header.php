<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>VinTV</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

    <!-- Style customizer (Remove these lines please) -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-customizer.css">
    <link href="#" data-style="styles" rel="stylesheet">


    <!-- Modernizr JS -->
    <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<style type="text/css">

    .owl-prev .prev{
       border: 0px!important; 
       margin: 0px!important; 
       width: 0px!important; 
       height: 0px!important;
       background: #e6e6e6!important; 

   }
   .owl-next .next{
       border: 0px!important; 
       margin: 0px!important; 
       width: 0px!important; 
       height: 0px!important; 
       background: #e6e6e6!important;

   }

   .mega-caro-wrap.owl-theme .owl-controls .owl-nav [class*="owl-"]:hover span{
    background: #333!important;
    color: #fff!important; 

}

</style>

<body>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start of header area -->
        <header  class="header-area header-wrapper bg-white clearfix">
            <!-- Start Sidebar Menu -->
            <div class="sidebar-menu">
                <div class="sidebar-menu-inner"></div>
                <span class="fa fa-remove"></span>
            </div>
            <!-- End Sidebar Menu -->
            <div class="header-top-bar bg-dark ptb-10">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7  hidden-xs">
                            <div class="header-top-left">
                                <nav class="header-top-menu zm-secondary-menu">
                                    <ul>
                                        <li><a href="<?php echo base_url() ?>">Notícias</a></li>
                                        <li><a href="<?php echo base_url() ?>contato">Contato</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                            <div class="header-top-right clierfix text-right">
                                <div class="header-social-bookmark topbar-sblock">
                                    <ul>
                                        <li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://dribbble.com"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                                <div class="zmaga-calendar topbar-sblock">
                                    <span class="calendar uppercase">Quarta-Feira, Maio 22, 2019 </span>
                                </div>
<!--                                 <div class="user-accoint topbar-sblock">
                                    <span class="login-btn uppercase">Login</span>
                                    <div class="login-form-wrap bg-white">
                                        <form class="zm-signin-form text-left">
                                            <input type="text" class="zm-form-control username" placeholder="Usuário ou E-mail">
                                            <input type="password" class="zm-form-control password" placeholder="Senha">
                                            <input type="checkbox" value=" Manter Conectado" class="remember"> &nbsp;Manter Conectado<br>
                                            <div class="zm-submit-box clearfix  mt-20">
                                                <input type="submit" value="Login">
                                                <a href="<?php echo base_url() ?>cadastro">Registre-se</a>
                                            </div>
                                            <a href="#" class="zm-forget">Esqueceu o usuário/senha?</a>
                                            <div class="zm-login-social-box">
                                                <a href="#" class="social-btn bg-facebook block"><span class="btn_text"><i class="fa fa-facebook"></i>Logue com Facebook</span></a>
                                                <a href="#" class="social-btn bg-twitter block"><span class="btn_text"><i class="fa fa-twitter"></i>Logue com Twitter</span></a>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-5 col-xs-12 header-mdh">
                            <div class="global-table">
                                <div class="global-row">
                                    <div class="global-cell">
                                        <div class="logo">
                                            <a href="<?php echo base_url() ?>">
                                                <img src="<?php echo base_url() ?>assets/images/logo/logo-nova.png" alt="main logo" style="width: 35%;
                                                ">
                                            </a>
                                            <p class="site-desc">A <strong>maior produtora de conteúdo</strong> da região!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                         <div class="col-md-8 col-lg-7 col-sm-7 col-xs-12 col-lg-offset-1 header-mdh hidden-xs">
                            <div class="global-table">
                                <div class="global-row">
                                    <div class="global-cell">
                                        <div class="advertisement text-right">
                                         <a href="#" class="block"><img src="<?php echo base_url() ?>assets/images/ad/1.jpg" alt="ad img"></a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div> -->
                 </div>
             </div>
         </div>
         <div id="sticky-header" class="header-bottom-area hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-wrapper  bg-theme clearfix">
                            <div class="row">
                                <div class="col-md-11">
                                    <button class="sidebar-menu-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                    <div class="mainmenu-area">
                                        <nav class="primary-menu uppercase">
                                            <ul class="clearfix">
                                                <li class="current drop"><a href="<?php echo base_url() ?>">Notícias</a>
                                                </li>
                                                <li class="mega-parent drop"><a>Categorias</a>
                                                    <div class="mega-menu-area dropdown clearfix">
                                                        <div class="zm-megamenu-sub-cats">
                                                            <ul class="zm-megamenu-sub-tab" role="tablist">
                                                                <li role="presentation">
                                                                    <a href="<?php echo base_url() ?>informativos/geral">GERAL</a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="<?php echo base_url() ?>informativos/esporte" >ESPORTE</a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="<?php echo base_url() ?>informativos/policia">POLICIA</a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="<?php echo base_url() ?>informativos/social">SOCIAL</a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="<?php echo base_url() ?>informativos/global">GLOBAL</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="zm-megamenu-content">
                                                            <div class="tab-content">

                                                                <div role="tabpanel" class="tab-pane fade  in active" id="travel">
                                                                    <div class="mega-caro-wrap zm-posts clearfix">


                                                                        <?php foreach ($ultimas_noticias as $key => $value): ?>
                                                                            <div class="single-mega-post">
                                                                                <article class="zm-mega-post zm-post-lay-a2">
                                                                                    <div class="zm-post-thumb">
                                                                                        <a href="<?php echo base_url() ?>depoimentos/<?php echo $value->id ?>"><img style="height: 108px; width: 231px; object-fit: cover;" src="<?php echo base_url() ?>assets/images/noticiasHorizontal/<?php echo $value->imagem_chamada ?>" alt="img"></a>
                                                                                    </div>
                                                                                    <div class="zm-post-dis">
                                                                                        <div class="zm-post-header">
                                                                                            <h2 class="zm-post-title h2"><a href="<?php echo base_url() ?>depoimentos/<?php echo $value->id ?>"><?php echo $value->titulo; ?></a></h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </article>
                                                                            </div>
                                                                        <?php endforeach ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li><a href="<?php echo base_url() ?>contato">Contato</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area end -->
            <div class="breakingnews-wrapper hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                            <div class="breakingnews clearfix fix">
                                <div class="bn-title" style="width: 170px!important">
                                    <h6 class="uppercase">Últimas Notícias</h6>
                                </div>
                                <div class="news-wrap">
                                    <ul class="bkn clearfix" id="bkn">
                                        <?php if (!empty($ultimas_noticias)) { for ($i=0; $i < 2 ; $i++) { 
                                            if (!empty($ultimas_noticias[$i])){?> 
                                                <li><a href="<?php echo base_url() ?>depoimentos/<?php echo $ultimas_noticias[$i]->id ?>"><?php echo $ultimas_noticias[$i]->titulo ?></a></li>
                                            <?php } } }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        <!-- End of header area -->