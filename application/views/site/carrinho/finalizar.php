  <section id="page-title" class="page-title-mini">
      <div class="container clearfix">
        <h1>Finalizar Pedido</h1>
        <!-- <span>Everything you need to know about our Company</span> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
          <li class="breadcrumb-item"> <strong><a href="javascript:void(0)">Carrrinho</a></strong></li>
            
        </ol>
      </div>
    </section>
<!--End Banner-->
<div class="page-content">          
  <!-- Breadcrumbs -->

  <!-- End Breadcrumbs -->
  <div class="product-check-out" style="margin-top: 10px">
    <div class="container" style="">
      <div class="row">
        <div class="col-md-12">
          <div class="checkout">                                            
            <div class="checkout-row row">
              <div class="log-in col-md-4">
                <div style="border-top: solid 4px rgb(144, 178, 159)" class="title meu"> 
                 <p style="padding: 5px;">
                 <input type="radio" id="end2" name="tipo_endereco" class="tipo_endereco" value="1" checked>
                  <label for="end2" style="">Meu Endereço</label>
                </p>      
              </div>
              <div class="box" id="meu_endereco">
                <p>
                  Você pode editar seu endereço clicando <a href="<?php echo base_url() ?>/editar-perfil">aqui.</a>
                </p>
                <div class="row">
                  <div class="col-md-12">
                    <h5>Dados:</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Nome:</label>
                    <p><?php echo isset($usuario->nome)? $usuario->nome : '' ?></p>
                  </div>
                  <div class="col-md-6">
                    <label for="">Email:</label>
                    <p><?php echo isset($usuario->email)? $usuario->email : '' ?></p>
                  </div>
                  <div class="col-md-6">
                    <label for="">CPF:</label>
                    <p><?php echo isset($usuario->cpf)? $usuario->cpf : '' ?></p>
                  </div>
                  <div class="col-md-6">
                    <label for="">Telefone:</label>
                    <p><?php echo isset($usuario->telefone)? $usuario->telefone : '' ?></p>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <h5>Endereço:</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">CEP:</label>
                    <p><?php echo isset($usuario->cep)? $usuario->cep : '' ?></p>
                  </div>
                  <div class="col-md-6">
                    <label for="">Bairro:</label>
                    <p><?php echo isset($usuario->bairro)? $usuario->bairro : '' ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <label for="">Rua:</label>
                    <p><?php echo isset($usuario->rua)? $usuario->rua : '' ?></p>
                  </div>
                  <div class="col-md-4">
                    <label for="">Número:</label>
                    <p><?php echo isset($usuario->numero)? $usuario->numero : '' ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <label for="">Complemento:</label>
                    <p><?php echo isset($usuario->complemento)? $usuario->complemento : '' ?></p>
                  </div>
                </div>

                <br>
                <div class="row">
                  <label for="">Frete único:  R$ <?php echo number_format($frete, 2, ',', ' '); ?></label>
                     
                  
                </div>
              </div>
            </div>




            
            <div class="col-md-4">
              <div class="title novo" style="">

                <p style="padding: 5px;">
                  <input type="radio" id="end1" name="tipo_endereco" class="tipo_endereco" value="2">
                  <label for="end1" style="">Novo Endereço</label>
                </p>   

              </div>
              <div class="box" style="height: 100%;" id="novo_endereco">


               <div class="row">
                <div class="col-md-12">

                  <div class="form-group ">
                    <input name="nome" required placeholder="Nome Completo" class="form-control" disabled type="text">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">

                  <div class="form-group ">
                    <input name="cpf" required class="form-control" placeholder="CPF" disabled type="text">
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="form-group ">
                    <input name="telefone" required class="form-control" placeholder="Telefone" disabled type="text">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">

                  <div class="form-group ">
                    <input name="cep" id="cep" required class="form-control" placeholder="CEP" disabled type="text">
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="form-group ">
                    <input id="bairro" name="bairro" required class="form-control" placeholder="Bairro" disabled type="text">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-6">

                  <div class="form-group ">
                    <input id="rua" name="rua" required class="form-control" placeholder="Rua" disabled type="text">
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="form-group ">
                    <input id="numero" name="numero" required class="form-control" placeholder="Número" disabled type="text">
                  </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-9">

                  <div class="form-group ">
                    <input id="cidade" name="cidade" required class="form-control" placeholder="Cidade" disabled type="text">
                  </div>
                </div>
                <div class="col-md-3">

                  <div class="form-group ">
                    <input id="uf" name="estado" required class="form-control" placeholder="UF" disabled type="text">
                  </div>
                </div>
              </div>

                   <div class="row">
                <div style="display:none" id="fretes_input" class="row">
                  <div class="col-md-12">
                    <label>Frete<span>: </span></label>
                    <div class="form-group ">
                      <input type="radio" name="frete_tipo" value="pac"> R$ <span id="pac_valor"></span> PAC - <span id="pac_prazo"></span> <br>
                      <input type="radio" name="frete_tipo" value="sedex"> R$ <span id="sedex_valor"></span> SEDEX - <span id="sedex_prazo"></span>
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>


          <div class="col-md-4">

            <div class="product-popular" style="margin-top: 0px; margin-bottom: 20px">
              <h3 class="title">Seus Produtos</h3>
              <div class="table_prod" style="overflow-y: scroll;height: 150px;">
                <table class="table ps-checkout__products">
                  <thead>
                    <tr>

                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($produtos as $key => $produto): ?>

                      <tr>
                        <td style="text-align: start;"><?php echo $produto->quantidade ?> <?php echo $produto->titulo ?><?php echo (isset($produto->tamanho))?  ', '.$produto->tamanho->nome_tamanho : '' ?> - Valor: <?php echo number_format($produto->valor, 2, ',', '') ?></td>


                      </tr>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>

            <div class="product-filter" style="    padding: 15px 10px 10px 10px;">

        
            


              <div style="margin-bottom: 10px;margin-top: 30px" class="widget widget-price-filter">

                <a style="width: 100%;margin-top: 50px;text-align: center; background: green;color:white" class="btn" href="javascript:void(0)" class="" id="finalizar_compra">Finalizar Compra</a>
              </div>

            </div>
          </div>








        </div>


      </div>

    </div>
  </div>


