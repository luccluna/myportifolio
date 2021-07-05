


		<section id="page-title" class="page-title-mini">
			<div class="container clearfix">
				<h1><?php echo $tipo ?> - <?php echo $alojamento->titulo ?></h1>
				<!-- <span>Ways to enhance your Forms</span> -->
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('agenda') ?>">Agenda</a></li>
					<li class="breadcrumb-item active" aria-current="page">finalizar agendamento</li>
				</ol>
			</div>
		</section>

		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div class="">
	
					

						

						<h3>Preencha o fomulário  / <span> Total de vagas disponível: <?php echo $alojamento->vagas-$alojamento->preenchidos ?></span></h3>

						<form action="<?php echo base_url('finalizar-agendamento') ?>" method="post">
						<input type="hidden" value="<?php echo $alojamento->vagas ?>" name="alojamento">
						<input type="hidden" value="<?php echo $alojamento->id ?>" name="id_alojamento">
						<input type="hidden" value="<?php echo $tipo ?>" name="tipo">

						<?php if ($vagas>1){ ?>
							


							<?php for ($i=0; $i < $vagas-$alojamento->preenchidos ; $i++) { ?>
								
							<div style="border-bottom: dashed 1px <?php echo ($i==0 || $i==1)? '#1ABC9C' : 'gray'; ?>;margin-bottom: 10px;    padding-top: 3px;
    padding-bottom: 3px;"></div>

							<?php if ($i==0): ?>
									<h4 style="margin-bottom: 0px;color: #1ABC9C">Responsável</h4>
							<?php endif ?>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label style="color: <?php echo ($i==0)? '#1ABC9C' : ''; ?>" for="inputEmail4">Nome</label>
									<input type="text" class="form-control <?php echo ($i==0)? 'respon' : ''; ?>" name="nome<?php echo $i?>" placeholder="Nome">
								</div>
								<div class="form-group col-md-3">
									<label style="color: <?php echo ($i==0)? '#1ABC9C' : ''; ?>" for="inputPassword4">Cidade</label>
									<input  type="text" class="form-control <?php echo ($i==0)? 'respon' : ''; ?>" name="cidade<?php echo $i?>" placeholder="Cidade">
								</div>
							
								<div class="form-group col-md-3">
									<label style="color: <?php echo ($i==0)? '#1ABC9C' : ''; ?>" for="inputEmail4">Email</label>
									<input  type="text" class="form-control <?php echo ($i==0)? 'respon' : ''; ?>" name="email<?php echo $i?>" placeholder="Email">
								</div>
								<div class="form-group col-md-3">
									<label style="color: <?php echo ($i==0)? '#1ABC9C' : ''; ?>" for="inputPassword4">Telefone</label>
									<input  type="text" class="form-control <?php echo ($i==0)? 'respon' : ''; ?>" name="telefone<?php echo $i?>" placeholder="Telefone">
								</div	>
							</div>
							<?php } ?>

						<?php }else{ ?>

								<div class="form-row">
								<div class="form-group col-md-3">
									<label for="inputEmail4">Nome</label>
									<input type="text" class="form-control" name="nome0" placeholder="Nome">
								</div>
								<div class="form-group col-md-3">
									<label for="inputPassword4">Cidade</label>
									<input  type="text" class="form-control" name="cidade0" placeholder="Cidade">
								</div>
							
								<div class="form-group col-md-3">
									<label for="inputEmail4">Email</label>
									<input  type="text" class="form-control" name="email0" placeholder="Email">
								</div>
								<div class="form-group col-md-3">
									<label for="inputPassword4">Telefone</label>
									<input  type="text" class="form-control" name="telefone0" placeholder="Telefone">
								</div	>
							</div>

							<?php } ?>
							<div class="form-group">
								<div class="form-check">
									
									
								</div>
							</div>
							<div align="center">
							<button style="width: 50%; border-radius: 0px;" type="submit" class="btn btn-primary">Finalizar</button>
						</div>	
						</form>
			
						
					</div>

				
				</div>
			</div>
		</section>

		<style type="text/css">
				
				.respon{
					border:solid 1px #1abc9c;
				}

		</style>