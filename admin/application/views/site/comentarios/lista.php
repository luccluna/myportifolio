<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Comentários</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Conteúdo site</a>
            </li>
            <li class="active">
                <strong>Comentários</strong>
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
                        <!-- <a class="btn btn-primary" href="<?php echo base_url(array('site', 'nova-marcas')) ?>">
                            <!-- <i class="fa fa-plus"></i> -->
                            Nova Imagem
                        </a> -->
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-view" >
                            <thead>
                                <tr>
                                    <th class="on-print">ID</th>
                                    <th class="on-print">Nome</th>
                                    <th class="on-print">Comentario</th>
                                    <th class="no-orderable">Produto</th>
                                    <th class="no-orderable">Data</th>
                                    <th class="no-orderable">Avalição</th>
                                    <th class="no-orderable">Ativo</th>
                                    <th class="no-orderable">Acoes</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($comentarios)){
                                    foreach($comentarios as $comentario){
                            ?>
                                        <tr class="gradeC" id="item-<?php echo $comentario->id ?>">
                                            <td><?php echo $comentario->id; ?></td>
                                            <td><?php echo $comentario->nome; ?></td>
                                            <td><?php echo $comentario->comentario; ?></td>
                                            <td><?php echo $comentario->titulo; ?></td>
                                            <td><?php echo $comentario->data; ?></td>
                                            <td><?php echo $comentario->classificacao; ?></td>
                                            <td><?php if ($comentario->ativo==1) {
                                              echo "Ativado";
                                            }else{
                                              echo "Desativado";
                                            } ?></td>

                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title=""><i class="fa fa-check"></i></a> -->
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title="Visualizar"><i class="fa fa-file-text-o"></i></a> -->

                                                <?php if($comentario->ativo == 1){ ?>

                                                <a href="<?php echo base_url(array('loja', 'desativar-comentario')) ?>?id=<?php echo $comentario->id ?>" class="btn btn-default btn-icon-action" data-item="<?php echo $comentario->id ?>" data-toggle="tooltip" data-placement="bottom" title="Desativar Comentario"><i style="color: red;" class="fa fa-minus-circle">

                                                <?php }else{ ?>

                                                <a href="<?php echo base_url(array('loja', 'desativar-comentario')) ?>?id=<?php echo $comentario->id ?>" class="btn btn-default btn-icon-action" data-item="<?php echo $comentario->id ?>" data-toggle="tooltip" data-placement="bottom" title="Ativar Comentario"><i style="color: blue;" class="fa fa-plus-circle"></i></a>


                                                <?php } ?>
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
