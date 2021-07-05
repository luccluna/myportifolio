<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Loja</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Loja</a>
            </li>
            <li class="active">
                <strong>loja</strong>
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
                        <a class="btn btn-primary" href="<?php echo base_url(array('loja', 'novo-produto')) ?>">
                            <!-- <i class="fa fa-plus"></i> -->
                            Novo produto
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
                                    <th class="on-print">Descricao</th>
                                    <th class="on-print">Situação</th>
                                    <th class="on-print">Destaque</th>
                                    <th class="no-orderable">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($produtos)){
                                    foreach($produtos as $produto){
                            ?>
                                        <tr class="gradeC" id="item-<?php echo $produto->id ?>">
                                            <td><?php echo $produto->id; ?></td>
                                            <td><?php echo $produto->titulo; ?></td>
                                            <td><?php echo $produto->descricao; ?></td>
                                            <td><?php echo ($produto->ativo == 1)? 'Ativado': 'Desativado'; ?></td>
                                            <td><?php echo ($produto->destaque == 1)? 'DESTAQUE': 'Não destacado'; ?></td>
                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title=""><i class="fa fa-check"></i></a> -->
                                                <!-- <a href="#" class="btn btn-default btn-icon-action" data-toggle="tooltip" title="Visualizar"><i class="fa fa-file-text-o"></i></a> -->
                                                    <a href="<?php echo base_url(array('loja', 'editar-produto')) ?>?id=<?php echo $produto->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o"></i></a>

                                                   <!--  <a href="<?php echo base_url(array('loja', 'fotos-produto')) ?>?id=<?php echo $produto->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="FOtos"><i class="fa fa-file-image-o"></i></a>
 -->
                                                    <?php if ($produto->destaque==1){ ?>
                                                        <a href="<?php echo base_url(array('loja', 'destacar-produto')) ?>?id=<?php echo $produto->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Retirar destaque"><i style="color: #e0cc16;" class="fa fa fa-star"></i></a>
                                                  <?php }else{ ?>
                                                        <a href="<?php echo base_url(array('loja', 'destacar-produto')) ?>?id=<?php echo $produto->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Destacar Produto"><i class="fa fa fa-star-o"></i></a>
                                                  <?php } ?>

                                                <?php if($produto->ativo == 1){ ?>

                                                <a href="<?php echo base_url(array('loja', 'desativar-produto')) ?>?id=<?php echo $produto->id ?>" class="btn btn-default btn-icon-action" data-item="<?php echo $produto->id ?>" data-toggle="tooltip" data-placement="bottom" title="Desativar Produto"><i style="color: blue;" class="fa fa-minus-circle">
                                                </i>
                                            </a>

                                                <?php }else{ ?>

                                                <a href="<?php echo base_url(array('loja', 'desativar-produto')) ?>?id=<?php echo $produto->id ?>" class="btn btn-default btn-icon-action" data-item="<?php echo $produto->id ?>" data-toggle="tooltip" data-placement="bottom" title="Ativar Produto"><i style="color: red;" class="fa fa-plus-circle"></i></a>


                                                <?php } ?>


                                                <?php if ($produto->tamanhos == 1): ?>
                                                          <a href="<?php echo base_url(array('loja', 'tamanhos')) ?>?id=<?php echo $produto->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Tamanhos"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNTEyLjAwMDAyIDUxMi4wMDAwMiIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCI+PHBhdGggZD0ibTAgMHY1MTJoNTEyem0zMCA3Mi40MjU3ODEgMjkuNjEzMjgxIDI5LjYxMzI4MS0yMi4wODIwMzEgMjIuMDgyMDMyIDIxLjIxNDg0NCAyMS4yMTA5MzcgMjIuMDc4MTI1LTIyLjA3ODEyNSA0NC42MTcxODcgNDQuNjEzMjgyLTIyLjA4MjAzMSAyMi4wNzgxMjQgMjEuMjE0ODQ0IDIxLjIxNDg0NCAyMi4wNzgxMjUtMjIuMDgyMDMxIDQ0LjYxMzI4MSA0NC42MTMyODEtMjIuMDc4MTI1IDIyLjA4MjAzMiAyMS4yMTA5MzggMjEuMjE0ODQzIDIyLjA4MjAzMS0yMi4wODIwMzEgNDQuNjEzMjgxIDQ0LjYxMzI4MS0yMi4wODIwMzEgMjIuMDgyMDMxIDIxLjIxNDg0MyAyMS4yMTA5MzggMjIuMDgyMDMyLTIyLjA3ODEyNSA0NC42MTMyODEgNDQuNjEzMjgxLTIyLjA4MjAzMSAyMi4wNzgxMjUgMjEuMjE0ODQ0IDIxLjIxNDg0NCAyMi4wNzgxMjQtMjIuMDgyMDMxIDQ0LjYxMzI4MiA0NC42MTcxODctMjIuMDc4MTI1IDIyLjA3ODEyNSAyMS4yMTA5MzcgMjEuMjE0ODQ0IDIyLjA4MjAzMi0yMi4wODIwMzEgMjkuNjEzMjgxIDI5LjYxMzI4MWgtNDA5LjU3NDIxOXptMCAwIiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggZD0ibTk3Ljc2NTYyNSA0MTQuMjM0Mzc1aDE3OC4yMTA5MzdsLTE3OC4yMTA5MzctMTc4LjIxMDkzN3ptMzAtMTA1Ljc4MTI1IDc1Ljc4MTI1IDc1Ljc4MTI1aC03NS43ODEyNXptMCAwIiBmaWxsPSIjMDAwMDAwIi8+PC9zdmc+Cg==" /></a>
                                                <?php endif ?>



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
