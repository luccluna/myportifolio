 wrapper  -->
 <div id="wrapper">
    <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section single-par" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="<?php echo base_url() ?>assets/images/bg-sobre.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <div class="section-title-separator"><span></span></div>
                    <h2><span>O Hotel</span></h2>
                    <span class="section-separator"></span>
                    <h4>O seu conforto é o nosso objetivo.</h4>
                </div>
            </div>
            <div class="header-sec-link">
                <div class="container"><a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
            </div>
        </section>
        <!--  section  end-->
        <div class="breadcrumbs-fs fl-wrap">
            <div class="container">
                <div class="breadcrumbs fl-wrap"><a href="<?php echo base_url() ?>">Home</a><span>O Hotel</span></div>
            </div>
        </div>

        <section id="sec1" class="middle-padding grey-blue-bg">
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
                                        <?php foreach ($clientes as $value): ?>
                                            <!-- SLIDER -->
                                            <div class="slick-slide-item"><img src="<?php echo base_url() ?>public/imagens/clientes/<?php echo $value->imagem ?>" alt=""></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                                </div>
                            </div>
                            
                            <div class="list-single-main-item fl-wrap">
                                <?php echo $conteudo->texto ?>
                                <!-- <div class="list-single-main-item-title fl-wrap">
                                    <h3>O seu conforto é o nosso objetivo.</h3>
                                </div>
                                <p>
                                    Fruto de um espírito empreendedor, tendo como seus fundadores e investidores, o casal Sr. João Humberto Clemente e a Sra. Ligiane Clemente, O Hotel Mundial foi construído com o intuito de proporcionar aos seus clientes a mesma sensação de conforto e aconchego do lar, e tornar suas estadias em Pirapora, ainda mais prazerosas.
                                </p>
                                <p>Embora natural de outra cidade, o Sr. João Humberto, acreditou no potencial de Pirapora, ao investir no Hotel Mundial com o propósito de agregar valores à cidade e região, com o que há de melhor no ramo de hotelaria e desenvolvimento social. Fundado no ano de 2001, o Hotel Mundial iniciou suas atividades com apenas 15 apartamentos, nesse tempo ganhou mercado, renome, admiração e carinho de seus clientes e amigos, devido à hospitalidade desprendida dos seus proprietários e colaboradores. Hoje dispõe de 80 apartamentos cuidadosamente selecionados e categorizados, com a finalidade de realizar um atendimento personalizado.</p>
                                
                               
                                <div class="list-single-main-item-title fl-wrap" style="    padding-bottom: 10px;">
                                    <h3>Localização</h3>
                                </div>

                                <p>
                                    Estrategicamente localizado no centro comercial da cidade de Pirapora, próximo aos pontos turísticos, centro de convenção (um dos maiores e mais modernos de Minas Gerais) e dos principais comércios da cidade. Favorece ainda o Turismo Executivo por estar localizado em frente ao Fórum e Prefeitura. A nossa cidade conta com um moderno Distrito Industrial de minério, tecelagem e possui um Terminal da Ferrovia Centro Atlântica (Porto Seco).
                                </p>

                                <div class="list-single-main-item-title fl-wrap" style="    padding-bottom: 10px;">
                                    <h3>Paisagem</h3>
                                </div>

                                <p>
                                    Há pouco mais de 40 metros da orla do maravilhoso Rio São Francisco, oferece uma vista deslumbrante das corredeiras, da ponte Marechal Hermes, e à tarde um lindíssimo pôr-do-sol, uma das mais belas paisagens à disposição, para quem hospeda no Hotel Mundial.
                                </p>

                                <div class="list-single-main-item-title fl-wrap" style="    padding-bottom: 10px;">
                                    <h3>O que torna este um dos melhores hotéis de Minas Gerais?</h3>
                                </div>

                                <p>
                                   Primeiro que ele é único como você. Suas acomodações são as melhores, e nele você encontra harmonia, felicidade e paz, que são riquíssimos ingredientes para uma excelente noite de sono.
                                </p>

                                <p>
                                    Você pode escolher sua estadia com vista panorâmica para o rio e se deliciar com os balanços das águas da cachoeira, ou ao mais puro silêncio da neblina da noite. Nossos colaboradores são que há de melhor em excelência no mercado, com treinamentos atualizados, conhecimentos culturais e sociais da cidade. Temos uma agenda de eventos sempre atualizada a sua disposição. Por isso relaxe, utilize nossos serviços e aproveite bem sua estada.
                                </p>

                                <div class="list-single-main-item-title fl-wrap" style="    padding-bottom: 10px;">
                                    <h3>Política de Qualidade</h3>
                                </div>

                                <p>
                                    A Direção do Hotel Mundial definiu suas intenções em relação ao tema Qualidade, levando em consideração, a visão de futuro da empresa, sua vocação, seus valores, definindo assim sua política:
                                </p>

                                <p>
                                    
                                        - Prestar mais e melhores serviços aos nossos clientes, melhorando os processos continuamente;<br>
                                        - Ser referência em hotelaria por seu charme, alto padrão de conforto, atendimento qualificado, personalizado e respeito ao meio ambiente. Bem como, atuar com profissionalismo e simpatia através do cumprimento das normas de gestão da qualidade visando sempre respeitar os processos de melhoramento contínuo e a satisfação total dos nossos clientes, fornecedores e colaboradores;<br>
                                        - Manter melhor o conceito do nosso nome, com políticas favoráveis aos processos de hotelaria, alinhados ao meio ambiente;<br>
                                        - Atender as legislações brasileiras e internacionais, com utilização dos melhores recursos a fim de garantir a eficácia dos resultados como favoráveis às políticas internas e externas da empresa.<br>

                                </p>

                                <div class="list-single-main-item-title fl-wrap" style="    padding-bottom: 10px;">
                                    <h3>KNOW-HOW</h3>
                                </div>

                                <p>
                                    Nosso know-how propicia total apoio e conveniência do ponto de vista do hóspede. Antevemos suas necessidades e anseios preocupando-nos em atendê-lo e surpreendê-lo.
                                </p>



                                <span class="fw-separator"></span> -->
                                <script src="https://360player.io/static/dist/scripts/embed.js" async></script>
                                <iframe src="https://360player.io/p/tZgq9z/" frameborder="0" width=560 height=315 allowfullscreen data-token="tZgq9z"></iframe>
                                
                            </div>
                            
                            <!-- list-single-main-item -->   
                            
                            <!-- list-single-main-item end -->                                             
                        </article>
                        <!-- article end -->                                
                    </div>
                    <!--post-container end -->  
                </div>
                <!-- blog content end -->
                <!--   sidebar  -->
                <div class="col-md-4">
                    <!--box-widget-wrap -->  
                    <div class="box-widget-wrap fl-wrap fixed-bar fixbar-action" style="z-index: 1000;">
                        <!--box-widget-item -->
                        
                        <!--box-widget-item end -->                          
                        <!--box-widget-item -->
                        
                        <!--box-widget-item end --> 
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
                        <!--box-widget-item -->
                        
                        <!--box-widget-item end -->                             
                    </div><div></div>
                    <!--box-widget-wrap end -->  
                </div>
                <!--   sidebar end  -->
            </div>
        </div>
        <div class="limit-box fl-wrap"></div>
    </section>
    <!-- section end -->
    <!--section -->
    
    <!-- section end -->
    
</div>
<!-- content end-->
</div>
            <!--wrapper end