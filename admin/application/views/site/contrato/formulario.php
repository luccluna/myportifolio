<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro/editar contrato</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li class="active">
                <strong>Cadastro/editar contrato</strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-contrato')) ?>" method="post" id="form-cadastro-contrato" enctype="multipart/form-data">
                        <?php if ($contrato): ?>
                            <input type="hidden" name="id" value="<?php echo $contrato->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 error-file">
                                <label class="control-label">Contrato (PDF): * </label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione o PDF</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="contrato" name="contrato" class="file" accept="application/pdf" />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 preview-image">
                                <div class="lightBoxGallery">
                                    <?php if ($contrato): ?>
                                        <a href="<?php echo base_url(array('../', 'assets', 'contratos', $contrato->pdf)) ?>" target="_blank" title="<?php echo $contrato->pdf ?>">
                                            <img id="img-show" src="<?php echo base_url(array('../', 'assets', 'contratos', 'pdf-icon.png')) ?>">
                                        </a>
                                    <?php endif ?>

                                    <!-- <div id="blueimp-gallery" class="blueimp-gallery">
                                        <div class="slides"></div>
                                        <h3 class="title">imagem</h3>
                                        <a class="prev">‹</a>
                                        <a class="next">›</a>
                                        <a class="close">×</a>
                                        <a class="play-pause"></a>
                                        <ol class="indicator"></ol>
                                    </div> -->

                                </div>
                            </div>
                        </div>

                        <?php if ($contrato): ?>
                            <input type="hidden" name="pdf_contrato" value="<?php echo $contrato->pdf ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'contrato')) ?>" class="btn btn-white">Cancelar</a>
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
        $("#form-cadastro-institucional").validate({});

        <?php if (!isset($contrato)): ?>
            $.validator.addClassRules("file", {
                validate_file: true
            });
        <?php endif ?>

        //metodo para validar o valor
        $.validator.addMethod("validate_file", function(value, element){
            if(value.length > 0){
                return true;
            }
            if($(".error-file").find('label.error').length){
                $(".error-file").find('label.error').remove();
            }
            $(".error-file").append('<label id="banner-error" class="error" for="banner"></label>');
            return false;
        }, "Este campo é obrigatório.");

            //showNotification
            <?php if (isset($notification)): ?>
                showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
            <?php endif ?>
        })

    // $('#imagem').on('change', function(){
    //     input = $(this);
    //     if (input[0].files && input[0].files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('.lightBoxGallery').find('img').remove();
    //             $('.lightBoxGallery').append('<img id="img-show" src="'+e.target.result+'">');
    //         }

    //         reader.readAsDataURL(input[0].files[0]);
    //     }else{
    //         $('.lightBoxGallery').find('img').remove();
    //     }
    // });
</script>