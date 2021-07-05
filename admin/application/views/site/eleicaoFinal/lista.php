<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Eleições</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Conteúdo site</a>
            </li>
            <li class="active">
                <strong>Eleição final</strong>
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
                        <a class="btn btn-primary" href="<?php echo base_url(array('site', 'nova-eleicao')) ?>">
                            <!-- <i class="fa fa-plus"></i> -->
                            Nova eleição
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-view" >
                            <thead>
                                <tr>
                                    <th class="on-print">ID</th>
                                    <th class="on-print">Período</th>
                                    <th class="on-print">Tipo</th>
                                    <th class="on-print">País</th>
                                    <th class="on-print">Estado</th>
                                    <th class="on-print">Cidade</th>
                                    <th class="no-orderable">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($eleicoes)){
                                    foreach($eleicoes as $eleicao){
                            ?>
                                        <tr class="gradeC" id="item-<?php echo $eleicao->id ?>">
                                            <td><?php echo $eleicao->id; ?></td>
                                            <td><?php echo $eleicao->periodo; ?></td>
                                            <td> 
                                                <?php switch($eleicao->tipo):case 1: ?>                                                
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
                                                            
                                            </td>
                                            <td><?php echo $eleicao->pais_nome; ?></td>
                                            <td><?php echo (!empty($eleicao->estado_nome))?$eleicao->estado_nome:"N/A"; ?></td>
                                            <td><?php echo (!empty($eleicao->cidade_nome))?$eleicao->cidade_nome:"N/A"; ?></td>
                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title=""><i class="fa fa-check"></i></a> -->
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title="Visualizar"><i class="fa fa-file-text-o"></i></a> -->
                                                <a href="<?php echo base_url(array('site', 'editar-eleicao')) ?>?id=<?php echo $eleicao->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo base_url(array('site', 'excluir-eleicao')) ?>" class="btn btn-default btn-icon-action delete-item" data-item="<?php echo $eleicao->id ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir"><i class="fa fa-trash"></i></a>
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