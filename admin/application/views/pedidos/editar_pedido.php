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
                <i class="fa fa-truck modal-icon"></i>
                <h4 class="modal-title">Editar pedido</h4>
                <!-- <small class="font-bold">Edite os dados do pedido</small> -->
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(array('loja', 'salvar-rastreio')) ?>" role="form" id="form_pedido" method="post">
                    <input type="hidden" id="hdn_id_pedido" name="hdn_id_pedido" value="<?php echo $pedido_id ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Código do rastreio: </label>
                                <input type="text" id="codigo_rastreio" name="codigo_rastreio" value="<?php echo isset($pedido->codigo_rastreio) ? $pedido->codigo_rastreio : '' ?>" placeholder="" class="form-control">
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status do pedido: </label>
                                 <select class="form-control" name="status_pedido" required>
                                    <option value="1" <?php echo (isset($pedido) && $pedido->status_pedido == '1') ? 'selected' : '' ?> >Aguardando pagamento</option>
                                    <option value="2" <?php echo (isset($pedido) && $pedido->status_pedido == '2') ? 'selected' : '' ?> >Em análise</option>
                                    <option value="3" <?php echo (isset($pedido) && $pedido->status_pedido == '3') ? 'selected' : '' ?> >Pagamento realizado</option>
                                    <option value="4" <?php echo (isset($pedido) && $pedido->status_pedido == '4') ? 'selected' : '' ?> >Disponível</option>
                                    <option value="5" <?php echo (isset($pedido) && $pedido->status_pedido == '5') ? 'selected' : '' ?> >Em Disputa</option>
                                    <option value="6" <?php echo (isset($pedido) && $pedido->status_pedido == '6') ? 'selected' : '' ?> >Devolução de valor</option>
                                    <option value="7" <?php echo (isset($pedido) && $pedido->status_pedido == '7') ? 'selected' : '' ?> >Cancelada</option>
                                    <option value="8" <?php echo (isset($pedido) && $pedido->status_pedido == '8') ? 'selected' : '' ?> >Valor devolvido(debitado)</option>
                                    <option value="9" <?php echo (isset($pedido) && $pedido->status_pedido == '9') ? 'selected' : '' ?> >Retenção temporária</option>
                                </select>
                            </div>
                        </div>
                    </div><div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btn-salvar" class="btn btn-primary">Salvar</button>
            </div>
                </form>
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