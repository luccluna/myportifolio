<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro/Enquete</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li class="active">
                <strong>Cadastro Enquete</strong>
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
                <div class="">
                    <form action="<?php echo base_url(array('site', 'salvar-enquete')) ?>" method="post" id="form-cadastro-sobre" enctype="multipart/form-data">
                        <?php if (isset($pergunta->id)): ?>
                            <input type="hidden" name="id" value="<?php echo $pergunta->id ?>">
                        <?php endif ?>

                        <div class="col-sm-5 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Título: *</label>
                                <input name="titulo" class="form-control" value="<?php echo isset($pergunta->titulo) ? $pergunta->titulo: ""; ?>" >

                            </div>
                            <?php for ($i=0; $i <4 ; $i++) { ?>
                             <div class="col-sm-5 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Resposta <?php echo $i+1; ?>:</label>
                               <input name="resposta[]" class="form-control" value="<?php echo isset($itens[$i]) ? $itens[$i]->texto_item : "" ?>"> 
                               <input type="hidden" name="id_item[]" class="form-control" value="<?php echo isset($itens[$i]) ? $itens[$i]->id : "" ?>">

                            </div>
                        </div>
                        <?php } ?>
                        </div>
                        </div>

                        <div class="col-sm-5 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Pergunta: *</label>
                               <textarea name="pergunta" class="summernote"><?php echo isset($pergunta) ? $pergunta->pergunta: "" ?></textarea>
                            </div>
                        </div>                            

                        </div>

                        <div class="hr-line-dashed"></div>
                       

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'enquetes')) ?>" class="btn btn-white">Cancelar</a>
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

    $(document).ready(function(){
        $('.summernote').summernote({
            height: 100,
            width: 750  ,
        });
    });


    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        //showNotification
        <?php if (isset($notification)): ?>
            showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>
    })
</script>