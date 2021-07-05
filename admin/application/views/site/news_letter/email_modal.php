<!-- Typehead -->
<script src="<?php echo base_url() ?>assets/js/plugins/autocomplete-jquery/bootstrap-typeahead.min.js"></script>
<div class="modal inmodal" id="email_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <i class="fa fa-envelope modal-icon"></i>
                <h4 class="modal-title">Enviar e-mail</h4>
                <!-- <small class="font-bold">Edite os dados do pedido</small> -->
                <br>
                <div align="left" class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="">Selecione a noticia</label>
                            <select name="" id="noticia" class="form-control">
                                <?php foreach ($noticias as $key => $value): ?>

                                    <option value="<?php echo $value->id ?>"><?php echo $value->id.' - '.$value->titulo ?></option>
                                <?php endforeach ?>
                            </select>
                            <br>
                            <div style="width: 100%" align="center">
                                <button class="btn button disparar">Disparar E-mails</button>
                            </div>

                            <div id="enviando" style="display: none">
                                <div class="ibox">
                                    <div class="">
                                        <h5>Enviando...</h5>
                                        <h2 id="porcentagem">00%</h2>
                                        <div class="progress progress-mini">
                                            <div id="barra_porcentagem" style="width: 00%;" class="progress-bar"></div>
                                        </div>

                                        <div style="color: red"  id="aviso" class="m-t-sm small">Não feche esta janela!</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div style=" overflow-x: hidden; overflow-y: scroll; height: 150px;">

                                <label for="">Destinos(<?php echo count($destinos) ?>)</label>

                                <?php foreach ($destinos as $key => $value): ?>

                                    <p ><?php echo $value->email ?></p>
                                <?php endforeach ?>
                            </div>
                            <br>
                            
                            
                        </div>
                    </div>
                </div> 
            </div>
            <div  class="modal-body">

                <div class="row">
                    
            <div class="col-md-8">
                <p>Último envio:  <?php echo date("d/m/Y - H:i:s", strtotime($ultimo_envio->data));  ?> </p> 
            </div>

            <div align="right" class="col-md-4">
                <button style="float: rig" type="button" class="btn " data-dismiss="modal">Fechar</button>
            </div>
                </div>

        </div>

    </div>
</div>
</div>

<style>
.disparar{
    background: #18A689;
    color: white;
}
.disparar:hover{
    background: #18A689;
    color: white;
}
</style>


<script>


    $('.disparar').click(function(){
        var noticia = $('#noticia').val();

        var emails = JSON.parse('<?php echo json_encode($destinos) ?>');

        var passos = 100/emails.length;

        var ini = 0;

        $('#enviando').css('display', 'block');

        $('.disparar').css('display', 'none');

        $.each(emails, function( key, value ) {

            $.ajax({
                url:  '<?php echo base_url('site/disparar-email') ?>',
                type: 'POST',
                data: {
                    //desconto:$('#cupom_valido').val(),
                    noticia: noticia,
                    email: emails[key].email,

                },
                beforeSend: function(){

                },
                success: function(result) {

                  result = JSON.parse(result);
                  if(result){
                    ini = ini+passos;

                    console.log('foi');
                    $('#porcentagem').text(ini+'%');
                    $('#barra_porcentagem').css('width', ini+'%');
                    if (ini==100) {
                        $('#aviso').text('E-mails Enviado com sucesso');
                        $('#aviso').css('color', 'green');
                    }
                }


            },
            complete: function(){

            }
        });

        });

        return;


    })

</script>

