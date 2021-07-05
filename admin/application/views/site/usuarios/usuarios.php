<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($usuarios)) ? 'Editar Usuario' : 'Editar Usuario' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a>Site</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('site', 'usuarios')) ?>">Usuários</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($usuario)) ? 'Editar' : 'Novo Usuario' ?></strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-usuario')) ?>" method="post" id="form-cadastro-usuario"  enctype="multipart/form-data">
                        <?php if (isset($usuario)): ?>
                            <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Nome do Usuário: *</label>
                                    <input type="text" name="nome" class="form-control" value="<?php if(isset($usuario)) echo $usuario->nome ?>" required="" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">E-mail do Usuário: *</label>
                                    <input type="email" name="email" class="form-control" value="<?php if(isset($usuario)) echo $usuario->email ?>" placeholder="E-mail" required="" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">CPF do Usuário: *</label>
                                    <input type="text" name="cpf" class="form-control cpf" value="<?php if(isset($usuario)) echo $usuario->cpf ?>" required="" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Senha do Usuário: *</label>
                                    <input type="password" name="senha" class="form-control" value="" placeholder="Senha" <?php if(!isset($usuario)) echo 'required'  ?>>
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

  $('.cpf').mask('000.000.000-00', {reverse: true});


  $('input[type="text"]').setMask();
  $("#form-cadastro-marca").validate({});

  $(document).ready(function(){
    $('.summernote').summernote({
        height: 300,
    });
});

  <?php if (!isset($marca)): ?>
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
        $(".error-file").append('<label id="marca-error" class="error" for="marca"></label>');
        return false;
    }, "Este campo é obrigatório.");

    $('#marca').on('change', function(){
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
