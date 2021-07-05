<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pedido de agendamento</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Conteúdo site</a>
            </li>
            <li class="active">
                <strong>Pedidos de agendamento</strong>
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
                      
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-view" >
                            <thead>
                                <tr>
                                    <th class="on-print">ID</th>
                                    <th class="on-print">depoimento</th>
                                    <th class="on-print">Tipo</th>
                                    <th class="on-print">Data</th>
                                    <th class="on-print">Quantidade pessoas</th>
                                    <th class="no-orderable">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($agendamentos)){
                                    foreach($agendamentos as $depoimento){
                            ?>
                                        <tr class="gradeC" id="item-<?php echo $depoimento->id ?>">
                                            <td><?php echo $depoimento->id; ?></td>
                                            <td><?php echo $depoimento->titulo; ?></td>
                                            <td><?php echo $depoimento->tipo; ?></td>
                                            <td><?php echo $depoimento->data; ?></td>
                                            <td><?php echo $depoimento->pessoas; ?></td>
                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title=""><i class="fa fa-check"></i></a> -->
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title="Visualizar"><i class="fa fa-file-text-o"></i></a> -->
                                                <a href="<?php echo base_url(array('agenda', 'lista-pessoas')) ?>?id=<?php echo $depoimento->id ?>&id_depoimento=<?php echo $depoimento->id_depoimento; ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Pessoas"><i class="fa fa-list"></i></a>
                                               
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