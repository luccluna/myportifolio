<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro/Palavra</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Site</a>
            </li>
            <li class="active">
                <strong>Nova palavra</strong>
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
                    <form action="<?php echo base_url(array('site', 'filtro-palavrao-salvar-palavra')) ?>" method="post">
                        <?php if (isset($palavra)): ?>
                            <input type="hidden" name="id" value="<?php echo $palavra->id ?>">
                        <?php endif ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                        <label class="control-label">Palavra: *</label>
                                        <input name="palavra" class="form-control" required="" value="<?php echo isset($palavra->descricao) ? $palavra->descricao : "" ?>">
                                </div>
                            </div>
                        <div class="hr-line-dashed"></div>
                       

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="<?php echo base_url(array('site', 'filtro-palavrao')) ?>" class="btn btn-white">Cancelar</a>
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


    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        //showNotification
        <?php if (isset($notification)): ?>
            showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>
    })
</script>