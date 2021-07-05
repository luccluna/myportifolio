<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Enquetes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Conteúdo site</a>
            </li>
            <li class="active">
                <strong>Enquetes</strong>
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
                        <a class="btn btn-primary" href="<?php echo base_url(array('site', 'nova-enquete')) ?>">
                            <!-- <i class="fa fa-plus"></i> -->
                            Nova Enquete
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
                                    <th class="on-print">Data</th>
                                    <th class="on-print">Status</th>
                                    <th class="on-print">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($enquetes)){
                                    foreach($enquetes as $enquete){
                            ?>
                                        <tr class="gradeC" id="item-<?php echo $enquete->id ?>">
                                            <td><?php echo $enquete->id; ?></td>
                                            <td><?php echo $enquete->titulo; ?></td>
                                            <td><?php echo $enquete->data; ?></td>
                                            <td><?php echo ($enquete->status==0) ? 'Desativado' : 'Ativado' ?></td>
                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title=""><i class="fa fa-check"></i></a> -->
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title="Visualizar"><i class="fa fa-file-text-o"></i></a> -->
                                               

                                                <?php if($enquete->status==0){ ?>

                                                <a href="<?php echo base_url(array('site', 'mudar-status-enquete-ativar')) ?>?id=<?php echo $enquete->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="ativar enquete"><i class="fa fa-check"></i></a>

                                                <?php }else{ ?>
                                                
                                                 <a href="<?php echo base_url(array('site', 'mudar-status-enquete-desativar')) ?>?id=<?php echo $enquete->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Desativar Enquete"><i class="fa fa-close"></i></a>

                                                 <?php } ?>


                                                <a href="<?php echo base_url(array('site', 'editar-enquete')) ?>?id=<?php echo $enquete->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o"></i></a>

                                                 <a href="javascript:void(0);" class="btn btn-default btn-icon-action editar-pedido" data-idpedido="<?php echo $enquete->id ?>?id=<?php echo $enquete->id ?>" data-toggle="tooltip" title="Detalhes da enquete"><i class="fa fa-pie-chart "></i></a>

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


<div id="modal-parcial"></div>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        //showNotification
        <?php if (isset($notification)): ?>
            showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>

        $(".editar-pedido").on('click', function(){
            var $this = $(this);
            $('#modal-parcial').load('<?php echo base_url(array('site', 'detalhes-enquete')) ?>'+'?id='+$this.data('idpedido'), function(){
                $('#myModal').modal('show');
            });
        })
    })
</script>