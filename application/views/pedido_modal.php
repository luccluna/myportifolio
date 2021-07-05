  <!-- Modal -->
  <div class="modal fade" id="pedido_modal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="container">
           <div class="row">
             <div class="col-md-5">

<?php foreach ($produtos as $key => $produto): ?>

  <div class="row" style="margin-bottom: 20px; border-top: solid 2px #FF4000;"    >

    <div style="padding: 0px" class="col-md-2 col-xs-2">
      <img class="img-responsive" src="<?php echo base_url() ?>assets/images/product/<?php echo $produto->imagem ?>">
    </div>
    <div class="col-md-10  col-xs-10" style="">
      <div class="col-md-10 "><h5><?php echo $produto->titulo ?></h5></div>
      <!--                   <div class="col-md-4"><p>Tamanho: <?php echo $produto->tamanho ?></p></div> -->
      <div class="col-md-6"><p>Preço: <?php echo $produto->valor ?></p></div>
    </div>

  </div>

<?php endforeach ?>

</div>
<style type="text/css">
p{
  margin: 0px ;  
}
.text-ped{
  font-weight: 800
}
</style>
<div class="col-md-7">
  <div class="row">

    <div class="col-md-12 col-xs-6">
      <h4>Endereço de envio:</h4>
      <div class="row">


        <div class="col-md-6">
          <p><span class="text-ped">Nome:</span><br> <?php echo $pedido->nome_cliente ?> </p>
          <p><span class="text-ped">Email:</span><br> <?php echo $pedido->email_cliente ?> </p>
          <p><span class="text-ped">Telefone:</span><br> <?php echo $pedido->telefone_cliente ?> </p>
        </div>

        <div class="col-md-6">
          <p><span class="text-ped">Cidade:</span><br> <?php echo $pedido->cidade_entrega ?> - <?php echo $pedido->estado_entrega ?> </p>
          <p><span class="text-ped">Rua:</span><br> <?php echo $pedido->rua_entrega ?> </p>
          <p><span class="text-ped">Bairro:</span><br> <?php echo $pedido->bairro_entrega ?> </p>
          <p><span class="text-ped">CEP:</span><br> <?php echo $pedido->cep_entrega ?> </p>
          <p><span class="text-ped">Complemento:</span><br> <?php echo $pedido->complemento_entrega ?> </p>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
  <div class="col-md-12  col-xs-6">
    <h4>Detalhes do envio:</h4>
    <br>
    <p><span class="text-ped">Código de rastreio:</span><br> <?php echo $pedido->codigo_rastreio ?></p>
    <p><span class="text-ped">Data do envio:</span><br><?php echo isset($pedido->data_envio)? date('d/m/Y', $pedido->data_envio) : ''; ?></p>
  </div>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">FECHAR</button>
</div>
</div>
</div>
</div>
