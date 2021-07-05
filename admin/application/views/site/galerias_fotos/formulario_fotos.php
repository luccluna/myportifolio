<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($fotos)) ? 'Editar cadastro da foto' : 'Novo cadastro de foto' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('site', 'galeria')) ?>">Galeria</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($fotos)) ? 'Editar cadastro da foto' : 'Novo cadastro de foto' ?></strong>
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
                    <form action="<?php echo base_url(array('loja', 'salvar-fotos')) ?>" method="post" id="form-cadastro-foto" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 error-file">
                                <label class="control-label">Fotos: *</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione as fotos</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="imagem" name="imagens[]" class="file" accept="image/*" multiple />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 preview-image">
                                <div class="lightBoxGallery">
                                    <div class="row">

                                                <div class="col-sm-2 server">

                                                </div>


                                        <!-- <div id="blueimp-gallery" class="blueimp-gallery">
                                            <div class="slides"></div>
                                            <h3 class="title">foto</h3>
                                            <a class="prev">‹</a>
                                            <a class="next">›</a>
                                            <a class="close">×</a>
                                            <a class="play-pause"></a>
                                            <ol class="indicator"></ol>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'galerias')) ?>" class="btn btn-white">Cancelar</a>
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

    $('input').setMask();
    var validator = $('#form-cadastro-foto').validate({
        ignore: [],
        rules: {
            valor: {
                required: true,
                min: 0.01
            },
            descricao_breve:{
                required: true,
                maxlength: 255
            },
            comprimento_embalagem: {
                required: true,
                min: 16
            },
            altura_embalagem: {
                required: true,
                min: 2
            },
            largura_embalagem: {
                required: true,
                min: 11
            }
        }
    });

    $(function() {
        $('.summernote').summernote({
            height: 300,
        });

        //remove o input file do summernote, para evitar upload de imagens
        $('.note-group-select-from-files').remove();

        //galeria
        $(document).on('change.bs.fileinput', '.fileinput', function(e) {
            var $this = $(this),
                $input = $this.find('input[type=file]'),
                $span = $this.find('.fileinput-filename');
            if($input[0].files !== undefined && $input[0].files.length > 1) {
                $span.text($.map($input[0].files, function(val) { return val.name; }).join(', '));
            }
            $span.attr('title', $span.text());
        });

        $(document).on('clear.bs.fileinput', '.fileinput', function(e) {
            $('.lightBoxGallery').find('.col-sm-2').not('.server').remove();
        });
    });


    <?php if (!isset($fotos)): ?>
        $.validator.addClassRules("file", {
            validate_file: true
        });
    <?php endif ?>

    //metodo para validar o file
    $.validator.addMethod("validate_file", function(value, element){
        if(value.length > 0){
            return true;
        }

        if($(".error-file").find('label.error').length){
            $(".error-file").find('label.error').remove();
        }
        $(".error-file").append('<label id="imagem-error" class="error" for="imagem"></label>');
        return false;
    }, "Este campo é obrigatório.");

    $.validator.addClassRules("summernote", {
        validate_note: true
    });

    $.validator.addMethod("validate_note", function(value, element){
        cleanText = $(".summernote").summernote('code').replace(/<\/?[^>]+(>|$)/g, "");
        if(cleanText.length > 0){
            return true;
        }

        // console.log(validator.numberOfInvalids());

        if($(".error-note").find('label.error').length){
            $(".error-note").find('label.error').remove();
        }
        $(".error-note").append('<label id="descricao-error" class="error" for="descricao"></label>');
        // $('html,body').animate({ scrollTop: $('.summernote').offset().top}, 'slow');
        return false;
    }, "Este campo é obrigatório.");


    $('#imagem').on('change', function(){
        input = $(this);
        if (input[0].files && input[0].files[0]) {
            $('.lightBoxGallery').find('.col-sm-2').not('.server').remove();
            for(i=0; i < input[0].files.length; i++){
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.lightBoxGallery').find('.row').append('<div class="col-sm-2"><div class="container-img"><img id="img-show" src="'+e.target.result+'"></div></div>');
                }

                reader.readAsDataURL(input[0].files[i]);
            }
        }else{
            $('.lightBoxGallery').find('.col-sm-2').not('.server').remove();
        }
    });

    $('.close-img').on('click', function(){
        $('#form-cadastro-foto').append('<input type="hidden" name="remove_imagem[]" value="'+$(this).data('id')+'" />');
        $('#form-cadastro-foto').append('<input type="hidden" name="nome_imagem[]" value="'+$(this).data('nome')+'" />');
        $(this).parents('.server').remove();
    });
</script>
