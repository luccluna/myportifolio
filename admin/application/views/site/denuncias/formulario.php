<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro/Enquete</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li class="active">
                <strong>Cadastro Enquete</strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-novo-tipo')) ?>" method="post">
                        <?php if (isset($tipo->nome_tipo_denuncia)): ?>
                            <input type="hidden" name="id" value="<?php echo $tipo->id ?>">
                        <?php endif ?>
                        <div class="row">
                        <div class="col-sm-9 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Título: *</label>
                                <input name="titulo" class="form-control" required="" value="<?php echo isset($tipo->nome_tipo_denuncia) ? $tipo->nome_tipo_denuncia : "" ?>">
                        </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                       

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'denuncias')) ?>" class="btn btn-white">Cancelar</a>
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
            height: 100,
            width: 750  ,
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