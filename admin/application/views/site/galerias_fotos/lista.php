<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Galeria - produto </h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Produtos</a>
            </li>
            <li class="active">
                <strong><?php echo $produto->titulo ?></strong>
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
                        <a class="btn btn-primary" href="<?php echo base_url(array('loja', 'add-fotos')) ?>?id=<?php echo $produto->id ?>">
                            <!-- <i class="fa fa-plus"></i> -->
                            Adicionar fotos
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-view" >
                            <thead>
                                <tr>
                                    <th class="on-print">ID</th>
                                    <th class="on-print">Imagem</th>
                                    <th class="on-print">Título</th>
                                    <th class="no-orderable">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($galerias)){
                                    foreach($galerias as $galeria){
                            ?>
                                        <tr class="gradeC" id="item-<?php echo $galeria->id ?>">
                                            <td><?php echo $galeria->id; ?></td>
                                            <td><img class="fotos" src="<?php echo base_url() ?>../assets/images/product/<?php echo $galeria->foto ?>" alt=""> </td>
                                            <td><?php echo $galeria->foto; ?></td>
                                            <td class="text-center">
                                                <!-- <a href="<?php echo base_url(array('site', 'add-fotos')) ?>?id=<?php echo $galeria->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Adicionar fotos"><i class="fa fa-picture-o"></i></a>
                                                <a href="<?php echo base_url(array('site', 'editar-galeria')) ?>?id=<?php echo $galeria->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o"></i></a> -->
                                                <a href="<?php echo base_url(array('loja', 'excluir-foto')) ?>" class="btn btn-default btn-icon-action delete-item" data-item="<?php echo $galeria->id ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir"><i class="fa fa-trash"></i></a>
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

<style media="screen">
  .fotos{
    height: 70px !important;
min-height: 70px !important;
max-height: 70px !important;
width: 70px !important;
max-width: 70px !important;
object-fit: cover !important;
object-position: 50% 50% !important;
  }
</style>
