<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($categorias)) ? 'Editar cadastro do estrutura' : 'Cadastro de Categoria' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a>Site</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('site', 'estrutura')) ?>">Categorias</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($categorias)) ? 'Editar cadastro da categoria' : 'Nova Categoria' ?></strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-estrutura')) ?>" method="post" id="form-cadastro-estrutura" enctype="multipart/form-data">
                        <?php if (isset($categorias)): ?>
                            <input type="hidden" name="id" value="<?php echo $categorias->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-2 col-xs-2">
                                <div class="form-group">
                                    <label class="control-label">Categoria:*</label>
                                    <input type="text" name="nome" required="" class="form-control" value="<?php echo (isset($categorias)) ? $categorias->nome : '' ?>">
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-2">
                                <div class="form-group">
                                    <label class="control-label">RGB: *</label>
                                    <input style="    height: 32px;
                                    width: 100%;
                                    /* border-radius: 30px; */
                                    padding: 0px;
                                    margin: 0;
                                    border: 0px;"class="form-control" type="color" name="rgb" value="<?php echo (isset($categorias)) ? $categorias->rgb : '#b56e6e' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'estrutura')) ?>" class="btn btn-white">Cancelar</a>
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
    var teste;
    $('input[type="text"]').setMask();
    $("#form-cadastro-estrutura").validate({});

    <?php if (!isset($categorias)): ?>
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
        $(".error-file").append('<label id="estrutura-error" class="error" for="estrutura"></label>');
        return false;
    }, "Este campo é obrigatório.");

    $('#estrutura').on('change', function(){
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
