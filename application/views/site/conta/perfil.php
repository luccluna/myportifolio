
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="row clearfix">
        <div class="col-md-9">

          <div class="heading-block noborder">
            <h3>Seu Perfil</h3>
            <span><?php echo $this->auth->get_nome_perfil() ?> </span>
            <div align="left" style="margin-top: 10px">

              <a href="<?php echo base_url() ?>"><button style="background: #078641c9; color:white" class="btn">Home</button></a>
              <a href="<?php echo base_url('carrinho') ?>"><button style="background: #3b9f69; color:white" class="btn">Loja</button></a>
              <a href="<?php echo base_url('carrinho') ?>"><button style="background: #3b9f69; color:white" class="btn">Carrinho</button></a>
            </div>
          </div>
          <div class="clear"></div>
          <div class="row clearfix">
            <div class="col-lg-12">
              <div class="tabs tabs-alt clearfix" id="tabs-profile">
                <ul class="tab-nav clearfix">
                  <li><a href="#tab-feeds"><i class="icon-user"></i> Meus Dados</a></li>
                  <li><a href="#tab-posts"><i class="icon-shopping-cart"></i> Meus Pedidos</a></li>
                  
                </ul>
                <div class="tab-container">
                  <div class="tab-content clearfix" id="tab-feeds">
                    <p class="">Confira e edite suas informações</p>    <div class="acc_content clearfix">

                      <div class="row">
                        <div class="col-md-12">
                          <label>Nome</label>
                          <input disabled type="text" placeholder="Nome" name="nome" class="form-control" value="<?php echo $perfil->nome ?>">
                        </div>
                        <div class="col-md-12">
                         <label>E-mail</label>
                         <input disabled type="text" placeholder="E-mail" name="email" class="form-control" value="<?php echo $perfil->email ?>">
                       </div>
                       <div class="col-md-6">
                         <label>CPF</label>
                         <input disabled type="text" placeholder="Seu CPF" name="cpf" class="form-control" value="<?php echo $perfil->cpf ?>">
                       </div>
                       <div class="col-md-6">
                        <label>Telefone</label>
                        <input disabled type="text" placeholder="Telefone" name="telefone" class="form-control" value="<?php echo $perfil->telefone ?>">
                      </div>
                    </div>

                    <div class="box">

                      <div class="row">
                        <div class="col-md-10">
                          <label>Rua</label>
                          <input disabled="" type="text" placeholder="Rua" name="rua" class="form-control" value="<?php echo $perfil->rua ?>">
                        </div>
                        <div class="col-md-2">
                          <label>Número</label>
                          <input disabled="" type="text" placeholder="Nº" name="numero" class="form-control" value="<?php echo $perfil->numero ?>">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label>CEP</label>
                          <input disabled="" type="text" placeholder="CEP" name="cep" id="cep1" class="form-control" value="<?php echo $perfil->cep ?>">
                        </div>
                        <div class="col-md-6">
                          <label>Bairro</label>
                          <input disabled="" type="text" placeholder="Bairro" name="bairro" id="bairro" class="form-control" value="<?php echo $perfil->bairro ?>">
                        </div>
                        <div class="col-md-6">
                          <label>Cidade</label>
                          <input disabled="" type="text" placeholder="Cidade" name="cidade" id="cidade" class="form-control" value="<?php echo $perfil->cidade ?>">
                        </div>
                        <div class="col-md-2">
                          <label>UF</label>
                          <input disabled="" type="text" placeholder="UF" name="estado" id="uf" class="form-control" value="<?php echo $perfil->estado ?>">
                        </div>
                        <div class="col-md-4">
                          <label>Complemento</label>
                          <input type="text" disabled="" placeholder="Complemento" name="complemento" class="form-control" value="<?php echo $perfil->complemento ?>">
                        </div>
                      </div>
                    </div>

                    <div align="" class="col-md-4 nobottommargin" >
                      <a href="<?php echo base_url('editar-perfil') ?>">
                        <button class="button button-3d button-black nomargin"  style="width: 100%" name="login-form-submit" value="login">Editar</button>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="tab-content clearfix" id="tab-posts">
                  <div class="row topmargin-sm clearfix">
                    <div class="col-12 bottommargin-sm" >
                    </div>
                    <?php foreach ($pedidos as $key => $pedido): ?>
                      <div class="col-md-12" style="border: solid 1px #9b8a8a;padding: 5px; margin-bottom: 20px">
                        <div class="row">

                         <div class="product-name col-md-3 col-xs-6" >
                          <a href="javascript:void(0)">Código</a><br>
                          <?php echo $pedido->codigo_pedido ?> 
                        </div>

                        <div class="product-name col-md-2 col-xs-6" >
                          <a href="javascript:void(0)">Data</a><br>
                          <?php echo date('d/m/Y', strtotime($pedido->data)) ?> 
                        </div>

                        <div class="product-name col-md-3 col-xs-6" >

                          <?php if ($pedido->status_pagseguro != 1 && $pedido->codigo_pag){ ?>
                             <a href="javascript:void(0)">Finalize seu pagamento</a><br>
                             

              
              <div align="center" class="col-md-12">
                <button style="background: green; color: white;    font-size: 12px;" class="btn finalizar_pagamento" data-id="<?php echo $pedido->id ?>" data-codigo="<?php echo  $pedido->codigo_pag ?>" class="btn">FINALIZAR PAGAMENTO</button>
              </div>


            <?php }else{ ?>

              <a href="javascript:void(0)">Status</a><br>
              <?php
              switch ($pedido->status_pedido) {
                case '0':
                $status = 'Aguardando confirmação';
                break; case '1':
                $status = 'Pagamento não inicializado';
                break;
                case '2':
                $status = 'Em análise';
                break;
                case '3':
                $status = 'Pagamento realizado';
                break;
                case '4':
                $status = 'Disponível';
                break;
                case '5':
                $status = 'Em disputa';
                break;
                case '6':
                $status = 'Devolução de valor';
                break;
                case '7':
                $status = 'Cancelada';
                break;
                case '8':
                $status = 'Valor devolvido(debitado)';
                break;
                case '9':
                $status = 'Retenção temporária';
                break;
              }
              echo $status;
              ?>
            <?php } ?>
          </div>

          <div class="product-name col-md-2 col-xs-6" >
            <a href="javascript:void(0)">Total</a><br>
            R$<?php echo $pedido->valor ?> 
          </div>

          <div class="product-name col-md-2 col-xs-6" >
            <a style="width: 100%; background: green;color:white" data-id_pedido="<?php echo $pedido->id ?>"  class="btn detalhes_pedido" href="javascript:void(0)">Detalhes </a>
          </div>



        </div>
      </div>
    <?php endforeach ?>

  </div>