</div>
</div>

</div>
</div>
</div>
</div>
</div>
</section >



<style type="text/css">
#meu_endereco p{

  margin-bottom: 0px !important;

}
</style>





<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
</script> 

<!-- 
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
</script>  -->

  <script type="text/javascript">
          $('#finalizar_compra').click(function(e){
            e.preventDefault();

            var dados = {
              nome_completo: ((($("input[name='nome']").val()).length>0) ? $("input[name='nome']").val() : 'error') ,
              telefone: ((($("input[name='telefone']").val()).length>0) ? $("input[name='telefone']").val() : 'error') ,
              cep: ((($("input[name='cep']").val()).length>0) ? $("input[name='cep']").val() : 'error') ,
              bairro: ((($("input[name='bairro']").val()).length>0) ? $("input[name='bairro']").val() : 'error') ,
              rua: ((($("input[name='rua']").val()).length>0) ? $("input[name='rua']").val() : 'error') ,
              numero: ((($("input[name='numero']").val()).length>0) ? $("input[name='numero']").val() : 'error') ,
              cidade: ((($("input[name='cidade']").val()).length>0) ? $("input[name='cidade']").val() : 'error') ,
              estado: ((($("input[name='estado']").val()).length>0) ? $("input[name='estado']").val() : 'error') ,
              // frete_tipo: $("input:radio[name='frete_tipo']:checked").val()
              }

            if($("input[name='tipo_endereco']:checked").val()=='2'){
                for(var index in dados) {
                  if(dados[index]=='error'){
                    swal('Verifique os campos Obrigatórios');
                    return;
                  }
                }
                var endereco = 0;
            }else{

              var endereco = 1;
            }



                // if(!dados.frete_tipo){
                //   swal('Escolha o tipo de frete');
                //   return;
                // }


            $.ajax({
                url:  '<?php echo base_url('loja/finalizar') ?>',
                type: 'POST',
                data: {
                    //desconto:$('#cupom_valido').val(),
                    nome_completo: dados.nome_completo,
                    telefone: dados.telefone,
                    cep: dados.cep,
                    bairro: dados.bairro,
                    rua: dados.rua,
                    numero: dados.numero,
                    cidade: dados.cidade,
                    estado: dados.estado,
                    tipo_endereco: endereco,
                    complemento: $("input[name='complemento']").val(),
                    // frete_tipo: dados.frete_tipo,
                    tamanhos: $('#form-tamanhos').serialize()

                },
                beforeSend: function(){
                    $('#loading').removeClass('loading-off');
                },
                success: function(result) {

                  result = JSON.parse(result);
                  console.log(result);
                  window.location = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code='+result;

                    // if(result){

                    //     PagSeguroLightbox({
                    //       code: result
                    //       }, {
                    //       success : function(transactionCode) {
                    //         swal({
                    //           icon: "success",
                    //         title: "Obrigado pela compra!",
                    //       });
                    //       },
                    //       abort : function() {

                    //       }
                    //     });
                    // }
                },
                complete: function(){
                    $('#loading').addClass('loading-off');
                }
            });
          });

      </script>







