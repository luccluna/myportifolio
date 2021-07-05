<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Areas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            
            <li class="active">Areas
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form action="<?php echo base_url(array('site', 'salvar-area')) ?>" method="post" id="form-cadastro-area" enctype="multipart/form-data">
                        <?php if (isset($area)): ?>
                            <input type="hidden" name="id" value="<?php echo $area->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Titulo: *</label>
                                    <input type="text" name="titulo" class="form-control" value="<?php echo (isset($area)) ? $area->titulo : '' ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Texto Breve: *</label>
                                    <input type="text" name="texto_breve" class="form-control" value="<?php echo (isset($area)) ? $area->titulo : '' ?>">
                                </div>
                            </div>
                            
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 error-file">
                                <label class="control-label">Imagem destaque: * (1680px X 1100px)</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione a imagem destaque</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="area" name="area" class="file" />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 preview-image">
                                <div class="lightBoxGallery">
                                    <?php if (isset($area)): ?>
                                        <img id="img-show" src="<?php echo base_url(array('../', 'public', 'imagens', 'areas', $area->imagem)) ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($area)): ?>
                            <input type="hidden" name="imagem_area" value="<?php echo $area->imagem ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Conteúdo: *</label>
                                    <textarea name="descricao" class="summernote"><?php echo isset($area) ? $area->descricao : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Introdução: * (texto breve com poucas palavras e sem imagens)</label>
                                    <textarea name="introducao" class="summernote"><?php echo isset($area) ? $area->introducao : '' ?></textarea>
                                </div>
                            </div>
                        </div> -->
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'areas')) ?>" class="btn btn-white">Cancelar</a>
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
    $('input[type="text"]').setMask();
    $("#form-cadastro-area").validate({});

    $(document).ready(function(){
        $('.summernote').summernote({
            height: 300,
        });
    });

    <?php if (!isset($area)): ?>
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
        $(".error-file").append('<label id="area-error" class="error" for="area"></label>');
        return false;
    }, "Este campo é obrigatório.");

    $('#area').on('change', function(){
        input = $(this);
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
