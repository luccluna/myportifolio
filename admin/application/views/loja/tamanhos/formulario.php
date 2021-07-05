<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($tamanho)) ? 'Editar cadastro da tamanho' : 'Novo cadastro de tamanho' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Loja</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('loja', 'tamanhos')) ?>">tamanhos</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($tamanho)) ? 'Editar cadastro da tamanho' : 'Novo cadastro de tamanho' ?></strong>
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
                      
                    <form action="<?php echo base_url(array('loja', 'salvar-tamanho')) ?>" method="post" id="form-cadastro-tamanho" enctype="multipart/form-data">
                        <?php if (isset($tamanho)): ?>
                            <input type="hidden" name="id" value="<?php echo $tamanho->id ?>">
                            <input type="hidden" name="id_produto" value="<?php echo $tamanho->produtos_id ?>">
                        <?php endif ?>

                        <?php if (isset($produto_id)): ?>
                            <input type="hidden" name="produto_novo" value="<?php echo $produto_id ?>">
                        <?php endif ?>

                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Tamanho: *</label>
                                    <select name="tamanho" class="form-control" required="">
                                            <option value="">Selecione</option>
                                            <?php foreach ($tamanhos as $key => $value): ?>
                                                <option <?php if (isset($tamanho) && $tamanho->tamanhos_id==$value->id){echo 'selected';} ?> value="<?php echo $value->id ?>" ><?php echo  $value->tamanho ; ?> </option>
                                            <?php endforeach ?>

                                    </select>
                                  
                                </div>
                            </div>
                             <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Quantidade: *</label>
                                    <input type="text" name="quantidade" class="form-control" value="<?php echo (isset($tamanho)) ? $tamanho->quantidade : '' ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                    
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('loja', 'tamanhos')) ?>" class="btn btn-white">Cancelar</a>
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
    $("#form-cadastro-tamanho").validate({});

    <?php if (!isset($tamanho)): ?>
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
        $(".error-file").append('<label id="imagem-error" class="error" for="imagem"></label>');
        return false;
    }, "Este campo é obrigatório.");

    $('#imagem').on('change', function(){
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
