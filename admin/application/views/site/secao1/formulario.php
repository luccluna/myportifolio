<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Seção 1</h2>
        <ol class="breadcrumb">
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
                    <form action="<?php echo base_url(array('site', 'salvar-secao1')) ?>" method="post" id="form-cadastro-banner" enctype="multipart/form-data">

                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Titulo:*</label>
                                    <input type="text" required name="titulo1" class="form-control" value="<?php echo (isset($secao[0])) ? $secao[0]->titulo : '' ?>">
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">texto:*</label>
                                    <input type="text" required name="texto1" class="form-control" value="<?php echo (isset($secao[0])) ? $secao[0]->texto : '' ?>">
                                </div>
                            </div>
                           <!--  <div class="col-sm-6 error-file">
                                  <label class="control-label">Imagem: * (785px X 250px)</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione a imagem</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="banner1" name="imagem1" class="file" />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div> -->
                       <!--      <div class="col-sm-6 preview-image">
                                <div class="lightBoxGallery lightBoxGallery1">
                                    <?php if (isset($secao[0])): ?>
                                        <img id="img-show" src="<?php echo base_url(array('../', 'assets', 'images', 'secao1', $secao[0]->imagem)) ?>">
                                    <?php endif ?>
                                </div>
                            </div> -->
                            <?php if (isset($secao[0])): ?>
                                <input type="hidden" name="imagem_secao1" value="<?php echo $secao[0]->imagem ?>">
                                <input type="hidden" name="id_secao1" value="<?php echo $secao[0]->id ?>">
                            <?php endif ?>
                        </div>
                        <div class="hr-line-dashed"></div>
                      

                        <?php if (isset($secao[1])): ?>
                            <input type="hidden" name="imagem_secao2" value="<?php echo $secao[1]->imagem ?>">
                            <input type="hidden" name="id_secao2" value="<?php echo $secao[1]->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">

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
    $("#form-cadastro-banner").validate({});

    <?php if (!isset($banner)): ?>
        $.validator.addClassRules("file", {
            validate_file: true
        });
    <?php endif ?>

    //metodo para validar o valor
    // $.validator.addMethod("validate_file", function(value, element){
    //     if(value.length > 0){
    //         return true;
    //     }
    //     if($(".error-file").find('label.error').length){
    //         $(".error-file").find('label.error').remove();
    //     }
    //     $(".error-file").append('<label id="banner-error" class="error" for="banner"></label>');
    //     return false;
    // }, "Este campo é obrigatório.");

    $('#banner1').on('change', function(){
        input = $(this);
        if (input[0].files && input[0].files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.lightBoxGallery1').find('img').remove();
                $('.lightBoxGallery1').append('<img id="img-show" src="'+e.target.result+'">');
            }

            reader.readAsDataURL(input[0].files[0]);
        }else{
            $('.lightBoxGallery1').find('img').remove();
        }
    });

    $('#banner2').on('change', function(){
        input = $(this);
        if (input[0].files && input[0].files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.lightBoxGallery2').find('img').remove();
                $('.lightBoxGallery2').append('<img id="img-show" src="'+e.target.result+'">');
            }

            reader.readAsDataURL(input[0].files[0]);
        }else{
            $('.lightBoxGallery2').find('img').remove();
        }
    });
</script>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        //showNotification
        <?php if (isset($notification)): ?>
            showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>
    })
</script>
