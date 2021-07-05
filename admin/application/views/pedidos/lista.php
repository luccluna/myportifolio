    <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pedidos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Loja</a>
            </li>
            <li class="active">
                <strong>Pedidos</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<script type="text/javascript">


</script>
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
                        <!-- <a class="btn btn-primary" href="<?php echo base_url(array('loja', 'novo-produto')) ?>">
                            Novo produto
                        </a> -->
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-view" >
                            <thead>
                                <tr>
                                    <th class="on-print">ID</th>
                                    <th class="on-print">Código</th>
                                    <th class="on-print">Data</th>
                                    <th class="on-print">Valor</th>
                                    <th class="on-print">Frete</th>
                                    <th class="on-print">Valor_total</th>
                                    <th class="on-print">Rastreio</th>
                                    <th class="on-print">Forma de pagamento</th>
                                    <th class="on-print">Tipo de pagamento</th>
                                    <th class="on-print">Status</th>
                                    <th class="no-orderable">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!empty($pedidos)){
                                    foreach($pedidos as $pedido){
                            ?>
                                        <?php
                                            $status = '';
                                            switch ($pedido->status_pedido) {
                                                case '1':
                                                    $status = 'Pagamento não inicializado';
                                                    break;
                                                case '2':
                                                    $status = 'Em análise';
                                                    break;
                                                case '3':
                                                    $status = 'Pagamento realizado';
                                                    break;
                                                case '4':
                                                    $status = 'Disponível';
                                                    break;
                                                case '5':
                                                    $status = 'Em disputa';
                                                    break;
                                                case '6':
                                                    $status = 'Devolução de valor';
                                                    break;
                                                case '7':
                                                    $status = 'Cancelada';
                                                    break;
                                                case '8':
                                                    $status = 'Valor devolvido(debitado)';
                                                    break;
                                                case '9':
                                                    $status = 'Retenção temporária';
                                                    break;
                                                
                                            }

                                            $tipo = '';
                                            switch ($pedido->tipo_pagamento) {
                                                case '1':
                                                    $tipo = 'Cartão de crédito';
                                                    break;
                                                case '2':
                                                    $tipo = 'Boleto';
                                                    break;
                                                case '3':
                                                    $tipo = 'Débito online';
                                                    break;
                                                case '4':
                                                    $tipo = 'Saldo PagSeguro';
                                                    break;
                                                case '5':
                                                    $tipo = 'Oi Paggo';
                                                    break;
                                                case '7':
                                                    $tipo = 'Depósito em conta';
                                                    break;
                                            }
                                        ?>
                                        <tr class="gradeC" id="item-<?php echo $pedido->id ?>">
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> ><?php echo $pedido->id; ?></td>
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> ><?php echo $pedido->codigo_pedido; ?></td>
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> ><?php  echo date("d/m/Y", strtotime($pedido->data)); ?></td>
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> >R$ <?php echo number_format($pedido->valor, 2, ',', '.'); ?></td>
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> >R$ <?php echo number_format($pedido->valor_frete, 2, ',', '.'); ?></td>
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> >R$ <?php echo number_format($pedido->valor_total, 2, ',', '.'); ?></td>
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> ><?php echo $pedido->codigo_rastreio; ?></td>
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> ><?php echo ($pedido->forma_pagamento == '1') ? 'Boleto' : 'PagSeguro' ?></td>
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> ><?php echo $tipo ?></td>
                                            <td <?php if ($pedido->status_pedido==10){ echo 'style="color:#ada5a5a8"'; } ?> ><?php echo $status; ?></td>
                                            <td class="text-center">
                                           
                                         
                                                <a href="<?php echo base_url(array('loja', 'detalhes-pedido')) .'?id='. $pedido->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" title="Visualizar Pedido"><i class="fa fa-plus-square"></i></a>

                                                <a href="javascript:void(0);" class="btn btn-default btn-icon-action editar-pedido" data-idpedido="<?php echo $pedido->id ?>" data-toggle="tooltip" title="Inserir código de rastreio"><i class="fa fa-truck"></i></a>

                                                <a <?php if ($pedido->status_pedido==10){ echo 'disabled'; } ?>
                                                        href="javascript:void(0);" class="btn btn-default btn-icon-action finalizar-pedido" data-idpedido="<?php echo $pedido->id ?>" data-toggle="tooltip" title="Finalizar Pedido"><i class="fa fa-thumbs-up"></i></a>

                                                <!-- <a href="<?php echo base_url(array('loja', 'editar-produto')) ?>?id=<?php echo $pedido->id ?>" class="btn btn-default btn-icon-action" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o"></i></a> -->
                                                <!-- <a href="<?php echo base_url(array('loja', 'excluir-produto')) ?>" class="btn btn-default btn-icon-action delete-item" data-item="<?php echo $pedido->id ?>" data-toggle="tooltip" data-placement="bottom" title="Excluir"><i class="fa fa-trash"></i></a> -->
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

<div id="modal-pedido"></div>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        //showNotification
        <?php if (isset($notification)): ?>
            showNotification(<?php echo '"'. $notification->type .'","'. $notification->title .'","'. $notification->message .'"' ?>)
        <?php endif ?>

        $(".editar-pedido").on('click', function(){
            var $this = $(this);
            $('#modal-pedido').load('<?php echo base_url(array('loja', 'editar-pedido')) ?>'+'?id='+$this.data('idpedido'), function(){
                $('#myModal').modal('show');
            });
        })


      $(".finalizar-pedido").on('click', function(){
            var idpedido = $(this).data('idpedido');

               $.ajax({
                url:  '<?php echo base_url('finalizar-pedido') ?>',
                type: 'POST',
                data: {
                    //desconto:$('#cupom_valido').val(),
                    id: idpedido,

                },
                beforeSend: function(){
                    $('#loading').removeClass('loading-off');
                },
                success: function(result) {

                  result = JSON.parse(result);
                  if(result){
                     location.reload();
                  }

              
                },
                complete: function(){
                    $('#loading').addClass('loading-off');
                }
            });
        })   


    })




</script>