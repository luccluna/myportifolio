<!-- 
		<section id="page-title">
			<div class="container clearfix">
				<h1>Apoie Esta causa</h1>
				
			</div>
		</section> -->

		<section  style="">
			<img style="width: 100%; height: 300px; object-fit: cover !important; object-position: 50% 50% !important;" src="<?php echo base_url() ?>assets/images/portfolio/extended/thumbs/banner.jpg">
		</section>
	<style type="text/css">

		@media only screen and (max-width: 991px) {
			.botao_doar{
				margin-top: 70px !important;
			}
		}

	</style>
		
		<div class="container" style="margin-top: 80px;margin-bottom: 80px;border: solid 3px #F5F5F5;">
			<div class="row">
				
				<div class="col-md-8"> 

					
						
							<h3 style="background: #F9F9F9; padding: 10px">ENGRANDEÇA A ALMA COM UM SENTIMENTO DE CARIDADE</h3>
						
					
					
								<p> &nbsp;&nbsp;&nbsp;&nbsp; Apenas faça o bem, o semeie, lembrando e afirmando sempre a ti, que o principal é amar e seguir perdoando no esforço de engrandecer-se para retornar melhores, como quando aqui chegamos.
									<br>
									&nbsp;&nbsp;&nbsp;&nbsp;Semeie o bem, engrandeça-te a alma!" (Frederico)
									<br>
									&nbsp;&nbsp;&nbsp;&nbsp;Fazer o bem, auxiliar a quem necessita do amparo material é despertar o amor dentro de nós! Você não é obrigado a ajudar, mas se puder ajudar, obrigado!
								</p>

									<!-- <p>Semeie o bem, engrandeça-te a alma!" (Frederico)</p>

										<p>Fazer o bem, auxiliar a quem necessita do amparo material é despertar o amor dentro de nós! Você não é obrigado a ajudar, mas se puder ajudar, obrigado!</p> -->

								
						

							</div>
							<div align="center" class="col-md-4 botao_doar" style="    background: #F9F9F9;">

								
									
							
										<h3 style="margin:0px">DOE AQUI <br> <i style="    font-size: 30px;" class="fa fa-arrow-down" aria-hidden="true"></i></h3>
										<!-- <input placeholder="R$"  id="valor_doacao" style="width: 100%;font-size: 50px" type="" min="1,00" name=""> -->

							
									<div class="pricing-action">
										<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
										<form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post">
											<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
											<input type="hidden" name="currency" value="BRL" />
											<input type="hidden" name="receiverEmail" value="pagseguro@institutoespiritadoamor.com" />
											<input type="hidden" name="iot" value="button" />
											<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
										</form>
										<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
									</div>
								

							</div>

						</div>
					</div>




						<section  style="    margin-bottom: 50px;">
							<a href="<?php echo base_url('sobre') ?>" class="button button-purple button-full center tright footer-stick">
								<div class="container clearfix">
									Conheça mais sobre o Instituto Espírita do amor <strong>clique aqui</strong> <i class="icon-caret-right" style="top:4px;"></i>
								</div>
							</a>
						</section>

						<script type="text/javascript">

							$('#valor_doacao').mask("#.##0,00", {reverse: true});

						</script>

						<style type="text/css">
						::-webkit-input-placeholder { /* Chrome/Opera/Safari */
							text-align: left;
						}
						#valor_doacao{
							text-align: right;
						}
					</style>


					<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
					</script> 

					<script type="text/javascript">
						$('#finalizar_doacao').click(function(e){
							e.preventDefault();




							$.ajax({
								url:  '<?php echo base_url('loja/finalizar') ?>',
								type: 'POST',
								data: {
                    //desconto:$('#cupom_valido').val(),
                    nome_completo: dados.nome_completo,


                },
                beforeSend: function(){
                	$('#loading').removeClass('loading-off');
                },
                success: function(result) {

                	result = JSON.parse(result);
                	console.log(result);

                	if(result){

                		PagSeguroLightbox({
                			code: result
                		}, {
                			success : function(transactionCode) {
                				swal({
                					icon: "success",
                					title: "Obrigado pela compra!",
                				});
                			},
                			abort : function() {

                			}
                		});
                	}
                },
                complete: function(){
                	$('#loading').addClass('loading-off');
                }
            });
						});

					</script>
