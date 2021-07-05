<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($candidato)) ? 'Editar cadastro do candidato' : 'Novo cadastro de candidato' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
             <li>
                <a href="<?php echo base_url(array('site', 'candidatos-oficiais')) ?>">Candidatos Oficiais</a>
            </li>
            
            <li class="active">
                <strong><?php echo (isset($candidato)) ? 'Editar cadastro do candidato' : 'Novo cadastro de candidato' ?></strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-candidato-oficial')) ?>" method="post" id="form-cadastro-candidatos-oficiais" enctype="multipart/form-data">
                        <?php if (isset($candidato)): ?>
                            <input type="hidden" name="id" value="<?php echo $candidato->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Nome: *</label>
                                    <input type="text" name="nome" class="form-control" value="<?php echo (isset($candidato)) ? $candidato->nome : '' ?>" required>
                                </div>
                            </div>

                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                <!--  -->

                                    <label class="control-label">Eleição: *</label>
                                    <select id="select_eleicao" class='form-control m-b' name='eleicao' required> 
                                        <option value="">Selecionar</option>                                      
                                        <?php if(!empty($eleicoes_candidato_pertence)): ?>
                                            <?php foreach ($eleicoes_candidato_pertence as $key => $val):?>
                                                <option value="<?php echo $val->id ?>" <?php echo (isset($candidato) && $candidato->eleicao_id == $val->id) ? 'selected' : '' ;?>>
                                                    <?php echo $val->periodo . " " . $val->pais_nome . " " ?>
                                                         <?php switch($val->tipo):case 1: ?> 
                                                            <?php echo 'Presidente'; ?>                                        
                                                            <?php break; ?>
                                                            <?php case 2: ?>
                                                            <?php echo 'Senador(a)'; ?>                                        
                                                            <?php break; ?>
                                                            <?php case 3: ?>
                                                            <?php echo 'Deputado(a) Federal'; ?>                                
                                                            <?php break; ?>
                                                            <?php case 4: ?>
                                                            <?php echo 'Governador(a)'; ?>                                  
                                                            <?php break; ?>
                                                            <?php case 5: ?>
                                                            <?php echo 'Deputado(a) Estadual'; ?>                                 
                                                            <?php break; ?>
                                                            <?php case 6: ?> 
                                                            <?php echo 'Prefeito(a)'; ?>                                          
                                                            <?php break; ?>
                                                            <?php case 7: ?> 
                                                            <?php echo 'Vereador(a)'; ?>                                          
                                                            <?php break; ?>
                                                        <?php endswitch; ?>  
                                                <?php echo $val->estado_nome . " ". $val->cidade_nome;  ?>                                                    
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                             <div class="col-sm-2 col-xs-12">
                                <div class="form-group">

                                <!--  -->

                                    <label class="control-label">Partidos: *</label>
                                    <select id="select_partidos" class='form-control m-b' name='partido' required> 
                                        <option value="">Selecionar</option>                                      
                                        <?php if(!empty($partidos)): ?>
                                            <?php foreach ($partidos as $key => $val):?>
                                                <option value="<?php echo $val->id ?>" <?php echo (isset($candidato) && $candidato->partidos_id == $val->id) ? 'selected' : '' ;?>>
                                                <?php echo $val->descricao ?>                                                    
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <!--  -->
                                    <label class="control-label">Perfil: *</label>
                                    <select id="select_perfil" class='form-control m-b' name='perfil' required> 
                                        <option value="">Selecionar</option>                                      
                                        <?php if(!empty($politicos_perfis)): ?>
                                            <?php foreach ($politicos_perfis as $key => $val):?>
                                                <option value="<?php echo $val->id ?>" <?php echo (isset($candidato) && $candidato->perfis_id == $val->id) ? 'selected' : '' ;?>>                                                
                                                <?php echo ($val->nome)? $val->nome :$val->primeiro_nome ." ". $val->ultimo_nome ?>                                                    
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 error-file">
                                <label class="control-label">Foto Candidato: *</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecione a imagem destaque</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" id="foto_candidato" name="foto_candidato" class="file" />
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 preview-image">
                                <div class="lightBoxGallery">
                                    <?php if (isset($candidato)): ?>
                                        <img id="img-show" src="<?php echo base_url(array('../', 'assets', 'images', 'candidatoFotos', $candidato->foto)) ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($candidato)): ?>
                            <input type="hidden" name="imagem_candidato" value="<?php echo $candidato->foto ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>                      
                      
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'candidatos-oficiais')) ?>" class="btn btn-white">Cancelar</a>
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
    $("#form-cadastro-candidatos-oficiais").validate({});



    <?php if (!isset($candidato)): ?>
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
        $(".error-file").append('<label id="candidato-error" class="error" for="foto_candidato"></label>');
        return false;
    }, "Este campo é obrigatório.");



    $('#foto_candidato').on('change', function(){
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
