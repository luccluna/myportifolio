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
                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Codigo do Pedido: </label>
                                    <input type="text" name="estoque" class="form-control" value="<?php echo (isset($produto)) ? $produto->estoque : '' ?>" alt="numeric" required>
                                </div>
                            </div>
                             <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Cliente: *</label>
                                    <select class="form-control" name="categoria">
                                        <?php foreach ($perfis as $key => $perfil): ?>
                                            <option value="<?php echo $perfil->id ?>"><?php echo $perfil->nome; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Produto: *</label>
                                    <select class="form-control" name="categoria">
                                        <?php foreach ($produtos as $key => $produto): ?>
                                            <option value="<?php echo $produto->id ?>"><?php echo $produto->titulo ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                             <div class="col-sm-3 col-xs-5">
                                <div class="form-group">
                                    <label class="control-label">Quantidade: *</label>
                                    <input type="number"  name="quantidade" class="form-control" value="<?php echo $pedidos->quantidade; ?>" required>
                                </div>
                            </div>
                               <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Data: </label>
                                    <input type="text" name="estoque" class="form-control" value="<?php echo (isset($pedidos)) ? $pedidos->data : '' ?>" alt="numeric" required>
                                </div>
                            </div>
                        
                        <div class="hr-line-dashed"></div>
                       
                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Valor: *</label>
                                    <input type="text" id="valor" name="valor" class="form-control" value="<?php echo (isset($pedidos)) ? $pedidos->valor : '' ?>" alt="money" required>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Valor Frete: </label>
                                    <input type="text" name="valor_antigo" class="form-control" value="<?php echo (isset($pedidos)) ? $pedidos->valor_frete : '0' ?>" alt="money">
                                </div>
                            </div>
                             <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Valor Total: </label>
                                    <input type="text" name="valor_antigo" class="form-control" value="<?php echo (isset($pedidos)) ? $pedidos->valor_total : '0' ?>" alt="money">
                                </div>
                            </div>
                             <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Codigo de Rastreio: </label>
                                    <input type="text" name="valor_antigo" class="form-control" value="<?php echo (isset($pedidos)) ? $pedidos->codigo_rastreio : '' ?>" >
                                </div>
                            </div>
                             <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Tipo de Frete: *</label>
                                    <select class="form-control" name="categoria">
                               
                                            <option value="">PAC</option>
                                            <option value="">SEDEX</option>
                                            <option value="">SEDEX 10</option>
                                      
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Forma de Pagamento: *</label>
                                    <select class="form-control" name="categoria">
                               
                                            <option value="">PagSeguro</option>
                                            <option value="">Boleto</option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                 <div class="form-group">
                                    <label class="control-label">Tipo de Pagamento: *</label>
                                    <select class="form-control" name="categoria">
                               
                                            <option value="">Cartão de Credito</option>
                                            <option value="">Boleto</option>
                                            <option value="">Débito Online</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="hr-line-dashed"></div>


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
        $('#form-cadastro-produto').append('<input type="hidden" name="remove_imagem[]" value="'+$(this).data('id')+'" />');
        $('#form-cadastro-produto').append('<input type="hidden" name="nome_imagem[]" value="'+$(this).data('nome')+'" />');
        $(this).parents('.server').remove();
    });
</script>