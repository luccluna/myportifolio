 <!--  wrapper  -->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--  section  -->
                    <section class="list-single-hero" data-scrollax-parent="true" id="sec1">
                        <div class="bg par-elem "  data-bg="<?php echo base_url() ?>assets/images/quarto.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="list-single-hero-title fl-wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="listing-rating-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                        </div>
                                        <h2><span><?php echo $produtos->titulo ?></span></h2>
                                        
                                    </div>
                                    <div class="col-md-5">
                                        <!--  list-single-hero-details-->
                                        <div class="list-single-hero-details fl-wrap">
                                            <!--  list-single-hero-rating-->
                                         
                                            <!--  list-single-hero-rating  end-->
                                            <div class="clearfix"></div>
                                            <!-- list-single-hero-links-->
                                           
                                            <!--  list-single-hero-links end-->                                            
                                        </div>
                                        <!--  list-single-hero-details  end-->
                                    </div>
                                </div>
                                <div class="breadcrumbs-hero-buttom fl-wrap">
                                    <div class="breadcrumbs"><a href="<?php echo base_url() ?>">Home</a><a href="<?php echo base_url('acomodacoes') ?>">Acomodações</a><span>Detalhes</span></div>
                                    <div class="list-single-hero-price">A PARTIR DE<span>R$ <?php echo $produtos->valor ?></span></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <!--  section  -->
                    <section class="grey-blue-bg small-padding scroll-nav-container" id="sec2">
                        <!--  scroll-nav-wrapper  -->
                        <div class="scroll-nav-wrapper fl-wrap">
                            <div class="hidden-map-container fl-wrap">
                                <input id="pac-input" class="controls fl-wrap controls-mapwn" type="text" placeholder="What Nearby ?   Bar , Gym , Restaurant ">
                                <div class="map-container">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.2475663951423!2d-44.95127098512405!3d-17.351816388099945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xaa0ba4996cb409%3A0x42b845b42cb52835!2sR.+Tiradentes%2C+333+-+Centro%2C+Pirapora+-+MG%2C+39270-000!5e0!3m2!1spt-BR!2sbr!4v1548420489096" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="container">
                                <nav class="scroll-nav scroll-init">
                                    <ul>
                                        <li><a class="act-scrlink" href="#sec1">Inicio</a></li>
                                        <li><a href="#sec2">Detalhes</a></li>
                                        <li><a href="#sec3">Serviços</a></li>
                                    </ul>
                                </nav>
                                <!-- <a href="#" class="show-hidden-map"> <span>Mapa</span> <i class="fal fa-map-marked-alt"></i></a> -->
                            </div>
                        </div>
                        <!--  scroll-nav-wrapper end  -->                    
                        <!--   container  -->
                        <div class="container">
                            <!--   row  -->
                            <div class="row">
                                <!--   datails -->
                                <div class="col-md-8">
                                    <div class="list-single-main-container ">
                                        <!-- fixed-scroll-column  -->
                                        <!-- fixed-scroll-column end   -->
                                        <div class="list-single-main-media fl-wrap">
                                            <!-- gallery-items   -->
                                            <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">
                                                <!-- 1 aqui tinha quer ter 2-->
                                                <div class="gallery-item">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="<?php echo base_url() ?>public/imagens/noticias/<?php echo $produtos->imagem ?>"   alt="">
                                                            <a href="<?php echo base_url() ?>public/imagens/noticias/<?php echo $produtos->imagem ?>" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($noticia){ ?>
                                                    <?php foreach($noticia as $key => $value): ?>
                                                        <div class="gallery-item ">
                                                            <div class="grid-item-holder">
                                                                <div class="box-item">
                                                                    <img  src="<?php echo base_url() ?>public/imagens/noticias/galeria/<?php echo $value->imagem ?>"   alt="">
                                                                    <a href="<?php echo base_url() ?>public/imagens/noticias/galeria/<?php echo $value->imagem ?>" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php } ?>
                                                <!-- 1 end -->
                                                <!-- 3 meio configurado da forma a baixo
                                                <div class="gallery-item gallery-item-second">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="<?php echo base_url() ?>public/imagens/noticias/<?php echo $produtos->imagem ?>"   alt="">
                                                            <a href="<?php echo base_url() ?>public/imagens/noticias/<?php echo $produtos->imagem ?>" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                3 end -->
                                                <!-- 4  aqui tinha que ter 3
                                                <div class="gallery-item">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="<?php echo base_url() ?>assets/images/gal/4.jpg"   alt="">
                                                            <a href="<?php echo base_url() ?>assets/images/gal/4.jpg" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                 4 end -->
                                            </div>
                                            <!-- end gallery items -->                                          
                                        </div>
                                        <!-- list-single-header end -->
                                    
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Detalhes </h3>
                                            </div>
                                           <p>
                                               <?php echo $produtos->texto ?>
                                           </p>
                                        </div>
                                        <!--   list-single-main-item end -->
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="sec3">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Serviço</h3>
                                            </div>
                                            <div class="listing-features fl-wrap">
                                                <ul>
                                                    <?php if ($produtos->wifi == 1){ ?>
                                                        <li><i class="fal fa-wifi"></i>Wi Fi Grátis</li>
                                                    <?php } ?>
                                                    <?php if ($produtos->arcondicionado == 1){ ?>
                                                        <li><i class="fal fa-snowflake"></i> Ar Condicionado</li>
                                                    <?php } ?>
                                                    <?php if ($produtos->cafedamanha == 1){ ?>
                                                        <li><i class="fal fa-utensils"></i>Café da Manhã</li>
                                                    <?php } ?>
                                                    <?php if ($produtos->acesso == 1){ ?>
                                                        <li><i class="fal fa-wheelchair"></i> Acesso</li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                        <!--   list-single-main-item end -->     
                                        <!-- accordion-->
                                        
                                        <!-- accordion end -->                                                     
                                        <!--   list-single-main-item -->
                                        
                                        <!-- list-single-main-item end -->
                                        <!-- list-single-main-item -->   
                                    
                                        <!-- list-single-main-item end -->   
                                        <!-- list-single-main-item -->   
                                    
                                        <!-- list-single-main-item end -->                                    
                                    </div>
                                </div>
                                <!--   datails end  -->
                                <!--   sidebar  -->
                                <div class="col-md-4">
                                    <!--box-widget-wrap -->  
                                    <div class="box-widget-wrap">
                                        <!--box-widget-item -->
                                        
                                        <!--box-widget-item end -->                                      
                                        <!--box-widget-item -->
                                        
                                        <!--box-widget-item end -->                                       
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3> Contato</h3>
                                                    </div>
                                                    <div class="box-widget-list">
                                                        <ul>
                                                            <li><span><i class="fal fa-map-marker"></i> Endereço :</span> <a ><?php echo $contato->endereco ?></a></li>
                                                            <li><span><i class="fal fa-phone"></i> Telefone :</span> <a ><?php echo $contato->telefone1 ?></a></li>
                                                            <li><span><i class="fal fa-envelope"></i> Email :</span> <a ><?php echo $contato->email ?></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="list-widget-social">
                                                        <ul>
                                                            <li><a href="<?php echo $contato->facebook ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="<?php echo $contato->instagram ?>" target="_blank" ><i class="fab fa-instagram"></i></a></li>
                                                            <li><a href="https://twitter.com/hotel_mundial" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                          
                                        <!--box-widget-item -->
                                        
                                        <!--box-widget-item end -->                             
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div id="weather-widget" class="gradient-bg" data-city="New York" data-country="USA"></div>
                                        </div>
                                        <!--box-widget-item end -->   
                                        <!--box-widget-item end -->   
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget widget-posts">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3>Outras acomodações</h3>
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
                                      
                                        <!--box-widget-item end -->                              
                                        <!--box-widget-item -->
                                       
                                        <!--box-widget-item end -->                            
                                    </div>
                                    <!--box-widget-wrap end -->  
                                </div>
                                <!--   sidebar end  -->
                            </div>
                            <!--   row end  -->
                        </div>
                        <!--   container  end  -->
                    </section>
                    <!--  section  end-->
                </div>
                <!-- content end-->
                <div class="limit-box fl-wrap"></div>
            </div>
            <!--wrapper end -->