<script type="text/javascript">
  $(document).ready(function(){
   $('[name=telefone]').mask('(00) 0 0000-0000');
   $('[name=cpf]').mask('000.000.000-00', {reverse: true});
   $('[name=cep]').mask('00000-000');
   $('[name=estado]').mask('AA');
 });
</script>

<script type="text/javascript">

  $(document).ready(function() {

    function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
                $("#cep").val("");
              }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("");
                        $("#bairro").val("");
                        $("#cidade").val("");
                        $("#uf").val("");
                        $("#ibge").val("");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                          if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);

                               //  $.ajax({
                               //   url:  '<?php echo base_url('loja/calcular-frete') ?>',
                               //   type: 'POST',
                               //   data: {
                               //     cep: cep
                               //   },
                               //   beforeSend: function(){
                               //     $('#loading').removeClass('loading-off');
                               //   },
                               //   success: function(result) {
                               //     result = JSON.parse(result);

                               //     $('#fretes_input').css('display', 'block');
                               //     $('#pac_valor').html(result.pac);
                               //     $('#sedex_valor').html(result.sedex);
                               //     $('#pac_prazo').html("Prazo: "+result.pac_prazo+" dias");
                               //     $('#sedex_prazo').html("Prazo: "+result.sedex_prazo+" dias");

                               //   },
                               //   complete: function(){
                               //     $('#loading').addClass('loading-off');
                               //   }
                               // });

                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                $('#fretes_input').css('display', 'none');
                                swal("CEP não encontrado.");

                              }
                            });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        swal("Formato de CEP inválido.");
                      }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                  }
                });
          });

        </script>



        <script type="text/javascript">
          $('input[name=tipo_endereco]').change(function(){
            if($(this).val()=='2'){

              $('#novo_endereco input').prop('disabled', false);
              $('#meu_endereco input').prop('disabled', true);
              $('#meu_endereco input:radio').prop('checked', false);
              $('#end2').css('border-bottom', 'solid');
              $('#end1').css('border-bottom', 'none');
              $('.meu').css('border-top', 'solid 4px white');
              $('.novo').css('border-top', 'solid 4px #90b29f');
            }else{

              $('#end2').css('border-bottom', 'none');
              $('#end1').css('border-bottom', 'solid');
              $('#novo_endereco input:radio').prop('checked', false);
              $('#novo_endereco input').prop('disabled', true);
              $('#meu_endereco input').prop('disabled', false);
              $('.meu').css('border-top', 'solid 4px #90b29f');
              $('.novo').css('border-top', 'solid 4px white');

            }
          });
        </script>


        <style type="text/css">


        .tipo_endereco[type="radio"]:checked,
        .tipo_endereco[type="radio"]:not(:checked) {
          position: absolute;
          left: -9999px;
        }
        .tipo_endereco[type="radio"]:checked + label,
        .tipo_endereco[type="radio"]:not(:checked) + label
        {
          position: relative;
          padding-left: 28px;
          cursor: pointer;
          line-height: 20px;
          display: inline-block;
          color: #666;
        }
        .tipo_endereco[type="radio"]:checked + label:before,
        .tipo_endereco[type="radio"]:not(:checked) + label:before {
          content: '';
          position: absolute;
          left: 0;
          top: 0;
          width: 20px;
          height: 20px;
          border: 1px solid #ddd;
          border-radius: 100%;
          background: #fff;
        }
        .tipo_endereco[type="radio"]:checked + label:after,
        .tipo_endereco[type="radio"]:not(:checked) + label:after {
          content: '';
          width: 14px;
          height: 14px;
          background: #5a5758;
          position: absolute;
          top: 3px;
          left: 3px;
          border-radius: 100%;
          -webkit-transition: all 0.2s ease;
          transition: all 0.2s ease;
        }
        .tipo_endereco[type="radio"]:not(:checked) + label:after {
          opacity: 0;
          -webkit-transform: scale(0);
          transform: scale(0);
        }
        .tipo_endereco[type="radio"]:checked + label:after {
          opacity: 1;
          -webkit-transform: scale(1);
          transform: scale(1);
        }


      </style>

      <div style="padding: 20px"></div>