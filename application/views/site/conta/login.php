  <section id="page-title" class="page-title-mini">
      <div class="container clearfix">
        <h1>Faça login</h1>
        
      </div>
    </section>

    <section id="content">
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">
            <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Entre na sua conta</div>
            <div class="acc_content clearfix">
              <form id="login-form" name="login-form" class="nobottommargin" action="<?php echo base_url('logar') ?>" method="post">
                <?php if (isset($finalizar)): ?>
                  
                <input type="hidden"  name="finalizar" value="<?php echo $finalizar ?>">
                
                <?php endif ?>
                <div class="col_full">
                  <label for="login-form-username">E-mail:</label>
                  <input type="email" id="login-form-username" name="email_login" value="" class="form-control" />
                </div>
                <div class="col_full">
                  <label for="login-form-password">Senha:</label>
                  <input type="password" id="login-form-password" name="senha_login" value="" class="form-control" />
                </div>
                <div class="col_full nobottommargin">
                  <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                  <a href="<?php echo base_url('recuperar-senha') ?>" class="fright">Esqueceu a senha?</a>
                </div>
              </form>
            </div>

            <a href="<?php echo base_url('cadastro') ?>"> <h4><i class="icon icon-user"></i> Não tem conta? crie aqui</h4></a>
           
          </div>
        </div>
      </div>
    </section>