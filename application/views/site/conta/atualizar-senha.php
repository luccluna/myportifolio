 <section id="page-title" class="page-title-mini">
      <div class="container clearfix">
        <h1>Esqueci a senha</h1>
        
      </div>
    </section>
<!--End Banner-->
<div class="page-content">          
  <!-- Breadcrumbs -->

  <!-- End Breadcrumbs -->
  <!-- Main Content -->
  <div class="main-content our-blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">                                                     

          <section class="comments">
            <div class="comments-title">
              <h5>Recuperar senha</h5>
            </div>



            <div class="comments-content">
              <div class="answer">

                <div align="center" class="form-comment col-md-12">
                  <div class="col-md-3"></div>
                  <div  class="col-md-6">
                    <div class="form-comment-title">  
                      <h5>Digite sua nova senha</h5>
                    </div>
                    <form  class="ps-checkout__form" action="<?php echo base_url('salvar-nova-senha') ?>" method="post">
                        <input type="hidden" name="token" value="<?php echo $token ?>">
                        <input type="hidden" name="email_original" value="<?php echo $email ?>">

                      <div class="form-validate-center">
                        <div class="name">
                          <input class="form-control" style="margin-bottom: 10px" type="text" placeholder="Seu E-mail" value="<?php echo $email ?>" disabled name="email_login">
                        </div>
                        <div class="mail">
                          <input class="form-control" style="margin-bottom: 10px" type="password" placeholder="Sua nova senha" name="senha">
                        </div>

                        <div class="mail">
                          <input class="form-control" style="margin-bottom: 10px" type="password"  placeholder="Confirme a sua senha" name="re_senha">
                        </div>

                      </div>
                      
                    
                     <div  class="form-submit">
                      <input type="submit" style="width: 100%;     background: green;color:white" value="Atualizar senha" class="btn" name="submit">
                    </div>

                  </form>
                </div>
                <div class="col-md-3"></div>
              </div>



            </div>                      
          </section>
          <!-- End Comments -->
        </div>    

      </div>
    </div>
  </div>
  <!-- Main Content -->
</div>
</div>
</section>
