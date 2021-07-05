  <section id="page-title" class="page-title-mini">
      <div class="container clearfix">
        <h1>Carrinho</h1>
       
      </div>
    </section>

    <section id="content">
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="table-responsive">
            <table class="table cart">
              <thead>
                <?php if (isset($carrinho)){ ?>
                <tr>
                  <th class="cart-product-remove">Remover</th>
                  <th class="cart-product-thumbnail">Imagem</th>
                  <th class="cart-product-name">Produto</th>
                  <th class="cart-product-price">Preço</th>
                  <th class="cart-product-quantity">Quantidade</th>
                  <th class="cart-product-subtotal">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $total=0 ?>
                
                  
               
             <?php foreach ($carrinho as $key => $produto): ?>
               
                <tr class="cart_item">
                  <td class="cart-product-remove">
                    <a style="cursor: pointer;color:red; font-size: 17px" data-id="<?php echo $produto->id ?>" data-tamanho="<?php 

                   if(isset($produto->tamanho)) {
                    echo $produto->tamanho->id;
                   }
                    ?>" class="remove remove-produtos" title="Remover este item"><i class="icon-trash2"></i></a>
                  </td>
                  <td class="cart-product-thumbnail">
                    <a href="<?php echo base_url('detalhes-produto') ?>?produto=<?php echo $produto->id ?>"><img width="64" height="64" src="<?php echo base_url() ?>assets/images/product/<?php echo $produto->imagem ?>"></a>
                  </td>
                  <td class="cart-product-name">
                   <a href="<?php echo base_url('detalhes-produto') ?>?produto=<?php echo $produto->id ?>"><?php echo $produto->titulo ?>  <?php 

                   if (isset($produto->tamanho)) {
                    echo ' - '.$produto->tamanho->nome_tamanho;
                   }
                    ?></a>
                  </td>
                  <td class="cart-product-price">
                    <span class="amount">R$<?php echo $produto->valor ?></span>
                  </td>
                  <td class="cart-product-quantity">
                    <div class="quantity clearfix">
                      <input type="button" value="-"  data-tamanho="<?php 

                   if(isset($produto->tamanho)) {
                    echo $produto->tamanho->id;
                   }
                    ?>" data-id="<?php echo $produto->id ?>" class="minus remove_cart">
                      <input type="text" name="quantity" value="<?php echo $produto->quantidade ?>" id="qtd_cart-<?php echo $produto->id ?>" class="qty" />
                      <input type="button" <?php if ($produto->estoque <= $produto->quantidade ) {
                        echo  'style="background-color:gray"';
                      } ?> value="+"  data-tamanho="<?php 

                   if(isset($produto->tamanho)) {
                    echo $produto->tamanho->id;
                   }
                    ?>" data-id="<?php echo $produto->id ?>" class="plus <?php echo ($produto->estoque <= $produto->quantidade)? '' : 'add_cart' ?>">
                    </div>
                  </td>
                  <td class="cart-product-subtotal">
                    <span class="amount">R$<?php $total+=$produto->quantidade*$produto->valor;  echo $produto->quantidade*$produto->valor ?></span>
                  </td>
                </tr>
             <?php endforeach ?>
                <tr class="cart_item">
                  <td colspan="6">
                    <div class="row clearfix">
                      <div class="col-lg-4 col-4 nopadding">
                        <!-- <div class="row">
                          <div class="col-lg-8 col-7">
                            <input type="text" value="" class="sm-form-control" placeholder="Enter Coupon Code.." />
                          </div>
                          <div class="col-lg-4 col-5">
                            <a href="#" class="button button-3d button-black nomargin">Apply Coupon</a>
                          </div>
                        </div> -->
                      </div>
                      <div class="col-lg-8 col-8 nopadding">
                  
                        <a href="<?php echo base_url('finalizar') ?>" class="button button-3d notopmargin fright">Finalizar Compra</a>
                      </div>
                    </div>
                  </td>
                </tr>

                 <?php }else{ ?>

                 
                  <div align="center" class="col-md-12">
                    
                   <i style="font-size: 90px" class="fa fa-frown-o" aria-hidden="true"></i>
                    
                   <div><h3>Seu carrinho está vazio!</h3></div>
                  

                   <div> <a href="<?php echo base_url('produtos') ?>"> <button class="btn" style="background-color: green;color: white">Escolher Produtos</button></a></div>


                  </div>

                 <?php } ?>
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </section>




