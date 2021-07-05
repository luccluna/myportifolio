<!-- Typehead -->
<script src="<?php echo base_url() ?>assets/js/plugins/autocomplete-jquery/bootstrap-typeahead.min.js"></script>
<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <i class="fa fa-pie-chart  modal-icon"></i>
                <h4 class="modal-title">Detalhes da enquete</h4>
                <!-- <small class="font-bold">Edite os dados do pedido</small> -->
            </div>
            <div class="modal-body">


                    <div class="row">
                        <div class="col-sm-12">
                                <?php echo $titulo_enquete->pergunta; ?>

                                <?php foreach ($itens_enquete as $key => $item) { ?>

                                    <p><?php echo $item->texto_item ?>: 

                                            <?php foreach ($parciais as $key => $votos) { ?>
                                                <?php if($item->id == $votos->id)echo number_format(((100/$total_votacoes)*$votos->total), 2, '.', '').'%';  ?>
                                            <?php } ?>
                                    </p>

                                

                                <?php } ?>
                                <p><b>Total de votos:</b> <?php echo $total_votacoes ?></p> 
                        </div>
                       
                    </div><div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>

            </div>
   
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">
    // $('input[type="text"]').setMask();
    var validator = $("#form_pedido").validate({});

    $("#btn-salvar").on('click', function(){
        $('#form_pedido').submit();
    });
</script>