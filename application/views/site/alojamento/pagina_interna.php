
</section>

	<section id="page-title" class="page-title-mini">
			<div class="container clearfix">
				<h1><?php echo $alojamento->titulo ?></h1>

				
			</div>
		</section>
<style type="text/css">
	
	.cheio{
		background: #8080805c;
		border: #8080805c;
		

	}
	.cheio:hover{
			background: #8080805c;
		    border: #8080805c;

	}

</style>
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="postcontent nobottommargin clearfix">
				<div class="single-event">
					<div class="col_three_fourth">
						<div class="entry-image nobottommargin">
							<a href="javascript:void(0)"><img src="<?php echo base_url() ?>public/imagens/alojamentos/<?php echo $alojamento->imagem ?>" alt="Event Single"></a>
							<div class="entry-overlay">
										<span class="d-none d-md-block">Vagas: <?php echo $alojamento->preenchidos ?>/<?php echo $alojamento->vagas ?> </span><div id="event-countdown" class="countdown"></div>
									</div>	
						</div>
					</div>
					<div class="col_one_fourth col_last">
						<div class="card events-meta mb-3">
							<div class="card-header"><h5 class="mb-0">Informações:</h5></div>
							<div style="    padding: 0.5rem;" class="card-body">
								<ul class="iconlist nobottommargin">
									<li><i class="icon-calendar3"></i> <?php echo $alojamento->data ?></li>
									<!-- <li><i class="icon-time"></i> 20:00 - 02:00</li> -->
									<li><i class="icon-users"></i> <?php echo $alojamento->vagas ?> Vagas</li>
									<li><i class="icon-users"> </i> <?php echo $alojamento->vagas - $alojamento->preenchidos ?> Vagas disponíveis</li>
									<!-- <li><i class="icon-users"></i> Preenchidos: <?php echo $alojamento->preenchidos ?></li> -->

								</ul>
							</div>
						</div>
						<a  class="btn btn-success btn-block btn-lg	<?php echo ($alojamento->preenchidos>=$alojamento->vagas)? 'cheio' : '' ?>" href="<?php echo ($alojamento->preenchidos>=$alojamento->vagas)? 'javascript:void(0)' : base_url('agendar').'?id='.$alojamento->id ?> " >Agendar</a>	
					</div>
					<div class="clear"></div>
					<div class="col_three_fourth">
						<h3>Detalhes</h3>
						<?php echo $alojamento->descricao ?>
					</div>
				</div>
			</div>
			<div class="sidebar nobottommargin col_last clearfix">
				<div class="sidebar-widgets-wrap">
					<?php if ($ultimos): ?>
						
					
					<div class="widget clearfix">
						<h4>Outros </h4>
						<div id="post-list-footer">
							<?php foreach ($ultimos as $key => $value): ?>
								<div class="spost clearfix">
									<div class="entry-image">
										<a href="<?php echo base_url('alojamento-detalhes') ?>?id=<?php echo $value->id ?>" class=""><img src="<?php echo base_url() ?>public/imagens/alojamentos/<?php echo $value->imagem ?>" alt=""></a>
									</div>
									<div class="entry-c">
										<div class="entry-title">
											<h4><a href="<?php echo base_url('alojamento-detalhes') ?>?id=<?php echo $value->id ?>"><?php echo $value->titulo; ?></a></h4>
										</div>
										<ul class="entry-meta">
											<li><?php echo $value->data; ?></li>
											<li><?php echo $value->vagas; ?> Vagas</li>
										</ul>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>



<script type="text/javascript">
	
	$('#agendar').click(function(){
		
			if (<?php echo ($this->auth->existe_sessao())? $this->auth->existe_sessao() : 0 ; ?>) {

				alert('tem');
			}else{

				alert('tem nao');
			}




	});

</script>