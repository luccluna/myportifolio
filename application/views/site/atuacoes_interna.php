<!--Page Title-->
<section class="page-title" style="background-image:url(<?php echo base_url()?>assets/images/banner.png)">
  <div class="auto-container">
      <h1>Áreas de atuação</h1>
      <ul class="page-breadcrumb">
          <li><a href="<?php echo base_url() ?>">Home</a></li>
          <li>Áreas de atuação</li>
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
          <div class="blog-single padding-right">
             <div class="inner-box">
              <div class="image">
                  <img src="<?php echo base_url()?>public/imagens/areas/<?php echo $area->imagem ?>" alt="" />
              </div>
              <div class="lower-content">
                  <div class="upper-box">
                   <div class="posted-date"><?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                   date_default_timezone_set('America/Sao_Paulo');
                   echo utf8_encode(strftime(' %d de %B de %Y' , strtotime($area->data)));
                   ?></div>

               </div>
               <h3><?php echo $area->titulo ?></h3>
               <div class="text">
                  <?php echo $area->descricao ?>
              </div>
              <ul class="social-share-options">
                  <li class="share"><span class="fa fa-share-alt"></span></li>
                  <li class="twitter"><a href="#">twiter</a></li>
                  <li class="facebook"><a href="#">facebook</a></li>
                  <li class="google"><a href="#">google+</a></li>
                  <li class="linkedin"><a href="#">linkedin</a></li>
              </ul>
          </div>
      </div>
  </div>

  <!-- Comment Form -->

  <!--End Comment Form -->

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


<!-- Popular Posts -->


<!-- Popular Tags -->


</aside>
</div>

</div>
</div>
</div>
   <!--End Sidebar Page Container-->