</div>


</div>
</div>
</div>
</div>
</div>
<div class="w-100 line d-block d-md-none"></div>
<div class="col-md-3 clearfix">
  <div class="list-group">
    <a href="<?php echo base_url() ?>" class="list-group-item list-group-item-action clearfix">Home <i class="fa fa-home float-right"></i></a>

    <a href="<?php echo base_url('loja') ?>" class="list-group-item list-group-item-action clearfix">Loja <i class="fa fa-shopping-bag float-right"></i></a>

    <a href="<?php echo base_url('loja') ?>" class="list-group-item list-group-item-action clearfix">Carrinho <i class="fa fa-shopping-cart float-right"></i></a>

    <!-- <a href="<?php echo base_url('transparencia') ?>" class="list-group-item list-group-item-action clearfix">Portal da transparência <i class="icon-user float-right"></i></a> -->

  </div>



</div>
</div>
</div>
</div>
</section>



<style type="text/css">
.form-control{
  margin-bottom: 10px;
}
</style>

<script type="text/javascript">
  $('.detalhes_pedido').click(function(){
    let dados = {id: $(this).data('id_pedido') }
    loadModal('loadModal', '<?php echo base_url('modal-pedido') ?>', dados, 'pedido_modal');
  });
</script>

<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<!-- <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>   -->
<script type="text/javascript">

  $('.finalizar_pagamento').click(function(){

  
    var id_pedido = $(this).data('id');

   PagSeguroLightbox({
    code: $(this).data('codigo')
  }, {
    success : function(transactionCode) {

      $.ajax({
        url:  '<?php echo base_url('loja/atualiza-pagseguro') ?>',
        type: 'POST',
        data: {
          id_pedido: id_pedido,
        },
        beforeSend: function(){
        },
        success: function(result) {
        },
        complete: function(){
        //  swal({
        //   icon: "success",
        //   title: "Obrigado pela compra!",
        // });
        location.reload();
       }
     });
    },
    abort : function() {

    }
  });
 });

</script>