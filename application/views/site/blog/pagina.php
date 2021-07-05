<!--Page Title-->
<section class="page-title" style="background-image:url(assets/images/informativos.jpg)">
 <div class="auto-container">
     <h1>Informativos</h1>
     <ul class="page-breadcrumb">
         <li><a href="<?php echo base_url() ?>">Home</a></li>
         <li>Informativos</li>
     </ul>
 </div>
</section>
<!--End Page Title-->

<!--Sidebar Page Container-->
<div class="sidebar-page-container">
 <div class="auto-container">
     <div class="row clearfix">

        <!--Content Side / Our Blog-->
        <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
         <div class="our-blog padding-right">

            <?php foreach ($noticias as $key => $value): ?>


                <!--News Block Two-->
                <div class="news-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <a href="<?php echo base_url('blog') ?>/<?php echo $value->nome_url ?>"><img style="    height: 300px;
                            object-fit: cover;
                            object-position: 50% 50%;" src="<?php echo base_url() ?>public/imagens/noticias/<?php echo $value->imagem ?>" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="upper-box">

                            </div>
                            <div class="lower-box">
                                <h3><a href="<?php echo base_url('blog') ?>/<?php echo $value->nome_url ?>"><?php echo $value->titulo ?></a></h3>
                                <div class="text"><?php echo $value->texto_breve ?></div>
                                <a href="<?php echo base_url('blog') ?>/<?php echo $value->nome_url ?>" class="theme-btn btn-style-two">Ler Mais</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
            <!--News Block Two-->


            <!--Styled Pagination-->
           <!--  <ul class="styled-pagination">
                <?php echo $paginacao ?>
            </ul> -->
            <ul class="styled-pagination">
                <?php echo $paginacao ?>
            </ul> 
            <!--End Styled Pagination-->

        </div>
    </div>

    <!--Sidebar Side-->
    <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
     <aside class="sidebar default-sidebar">

        <!-- Search -->
        <div class="sidebar-widget search-box">
           <form  action="<?php echo base_url('blog-busca') ?>" method="GET">
            <div class="form-group">
                <input type="search" name="busca" placeholder="Pesquise" required>
                <button type="submit"><span class="icon fa fa-search"></span></button>
            </div>
        </form>
    </div>

    <!--Blog Category Widget-->



    <!-- Popular Posts -->
    <div class="sidebar-widget popular-posts">
        <div class="sidebar-title"><h2>Em destaque</h2></div>
        <?php foreach ($ultimas as $key => $value): ?>

            <article class="post">
                <div class="text"><a href="<?php echo base_url('blog') ?>/<?php echo $value->nome_url ?>"><?php echo $value->titulo ?></a></div>
                <div class="post-info"><?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                echo utf8_encode(strftime(' %d de %B de %Y' , strtotime($value->data)));
                ?></div>
            </article>


        <?php endforeach ?>
    </div>

    <!-- Popular Tags -->


</aside>
</div>

</div>
</div>
</div>