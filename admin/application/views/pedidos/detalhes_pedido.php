            <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>Detalhes do pedido</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Loja</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(array('loja', 'pedidos')) ?>">Pedidos</a>
                    </li>
                    <li class="active">
                        <strong>Detalhes do pedido</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a href="<?php echo base_url(array('loja', 'imprimir')) .'?print=1&id='. $pedido_id ?>" id="print-pedido" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir pedido </a>
                </div>
            </div>
        </div>
        <div id="content-print" class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <?php if($pedido): ?>
                    <div class="ibox-content p-xl">
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

                            <div class="col-sm-6 text-right">
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
                                                    <strong><?php echo $produto->titulo ?> <?php echo isset($produto->tamanho_nome )? 'TAM:'.$produto->tamanho_nome : '' ?></strong>
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
            </div>
        </div>


        <!-- <script type="text/javascript">
            $("#print-pedido").on('click', function(){
                var mywindow = window.open('', 'PRINT', 'height=400,width=600');
                mywindow.document.write('<html><head><title>' + document.title  + '</title>');
                mywindow.document.write('</head><body >');
                // mywindow.document.write('<h1>' + document.title  + '</h1>');
                // mywindow.document.write(document.getElementById(elem).innerHTML);
                mywindow.document.write($('#content-print').html());
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/

                mywindow.print();
                mywindow.close();

                return true;
            });
        </script> -->
