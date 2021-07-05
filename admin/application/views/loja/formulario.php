<!-- Select2 -->
<link href="<?php echo base_url() ?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($produto)) ? 'Editar cadastro da produto' : 'Novo cadastro de produto' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Loja</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('loja', 'produtos')) ?>">produtos</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($produto)) ? 'Editar cadastro da produto' : 'Novo cadastro de produto' ?></strong>
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
                    <form action="<?php echo base_url(array('loja', 'salvar-produto')) ?>" method="post" id="form-cadastro-produto" enctype="multipart/form-data">
                        <?php if (isset($produto)): ?>
                            <input type="hidden" name="id" value="<?php echo $produto->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>

                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Nome produto: *</label>
                                    <input type="text" name="nome" class="form-control" value="<?php echo (isset($produto)) ? $produto->titulo : '' ?>" required>
                                </div>
                            </div>
                   <!--          <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Sexo: *</label>
                                    <select class="form-control" name="sexo">
                                            <option <?php if ($produto->categoria_sexo == '1'){ echo "selected";  } ?> value="1">Masculino</option>
                                            <option <?php if ($produto->categoria_sexo == '2'){ echo "selected";  } ?> value="2">Feminino</option>
                                            <option <?php if ($produto->categoria_sexo == '0'){ echo "selected";  } ?>  value="0">Unisexo</option>
                                           
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-sm-4 col-xs-12">

                                    <h4>Categorias:*</h4>
                                  <select class="select2_demo_2 form-control" name="categorias[]" required multiple="multiple">
                                      <?php foreach ($categorias as $key => $categoria): ?>
                                          <option <?php if (in_array($categoria->id, $categorias_produto)){ echo "selected";   }?> value="<?php echo $categoria->id ?>"><?php echo $categoria->nome ?></option>
                                      <?php endforeach; ?>
                                    </select>

                               <!--  <div class="form-group">
                                    <label class="control-label">Categoria: *</label>
                                    <select class="form-control" name="categoria">
                                        <?php foreach ($categorias as $key => $categoria): ?>
                                            <option value="<?php echo $categoria->id ?>" <?php echo set_select('categoria', $categoria->id, (isset($produto) && $produto->categorias_id == $categoria->id)) ?> ><?php echo $categoria->nome ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>  -->
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Valor: *</label>
                                    <input type="text" id="valor" name="valor" class="form-control" value="<?php echo (isset($produto)) ? $produto->valor : '' ?>" alt="money" required>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Valor antigo: </label>
                                    <input type="text" name="valor_antigo" class="form-control" value="<?php echo (isset($produto)) ? $produto->valor_antigo : '0' ?>" alt="money">
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Valor Frete: </label>
                                    <input type="text" name="valor_frete" class="form-control" value="<?php echo (isset($produto)) ? $produto->valor_frete : '0' ?>" alt="money">
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Quantidade estoque: </label>
                                    <input type="text" name="estoque" class="form-control" value="<?php echo (isset($produto)) ? $produto->estoque : '' ?>" alt="numeric" >
                                </div>
                            </div> <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Tamanho: </label>
                                    <div class="i-checks"><label class=""> <div class="icheckbox_square-green" style="position: relative;"><input <?php if (isset($produto) && $produto->tamanhos == 1) {
                                        echo 'checked';
                                    } ?> name="tamanhos"  type="checkbox"><ins class="iCheck-helper"  ></ins></div> <i></i> Contém tamanhos </label></div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 error-note">
                                <div class="form-group">
                                    <label class="control-label">Descrição: *</label>
                               
                                    <input type="text" name="descricao" class="form-control" value="<?php echo isset($produto) ? $produto->descricao : '' ?>"  required>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-sm-12 col-xs-12 error-note">
                                <div class="form-group">
                                    <label class="control-label">Detalhes: *</label>
                                    <textarea name="detalhes"  class="summernote"><?php echo isset($produto) ? $produto->detalhes : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">
                                        Comprimento da embalagem (Cm): *
                                        <span class="fa fa-question-circle help-form" data-toggle="help-form" title="Comprimento em centímetros, sendo o valor sempre igual ou superior a 16 cm"></span>
                                    </label>
                                    <input type="text" id="comprimento_embalagem" name="comprimento_embalagem" class="form-control" value="<?php echo (isset($produto)) ? $produto->comprimento_embalagem : '0' ?>" alt="numeric" required>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">
                                        Altura da embalagem (Cm): *
                                        <span class="fa fa-question-circle help-form" data-toggle="help-form" title="Altura em centímetros, sendo o valor sempre igual ou superior a 2 cm"></span>
                                    </label>
                                    <input type="text" id="altura_embalagem" name="altura_embalagem" class="form-control" value="<?php echo (isset($produto)) ? $produto->altura_embalagem : '0' ?>" alt="numeric" required>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">
                                        Largura da embalagem (Cm): *
                                        <span class="fa fa-question-circle help-form" data-toggle="help-form" title="Largura em centímetros, sendo o valor sempre igual ou superior a 11 cm"></span>
                                    </label>
                                    <input type="text" id="largura_embalagem" name="largura_embalagem" class="form-control" value="<?php echo (isset($produto)) ? $produto->largura_embalagem : '0' ?>" alt="numeric" required>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">
                                        Peso (Kl): *
                                        <span class="fa fa-question-circle help-form" data-toggle="help-form" title="Peso em quilograma (o peso deve ser a soma do produto com a embalagem)"></span>
                                    </label>
                                    <input type="text" name="peso" class="form-control" value="<?php echo (isset($produto)) ? $produto->peso : '0' ?>" alt="weight" required>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">


                    <!--     <div class="col-md-4">
                            <h4>Escolha os tamanhos disponiveis:*</h4>
                            <select class="select2_demo_2 form-control" name="tamanhos[]"  multiple="multiple">
                                <?php foreach ($tamanhos as $key => $tamanho): ?>
                                    <option <?php if (in_array($tamanho->id, $tamanhos_produto)){ echo "selected";   }?> value="<?php echo $tamanho->id ?>"><?php echo $tamanho->tamanho ?></option>
                                <?php endforeach; ?>
                              </select>
                        </div> -->
                        </div>
                        <!-- <div class="hr-line-dashed"></div> -->
                        <div class="row">
                            <div class="col-sm-12 error-file">
                                <label class="control-label">Foto de destaque: * (800px X 800px)</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione a imagem</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="imagem" name="imagem" class="file" accept="image/*" />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>  
                                        <?php if (isset($produto->imagem)): ?>
                                                <input type="hidden" name="imagem_produto" value="<?php echo $produto->imagem ?>">
                                        <?php endif ?>
                                <div class="col-sm-12 preview-image">
                                    <div class="lightBoxGallery">
                                        <?php if (isset($produto)): ?>
                                            <img id="img-show" src="<?php echo base_url(array('../', 'assets', 'images', 'product', $produto->imagem)) ?>">

                                        <?php endif ?>

                                        <!-- <div id="blueimp-gallery" class="blueimp-gallery">
                                            <div class="slides"></div>
                                            <h3 class="title">Banner</h3>
                                            <a class="prev">‹</a>
                                            <a class="next">›</a>
                                            <a class="close">×</a>
                                            <a class="play-pause"></a>
                                            <ol class="indicator"></ol>
                                        </div> -->

                                    </div>
                                </div>
                        </div>
                  
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('loja', 'produtos')) ?>" class="btn btn-white">Cancelar</a>
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
    var validator = $('#form-cadastro-produto').validate({
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
            height: 150,
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


    <?php if (!isset($produto)): ?>
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
            $('.img-prod').find('.col-sm-2').not('.server').remove();
            for(i=0; i < input[0].files.length; i++){
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-prod').find('.row').append('<div class="col-sm-2"><div class="container-img"><img id="img-show" src="'+e.target.result+'"></div></div>');
                }

                reader.readAsDataURL(input[0].files[i]);
            }
        }else{
            $('.img-prod').find('.col-sm-2').not('.server').remove();
        }
    });

    // $('.close-img').on('click', function(){
    //     $('#form-cadastro-produto').append('<input type="hidden" name="remove_imagem[]" value="'+$(this).data('id')+'" />');
    //     $('#form-cadastro-produto').append('<input type="hidden" name="nome_imagem[]" value="'+$(this).data('nome')+'" />');
    //     $(this).parents('.server').remove();
    // });
</script>
<script src="<?php echo base_url() ?>assets/js/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript">
$('#galeria').on('change', function(){
  input = $(this);
  if (input[0].files && input[0].files[0]) {
      $('.galeria-preview').find('.col-sm-2').not('.server').remove();
      for(i=0; i < input[0].files.length; i++){
          var reader = new FileReader();

          reader.onload = function (e) {
              $('.galeria-preview').find('.row').append('<div class="col-sm-2"><div class="container-img"><img id="img-show" src="'+e.target.result+'"></div></div>');
          }

          reader.readAsDataURL(input[0].files[i]);
      }
  }else{
      $('.galeria-preview').find('.col-sm-2').not('.server').remove();
  }
});


$(".select2_demo_1").select2();
$(".select2_demo_2").select2();
$(".select2_demo_3").select2({
    placeholder: "Select a state",
    allowClear: true
});
</script>
