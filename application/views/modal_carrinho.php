
  <!-- Modal -->
  <div class="modal fade" id="carrinho_modal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background: #1B1B1B">
        <div class="modal-header" style="    border-bottom: 1px solid #FF4000">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
              <div class="row">
                <div class="row">
          <div class="row">
              <div class="col-md-9">

              </div>
              
          <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                  <div class="item active">
                      <div class="row">
                        <?php foreach ($novo as $key => $produto): ?>

                          <div class="col-sm-5">
                              <div class="col-item">
                                  <div class="photo">
                                      <img src="<?php echo base_url() ?>assets/images/product/<?php echo $produto->imagem ?>" class="imgs-home img-responsive" alt="a" />
                                  </div>
                                
                              </div>
                          </div>
                          <div class="col-md-7">
                            <div  class="col-md-12">
                              <h4 style="border-bottom: solid 1px #FF4000;"><?php echo $produto->titulo; ?></h4>
                            </div>
                            <div class="col-md-12">
                              <p><?php echo $produto->descricao ?></p>
                            </div>
                              <div  class="col-md-12">
                                  <h3 style="font-size: 36px;">R$ <?php echo number_format($produto->valor, 2, ',', '') ?>  <strike style="font-size: 20px;font-weight: 200;color: grey;">R$ <?php echo number_format($produto->valor_antigo, 2, ',', '') ?></strike> </h3>
                            </div>
                          <!--   <div  class="col-md-12">
                                  <p>Tamanho: <?php echo $produto->tamanho ?></p>
                            </div> -->
                            <div class="col-md-12">
                                <?php if ($carrinho): ?>
                                <h4 style="border-bottom: solid 1px #FF4000; margin-bottom: 10px;">Seu carrinho:</h4>
                                  
                                <?php for ($i=0; $i < count($carrinho); $i++) :?>
                                      <div style="padding-left: 0px;    padding-bottom: 5px;" class="photo col-md-6">
                                        <div style="padding-left: 0px;" class="col-md-6">
                                      <img src="<?php echo base_url() ?>assets/images/product/<?php echo $carrinho[$i]->imagem ?>" class="mini-img img-responsive" alt="a" />
                                        </div>
                                        <a href="<?php echo base_url('detalhes-produto') ?>?produto=<?php echo $carrinho[$i]->id ?>"><div style="padding-left: 0px;" class="col-md-6">
                                         <p><?php echo $carrinho[$i]->titulo ?>  <?php if($carrinho[$i]->tamanho != ''){ echo '- '.$carrinho[$i]->tamanho; } ?></p>
                                        </div>
                                        </a>
                                  </div>
                                <?php endfor ?>

                            </div>
                                <?php endif ?>
                          </div>
                        <?php endforeach; ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
      </div>

              </div>
              <div style="padding-top:10px" class="row">

              </div>



              <div class="row" style="    border-top: solid 2px #FF4000;padding-top: 12px;">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                  <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                      <button type="button" style="background: #ffffff; color:black; border-radius: 4px " onclick="location.reload();" data-dismiss="modal" class="btn btn-default">Continuar Comprando</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                      <a href="<?php echo base_url('carrinho') ?>">
                        <button style="background: #FF4000; color:white" type="button" class="btn btn-default">Finalizar pedido</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div> -->
      </div>
    </div>




<style media="screen">
@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
.col-item
{
  border: 1px solid #E1E1E1;
  border-radius: 5px;
  background: #FFF;
}
.col-item .photo img
{
  margin: 0 auto;
  width: 100%;
}

.col-item .info
{
  padding: 10px;
  border-radius: 0 0 5px 5px;
  margin-top: 1px;
}

.col-item:hover .info {
  background-color: #F5F5DC;
}
.col-item .price
{
  /*width: 50%;*/
  float: left;
  margin-top: 5px;
}

.col-item .price h5
{
  line-height: 20px;
  margin: 0;
}

.price-text-color
{
  color: #219FD1;
}

.col-item .info .rating
{
  color: #777;
}

.col-item .rating
{
  /*width: 50%;*/
  float: left;
  font-size: 17px;
  text-align: right;
  line-height: 52px;
  margin-bottom: 10px;
  height: 52px;
}

.col-item .separator
{
  border-top: 1px solid #E1E1E1;
}

.clear-left
{
  clear: left;
}

.col-item .separator p
{
  line-height: 20px;
  margin-bottom: 0;
  margin-top: 10px;
  text-align: center;
}

.col-item .separator p i
{
  margin-right: 5px;
}
.col-item .btn-add
{
  width: 50%;
  float: left;
}

.col-item .btn-add
{
  border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
  width: 100%;
  float: left;
  padding-left: 10px;
}
.controls
{
  margin-top: 20px;
}
[data-slide="prev"]
{
  margin-right: 10px;
}

.mini-img{
  max-height: 78px !important;
    width: 100% !important;
    max-width: 78px !important;
    object-fit: cover !important;
    object-position: 50% 50% !important;
}
</style>
