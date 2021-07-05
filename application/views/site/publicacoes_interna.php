<!--  wrapper  -->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--  section  -->
                    <section class="color-bg middle-padding ">
                        <div class="wave-bg wave-bg2"></div>
                        <div class="container">
                            <div class="flat-title-wrap">
                                <h2><span>Detalhes Informativo</span></h2>
                                <span class="section-separator"></span>
                                <h4>Fique por dentro de novidades e atualizado.</h4>
                            </div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="<?php echo base_url('') ?>">Home</a><a href="<?php echo base_url('informativos') ?>">Informativo</a><span>Detalhes</span></div>
                        </div>
                    </div>
                    <!-- section-->
                    <section  id="sec1" class="middle-padding grey-blue-bg">
                        <div class="container">
                            <div class="row">
                                <!--blog content -->
                                <div class="col-md-8">
                                    <!--post-container -->
                                    <div class="post-container fl-wrap">
                                        <!-- article> --> 
                                        <article class="post-article">
                                            <div class="list-single-main-media fl-wrap">
                                                <div class="single-slider-wrapper fl-wrap">
                                                    <div class="single-slider fl-wrap"  >
                                                       <div class="slick-slide-item"><img src="<?php echo base_url() ?>public/imagens/alojamentos/<?php echo $publicacao->imagem ?>" alt=""></div>
                                                       
                                                       <?php if ($galeria): ?>
                                                           <?php foreach ($galeria as $key => $value): ?>

                                                                <div class="slick-slide-item">
                                                                    <img src="<?php echo base_url() ?>public/imagens/evento/galeria/<?php echo $value->imagem ?>" alt="">
                                                                </div>

                                                            <?php endforeach ?>
                                                        
                                                           <?php endif ?>
                                                    </div>
                                                        <?php if ($galeria): ?>
                                                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                                                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                                                        <?php endif ?>

                                                </div>
                                            </div>
                                            <div class="list-single-main-item fl-wrap">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3><?php echo $publicacao->titulo ?></h3>
                                                </div>
                                                
                                                    <?php echo $publicacao->descricao ?>
                                                
                                               
                                               
                                            </div> 
                                        </article>
                                        <!-- article end -->                                
                                    </div>
                                    <!--post-container end -->  
                                </div>
                                <!-- blog content end -->
                                <!--   sidebar  -->
                                <div class="col-md-4">
                                    <!--box-widget-wrap -->  
                                    <div class="box-widget-wrap fl-wrap fixed-bar">
                                        
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget widget-posts">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3>Acomodações</h3>
                                                    </div>
                                                    <!--box-image-widget-->
                                                    <?php foreach ($noticias as $key => $value): ?>
                                                        <div class="box-image-widget">

                                                            <div class="box-image-widget-media"><img src="<?php echo base_url() ?>public/imagens/noticias/<?php echo $value->imagem ?>" alt="">
                                                                <a href="<?php echo base_url('detalhes-produto') ?>/<?php echo $value->id ?>/<?php echo $value->nome_url ?>" class="color-bg">Detalhes</a>
                                                            </div>
                                                            <div class="box-image-widget-details">
                                                                <h4><?php echo $value->titulo ?></h4>
                                                                <p><?php echo character_limiter($value->texto_breve,150) ?></p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                    <!--box-image-widget end -->
                                                                                             
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                                   
                                        <!--box-widget-item -->
                                        <!-- <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3>Acompanhe no Instagram</h3>
                                                    </div>
                                                    <div class="jr-insta-thumb">
                                                        <ul>
                                                            <li>
                                                                <a href="#"><img src="<?php echo base_url() ?>assets/images/instagram/1.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="<?php echo base_url() ?>assets/images/instagram/2.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="<?php echo base_url() ?>assets/images/instagram/3.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="<?php echo base_url() ?>assets/images/instagram/4.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="<?php echo base_url() ?>assets/images/instagram/5.jpg" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img src="<?php echo base_url() ?>assets/images/instagram/6.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!--box-widget-item end -->                                                        
                                    </div>
                                    <!--box-widget-wrap end -->  
                                </div>
                                <!--   sidebar end  -->
                            </div>
                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </section>
                    <!-- section end -->
                </div>
                <!-- content end-->
            </div>
            <!--wrapper end -->