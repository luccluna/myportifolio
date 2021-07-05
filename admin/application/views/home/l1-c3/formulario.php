
<style type="text/css">
    .page-hidden{
        display: none
    }
</style>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro ou editar coluna L1-C3</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong>Cadastro ou editar coluna L1-C3</strong>
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
                    <form action="<?php echo base_url(array('home', 'salvar-l1-c3')) ?>" method="post" id="form-cadastro-l1-c3" enctype="multipart/form-data">
                        <?php if ($l1_c3): ?>
                            <input type="hidden" name="id" value="<?php echo $l1_c3->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Titulo *:</label>
                                    <input type="text" name="titulo" class="form-control" value="<?php echo ($l1_c3) ? $l1_c3->titulo : '' ?>" requerid>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="i-checks">
                                    <label>
                                        <input type="checkbox" id="ck_link" name="ck_link" <?php  echo (!$l1_c3 || (isset($l1_c3->link_pagina) && $l1_c3->link_pagina != '')) ? 'checked' : '' ?>>
                                        <i></i> Abrir um página já existente
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed page-link <?php echo (!$l1_c3 || (isset($l1_c3->link_pagina) && $l1_c3->link_pagina == '')) ? 'page-hidden' : '' ?>"></div>
                        <div class="row page-link <?php echo (!$l1_c3 || (isset($l1_c3->link_pagina) && $l1_c3->link_pagina == '')) ? 'page-hidden' : '' ?>">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Link *:</label>
                                    <input type="text" id="link_pagina" name="link_pagina" class="form-control" value="<?php echo ($l1_c3) ? $l1_c3->link_pagina : '' ?>" requerid>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed page-text <?php echo ($l1_c3 && (isset($l1_c3->link_pagina) && $l1_c3->link_pagina != '')) ? 'page-hidden' : '' ?>"></div>
                        <div class="row page-text <?php echo ($l1_c3 && (isset($l1_c3->link_pagina) && $l1_c3->link_pagina != '')) ? 'page-hidden' : '' ?>">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Texto: *</label>
                                    <textarea name="texto" class="summernote"><?php echo ($l1_c3) ? $l1_c3->texto : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 error-file">
                                <label class="control-label">Imagem capa: 600px X 600px * </label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione a imagem</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="imagem-capa" name="imagem_capa" class="file" />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-sm-12 preview-image">
                                <div class="lightBoxGallery lightBoxGallery-capa">
                                    <?php if ($l1_c3): ?>
                                        <img id="img-show-capa" src="<?php echo base_url(array('../', 'files', 'uploads', 'l1-c3', $l1_c3->imagem)) ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <?php if ($l1_c3): ?>
                            <input type="hidden" name="imagem_l1_c3_capa" value="<?php echo $l1_c3->imagem ?>">
                        <?php endif ?>

                        <div class="hr-line-dashed page-text <?php echo ($l1_c3 && (isset($l1_c3->link_pagina) && $l1_c3->link_pagina != '')) ? 'page-hidden' : '' ?>"></div>
                        <div class="row page-text <?php echo ($l1_c3 && (isset($l1_c3->link_pagina) && $l1_c3->link_pagina != '')) ? 'page-hidden' : '' ?>">
                            <div class="col-sm-12 error-file">
                                <label class="control-label">Imagem interna: 1680px X 1100px * </label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione a imagem</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="imagem-interna" name="imagem_interna" class="file" />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>

                        <div class="row page-text <?php echo ($l1_c3 && (isset($l1_c3->link_pagina) && $l1_c3->link_pagina != '')) ? 'page-hidden' : '' ?>">
                            <div class="col-sm-12 preview-image">
                                <div class="lightBoxGallery lightBoxGallery-interna">
                                    <?php if ($l1_c3 && isset($l1_c3->imagem_interna)): ?>
                                        <img id="img-show-interna" src="<?php echo base_url(array('../', 'files', 'uploads', 'l1-c3', $l1_c3->imagem_interna)) ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <?php if ($l1_c3 && isset($l1_c3->imagem_interna)): ?>
                            <input type="hidden" name="imagem_l1_c3_interna" value="<?php echo $l1_c3->imagem_interna ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('home', 'l1-c3')) ?>" class="btn btn-white">Cancelar</a>
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
        $("#form-cadastro-l1-c3").validate();

        //showNotification
        <?php if (isset($notification)): ?>
            showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>

        $('#ck_link').on('ifChanged', function(event){
            if($(this).prop('checked')){
                $(".page-text").addClass('page-hidden');
                $(".page-link").removeClass('page-hidden');
                $("#link_pagina").prop('required',true);
            }else{
                $(".page-link").addClass('page-hidden');
                $(".page-text").removeClass('page-hidden');
                $("#link_pagina").prop('required',false);
            }
        })
    })

    $('#imagem-capa').on('change', function(){
        input = $(this);
        if (input[0].files && input[0].files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.lightBoxGallery-capa').find('img').remove();
                $('.lightBoxGallery-capa').append('<img id="img-show-capa" src="'+e.target.result+'">');
            }

            reader.readAsDataURL(input[0].files[0]);
        }else{
            $('.lightBoxGallery-capa').find('img').remove();
        }
    });

    $('#imagem-interna').on('change', function(){
        input = $(this);
        if (input[0].files && input[0].files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.lightBoxGallery-interna').find('img').remove();
                $('.lightBoxGallery-interna').append('<img id="img-show-interna" src="'+e.target.result+'">');
            }

            reader.readAsDataURL(input[0].files[0]);
        }else{
            $('.lightBoxGallery-interna').find('img').remove();
        }
    });
</script>