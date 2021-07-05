  <section id="page-title" class="page-title-mini">
      <div class="container clearfix">
        <h1>Meus Dados</h1>
        
      </div>
    </section>
<!--End Banner-->
<div class="page-content">          
  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <ul>
            <li class="home"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><span>//</span></li>
            <li class="home"><a href="<?php echo base_url('perfil') ?>"><i class="fa fa-user"></i> Meu Perfil</a></li>
            <li><span>//</span></li>
            <li class="category-2"><a href="javascritp:void(0)">Meus dados</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>




  <div class="product-check-out">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="checkout">                                            
            <div class="checkout-row row">
              <div class="log-in col-md-6">
                <div class="title">Dados Pessoais</div>
                <div class="box">

                  <div class="row">
                    <div class="col-md-12">
                      <input value="<?php echo isset($dados->nome)? $dados->nome : '' ?>" disabled type="text" placeholder="Nome" name="nome" class="input-text">
                    </div>
                     <div class="col-md-12">
                      <input value="<?php echo isset($dados->email)? $dados->email : '' ?>" disabled type="text" placeholder="E-mail" name="email" class="input-text">
                    </div>
                     <div class="col-md-6">
                      <input value="<?php echo isset($dados->cpf)? $dados->cpf : '' ?>" disabled type="text" placeholder="Seu CPF" name="cpf" class="input-text">
                    </div>
                    <div class="col-md-6">
                      <input value="<?php echo isset($dados->telefone)? $dados->telefone : '' ?>" disabled type="text" placeholder="Telefone" name="telefone" class="input-text">
                    </div>
                   
                  </div>

                </div>
              </div>
              <div class="coupon col-md-6">
                <div class=" ">
                <div class="title">Endereço</div>
                <div class="box">

                  <div class="row">
                    <div class="col-md-10">
                      <input value="<?php echo isset($dados->rua)? $dados->rua : '' ?>" disabled type="text"  placeholder="Rua" name="rua" class="input-text">
                    </div>
                    <div class="col-md-2">
                      <input value="<?php echo isset($dados->numero)? $dados->numero : '' ?>" disabled type="text" placeholder="Nº" name="numero" class="input-text">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <input value="<?php echo isset($dados->cep)? $dados->cep : '' ?>" disabled type="text" placeholder="CEP" name="cep" id="cep1" class="input-text">
                    </div>
                    <div class="col-md-6">
                      <input value="<?php echo isset($dados->bairro)? $dados->bairro : '' ?>" disabled type="text" placeholder="Bairro" name="bairro" id="bairro" class="input-text">
                    </div>
                    <div class="col-md-6">
                      <input value="<?php echo isset($dados->cidade)? $dados->cidade : '' ?>" disabled type="text" placeholder="Cidade" name="cidade" id="cidade" class="input-text">
                    </div>
                    <div class="col-md-2">
                      <input value="<?php echo isset($dados->estado)? $dados->estado : '' ?>" disabled type="text" placeholder="UF" name="estado" id="uf" class="input-text">
                    </div>
                     <div class="col-md-4">
                      <input value="<?php echo isset($dados->complemento)? $dados->complemento : ""  ?>" disabled type="text" placeholder="Complemento" name="complemento" class="input-text">
                    </div>
                  </div>

                  <div class="row">
                   

                  </div>
                  <div class="row">
                    <a href="<?php echo base_url('editar-perfil') ?>"><div align="right" class="col-md-12">
                    <button type="submit" title="Cadastrar" class="button">
                    <em class="fa-icon"><i class="fa fa-pencil"></i></em>
                    <span>Editar</span>
                  </button>    
                  </a>
                    </div>
                  </div>
                  

                </div>
              </div>
            </div>



          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<style type="text/css">
  .input-text{
    color: #FF4000 !important;
  }
</style>



<script type="text/javascript">
  $(document).ready(function(){
   $('[name=telefone]').mask('(00) 0 0000-0000');
   $('[name=cpf]').mask('000.000.000-00', {reverse: true});
   $('[name=cep]').mask('00000-000');
   $('[name=estado]').mask('AA');
 });
</script>




<script type="text/javascript">

  $(document).ready(function() {

    function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
          }

        //Quando o campo cep perde o foco.
        $("#cep1").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#uf").val("");
                    $("#ibge").val("");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                      if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            swal("CEP não encontrado.");
                          }
                        });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    swal("Formato de CEP inválido.");
                  }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
              }
            });
      });

    </script>
