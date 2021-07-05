	<section id="page-title" class="page-title-mini">
			<div class="container clearfix">
				<h1>Alojamentos</h1>
				<span>Everything you need to know about our Company</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
					<li class="breadcrumb-item"> <strong><a href="javascript:void(0)">agenda</a></strong></li>
						
				</ol>
			</div>
		</section>

		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div id="posts" class="post-grid grid-container post-masonry clearfix">

						<?php foreach ($alojamentos as $key => $alojamento): ?>
							
						<div class="entry clearfix">
							<div class="entry-image">
								<a href="<?php echo base_url('alojamento-detalhes') ?>?id=<?php echo $alojamento->id ?> "><img style="    
								height: 100px !important;
								min-height: 150px !important;
								max-height: 182px !important;
								/* width: 199px !important; */
								max-width: 100%!important;
								object-fit: cover !important;
								object-position: 50% 50% !important;
   								 " class="image_fade" src="<?php echo base_url() ?>public/imagens/alojamentos/<?php echo $alojamento->imagem ?>" alt="<?php echo $alojamento->titulo ?>"></a>
							</div>
							<div class="entry-title">
								<h2><a href="<?php echo base_url('alojamento-detalhes') ?>?id=<?php echo $alojamento->id ?> "><?php echo $alojamento->titulo ?></a></h2>
							</div>
							<ul class="entry-meta clearfix">
								<li>Dia: <?php echo $alojamento->data ?></li>
								<li>Vagas: <?php echo $alojamento->vagas ?></li>
						
							</ul>
							<div class="entry-content">
								<p><?php echo $alojamento->texto_breve ?></p>
								<a href="<?php echo base_url('alojamento-detalhes') ?>?id=<?php echo $alojamento->id ?> "class="more-link">Acessar</a>
							</div>
						</div>
						
						<?php endforeach ?>
					
					</div>
					<div class="page-load-status">
						<div class="css3-spinner infinite-scroll-request">
							<div class="css3-spinner-ball-pulse-sync">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</div>
						<div class="alert alert-warning center infinite-scroll-last mx-auto" style="max-width: 20rem;">End of content</div>
						<div class="alert alert-warning center infinite-scroll-error mx-auto" style="max-width: 20rem;">No more pages to load</div>
					</div>

					<div class="center d-none">
						<a href="blog-masonry-page-2.html" class="button button-3d button-dark button-large button-rounded load-next-posts">Load more..</a>
					</div>
				</div>
			</div>
		</section>