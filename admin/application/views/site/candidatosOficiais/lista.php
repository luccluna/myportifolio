<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Candidatos Oficiais</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Conteúdo site</a>
            </li>
            <li class="active">
                <strong>Candidatos Oficiais</strong>
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
                        <a class="btn btn-primary" href="<?php echo base_url(array('site', 'novo-candidato-oficial')) ?>">
                            <!-- <i class="fa fa-plus"></i> -->
                            Novo candidato
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-view" >
                            <thead>
                                <tr>
                                    <th class="on-print">ID</th>
                                    <th class="on-print">Nome</th>
                                    <th class="on-print">Partido</th>
                                    <th class="on-print">Perfil</th>
                                    <th class="on-print">Eleição</th>
                                    <th class="no-orderable">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($candidatos)){
                                    foreach($candidatos as $candidato){
                            ?>
                                        <tr class="gradeC" id="item-<?php echo $candidato->id ?>">
                                            <td><?php echo $candidato->id; ?></td>
                                            <td><?php echo $candidato->nome; ?></td>
                                            <td><?php echo $candidato->nome_partido; ?></td>
                                            <td><?php echo $candidato->nome_perfil; ?></td>

                                            <td>
                                                <?php echo $candidato->dados_eleicao->nome_periodo  ?>
                                                <?php echo $candidato->dados_eleicao->nome_pais ?>

                                                <?php switch($candidato->dados_eleicao->valor_tipo_eleicao):case 1: ?>                                                
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

                                                <?php echo $candidato->dados_eleicao->nome_estado  ?>
                                                <?php echo $candidato->dados_eleicao->nome_cidade  ?>
                                        </td>
                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title=""><i class="fa fa-check"></i></a> -->
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title="Visualizar"><i class="fa fa-file-text-o"></i></a> -->
                                                <a href="<?php echo base_url(array('site', 'editar-candidato-oficial')) ?>?id=<?php echo $candidato->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo base_url(array('site', 'excluir-candidato-oficial')) ?>" class="btn btn-default btn-icon-action delete-item" data-item="<?php echo $candidato->id ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir"><i class="fa fa-trash"></i></a>
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