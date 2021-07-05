<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro/editar sólido centro</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li class="active">
                <strong>Cadastro/editar sólido centro</strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-solido-centro')) ?>" method="post" id="form-cadastro-solido-centro" enctype="multipart/form-data">
                        <?php if ($sk_centro): ?>
                            <input type="hidden" name="id" value="<?php echo $sk_centro->id ?>">
                        <?php endif ?>
                        <!-- <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Titulo *:</label>
                                    <input type="text" name="titulo" class="form-control" value="<?php echo (isset($sk_centro)) ? $sk_centro->titulo : '' ?>" requerid>
                                </div>
                            </div>
                        </div> -->
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Texto: *</label>
                                    <textarea name="texto" class="summernote"><?php echo ($sk_centro) ? $sk_centro->texto : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 error-file">
                                <label class="control-label">Imagem: 1200px X 350px * </label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione o imagem</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="imagem" name="imagem" class="file" />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 preview-image">
                                <div class="lightBoxGallery">
                                    <?php if ($sk_centro): ?>
                                        <img id="img-show" src="<?php echo base_url(array('../', 'assets', 'images', 'sk-centro', $sk_centro->imagem)) ?>">
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

                        <?php if ($sk_centro): ?>
                            <input type="hidden" name="imagem_sk_centro" value="<?php echo $sk_centro->imagem ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'solido-centro')) ?>" class="btn btn-white">Cancelar</a>
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
        $("#form-cadastro-solido-centro").validate({});

        //showNotification
        <?php if (isset($notification)): ?>
            showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>
    })

    $('#imagem').on('change', function(){
        var input = $(this);
        if (input[0].files && input[0].files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.lightBoxGallery').find('img').remove();
                $('.lightBoxGallery').append('<img id="img-show" src="'+e.target.result+'">');
            }

            reader.readAsDataURL(input[0].files[0]);
        }else{
            $('.lightBoxGallery').find('img').remove();
        }
    });
</script>