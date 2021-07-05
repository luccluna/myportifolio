<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Informativos </h2>
        <ol class="breadcrumb">
            <li>
                <a>Eventos</a>
            </li>
            <li class="active">
                <strong>Informativos</strong>
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
                <div class="ibox-title">
                    <!-- <h5>FooTable with row toggler, sorting and pagination</h5> -->

                    <div class="ibox-tools">
                        <!-- <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a> -->
                        <a class="btn btn-primary" href="<?php echo base_url(array('site', 'novo-evento')) ?>">
                            <!-- <i class="fa fa-plus"></i> -->
                            Nova Publicação
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-view" >
                            <thead>
                                <tr>
                                    <th class="on-print">ID</th>
                                    <th class="on-print">Titulo</th>
                                    <th class="on-orderable">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($eventos)){
                                    foreach($eventos as $evento){
                            ?>
                                        <tr class="gradeC" id="item-<?php echo $evento->id ?>">
                                            <td><?php echo $evento->id; ?></td>
                                            <td><?php echo $evento->titulo; ?></td>
                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title=""><i class="fa fa-check"></i></a> -->
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title="Visualizar"><i class="fa fa-file-text-o"></i></a> -->
                                                <a href="<?php echo base_url(array('site', 'editar-evento')) ?>?id=<?php echo $evento->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo base_url(array('site', 'excluir-evento')) ?>" class="btn btn-default btn-icon-action delete-item" data-item="<?php echo $evento->id ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir"><i class="fa fa-trash"></i></a>
                                                <a href="<?php echo base_url(array('site', 'imagem-evento')) ?>?id=<?php echo $evento->id ?>" class="btn btn-default btn-icon-action " data-toggle="tooltip" data-placement="bottom" title="Ver Galeria"><i class="fa fa-image"></i></a>
                                                <a href="<?php echo base_url(array('site', 'adicionar-imagem')) ?>?id=<?php echo $evento->id ?>" class="btn btn-default btn-icon-action"   data-toggle="tooltip" data-placement="bottom" title="Adicionar Galeria"><i class="fa fa-plus"></i></a>
                                                
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                             ?>
                            </tbody>
                        <!-- <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                        </tfoot> -->
                        </table>
                    </div>
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