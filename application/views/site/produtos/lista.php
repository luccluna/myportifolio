 <!--  wrapper  -->
 <div id="wrapper">
    <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section single-par" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="<?php echo base_url() ?>assets/images/acomodacoes.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <div class="section-title-separator"><span></span></div>
                    <h2><span>Acomodações</span></h2>
                    <span class="section-separator"></span>
                    <h4>Acomodações amplas e levemente decoradas com requinte e sofisticação.</h4>
                </div>
            </div>
            <div class="header-sec-link">
                <div class="container"><a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
            </div>
        </section>
        <!--  section  end-->
        <div class="breadcrumbs-fs fl-wrap">
            <div class="container">
                <div class="breadcrumbs fl-wrap"><a href="<?php echo base_url() ?>">Home</a><span>Acomodações</span></div>
            </div>
        </div>
        <!--section -->
        <section class="grey-blue-bg small-padding" id="sec1">
            <div class="container">
                <div class="row">
                    <!--listing -->
                    <div class="col-md-12">             
                        <!--col-list-wrap -->
                        <div class="col-list-wrap fw-col-list-wrap">
                            <!-- list-main-wrap-->
                            <div class="list-main-wrap fl-wrap card-listing">
                                <!-- list-main-wrap-opt-->
                                
                                <!-- list-main-wrap-opt end-->
                                <!-- listing-item-container -->
                                <div class="listing-item-container init-grid-items fl-wrap three-columns-grid">
                                    <!-- listing-item  -->
                                    <?php foreach($produtos as $key => $value): ?>
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <a href="<?php echo base_url('detalhes-produto') ?>/<?php echo $value->id ?>/<?php echo $value->nome_url ?>"><img src="<?php echo base_url() ?>public/imagens/noticias/<?php echo $value->imagem ?>" alt=""></a>
                                                    <div class="geodir-category-opt">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-content fl-wrap title-sin_item">
                                                    <div class="geodir-category-content-title fl-wrap">
                                                        <div class="geodir-category-content-title-item">
                                                            <h3 class="title-sin_map"><a href="<?php echo base_url('detalhes-produto') ?>/<?php echo $value->id ?>/<?php echo $value->nome_url ?>"><?php echo $value->titulo ?></a></h3>
                                                        </div>
                                                    </div>
                                                    <p><?php echo character_limiter($value->texto_breve,200) ?></p>
                                                    <ul class="facilities-list fl-wrap">
                                                        <?php if ($value->wifi == 1){ ?>
                                                            <li><i class="fal fa-wifi"></i><span>Wi Fi Grátis</span></li>
                                                        <?php } ?>
                                                        <?php if ($value->arcondicionado == 1){ ?>
                                                            <li><i class="fal fa-snowflake"></i><span> Ar Condicionado</span></li>
                                                        <?php } ?>
                                                        <?php if ($value->cafedamanha == 1){ ?>
                                                            <li><i class="fal fa-utensils"></i><span>Café da Manhã</span></li>
                                                        <?php } ?>
                                                        <?php if ($value->acesso == 1){ ?>
                                                            <li><i class="fal fa-wheelchair"></i><span> Acesso</span></li>
                                                        <?php } ?>
                                                    </ul>
                                                    <div class="geodir-category-footer fl-wrap">
                                                        <div class="geodir-category-price">A partir de <span><?php echo $value->valor ?></span></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endforeach ?>
                                    <!-- listing-item end --> 
                                </div>
                                <!-- listing-item-container end-->
                                <!-- pagination-->
                                <div class="pagination">
                                                <!-- <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                                <a href="#" >1</a>
                                                <a href="#" class="current-page">2</a>
                                                <a href="#">3</a>
                                                <a href="#">4</a>
                                                <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a> -->
                                                <ul style="display: -webkit-inline-box;"><?php echo $paginacao ?></ul> 
                                            </div>
                                            
                                            <!-- pagination end-->
                                        </div>
                                        <!-- list-main-wrap end-->
                                    </div>
                                    <!--col-list-wrap end -->
                                </div>
                                <!--listing  end-->
                            </div>
                            <!--row end-->
                        </div>
                    </section>
                    <!--section end -->
                </div>
                <!-- content end-->
            </div>
            <!--wrapper end -->