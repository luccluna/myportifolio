<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($processo)) ? 'Editar processo' : 'Novo processo'  ?></h2>
        <ol class="breadcrumb">

            <li>
                <a href="<?php echo base_url(array('site', 'processos')) ?>">Lista de Processos</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($processos)) ? 'Editar processo' : 'Novo processo' ?></strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-processo')) ?>" method="post" id="form-cadastro-processo" enctype="multipart/form-data">
                        <?php if (isset($processo)): ?>
                            <input type="hidden" name="id" value="<?php echo $processo->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label">Titulo: *</label>
                                    <input type="text" name="titulo" class="form-control" value="<?php echo (isset($processo)) ? $processo->titulo : '' ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                            <?php if (!isset($processo)) { ?>
                                <div class="form-group">
                                    <label class="control-label">Candidato: *</label>
                                      <select class="form-control" name="candidato" required="">
                                      <option value="">SELECIONE</option>
                                        <?php foreach ($candidatos as $key => $candidato): ?>
                                            
                                            <option value="<?php echo $candidato->id_candidato ?>"  ><?php if(isset($candidato->nome)){ echo $candidato->nome; }else{ echo $candidato->primeiro_nome.' '.$candidato->ultimo_nome; } ?> <?php echo isset($candidato->nome_partido)? '- '.$candidato->nome_partido : '' ?> </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <?php } ?>
                            </div>
                        </div>


                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">

                                    <label class="control-label">Descrição: *</label>
                                <div class="form-group">
                                    <textarea name="descricao" rows="5" cols="150" class="" required=""><?php echo isset($processo) ? $processo->descricao_completa : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Introdução: * (texto breve com poucas palavras e sem imagens)</label>
                                    <textarea name="introducao" class="summernote"><?php echo isset($processo) ? $processo->introducao : '' ?></textarea>
                                </div>
                            </div>
                        </div> -->
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'processos')) ?>" class="btn btn-white">Cancelar</a>
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
    $("#form-cadastro-processo").validate({});

    $(document).ready(function(){
        $('.summernote').summernote({
            height: 300,
        });
    });

    <?php if (!isset($processo)): ?>
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
        $(".error-file").append('<label id="processo-error" class="error" for="processo"></label>');
        return false;
    }, "Este campo é obrigatório.");

    $('#processo').on('change', function(){
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
