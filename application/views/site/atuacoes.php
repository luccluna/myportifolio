     <section class="page-title" style="background-image:url(<?php echo base_url() ?>assets/images/atuacao.jpg)">
       <div class="auto-container">
           <h1>Áreas de atuação</h1>
           <ul class="page-breadcrumb">
               <li><a href="<?php echo base_url() ?>">Home</a></li>
               <li>Áreas de atuação
               </li>
           </ul>
       </div>
   </section>

   <section class="services-section-five">
    <div class="auto-container">
        <!-- <h2>Best solution for your business</h2> -->
        <?php foreach ($areas as $key => $value): ?>
    
    <?php if ($key%2==1){ ?>
            
        <div class="services-block-six">
            <div class="inner-box">
                <div class="row clearfix">
                    <!--Image Column-->
                    <div class="image-column col-md-6 col-sm-6 col-xs-12">
                        <div class="image">
                            <img src="<?php echo base_url() ?>public/imagens/areas/<?php echo $value->imagem ?>" alt="">
                        </div>
                    </div>
                    <!--Content Column-->
                    <div class="content-column col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-column">
                            <h3><?php echo $value->titulo ?></h3>
                            <?php echo $value->descricao ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }else{ ?>

        <div class="services-block-six style-two">
            <div class="inner-box">
                <div class="row clearfix">
                    <!--Content Column-->
                    <div class="content-column col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-column">
                            <h3><?php echo $value->titulo ?></h3>
                            <?php echo $value->descricao ?>

                        </div>
                    </div>
                    <!--Image Column-->
                    <div class="image-column col-md-6 col-sm-6 col-xs-12">
                        <div class="image">
                            <img src="<?php echo base_url() ?>public/imagens/areas/<?php echo $value->imagem ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
        <?php endforeach ?>




    </div>
</section>

<!--

    <section class="project-fullwidth-section">
    	<div class="outer-container">
        	<div class="clearfix">
            	 <?php foreach ($areas as $key => $a): ?>


                <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <a href="<?php echo base_url('area') ?>/<?php echo $a->id ?>"><img src="<?php echo base_url() ?>public/imagens/areas/<?php echo $a->imagem ?>" alt=""></a>
                        </figure>
                        <h3><a href="<?php echo base_url('area') ?>/<?php echo $a->id ?>">Acidentes de Caminhão</a></h3>
                        <div class="designation">Saber mais</div>
                    </div>
                </div>
                   <?php endforeach; ?>



            </div>
        </div>
    </section>
-->
