<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Site';//'Site/cadastro_candidato';
$route['home'] = 'Site';//'Site/cadastro_candidato';
$route['home/(:num)'] = 'Site/index/$1';//'Site/cadastro_candidato';
$route['404_override'] = 'Site/error';
$route['translate_uri_dashes'] = FALSE;

//->site
$route['info']                           = "Site/home";



$route['detalhes-produto/(:num)/(:any)']               = "Site/detalhes_produto/$1/$1";
$route['pesquisar-produtos']             = "Site/pesquisar_produtos";
$route['produtos/(:any)']                = "Site/produtos";
$route['acomodacoes/(:num)']                = "Site/produtos/$1";
$route['produtos/(:any)/(:num)']         = "Site/produtos";
$route['endereco']                 		 = "Site/modal_endereço";
$route['acomodacoes']                  	 = "Site/produtos";
$route['contato']                 		 = "Site/contato";
$route['pre-reservas']                 		 = "Site/pre_reservas";
$route['envia-email-contato']            = "Site/envia_contato";
$route['email-ok']            = "Site/ok";

$route['mapa']							 = "Site/mapa";

// Carrinho
$route['add-carrinho']                   = "Carrinho/add_carrinho";
$route['remove-carrinho']                = "Carrinho/remove_carrinho";
$route['remove-todos-carrinho']          = "Carrinho/remove_todos_carrinho";
$route['finalizar']                 	 = "Carrinho/confirma_carrinho";
$route['modal-carrinho']                 = "Carrinho/modal_carrinho";
$route['novo-carrinho']                  = "Carrinho/novo_carrinho";
$route['carrinho']                     	 = "Carrinho/carrinho";


//MODAL LOGIN
$route['modal-login']                    = "Site/modal_login";

//MODAL Pedidos
$route['modal-pedido']                   = "Perfil/modal_pedido";

//assina-newsletter
$route['assina-newsletter']           = "Site/assina_newsletter";


//--->CONTA
$route['login']                          ="Perfil/tela_login";
$route['cadastro']                       ="Perfil/cadastro";
$route['cadastrar-usuario']              = "Perfil/salvar_cadastro";
$route['pedido-detalhes']          		 = 'Site/pedido_detalhes';
$route['meus-pedidos']          		 = 'Site/meus_pedidos';
$route['logar']                 		 = "Perfil/login";
$route['logar-modal']                 	 = "Perfil/login_modal";
$route['perfil']                 		 = "Perfil/perfil";
$route['editar-perfil']                  = "Perfil/editar_perfil";
$route['salvar-editar-perfil']           = "Perfil/salvar_editar_perfil";
$route['meus-dados']                 	 = "Perfil/meus_dados";
$route['recuperar-senha']                = "Perfil/recuperar_senha";
$route['nova-senha']                  	 = "Perfil/nova_senha";
$route['atualizar-senha']                = "Perfil/atualizar_senha";
$route['salvar-nova-senha']              = "Perfil/salvar_atualizacao_senha";
$route['sair']                   		 = "Perfil/sair";

//Comentários
$route['salvar-comentario']                   		 = "Site/salvar_comentario";


//SOBRE
$route['sobre']                  		 = "Site/sobre";
$route['clientes']                  		 = "Site/clientes";
$route['parceiros']                  		 = "Site/parceiros";


$route['atuacoes']                  		 = "Site/atuacoes";
$route['area/(:num)']                  		 = "Site/area/$1";


$route['servicos']                  		 = "Site/servicos";


$route['depoimentos']                  		 = "Site/depoimentos";
$route['depoimentos/(:num)']                  		 = "Site/depoimentos/$1";
$route['noticia-video/(:num)']                  		 = "Site/noticia_video/$1";

$route['satisfacao']                  		 = "Site/satisfacao";


$route['informativos/(:any)']                  		 = "Site/publicacoes/$1";
$route['informativos/(:any)/(:num)']                  		 = "Site/publicacoes/$1/$1";

$route['detalhes-informativo/(:num)']               = "Site/publicacao/$1";


//agenda
$route['agenda']                  		 = "Alojamento";
$route['agendar']                  		 = "Alojamento/agendar";
$route['finalizar-agendamento']          = "Alojamento/finalizar_agendamento";
$route['sucesso-agendamento']          = "Alojamento/sucesso_agendamento";
$route['error-agendamento']          = "Alojamento/error_agendamento";


$route['alojamento-detalhes']            = "Alojamento/detalhes";

//doacao
$route['doe']                  			 = "Doacao";
//$route['estado/(:any)']                     = "Site/estado";

$route['blog']                              = "Blog";
$route['blog-busca']                              = "Blog/busca";
$route['blog/(:num)']                       = 'Blog/index/$1';
$route['blog/(:any)']                        = 'Blog/visualizar/$1';


//LOJA
$route['loja/finalizar']                    = 'Loja/fechar_pedido';
$route['loja/pagamento-finalizado']         = 'Loja/pagamento_finalizado';
$route['loja/notificacoes-pag']          	= 'Loja/notificacoes_pagseguro';
$route['loja/calcular-frete']          		= 'Loja/calcula_frete';
$route['loja/pedido-finalizado']          	= 'Loja/pedido_finalizado';
$route['loja/atualiza-pagseguro']          	= 'Loja/atualiza_pagseguro';



$route['transparencia']          	= 'Transparencia/tranferencia_pag';
