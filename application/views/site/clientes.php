    <!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo base_url() ?>assets/images/client.jpg)">
    	<div class="auto-container">
        	<h1>Clientes</h1>
            <ul class="page-breadcrumb">
            	<li><a href="<?php echo base_url() ?>">Home</a></li>
                <li>Clientes</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Testimonial Page Section-->
    <section class="testimonial-page-section">
    	<div class="auto-container">
        	<div class="sec-title">
            	<h2>Nossos Clientes</h2>
                <div class="text"> </div>
            </div>
            <?php foreach ($clientes as $key => $value): ?>


            <!--Testimonial Block Two-->
            <div class="testimonial-block-two">
            	<div class="inner-box">
                	<div class="content">
                    	<div class="client-icon">
                        	<img style="    width: 200px;
    object-fit: cover;
    height: 70px;
" src="<?php echo base_url() ?>public/imagens/clientes/<?php echo $value->imagem ?>" alt="" />
                        </div>
                        <div class="text">Caso de sucesso, planejamento estratégico e tributario implantando em empresa renomada em diversos ramos, analíses tributárias, recursos humanos.</div>
                        <!-- <div class="text"><?php echo $value->descricao ?></div> -->
                    </div>
                </div>
            </div>

          

          <?php endforeach; ?>
        </div>
    </section>
    <!--End Testimonial Page Section-->
