<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2>Contato</h2>
    <ol class="breadcrumb">
      <li>
        <a>Site</a>
      </li>
      <li class="active">
        <strong>Editar Contato</strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-2">
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-content">
          <form action="<?php echo base_url(array('site', 'salvar-contato')) ?>" method="post" id="form-cadastro-contato" enctype="multipart/form-data">
            <?php if (isset($contato)): ?>
              <input type="hidden" name="id" value="<?php echo $contato->id ?>">
            <?php endif ?>
            <div class="hr-line-dashed"></div>
            <div class="row">
              <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Cidade: *</label>
                  <input type="text" name="cidade" class="form-control" required value="<?php echo $contato->cidade ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">CEP: *</label>
                  <input type="text" name="cep" class="form-control" required value="<?php echo $contato->CEP ?>">
                </div>
              </div>
              <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Endereço: *</label>
                  <input type="text" name="endereco" class="form-control" required value="<?php echo $contato->endereco ?>">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Telefone 1: *</label>
                  <input type="text" name="telefone1" class="form-control" required value="<?php echo $contato->telefone1 ?>">

                </div>
              </div>
              <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Telefone 2: *</label>
                  <input type="text" name="telefone2" class="form-control" required value="<?php echo $contato->telefone2 ?>">

                </div>
              </div>
              <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Email: *</label>
                  <input type="email" name="email" class="form-control" required value="<?php echo $contato->email ?>">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Facebook: *</label>
                  <input type="text" name="facebook" class="form-control" required value="<?php echo $contato->facebook ?>">

                </div>
              </div>
              <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                  <label class="control-label">Instagram: *</label>
                  <input type="text" name="instagram" class="form-control" required value="<?php echo $contato->instagram ?>">

                </div>
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                  <div class="text-right">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.summernote').summernote({
      height: 300,
    });
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip();

        //showNotification
        <?php if (isset($notification)): ?>
          showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>
      })
    </script>
