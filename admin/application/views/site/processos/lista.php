<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Processos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Conteúdo site</a>
            </li>
            <li class="active">
                <strong>Processos</strong>
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
                        <a class="btn btn-primary" href="<?php echo base_url(array('site', 'novo-processo')) ?>">
                            <!-- <i class="fa fa-plus"></i> -->
                            Novo Processo
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-view" >
                            <thead>
                                <tr>
                            
                                    <th class="on-print">Nome</th>
                           
                                    <th class="no-orderable">Processo</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($processos)){
                                    foreach($processos as $processo){
                            ?>
                                        <tr class="gradeC" id="item-<?php echo $processo->id_processo ?>">
                                       
                                             <td><?php echo $processo->primeiro_nome.' '.$processo->ultimo_nome; ?></td>
                                       
                                            <td><?php echo $processo->titulo; ?></td>
                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title=""><i class="fa fa-check"></i></a> -->
                                        
                                                 <a href="javascript:void(0)" class="btn btn-default btn-icon-action detalhes-processo" data-toggle="tooltip"  data-processo="<?php echo $processo->id_processo ?>" title="Visualizar"><i class="fa fa-file-text-o"></i> </a>


                                                <a href="<?php echo base_url(array('site', 'editar-processo')) ?>?id=<?php echo $processo->id_processo ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o"></i></a>

                                                <a href="<?php echo base_url(array('site', 'excluir-processo')) ?>" class="btn btn-default btn-icon-action delete-item" data-item="<?php echo $processo->id_processo ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir"><i class="fa fa-trash"></i></a>
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
<div id="modal-processo"></div>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        //showNotification
        <?php if (isset($notification)): ?>
            showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>
     



    })

$(document).ready(function(){


     $(".detalhes-processo").on('click', function(){
 
            var $this = $(this);    
            $('#modal-processo').load('<?php echo base_url(array('site', 'detalhes-processo')) ?>'+'?id='+$this.data('processo'), function(){
                $('#myModalProcesso').modal('show');
            });
        })

});

</script>