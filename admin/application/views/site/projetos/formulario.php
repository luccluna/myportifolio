<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($projetos_de_lei)) ? 'Editar projeto de lei' : 'Novo projeto de lei' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('site', 'projetos')) ?>">Projeto de lei</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($projetos_de_lei)) ? 'Editar projeto de lei' : 'Novo projeto de lei' ?></strong>
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



                    <form action="<?php echo base_url(array('site', 'salvar-projeto-lei')) ?>" method="post" id="form-cadastro-projeto-lei" enctype="multipart/form-data">

                        <?php if (isset($projetos_de_lei)): ?>
                            <input type="hidden" name="id" value="<?php echo $projetos_de_lei->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Titulo: *</label>
                                    <input type="text" name="titulo" class="form-control" value="<?php echo (isset($projetos_de_lei)) ? $projetos_de_lei->titulo : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 error-file">
                                <label class="control-label">Imagem destaque: * (800px X 300px)</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione a imagem destaque</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="projeto_img_in" name="projeto_img_in" class="file" />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 preview-image">
                                <div class="lightBoxGallery">
                                    <?php if (isset($projetos_de_lei)): ?>
                                        <img id="img-show" src="<?php echo base_url(array('../', 'assets', 'images', 'projetosDeLei', $projetos_de_lei->imagem)) ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($projetos_de_lei)): ?>
                            <input type="hidden" name="imagem_projeto" value="<?php echo $projetos_de_lei->imagem ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Conteúdo: *</label>
                                    <textarea name="texto" class="summernote"><?php echo isset($projetos_de_lei) ? $projetos_de_lei->texto : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Introdução: * (texto breve com poucas palavras e sem imagens)</label>
                                    <textarea name="introducao" class="summernote"><?php echo isset($noticia) ? $noticia->introducao : '' ?></textarea>
                                </div>
                            </div>
                        </div> -->
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'projetos')) ?>" class="btn btn-white">Cancelar</a>
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
    $("#form-cadastro-projeto-lei").validate({});

    $(document).ready(function(){
        $('.summernote').summernote({
            height: 300,
        });
    });

    <?php if (!isset($projetos_de_lei)): ?>
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
        $(".error-file").append('<label id="projeto_img_in-error" class="error" for="projeto_img_in"></label>');
        return false;
    }, "Este campo é obrigatório.");

    $('#projeto_img_in').on('change', function(){
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
