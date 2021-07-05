        <!-- Start trending post area -->
        <div class="trending-post-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="trend-post-list zm-posts owl-active-1 clearfix">
                        <!-- Start single trend post -->
                        <?php if (!empty($noticias_destaque)) {
                            foreach ($noticias_destaque as $key => $value) { ?>
                                <div class="col-2">
                                    <article class="zm-trending-post zm-lay-a zm-single-post" data-dark-overlay="2.5"  data-scrim-bottom="9" data-effict-zoom="3">
                                        <div class="zm-post-thumb">
                                            <img style="height: 460px; width: 317px; object-fit: cover;" src="<?php echo base_url() ?>assets/images/noticiasHorizontal/<?php echo $value->imagem ?>" alt="img">
                                        </div>
                                        <div class="zm-post-dis text-white">
                                            <div class="zm-category"><a class="cat-btn" style="background: <?php echo $value->rgb ?>"><?php echo $value->nome; ?></a></div>
                                            <h2 class="zm-post-title"><a href="<?php echo base_url() ?>depoimentos/<?php echo $value->id ?>"><?php echo $value->titulo; ?></a></h2>
                                            <div class="zm-post-meta">
                                                <ul>
                                                    <li class="s-meta"><a class="zm-author"><?php echo $value->autor ?></a></li>
                                                    <li class="s-meta"><a class="zm-date"><?php echo inverteData($value->data, '/') ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End trending post area -->



            <!-- Start page content -->
            <section id="page-content" class="page-wrapper">
                <!-- Start Popular News [layout A+D]  -->
                <div class="zm-section bg-white ptb-70">
                    <div class="container">
                        <div class="row mb-40">
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                <div class="section-title">
                                    <h2 class="h6 header-color inline-block uppercase">Notícias Populares</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12 col-lg-6">
                                <div class="zm-posts">
                                    <article class="zm-post-lay-a">
                                        <div class="zm-post-thumb">
                                            <a href="<?php echo base_url() ?>depoimentos/<?php echo $noticias_populares[0]->id ?>"><img style="height: 315px; width: 645px; object-fit: cover;" src="<?php echo base_url() ?>assets/images/noticiasHorizontal/<?php echo $noticias_populares[0]->imagem_chamada ?>" alt="img"></a>
                                        </div>
                                        <div class="zm-post-dis">
                                            <div class="zm-post-header">
                                                <div class="zm-category"><a class="cat-btn" style="background: <?php echo $noticias_populares[0]->rgb ?>"><?php echo $noticias_populares[0]->nome ?></a></div>
                                                <h2 class="zm-post-title h2"><a href="<?php echo base_url() ?>depoimentos/<?php echo $noticias_populares[0]->id ?>"><?php echo $noticias_populares[0]->titulo ?></a></h2>
                                                <div class="zm-post-meta">
                                                    <ul>
                                                        <li class="s-meta"><a class="zm-author"><?php echo $noticias_populares[0]->autor ?></a></li>
                                                        <li class="s-meta"><a class="zm-date"></a><?php echo inverteData($noticias_populares[0]->data, '/') ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="zm-post-content">
                                                <p><?php echo character_limiter($noticias_populares[0]->texto,400) ?></p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12 col-lg-6">
                                <div class="zm-posts">
                                    <!-- Start single post layout D -->
                                    <?php for ($i=0; $i < 5 ; $i++) { 
                                        if ($i!=0){ ?>
                                            <article class="zm-post-lay-d clearfix">
                                                <div class="zm-post-thumb f-left">
                                                    <a href="<?php echo base_url() ?>depoimentos/<?php echo $noticias_populares[$i]->id ?>"><img style="height: 110px; width: 222px; object-fit: cover;" src="<?php echo base_url() ?>assets/images/noticiasHorizontal/<?php echo $noticias_populares[$i]->imagem_chamada ?>" alt="img"></a>
                                                </div>
                                                <div class="zm-post-dis f-right">
                                                    <div class="zm-post-header">
                                                        <div class="zm-category"><a class="cat-btn" style="background: <?php echo $noticias_populares[$i]->rgb ?>"><?php echo $noticias_populares[$i]->nome ?></a></div>
                                                        <h2 class="zm-post-title"><a href="<?php echo base_url() ?>depoimentos/<?php echo $noticias_populares[$i]->id ?>"><?php echo $noticias_populares[$i]->titulo ?></a></h2>
                                                        <div class="zm-post-meta">
                                                            <ul>
                                                                <li class="s-meta"><a class="zm-author"><?php echo $noticias_populares[$i]->autor ?></a></li>
                                                                <li class="s-meta"><a class="zm-date"><?php echo inverteData($noticias_populares[$i]->data, '/') ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Popular News [layout A+D]  -->

                <!-- Start world news [layout A1+E+A]  -->
                <div class="zm-section bg-gray ptb-70">
                    <div class="container">
                        <div class="row">
                            <!-- Start left side -->
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="row mb-40">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="section-title">
                                            <h2 class="h6 header-color inline-block uppercase">Notícias Globais</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="zm-posts clearfix">
                                        <!-- Start single post layout B -->
                                        <?php foreach ($noticias_globais as $key => $value) { ?>
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                                <article class="zm-trending-post zm-lay-a1 zm-single-post" data-effict-zoom="1">
                                                    <div class="zm-post-thumb">
                                                        <a href="<?php echo base_url() ?>depoimentos/<?php echo $value->id ?>" data-dark-overlay="2.5"  data-scrim-bottom="9"><img style="height: 360px; width: 270px; object-fit: cover;" src="<?php echo base_url() ?>assets/images/noticiasHorizontal/<?php echo $value->imagem ?>" alt="img"></a>
                                                    </div>
                                                    <div class="zm-post-dis text-white">
                                                        <h2 class="zm-post-title h3"><a href="<?php echo base_url() ?>depoimentos/<?php echo $value->id ?>"><?php echo $value->titulo; ?></a></h2>
                                                        <div class="zm-post-meta">
                                                            <ul>
                                                                <i><li class="s-meta"><a class="zm-author"><?php echo $value->autor ?></a></li>
                                                                    <li class="s-meta"><a class="zm-date"></a><?php echo inverteData($value->data, '/') ?></li></i>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End left side -->

                                <!-- Start Righr side -->
                                <div class="col-xs-12 col-sm-12 hidden-sm col-md-4 col-lg-4">
                                    <!-- Start post layout E -->
                                    <aside class="zm-post-lay-e-area">
                                        <div class="row mb-40">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="section-title">
                                                    <h2 class="h6 header-color inline-block uppercase">Escolhas do Editor</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="zm-posts">
                                                    <?php if (!empty($escolha_editor)) {
                                                        foreach ($escolha_editor as $key => $value) { ?>
                                                            <article class="zm-post-lay-e zm-single-post clearfix">
                                                                <div class="zm-post-thumb f-left">
                                                                    <a href="<?php echo base_url() ?>depoimentos/<?php echo $value->id ?>"><img style="height: 81px; width: 151px; object-fit: cover;" src="<?php echo base_url() ?>assets/images/noticiasHorizontal/<?php echo $value->imagem_chamada ?>" alt="img"></a>
                                                                </div>
                                                                <div class="zm-post-dis f-right">
                                                                    <div class="zm-post-header">
                                                                        <h2 class="zm-post-title"><a href="<?php echo base_url() ?>depoimentos/<?php echo $value->id ?>"><?php echo character_limiter($value->titulo,40); ?></a></h2>
                                                                        <div class="zm-post-meta">
                                                                            <ul>
                                                                                <li class="s-meta"><a class="zm-author"><?php echo $value->autor ?></a></li>
                                                                                <li class="s-meta"><a class="zm-date"><?php echo inverteData($value->data, '/') ?></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        <?php } }?>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                        <!-- Start post layout E -->
                                        <!-- Start Day News -->
                                        <aside class="zm-post-lay-a-area  hidden-sm">
                                            <div class="row mb-40 mt-70">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="section-title">
                                                        <h2 class="h6 header-color inline-block uppercase">Dica de Hoje</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="zm-posts">
                                                        <?php if (!empty($dica_do_dia)) { ?>
                                                            <article class="zm-post-lay-a sidebar">
                                                                <div class="zm-post-thumb">
                                                                    <a href="<?php echo base_url() ?>depoimentos/<?php echo $dica_do_dia->id ?>"><img style="height: 230px; width: 420px; object-fit: cover;" src="<?php echo base_url() ?>assets/images/noticiasHorizontal/<?php echo $dica_do_dia->imagem_chamada ?>" alt="img"></a>
                                                                </div>
                                                                <div class="zm-post-dis">
                                                                    <div class="zm-post-header">
                                                                        <h2 class="zm-post-title h2"><a href="<?php echo base_url() ?>depoimentos/<?php echo $dica_do_dia->id ?>"><?php echo character_limiter($dica_do_dia->titulo,80); ?></a></h2>
                                                                        <div class="zm-post-meta">
                                                                            <ul>
                                                                                <li class="s-meta"><a class="zm-author"><?php echo $dica_do_dia->autor ?></a></li>
                                                                                <li class="s-meta"><a class="zm-date"><?php setlocale(LC_TIME,'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8','portuguese'); date_default_timezone_set('America/Sao_Paulo'); echo utf8_encode(strftime('%d de %B de %Y', strtotime($dica_do_dia->data))); ?></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        <?php  } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                        <!-- Start Day News -->
                                    </div>
                                    <!-- End Right side -->
                                </div>
                            </div>
                        </div>
                        <!-- End world news [layout A1+E+A]  -->
                        <!-- Start Video Post [View layout A]  -->
                        <div class="video-post-area ptb-70 bg-dark">
                            <div class="container">
                                <div class="row mb-40">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="section-title">
                                            <h2 class="h6 header-color inline-block uppercase">Vídeos em Destaque</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="zm-video-post-list zm-posts owl-active-3 navigator-1 clearfix">
                                        <!-- Start single video post [video layout A] -->
                                        <?php if (!empty($videos_destaque)) {
                                            foreach ($videos_destaque as $key => $value) { ?>
                                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                                    <div class="zm-video-post zm-video-lay-a zm-single-post">
                                                        <div class="zm-video-thumb"  data-dark-overlay="2.5" >
                                                            <img style="height: 270px; width: 420px; object-fit: cover;" src="<?php echo base_url() ?>assets/images/video/<?php echo $value->imagem ?>" alt="video">
                                                            <a class="video-activetor" href="<?php echo 'https://www.youtube.com/watch?v='.$value->nome_url ?>">
                                                                <i class="fa fa-play-circle-o"></i>
                                                            </a>
                                                        </div>
                                                        <div class="zm-video-info text-white">
                                                            <a href="<?php echo base_url() ?>noticia-video/<?php echo $value->id ?>"><h2 class="zm-post-title"><?php echo character_limiter($value->titulo,80); ?></h2></a>
                                                            <div class="zm-post-meta">
                                                                <li class="s-meta"><a class="zm-author"><?php echo $value->autor ?></a></li>
                                                                <li class="s-meta"><a class="zm-date"><?php setlocale(LC_TIME,'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8','portuguese'); date_default_timezone_set('America/Sao_Paulo'); echo utf8_encode(strftime('%d de %B de %Y', strtotime($value->data))); ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Video Post [View layout A]  -->
                        <div class="zm-section bg-white pt-70 pb-40">
                            <div class="container">
                                <div class="row">
                                    <!-- Start left side -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 columns">
                                        <div class="row mb-40">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="section-title">
                                                    <h2 class="h6 header-color inline-block uppercase">Últimas Notícias</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="zm-posts">
                                                    <!-- Start single post layout C -->
                                                    <?php if (!empty($ultimas_noticias)) {
                                                       foreach ($ultimas_noticias as $key => $value) { ?>
                                                        <article class="zm-post-lay-c zm-single-post clearfix">
                                                            <div class="zm-post-thumb f-left">
                                                                <a href="<?php echo base_url() ?>depoimentos/<?php echo $value->id ?>"><img src="<?php echo base_url() ?>assets/images/noticiasHorizontal/<?php echo $value->imagem_chamada ?>" alt="img"></a>
                                                            </div>
                                                            <div class="zm-post-dis f-right">
                                                                <div class="zm-post-header">
                                                                    <div class="zm-category"><a class="bg-cat-1 cat-btn" style="background: <?php echo $value->rgb ?>"><?php echo $value->nome; ?></a></div>
                                                                    <h2 class="zm-post-title"><a href="<?php echo base_url() ?>depoimentos/<?php echo $value->id ?>"><?php echo character_limiter($value->titulo,80); ?></a></h2>
                                                                    <div class="zm-post-meta">
                                                                        <ul>
                                                                            <li class="s-meta"><a class="zm-author"><?php echo $value->autor ?></a></li>
                                                                            <li class="s-meta"><a class="zm-date"><?php echo inverteData($value->data, '/') ?></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="zm-post-content">
                                                                        <p><?php echo character_limiter($value->texto,200) ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    <?php } } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End left side -->
                                    <!-- Start Right sidebar -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 sidebar-warp columns">
                                        <div class="row">
                                            <!-- Start Subscribe From -->
                                            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-12 xs-mt-40 sm-mt-50 md-mt-60">
                                                <aside class="subscribe-form bg-dark text-center sidebar">
                                                    <h3 class="uppercase zm-post-title">Assine nosso Newsletter</h3>
                                                    <p>Junte-se a 80,000+ incriveis inscritos e fique por dentro das nossas últimas notícias.</p>
                                                    <form>
                                                        <input type="text" placeholder="Nome Completo">
                                                        <input type="email" placeholder="Inserir E-mail " required="">
                                                        <input type="submit" value="Inscreva-se">
                                                    </form>
                                                </aside>
                                            </div>
                                            <!-- End Subscribe From -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <!-- Start post layout E -->
                        </div>
                    </div>
                    <!-- End Right sidebar -->
                </div>
                <!-- Start pagination area -->
                <div class="row hidden-xs">
                    <div class="zm-pagination-wrap mt-70">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <nav class="zm-pagination ptb-40 text-center">
                                        <ul class="page-numbers">
                                           <?php echo $paginacao ?>
                                       </ul>
                                   </nav>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <style type="text/css">
                .page{

                    border: solid 1px;
                    margin: 5px;
                    width: 32px;
                    height: 32px;
                }

                .next, .prev{
                    border: solid 1px;
                    margin: 5px;
                    width: 32px;
                    height: 32px;
                    background: #2f2f2f;
                }
            </style>
            <!-- End pagination area -->
        </div>
    </div>
</section>
        <!-- End page content -->