<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro ou editar institucional</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li class="active">
                <strong>Cadastro ou editar institucional</strong>
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
                
                <h1 style="margin-left: 45% ">Termos de Uso</h1>
          
                    <form action="<?php echo base_url(array('site', 'editar-termos-de-uso')) ?>" method="post" id="form-cadastro-institucional" enctype="multipart/form-data">
                        <?php if ($termos): ?>
                            <input type="hidden" name="id" value="<?php echo $termos->id ?>">
                        <?php endif ?>
                        <!-- <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Titulo *:</label>
                                    <input type="text" name="titulo" class="form-control" value="<?php echo ($institucional) ? $institucional->titulo : '' ?>" requerid>
                                </div>
                            </div>
                        </div> -->
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Texto: *</label>
                                    <textarea name="descricao" class="summernote"><?php echo ($termos) ? $termos->termos : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'institucional')) ?>" class="btn btn-white">Cancelar</a>
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
            height: 700,
        });
    });

    $(function () {
        $("#form-cadastro-institucional").validate({});

        //showNotification
        <?php if (isset($notification)): ?>
            showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>
    })

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