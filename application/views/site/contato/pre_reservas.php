<!--  wrapper  -->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--  section  -->
                    <section class="parallax-section single-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="<?php echo base_url() ?>assets/images/pre_reservas.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2><span>Pré-reservas</span></h2>
                                <span class="section-separator"></span>
                                <h4>Faça sua pré-reserva, é simples e rápido!</h4>
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div>
                    </section>
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="<?php echo base_url() ?>">Home</a><span>Pré-reservas</span></div>
                        </div>
                    </div>
                    <section  id="sec1" class="grey-b lue-bg middle-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <!--   list-single-main-item -->
                                    <div class="list-single-main-item fl-wrap">
                                        <div class="list-single-main-item-title fl-wrap">
                                            <h3>Nossa Localização </h3>
                                        </div>
                                        <div class="list-single-main-media fl-wrap">
                                            <img src="images/all/8.jpg" alt="" class="respimg">
                                        </div>
                                        <p><?php echo $contato->endereco ?> </p><br>
                                        <p><?php echo $contato->telefone1 ?><?php if ($contato->telefone2): ?>
                                        / </span><?php echo $contato->telefone2 ?>
                                        <?php endif; ?></p><br>
                                        <p><?php echo $contato->email ?></p>
                                        <div class="list-single-main-item-title fl-wrap mar-top">
                                            <h3>Horário de Funcionamento</h3>
                                        </div>
                                        <ul class="cat-item">
                                            <li><a href="#">Segunda a Domingo</a> <span>24 horas</span></li>
                                            
                                        </ul>
                                    </div>
                                    <!--   list-single-main-item end -->
                                </div>
                                <div class="col-md-8">
                                    <div class="list-single-main-item fl-wrap">
                                        <div class="list-single-main-item-title fl-wrap">
                                            <h3>Pré reserva</h3>
                                        </div>
                                        <div id="contact-form">
                                            <div id="message"></div>
                                            <form  class="custom-form" action="php/contact.php" name="contactform" id="contactform">
                                                <fieldset>
                                                    <label><i class="fal fa-user"></i></label>
                                                    <input type="text" name="name" id="name" placeholder="Nome *" value=""/>
                                                    <div class="clearfix"></div>
                                                    <label><i class="fal fa-envelope"></i>  </label>
                                                    <input type="text"  name="email" id="email" placeholder="Email *" value=""/>
                                                    
                                                    <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Descreva preferência de quarto, horários desejados, etc:"></textarea>
                                                </fieldset>
                                                <button class="btn float-btn color2-bg" style="margin-top:15px;" id="submit">Efetuar pré-reserva<i class="fal fa-angle-right"></i></button>
                                            </form>
                                        </div>
                                        <!-- contact form  end--> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-decor"></div>
                    </section>
                    <!-- section end -->
                </div>
                <!-- content end-->
            </div>