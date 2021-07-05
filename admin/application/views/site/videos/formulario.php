<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo (isset($videos)) ? 'Editar cadastro do vídeo' : 'Cadastro' ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li>
                <a href="<?php echo base_url(array('site', 'videos')) ?>">Vídeos Site</a>
            </li>
            <li class="active">
                <strong><?php echo (isset($videos)) ? 'Editar cadastro do vídeo' : 'Novo cadastro de vídeo' ?></strong>
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
                    <form action="<?php echo base_url(array('site', 'salvar-video')) ?>" method="post" id="form-cadastro-video" enctype="multipart/form-data">
                        <?php if (isset($videos)): ?>
                            <input type="hidden" name="id" value="<?php echo $videos->id ?>">
                        <?php endif ?>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label">Titulo: *</label>
                                    <input type="text" name="titulo" class="form-control" value="<?php echo (isset($videos)) ? $videos->titulo : '' ?>" required>
                                </div>
                                <div class="col-sm-12 error-file" style="margin: 0px">
                                    <label class="control-label">Imagem Fundo: * (800px X 530px)</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Selecione a imagem</span>
                                            <span class="fileinput-exists">Alterar</span>
                                            <input type="file" id="img_fundo" name="img_fundo" class="file" />
                                        </span>
                                        <a class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                    </div> 

                                    
                                </div>
                                <div class="col-sm-12 preview-image col-xs-12">
                                    <div class="lightBoxGallery">
                                        <?php if (isset($videos)): ?>
                                            <img id="img_show" src="<?php echo base_url(array('../', 'assets', 'images', 'video', $videos->imagem)) ?>">
                                        <?php endif ?>
                                    </div>

                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="form-group">
                                        <label class="control-label">Autor: *</label>
                                        <input type="text" name="autor" class="form-control" value="<?php echo (isset($videos)) ? $videos->autor : '' ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 col-xs-2">
                                        <label class="control-label">Data: *</label>
                                        <input type="date" name="data" class="form-control" value="<?php echo (isset($videos)) ? $videos->data : '' ?>" required>
                                    </div>
                                </div>
                                <?php if (isset($videos)): ?>
                                    <input type="hidden" name="img_fundo_antiga" value="<?php echo $videos->imagem ?>">
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <label class="control-label">Código do vídeo no youTube: * (Insira apenas a parte da URL após a igualdade)</label>
                                    <input type="text" name="nome_url" id="nome_url" class="form-control" value="<?php echo (isset($videos)) ? $videos->nome_url : '' ?>" required>
                                    <span class="input-group-btn" style="top: 14px;">
                                        <button type="button" class="btn btn-primary" id="btn-play"><i class="fa fa-play" aria-hidden="true"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed line-video" style="<?php echo !isset($videos) ? 'display: none' : 'display: block'; ?>"></div>
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 body-video">
                                <?php if(isset($videos) && $videos->nome_url != ''): ?>
                                    <iframe width="500" height="300" src="http://www.youtube.com/embed/<?php echo $videos->nome_url; ?>" frameborder="0" allowfullscreen></iframe>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Descrição da Notícia: *</label>
                                    <textarea name="conteudo" class="summernote"><?php echo (isset($videos)) ? $videos->texto : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'videos')) ?>" class="btn btn-white">Cancelar</a>
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
    $("#form-cadastro-video").validate({});

    $('#btn-play').on('click', function(){
        var frame = '<iframe width="500" height="300" src="http://www.youtube.com/embed/'+$('#nome_url').val()+'" frameborder="0" allowfullscreen></iframe>';
        $(".body-video").html(frame);
        $(".line-video").css({'display':'block'});
    });

    $(document).ready(function(){
        $('.summernote').summernote({
            height: 300,
        });
    });
</script>
