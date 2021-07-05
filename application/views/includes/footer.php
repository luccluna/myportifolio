        <!-- Start footer area -->
        <footer id="footer" class="footer-wrapper footer-1">
            <!-- Start footer top area -->
            <div class="footer-top-wrap ptb-70 bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 hidden-sm">
                            <div class="zm-widget pr-40">
                                <h2 class="h6 zm-widget-title uppercase text-white mb-30">Sobre a VinTV</h2>
                                <div class="zm-widget-content">
                                    <p>A VinTV é uma emissora local por assinatura, atuando em Montes Claros, desde 2009. Exibida pela Master, no canal 20, a vinTV apresenta uma programação exclusivamente local e chega à mais de 40 mil lares, atingindo um público efetivo de cerca de 160 mil pessoas.</p>
                                    <p><strong>SEJA UM ANUNCIANTE!</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-2">
                            <div class="zm-widget">
                                <h2 class="h6 zm-widget-title uppercase text-white mb-30">Redes Sociais</h2>
                                <div class="zm-widget-content">
                                    <div class="zm-social-media zm-social-1">
                                        <ul>
                                            <li><a href="<?php echo $contato_empresa->facebook ?>"><i class="fa fa-facebook"></i>Curta-nos no Facebook</a></li>
                                            <!-- <li><a href="https://twitter.com"><i class="fa fa-twitter"></i>Tweet para nós no Twitter</a></li> -->
                                            <!-- <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i>Pin us on Pinterest</a></li> -->
                                            <li><a href="<?php echo $contato_empresa->instagram ?>"><i class="fa fa-instagram"></i>Siga-nos no Instagram</a></li>
                                            <!-- <li><a href="https://plus.google.com"><i class="fa fa-google-plus"></i>Share us on GooglePlus</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-3">
                            <div class="zm-widget pr-50 pl-20">
                                <h2 class="h6 zm-widget-title uppercase text-white mb-30">Categorias Populares</h2>
                                <div class="zm-widget-content">
                                    <div class="zm-category-widget zm-category-1">
                                        <ul>
                                            <?php foreach ($conta_noticias as $key => $value) { ?>
                                                <li><a href="<?php echo base_url() ?>informativos/<?php

                                                $string = $value->nome;

                                                echo strtolower( preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string ) ));


                                                ?>"><?php echo $value->nome ?> <span><?php echo $value->qtd ?></span></a></li>
                                            <?php  } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-3">
                            <div class="zm-widget">
                                <h2 class="h6 zm-widget-title uppercase text-white mb-30">Inscreva-se no nosso Newsletter</h2>
                                <!-- Start Subscribe From -->
                                <div class="zm-widget-content">
                                    <div class="subscribe-form subscribe-footer">
                                        <p>Junte-se a mais de 80,000 incríveis assinantes e fique por dentro das últimas notícias da nossa região.</p>
                                        <form>
                                            <input type="text" placeholder="Nome completo">
                                            <input type="email" placeholder="Seu e-mail" required="">
                                            <input type="submit" value="Inscrever-se">
                                        </form>
                                    </div>
                                </div>
                                <!-- End Subscribe From -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End footer top area -->
            <div class="footer-buttom bg-black ptb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <div class="zm-copyright">
                                <p>&copy; 2019 Developed by <a href="http://www.tectotum.com.br/site/"><strong>Tectotum Tecnologia.</strong></a> Todos os direitos reservados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End footer area -->
        </div>
        <!-- Body main wrapper end -->
        
        <!-- Placed js at the end of the document so the pages load faster -->
        <!-- jquery latest version -->
        <script src="<?php echo base_url() ?>assets/js/vendor/jquery-1.12.1.min.js"></script>
        <!-- Bootstrap framework js -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <!-- All js plugins included in this file. -->
        <script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
        <!-- Main js file that contents all jQuery plugins activation. -->
        <script src="<?php echo base_url() ?>assets/js/main.js"></script>

    </body>
    </html>