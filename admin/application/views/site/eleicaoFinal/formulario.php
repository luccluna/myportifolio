<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($eleicao)) ? 'Editar Cadastro de Eleição' : 'Novo Cadastro de Eleição' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('site', 'eleicao-final')) ?>">Eleição final</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($eleicao)) ? 'Editar Cadastro Eleição' : 'Novo Cadastro Eleição' ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form action="<?php echo base_url(array('site', 'salvar-eleicao')) ?>" method="post" id="form-cadastro-eleicao" enctype="multipart/form-data">
                        <?php if (isset($eleicao)): ?>
                            <input type="hidden" name="id" value="<?php echo $eleicao->id ?>">
                        <?php endif ?>

                        <div class="col-sm-2 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Período: *</label>
                                <input id="eleicao_periodo" name="periodo" class="form-control" value="<?php echo (isset($eleicao)) ? $eleicao->periodo : ""  ?>">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-2 col-xs-12">
                                <div class="form-group">

                                    <label class="control-label">País: *</label>
                                    <select id="select_pais" class='form-control m-b' name='pais' > 
                                        <option value="0">Selecionar</option>                                      
                                        <?php if(!empty($paises)): ?>
                                            <?php foreach ($paises as $key => $val):?>
                                                <option value="<?php echo $val->id ?>" 
                                                <?php echo (isset($eleicao) && $eleicao->paises_id == $val->id) ? 'selected' : '' ;?>>
                                                <?php echo $val->descricao ?>                                                    
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                          


                            <div class="col-sm-2 col-xs-12">
                               <div id="div_tipo" class="form-group" <?php echo (isset($eleicao) && $eleicao->tipo != "")?'':'hidden'?> >
                                    <label class="control-label">Tipo: *</label>
                                     <select id="select_tipo" class='form-control m-b' name='tipo' required>
                                        <option value="0" <?php echo (isset($eleicao) && $eleicao->tipo == "0") ? 'selected' : '' ;?>>Selecionar              </option>
                                        <option value="1" <?php echo (isset($eleicao) && $eleicao->tipo == "1") ? 'selected' : '' ;?>>Presidente              </option>
                                        <option value="2" <?php echo (isset($eleicao) && $eleicao->tipo == "2") ? 'selected' : '' ;?>>Senador(a)              </option>
                                        <option value="3" <?php echo (isset($eleicao) && $eleicao->tipo == "3") ? 'selected' : '' ;?>>Deputado(a) Federal     </option>
                                        <option value="4" <?php echo (isset($eleicao) && $eleicao->tipo == "4") ? 'selected' : '' ;?>>Governador(a)          </option>
                                        <option value="5" <?php echo (isset($eleicao) && $eleicao->tipo == "5") ? 'selected' : '' ;?>>Deputado(a) Estadual   </option>
                                        <option value="6" <?php echo (isset($eleicao) && $eleicao->tipo == "6") ? 'selected' : '' ;?>>Prefeito(a)            </option>
                                        <option value="7" <?php echo (isset($eleicao) && $eleicao->tipo == "7") ? 'selected' : '' ;?>>Vereador(a)            </option>                                                                                                          
                                       
                                    </select>
                                </div>
                            </div>

                       
                        
                            <div class="col-sm-2 col-xs-12">
                                <div id="div_estado" class="form-group" <?php echo (isset($eleicao) && $eleicao->estado_nome != "")?'':'hidden'?>>

                                    <label class="control-label">Estado: *</label>
                                    <select id="select_estado"  class='form-control m-b' name='estado'>
                                        <option class="option_zero_estados" value="0">Selecionar</option>
                                         <?php if(!empty($estados)): ?>
                                            <?php foreach ($estados as $key => $val):?>
                                                <option value="<?php echo $val->id ?>"<?php echo (isset($eleicao) && $eleicao->estados_id == $val->id) ? 'selected' : '' ;?>><?php echo $val->descricao ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?> 
                                    </select>

                                </div>
                            </div>
                      

                            <div class="col-sm-2 col-xs-12">
                                <div id="div_cidade" class="form-group" <?php echo (isset($eleicao) && $eleicao->cidade_nome != "")?'':'hidden'?>>
                                    <label class="control-label">Cidade: *</label>
                                     <select id="select_cidade" class='form-control m-b' name='cidade'>
                                        <option class="option_zero_cidades" value="0">Selecionar</option>

                                         <?php if(!empty($cidades)): ?>
                                            <?php foreach ($cidades as $key => $val):?>
                                                <option value="<?php echo $val->id ?>" <?php echo (isset($eleicao) && $eleicao->cidades_id == $val->id) ? 'selected' : '' ;?>><?php echo $val->descricao ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="hr-line-dashed"></div>
                       

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'eleicao-final')) ?>" class="btn btn-white">Cancelar</a>
                                        <button id="sub_eleicao" class="btn btn-primary" type="button">Salvar</button>
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

