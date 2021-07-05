
  <!-- Modal -->
  <div class="modal" tabindex="-1" id="login_modal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 style="float: left;">Logue na sua conta</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body content-fluid">
            <div class="row">
              <div class="col-md-3"></div>
              <div  class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                <div class="ps-checkout__billing">
                          <label>Email<span>:</span>
                          </label>
                        <div class="form-group form-group--inline">
                          <input name="email_login" class="form-control" type="email">
                        </div>
                        <label>Senha<span>:</span>
                        </label>
                        <div class="form-group form-group--inline">
                          <input name="senha_login" class="form-control" type="password">
                        </div>
                        <div id="alert_login_modal" style="font-weight: 600;padding-bottom: 10px;color: red;display:none" align="center" class="">
                            Email ou senha incorreto.
                        </div>
                  <div class="form-group">
                    <div class="ps-checkbox">

                      <button id="logar_conta" class="ps-btn ps-btn--fullwidth">Entrar<i class="ps-icon-next"></i></button>
                    </div>
                  </div>
                <div class="form-group">
                    <h5>Não tem conta?
                      <a href="<?php echo base_url('cadastro') ?>"><span style="font-weight: 600;text-transform: uppercase;">Cadastre-se</span></a>
                    </h5>
                </div>
                </div>
              </div>
              <div class="col-md-3"></div>
        </div>
            </div>
        </div>

      </div>
    </div>
  </div>
<style media="screen">
.modal {
text-align: center;
padding: 0!important;
}

.modal:before {
content: '';
display: inline-block;
height: 100%;
vertical-align: middle;
margin-right: -4px;
}

.modal-dialog {
display: inline-block;
text-align: left;
vertical-align: middle;
}

.form-group--inline {

    padding-left: 0px;
}
</style>

<script type="text/javascript">
$('#logar_conta').click(function(e){
    e.preventDefault();
    var email = $('input[type=email][name=email_login]').val();
    var senha = $('input[type=password][name=senha_login]').val();
    var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/

     if (reg.test(email)){
       $.ajax({
           url:  '<?php echo base_url('logar-modal') ?>',
           type: 'POST',
           data: {
               email: email,
               senha: senha
           },
           beforeSend: function(){
               $('#loading').removeClass('loading-off');
           },
           success: function(result) {
               result = JSON.parse(result);
               console.log(result);
               if(result){
                 window.location.href = '<?php echo base_url('finalizar') ?>';
               }else{
                   $('#alert_login_modal').css('display', 'block');
               }

           },
           complete: function(){
               $('#loading').addClass('loading-off');
           }
       });
     }else{
       $('#alert_login_modal').css('display', 'block');
     }



});
</script>
