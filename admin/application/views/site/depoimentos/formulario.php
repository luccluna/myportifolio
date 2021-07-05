<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Depoimentos</h2>
        <ol class="breadcrumb">
            <li>
                <a>Site</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('site', 'depoimentos')) ?>">Depoimentos</a>
            </li>
            <li class="active">
                <strong><?php if (isset($depoimento)) {
                    echo "Editar";
                }else {
                    echo "Cadastrar";
                } ?> Depoimento</strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-depoimento')) ?>" method="post" id="form-cadastro-depoimento" enctype="multipart/form-data">
                        <?php if (isset($depoimento)): ?>
                            <input type="hidden" name="id" value="<?php echo $depoimento->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Nome: *</label>
                                    <input type="text" name="titulo" class="form-control" value="<?php echo (isset($depoimento)) ? $depoimento->titulo : '' ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Texto: *</label>
                                    <!--<input type="text" name="descricao" class="form-control" value="<?php echo (isset($depoimento)) ? $depoimento->descricao : '' ?>">-->
                                    <textarea name="descricao" class="" required style="width: 100%; height: 250px"><?php echo isset($depoimento) ? $depoimento->descricao : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        

                            <!--<div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Video:(Youtube) *</label>
                                    <input type="text" name="video" class="form-control" value="<?php echo (isset($depoimento)) ? $depoimento->video : '' ?>">
                                </div>
                            </div>-->

                            
                            <div class="hr-line-dashed"></div>



                        <!-- <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Introdução: * (texto breve com poucas palavras e sem imagens)</label>
                                    <textdepoimento name="introducao" class="summernote"><?php echo isset($depoimento) ? $depoimento->introducao : '' ?></textdepoimento>
                                </div>
                            </div>
                        </div> -->
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'depoimentos')) ?>" class="btn btn-white">Cancelar</a>
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
    $("#form-cadastro-depoimento").validate({});

    $(document).ready(function(){
        $('.summernote').summernote({
            height: 300,
        });
    });

    <?php if (!isset($depoimento)): ?>
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
        $(".error-file").append('<label id="depoimento-error" class="error" for="depoimento"></label>');
        return false;
    }, "Este campo é obrigatório.");

    $('#depoimento').on('change', function(){
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
