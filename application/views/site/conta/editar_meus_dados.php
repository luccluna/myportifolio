  <section id="page-title" class="page-title-mini">
      <div class="container clearfix">
        <h1>Editar Meus Dados</h1>
        
      </div>
    </section>

    <section id="content">
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">
            
            <div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>Editar</div>
            <div class="acc_content clearfix">
              <form id="register-form" name="register-form" class="nobottommargin" action="<?php echo base_url('salvar-editar-perfil') ?>" method="post">
               <div class="row">
                    <div class="col-md-12">
                      <label>Nome</label>
                      <input  type="text" placeholder="Nome" name="nome" class="form-control" value="<?php echo $perfil->nome ?>">
                    </div>
                     <div class="col-md-12">
                       <label>E-mail</label>
                      <input  type="text" placeholder="E-mail" name="email" class="form-control" value="<?php echo $perfil->email ?>">
                    </div>
                     <div class="col-md-6">
                       <label>CPF</label>
                      <input  type="text" placeholder="Seu CPF" name="cpf" class="form-control" value="<?php echo $perfil->cpf ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Telefone</label>
                      <input  type="text" placeholder="Telefone" name="telefone" class="form-control" value="<?php echo $perfil->telefone ?>">
                    </div>
                </div>

                <div class="box">

                  <div class="row">
                    <div class="col-md-10">
                      <label>Rua</label>
                      <input type="text" placeholder="Rua" name="rua" class="form-control" value="<?php echo $perfil->rua ?>">
                    </div>
                    <div class="col-md-2">
                      <label>Número</label>
                      <input type="text" placeholder="Nº" name="numero" class="form-control" value="<?php echo $perfil->numero ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label>CEP</label>
                      <input type="text" placeholder="CEP" name="cep" id="cep1" class="form-control" value="<?php echo $perfil->cep ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Bairro</label>
                      <input type="text" placeholder="Bairro" name="bairro" id="bairro" class="form-control" value="<?php echo $perfil->bairro ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Cidade</label>
                      <input type="text" placeholder="Cidade" name="cidade" id="cidade" class="form-control" value="<?php echo $perfil->cidade ?>">
                    </div>
                    <div class="col-md-2">
                      <label>UF</label>
                      <input type="text" placeholder="UF" name="estado" id="uf" class="form-control" value="<?php echo $perfil->estado ?>">
                    </div>
                     <div class="col-md-4">
                      <label>Complemento</label>
                      <input type="text" placeholder="Complemento" name="complemento" class="form-control" value="<?php echo $perfil->complemento ?>">
                    </div>
                  </div>
                  </div>

                  <div align="" class="col-md-12 nobottommargin" >
                    <a href="<?php echo base_url('editar-perfil') ?>">
                  <button class="button button-3d button-black nomargin" type="submit"  style="width: 100%" name="login-form-submit" value="login">Salvar</button>
                    </a>
                </div>
            </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <style type="text/css">
      .form-control{
        margin-bottom: 10px;
      }
    </style>