        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">
            <div class="zm-section single-post-wrap bg-white ptb-70 xs-pt-30">
                <div class="container">
                    <div class="row">
                        <!-- Start left side -->
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 columns">
                            <div class="row">
                                <!-- Start single post image formate-->
                                <div class="col-md-12">
                                    <article class="zm-post-lay-single">
                                        <div class="zm-post-video">
                                            <div class="embed-responsive-16by9 embed-responsive">
                                                <iframe src="http://www.youtube.com/embed/<?php echo $video_noticia->nome_url; ?>" class="embed-responsive-item"></iframe>
                                            </div>
                                        </div>
                                        <div class="zm-post-dis">
                                            <div class="zm-post-header">
                                                <h2 class="zm-post-title h2"><a><?php echo $video_noticia->titulo ?></a></h2>
                                                <div class="zm-post-meta">
                                                    <ul>
                                                        <li class="s-meta"><a class="zm-author"><?php echo $video_noticia->autor ?></a></li>
                                                        <li class="s-meta"><a class="zm-date"><?php setlocale(LC_TIME,'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8','portuguese'); date_default_timezone_set('America/Sao_Paulo'); echo utf8_encode(strftime('%d de %B de %Y', strtotime($video_noticia->data))); ?></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="zm-post-content">
                                                <p><?php echo $video_noticia->texto ?></p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- End left side -->
                        <!-- Start Right sidebar -->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 sidebar-warp columns">
                            <div class="row">
                                <aside class="zm-post-lay-a-area col-sm-6 col-md-12 col-lg-12 sm-mt-50 xs-mt-50">
                                    <div class="row mb-40">
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
                                <!-- Start Subscribe From -->
                                <div class="col-md-12 col-sm-6 col-lg-12 mt-60 sm-mb-50">
                                    <aside class="subscribe-form bg-dark text-center sidebar">
                                        <h3 class="uppercase zm-post-title">Get Email Updates</h3>
                                        <p>Join 80,000+ awesome subscribers and update yourself with our exclusive news.</p>
                                        <form action="#">
                                            <input placeholder="Enter your full name" type="text">
                                            <input placeholder="Enter email address" required="" type="email">
                                            <input value="Subscribe" type="submit">
                                        </form>
                                    </aside>
                                </div>
                                <!-- End Subscribe From -->
                            </div>
                        </div>
                        <!-- End Right sidebar -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End page content -->