<script  type="text/javascript">
    $("#sub_eleicao").on("click", function(){
        let tipo = $("#select_tipo").val();
        //validacao
        if($("#eleicao_periodo").val()==""){
            swal("Ops!", "Período não informado!");
        }else if($("#select_pais").val()=="0"){
            swal("Ops!", "País não informado!");
        }else if($("#select_tipo").val()=="0"){
            swal("Ops!", "Tipo não informado!");
        }else if(tipo == "2" || tipo == "3" || tipo == "4" || tipo == "5" ){
            if($("#select_estado").val()=="0" || $("#select_estado").val()=="sem_estados"){
                swal("Ops!", "Estado não informado!");
            }else{
                //alert("1");
                $("#form-cadastro-eleicao").submit();
            }
        }else if(tipo == "6" || tipo == "7"  ){
            if($("#select_cidade").val()=="0" || $("#select_cidade").val()=="sem_cidades"){
                swal("Ops!", "Cidade não informada!");
            }
            else if($("#select_estado").val()=="0" || $("#select_estado").val()=="sem_estados"){
                swal("Ops!", "Estado não informado!");
            }else{
                //alert("2");
                $("#form-cadastro-eleicao").submit();
            }
        }else{
            //alert("3");
            $("#form-cadastro-eleicao").submit();
        }       
    });
</script>




<script  type="text/javascript">
    $("#select_pais").on("change", function(){
        //show tipo
        $("#div_tipo").removeAttr( "hidden" ); 

    });
    $("#select_tipo").on("change", function(){
         let tipo = $('#select_tipo').val();
         // se cargos nivel estado
         if(tipo == "2" || tipo == "3" || tipo == "4" || tipo == "5"){
            //remover hidden estado
            if($("#div_estado").attr("hidden")){           
                $("#div_estado").removeAttr( "hidden" );              
            }
            //esconde campo cidade
            if($("#div_cidade").attr("hidden",'true')){
                $("#div_cidade").attr("hidden",'false');


            }
            //se cargo nivel municipal
         }else if(tipo == "6" || tipo == "7"){
            $("#div_estado").removeAttr( "hidden" ); 
            $("#div_cidade").removeAttr( "hidden" ); 

            //se cargo nivel nacional
         }else if(tipo == "1" || tipo == '0'){
            $("#div_estado").attr("hidden",'false');
            $("#div_cidade").attr("hidden",'false');

         }
    });
</script>



<script type="text/javascript">
    //pega estados apartir dos paises
    $("#select_pais").on("change", function(){
        let id_pais = $(this).val();
        if(id_pais!= 0){
            //esvazia select de estados
            $(".option_zero_estados").siblings().remove();
            $(".option_zero_cidades").siblings().remove();
            //busca estados  insere no select de estados
            $.ajax({
                url: "<?php echo base_url(array('site','pegar-estados')) ?>",
                type: 'POST',
                data: {
                idPais: id_pais
                },
                beforeSend: function(){
                    $('#loading').removeClass('loading-off');
                    
                },
                success: function(result) {
                    
                    result = JSON.parse(result);
                    console.log(result.status);
                    if(result.status == "estados"){
                        $.each(result.estados, function (i, item) {
                            $('#select_estado').append($('<option>', { 
                                value: item.id,
                                text : item.descricao 
                            }));

                        });
                    }else{
                         $('#select_estado').append($('<option>', { 
                                value: "sem_estados",
                                text : "Sem estados no banco de dados" 
                            }));

                    }    
                },
                complete: function(){
                    $('#loading').addClass('loading-off');
                    
                }
            });
        }
     

    });
</script>

<script type="text/javascript">
    //pegar cidades apartir dos estados

    $("#select_estado").on("change", function(){
        let id_estado = $(this).val();   
                   
       
        if(id_estado!= 0){
            //esvezia select de estados           
            $(".option_zero_cidades").siblings().remove();
            //busca estados  insere no select de estados
            $.ajax({
                url: "<?php echo base_url(array('site','pegar-cidades')) ?>",
                type: 'POST',
                data: {
                idEstado: id_estado
                },
                beforeSend: function(){
                    $('#loading').removeClass('loading-off');
                    
                },
                success: function(result) {                    
                    result = JSON.parse(result);
                    console.log(result.status);
                    if(result.status == "cidades"){
                        $.each(result.cidades, function (i, item) {
                            $('#select_cidade').append($('<option>', { 
                                value: item.id,
                                text : item.descricao 
                            }));

                        });
                    }else{
                         $('#select_cidade').append($('<option>', { 
                                value: "sem_cidades",
                                text : "Sem cidades no banco de dados" 
                            }));

                    }    
                },
                complete: function(){
                    $('#loading').addClass('loading-off');
                    
                }
            });
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