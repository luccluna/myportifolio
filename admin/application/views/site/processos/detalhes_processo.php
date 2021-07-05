<!-- Typehead -->
<script src="<?php echo base_url() ?>assets/js/plugins/autocomplete-jquery/bootstrap-typeahead.min.js"></script>
<div class="modal inmodal" id="myModalProcesso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <i class="fa fa-gavel modal-icon"></i>
                <h4 class="modal-title">Detalhes do Processo</h4>
                <!-- <small class="font-bold">Edite os dados do pedido</small> -->
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(array('loja', 'salvar-rastreio')) ?>" role="form" id="form_pedido" method="post">
       
                    <div class="row">
                        <div class="col-sm-12">
                            <b>Título:</b> <?php echo $processo->titulo; ?>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <b>Descrição:</b> <?php echo $processo->descricao_completa; ?>
                        </div>
                      
                    </div><div class="modal-footer">
                <button style="background-color: #af0101; color: white" type="button" class="btn btn-white" data-dismiss="modal">FECHAR</button>
          
            </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
