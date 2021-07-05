
<section  id="sec1" class="middle-padding grey-blue-bg">
    <div class="container">
        <div class="row">
            <!--blog content -->
            <div class="col-md-8">
                <!--post-container -->
                <div class="post-container fl-wrap">


                    <!-- article> --> 
                    <article class="zm-post-lay-single">
                        <div class="zm-post-thumb">
                            <a><img style="height: 527px; width: 870px; object-fit: cover;" src="<?php echo base_url() ?>assets/images/noticiasHorizontal/<?php echo $get_noticias->imagem_chamada ?>"  class="respimg" alt=""></a>
                        </div>

                        <div class="zm-post-dis">
                            <div class="zm-post-header">
                                <h2 class="zm-post-title h2"><a><?php echo $get_noticias->titulo ?></a></h2>
                                <div class="zm-post-meta">
                                    <ul>
                                        <li class="s-meta"><a class="zm-author"><?php echo $get_noticias->autor ?></a></li>
                                        <li class="s-meta"><a class="zm-date"><?php setlocale(LC_TIME,'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8','portuguese'); date_default_timezone_set('America/Sao_Paulo'); echo utf8_encode(strftime('%d de %B de %Y', strtotime($get_noticias->data))); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="zm-post-content">
                                <p style="font-size: 20px; text-align: justify;"><?php echo $get_noticias->texto ?></p>
                            </div>
                        </div>
                    </article>
                    <!-- article end -->                                    
                </div>
                <!--post-container end -->  
            </div>

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
                                                            <li class="s-meta"><a class="zm-date"><?php echo inverteData($dica_do_dia->data, '/') ?></a></li>
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
                                                    <p><?php echo character_limiter($value->texto,230) ?></p>
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
                                <p>Junte-se a mais de 80,000 incríveis assinantes e fique por dentro das últimas notícias da nossa região.</p>
                                <form action="#">
                                    <input type="text" placeholder="Nome Completo">
                                    <input type="email" placeholder="Seu e-mail " required="">
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
<!--                 <div class="row hidden-xs">
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
            </style> -->
            <!-- End pagination area -->
            <!-- Start Advertisement -->
            <!-- <div class="advertisement">
                <div class="row mt-40">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <a href="#"><img src="<?php echo base_url() ?>assets/images/ad/2.jpg" alt=""></a>
                    </div>
                </div>
            </div> -->
            <!-- End Advertisement -->
        </div>
    </div>
</section>
<!-- End page content -->