<script type="text/javascript">
  $('#alerta_login').click(function(){
    let dados = {id: 0 }
    loadModal('loadModal', '<?php echo base_url('modal-login') ?>', dados, 'login_modal');
  });
</script>


<script type="text/javascript">

  $(document).ready(function(){
   $('#input_frete').mask('00000-000');
 });

  $('.result-frete').hide(1000);

  $('#calcular_frete').click(function(e){
    e.preventDefault();
    var cep = $('#input_frete').val();
    $.ajax({
      url:  '<?php echo base_url('loja/calcular-frete') ?>',
      type: 'POST',
      data: {
        cep: cep
      },
      beforeSend: function(){
        $('#loading').removeClass('loading-off');
      },
      success: function(result) {
        result = JSON.parse(result);
        console.log(result);
        if(result == 'error'){
          $('#alerta_cep').css('display', 'block');
          $('.result-frete').css('display', 'none');
        }else if(result == 'vazio'){

          swal('Carrinho vazio', '');
        }else{
          $('.result-frete').show(500);
         $('#alerta_cep').css('display', 'none');
         $('#pac_valor').html(result.pac);
         $('#sedex_valor').html(result.sedex);
         $('#pac_prazo').html("Prazo: "+result.pac_prazo+" dias");
         $('#sedex_prazo').html("Prazo: "+result.sedex_prazo+" dias");
       }
     },
     complete: function(){
      $('#loading').addClass('loading-off');
    }
  });

  });
</script>

<!--          ADD NO CARRINHO               -->
<script type="text/javascript">
  $('.add_cart').click(function(e){

    e.preventDefault();
    var $this = $(this);
    console.log($this.data('id'));

    $.ajax({
      url:  '<?php echo base_url('add-carrinho') ?>',
      type: 'POST',
      data: {
        id: $this.data('id'),
        quantidade: 1,
        tamanho: $this.data('tamanho')
      },
      beforeSend: function(){
      },
      success: function(result) {
        result = JSON.parse(result);
        var qtd = $('#qtd_cart-'+$this.data('id')).val();
        $('#qtd_cart-'+$this.data('id')).val(parseInt(qtd)+1);
        location.reload();
      },
      complete: function(){
      }
    });
  });
</script>

<!--          REMOVE NO CARRINHO               -->
<script type="text/javascript">
  $('.remove_cart').click(function(e){
    e.preventDefault();
    var $this = $(this);
    if ($('#qtd_cart-'+$this.data('id')).val() == '1') {
    }else{

      console.log($this.data('id'));
      $.ajax({
        url:  '<?php echo base_url('remove-carrinho') ?>',
        type: 'POST',
        data: {
          id: $this.data('id'),
          tamanho: $this.data('tamanho'),
        },
        beforeSend: function(){
        },
        success: function(result) {
          result = JSON.parse(result);
          var qtd = $('#qtd_cart-'+$this.data('id')).val();
          $('#qtd_cart-'+$this.data('id')).val(parseInt(qtd)-1);
          location.reload();
        },
        complete: function(){
        }
      });
    }

  });
</script>

<!--          REMOVE TODOS DO CARRINHO               -->
<script type="text/javascript">
  $('.remove-produtos').click(function(){
    var $this = $(this);
    var tamanho = null;
    if ($this.data('tamanho')) {
      tamanho = $this.data('tamanho'); 
    }
    console.log($this.data('id'));
    $.ajax({
      url:  '<?php echo base_url('remove-todos-carrinho') ?>',
      type: 'POST',
      data: {
        id: $this.data('id'),
        tamanho: tamanho,
      },
      beforeSend: function(){
      },
      success: function(result) {
        result = JSON.parse(result);
        window.location.href = '<?php echo base_url('carrinho') ?>';
        location.reload();
      },
      complete: function(){
      }
    });


  });
</script>
