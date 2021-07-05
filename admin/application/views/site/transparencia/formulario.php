<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($transparencia)) ? 'Editar cadastro do estrutura' : 'Novo cadastro de estrutura' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('site', 'estrutura')) ?>">estrutura</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($transparencia)) ? 'Editar cadastro do estrutura' : 'Novo cadastro de estrutura' ?></strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-transparencia')) ?>" method="post" id="form-cadastro-estrutura" enctype="multipart/form-data">
                        <?php if (isset($transparencia)): ?>
                            <input type="hidden" name="id" value="<?php echo $transparencia->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Nome:*</label>
                                    <input type="text" name="nome" required="" class="form-control" value="<?php echo (isset($transparencia)) ? $transparencia->nome : '' ?>">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Tipo:*</label>
                                    <select required="" name="tipo" class="form-control">
                                        <option value="">Escolha</option>
                                        <option <?php echo (isset( $transparencia) &&  $transparencia->tipo=='Entrada')?  'selected' : '' ?> value="Entrada">Entrada</option>
                                        <option <?php echo (isset( $transparencia) &&  $transparencia->tipo=='Saída')?  'selected' : '' ?> value="Saída">Saída</option>

                                    </select>
                                    <!-- <input type="text"  required="" class="form-control" value="<?php echo (isset($transparencia)) ? $transparencia->tipo : '' ?>"> -->
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Data:*</label>
                                    <input type="text" name="data" id="data" required="" class="form-control" value="<?php echo (isset($transparencia)) ? $transparencia->data : '' ?>">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Valor:*</label>
                                    <input type="text" id="valor" name="valor" required="" class="form-control" value="<?php echo (isset($transparencia)) ? $transparencia->valor : '' ?>">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Descricao:*</label>
                                    <input type="text" name="descricao" required="" class="form-control" value="<?php echo (isset($transparencia)) ? $transparencia->descricao : '' ?>">
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

    <?php if (!isset($transparencia)): ?>
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



<script type="text/javascript">
    $(document).ready(function(){
  $('#data').mask('00-00-0000');
  $('#valor').mask("#.##0,00", {reverse: true});

});
</script>