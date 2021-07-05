<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Loja IEA</title>

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="white-bg">
    <div class="wrapper wrapper-content p-xl">
    <h2 class="text-center" style="margin-top: 0px;">Loja IEA - Detalhes do Pedido</h2>
        <?php if($pedido): ?>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-6">
                                <h5>Cliente:</h5>
                                <address>
                                    <strong><?php echo ($pedido->nome_cliente) ?></strong><br>
                                    CEP: <?php echo $pedido->cep_entrega ?>,<br>
                                    <?php echo $pedido->rua_entrega .', '. $pedido->numero_entrega .'<br>'. $pedido->bairro_entrega ?><br>
                                    <?php echo $pedido->cidade_entrega .', '. $pedido->estado_entrega .',<br>'. $pedido->complemento_entrega  ?><br>
                                    <!-- <abbr title="Telefones">Tel:</abbr> <?php echo $pedido->telefone_1 .' / '. $pedido->telefone_2 ?>
\                                </address>-->
                            </div>
                            <div class="col-sm-6">
                                <h5>Contato:</h5>
  
                                    Email: <?php echo $pedido->email_cliente ?><br>
                                    Telefone: <?php echo $pedido->telefone_cliente ?><br>
                                    <br>
                                    <!-- <abbr title="Telefones">Tel:</abbr> <?php echo $pedido->telefone_1 .' / '. $pedido->telefone_2 ?>
\                                </address>-->
                            </div>

                <div class="col-xs-6 text-right">
                    <h4>Nº do pedido.</h4>
                    <h4 class="text-navy"><?php echo $pedido->codigo_pedido ?></h4>
                    <!-- <span>To:</span>
                    <address>
                        <strong>Corporate, Inc.</strong><br>
                        112 Street Avenu, 1080<br>
                        Miami, CT 445611<br>
                        <abbr title="Phone">P:</abbr> (120) 9000-4321
                    </address>
                    <p>
                        <span><strong>Invoice Date:</strong> Marh 18, 2014</span><br/>
                        <span><strong>Due Date:</strong> March 24, 2014</span>
                    </p> -->
                </div>
            </div>
   
                <div class="table-responsive m-t">
  <table class="table invoice-table">
                                <thead>
                                    <tr>
                                        <th>Itens</th>
                                        <th>ID</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Total item</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php foreach ($produtos as $key => $produto):  ?>
                                        <tr>
                                            <td style="width: 70%;">
                                                <div>
                                                    <strong><?php echo $produto->titulo ?> - <?php  echo $produto->tamanho_nome ?> </strong>
                                                </div>
                                                <small><?php echo $produto->descricao ?></small>
                                            </td>
                                            <td><?php echo $produto->id ?></td>
                                            <td><?php echo $produto->quantidade ?></td>
                                            <td>R$ <?php echo number_format($produto->valor, 2, ',', '.'); ?></td>
                                            <td>R$ <?php echo number_format($produto->valor*$produto->quantidade, 2, ',', '.'); ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
            </div>

            <table class="table invoice-total">
                            <tbody>
                            <tr>
                                <td><strong>Sub Total: </strong></td>
                                <td>R$ <?php echo $pedido->valor; ?></td>
                            </tr>
                            <tr>
                                <td><strong>FRETE: </strong></td>
                                <td>R$ <?php echo $pedido->valor_frete; ?></td>
                            </tr>
                            <tr>
                                <td><strong>TOTAL :</strong></td>
                                <td>R$ <?php echo $pedido->valor_total; ?></td>
                            </tr>
                            </tbody>
                        </table>
           
                <!-- <div class="text-right">
                    <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                </div> -->

                <!-- <div class="well m-t"><strong>Comments</strong>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                </div> -->
        </div>
        <?php endif ?>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Custom and plugin javascript -->
    <!-- <script src="<?php echo base_url() ?>assets/js/inspinia.js"></script> -->

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
