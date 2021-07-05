<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//->login
$route['login']                                     = "Admin/login";
$route['validar-login']                             = "Admin/validar_login";
$route['logout']                                    = "Admin/logout";

$route['site']                                      = "Site_institucional";
$route['home']                                      = "Admin/home";

//-->banner
$route['site/videos']                              = "Site_videos/lista";
$route['site/novo-video']                          = "Site_videos/novo_video";
$route['site/salvar-video']                        = "Site_videos/salvar_video";
$route['site/editar-video']                        = "Site_videos/editar_video";
$route['site/excluir-video']                       = "Site_videos/excluir_video";

//-->Estrutura
$route['site/estrutura']                              = "Site_estrutura/lista";
$route['site/novo-estrutura']                          = "Site_estrutura/novo_estrutura";
$route['site/salvar-estrutura']                        = "Site_estrutura/salvar_estrutura";
$route['site/editar-estrutura']                        = "Site_estrutura/editar_estrutura";
$route['site/excluir-estrutura']                       = "Site_estrutura/excluir_estrutura";


$route['site/contato']                       = "Site_contato";
$route['site/salvar-contato']                       = "Site_contato/salvar_contato";


//-->banner2 - HOME

$route['site/horario']                          = "Site_banners/horario";
$route['site/salvar-horario']                        = "Site_banners/salvar_horario";
$route['site/editar-promocoes-home']                        = "Site_banners/editar_promocoes_home";
$route['site/excluir-promocoes-home']                       = "Site_banners/excluir_promocoes_home";
//-->banner2 - HOME

$route['site/promocoes-produtos']                          = "Site_banners/promocoes_produtos";
$route['site/salvar-promocoes-produtos']                        = "Site_banners/salvar_promocoes_produtos";
$route['site/editar-promocoes-produtos']                        = "Site_banners/editar_promocoes_produtos";
$route['site/excluir-promocoes-produtos']                       = "Site_banners/excluir_promocoes_produtos";


//-->SECAO1
$route['site/secao1']                          = "Site_secao1/novo_secao1";
$route['site/salvar-secao1']                        = "Site_secao1/salvar_secao1";
$route['site/editar-secao1']                        = "Site_secao1/editar_secao1";
$route['site/excluir-secao1']                       = "Site_secao1/excluir_secao1";

//-->sobre
$route['site/sobre']                                = "Site_sobre";
$route['site/salvar-sobre']                         = "Site_sobre/salvar_sobre";

//-->institucional
$route['site/institucional']                       = "Site_institucional";
$route['site/editar-institucional']                = "Site_institucional/editar_institucional";
$route['site/editar-certificacao']                 = "Site_institucional/editar_certificacao";
$route['site/editar-servicos']                     = "Site_institucional/editar_servicos";
$route['site/editar-termos']                       = "Site_institucional/editar_termos";
$route['site/editar-termos-de-uso']                = "Site_institucional/editar_termos_de_uso";
$route['site/editar-termos-uso']                   = "Site_institucional/editar_termo_uso";


$route['site/certificacao']                        = "Site_institucional/certificacao";
$route['site/servicos-publicos']                   = "Site_institucional/servicos_publicos";


$route['site/ead']                   			   = "Site_institucional/ead";
$route['site/editar-ead']                   	   = "Site_institucional/editar_ead";



$route['site/termos-de-uso']                        = "Site_institucional/termos_de_uso";
$route['site/salvar-institucional']                 = "Site_institucional/salvar_institucional";

//-->proposta-pedagogica
$route['site/proposta-pedagogica']                  = "Site_proposta_pedagogica";
$route['site/salvar-proposta-pedagogica']           = "Site_proposta_pedagogica/salvar_proposta_pedagogica";

//-->contrato
$route['site/contrato']                             = "Site_contrato";
$route['site/salvar-contrato']                      = "Site_contrato/salvar_contrato";


//-->anuncios
$route['site/anuncios']                             = "Site_anuncios";
$route['site/salvar-anuncios']                      = "Site_anuncios/salvar_anuncios";

$route['site/usuarios']                               = "Site_usuarios";
$route['site/novo-usuario']                          = "Site_usuarios/nova";
$route['site/editar-usuario']                          = "Site_usuarios/editar_usuario";
$route['site/excluir-usuario']                        = "Site_usuarios/excluir";
$route['site/salvar-usuario']                        = "Site_usuarios/salvar_usuario";
$route['site/salvar-conteudo']                        = "Site_usuarios/salvar_conteudo";

//Comentários
$route['loja/comentarios']                          = "Site_comentarios";
$route['loja/nova-comentarios']                     = "Site_comentarios/nova";
$route['loja/excluir-comentario']                   = "Site_comentarios/excluir";
$route['loja/salvar-comentarios']                   = "Site_comentarios/salvar_comentarios";
$route['loja/desativar-comentario']                 = "Site_comentarios/desativar_comentarios";

//-->sk-centro
$route['site/solido-centro']                        = "Site_sk_centro";
$route['site/salvar-solido-centro']                 = "Site_sk_centro/salvar_sk_centro";

//-->sk-parque
$route['site/solido-parque']                        = "Site_sk_parque";
$route['site/salvar-solido-parque']                 = "Site_sk_parque/salvar_sk_parque";

//-->matriculas
$route['site/matricula']                            = "Site_matriculas";
$route['site/salvar-matricula']                     = "Site_matriculas/salvar_matricula";

//-->noticias
$route['site/noticias']                              = "Site_noticias/lista";
$route['site/nova-noticia']                          = "Site_noticias/nova_noticia";
$route['site/adicionar-galeria']                     = "Site_noticias/adicionar_galeria";
$route['site/salvar-galeria']                     = "Site_noticias/salvar_galeria";
$route['site/salvar-noticia']                        = "Site_noticias/salvar_noticia";
$route['site/editar-noticia']                        = "Site_noticias/editar_noticia";
$route['site/excluir-noticia']                       = "Site_noticias/excluir_noticia";
$route['site/galeria-noticia']                       = "Site_noticias/galeria";
$route['site/excluir-galeria']                       = "Site_noticias/galeria_excluir";




//-->eventos
$route['site/eventos']                              = "Site_eventos/lista";
$route['site/novo-evento']                          = "Site_eventos/novo_evento";
$route['site/salvar-evento']                        = "Site_eventos/salvar_evento";
$route['site/editar-evento']                        = "Site_eventos/editar_evento";
$route['site/excluir-evento']                       = "Site_eventos/excluir_evento";
$route['site/salvar-imagem']                       = "Site_eventos/salvar_imagem";
$route['site/imagem-evento']                      = "Site_eventos/imagem";
$route['site/excluir-imagem']                      = "Site_eventos/imagem_excluir";
$route['site/adicionar-imagem']                     = "Site_eventos/adicionar_imagem";


//-->eventos
$route['site/areas']                              = "Site_areas/lista";
$route['site/novo-area']                          = "Site_areas/novo_area";
$route['site/salvar-area']                        = "Site_areas/salvar_area";
$route['site/editar-area']                        = "Site_areas/editar_area";
$route['site/excluir-area']                       = "Site_areas/excluir_area";


$route['site/depoimentos']                              = "Site_depoimentos/lista";
$route['site/novo-depoimento']                          = "Site_depoimentos/novo_depoimento";
$route['site/salvar-depoimento']                        = "Site_depoimentos/salvar_depoimento";
$route['site/editar-depoimento']                        = "Site_depoimentos/editar_depoimento";
$route['site/excluir-depoimento']                       = "Site_depoimentos/excluir_depoimento";


//-->eventos
$route['site/servicos']                              = "Site_servicos/lista";
$route['site/novo-servico']                          = "Site_servicos/novo_servico";
$route['site/salvar-servico']                        = "Site_servicos/salvar_servico";
$route['site/editar-servico']                        = "Site_servicos/editar_servico";
$route['site/excluir-servico']                       = "Site_servicos/excluir_servico";

//agendamentos
$route['agenda/lista']                    		    = "Site_eventos/lista_agendamentos";
$route['agenda/lista-pessoas']                    		    = "Site_eventos/lista_pessoas";
$route['agenda/excluir']                    		    = "Site_eventos/excluir_pessoa";




//-->galerias
$route['site/galerias']                             = "Site_galerias_fotos/lista";
$route['site/nova-galeria']                         = "Site_galerias_fotos/nova_galeria";
$route['site/add-fotos']                            = "Site_galerias_fotos/add_fotos";
// $route['site/salvar-galeria']                       = "Site_galerias_fotos/salvar_galeria";
$route['site/salvar-fotos']                         = "Site_galerias_fotos/salvar_fotos";
$route['site/editar-galeria']                       = "Site_galerias_fotos/editar_galeria";


//-->videos
$route['site/videos']                               = "Site_videos/lista";
$route['site/novo-video']                           = "Site_videos/novo_video";
$route['site/salvar-video']                         = "Site_videos/salvar_video";
$route['site/editar-video']                         = "Site_videos/editar_video";
$route['site/excluir-video']                        = "Site_videos/excluir_video";

//-->news letter
$route['site/modal-email']                          = "Site_news_letter/modal";
$route['site/news-letter']                          = "Site_news_letter";
$route['site/disparar-email']                          = "Site_news_letter/disparar";

//->menu loja
$route['loja']                                      = "Loja_categorias";

//-->categorias
$route['loja/categorias']                           = "Loja_categorias/lista";
$route['loja/nova-categoria']                       = "Loja_categorias/novo_categoria";
$route['loja/salvar-categoria']                     = "Loja_categorias/salvar_categoria";
$route['loja/editar-categoria']                     = "Loja_categorias/editar_categoria";
$route['loja/excluir-categoria']                    = "Loja_categorias/excluir_categoria";


//-->tamanhos
$route['loja/tamanhos']                           = "Loja_tamanhos/lista";
$route['loja/nova-tamanho']                       = "Loja_tamanhos/novo_tamanho";
$route['loja/criar-tamanho']                       = "Loja_tamanhos/criar_tamanho";
$route['loja/salvar-tamanho']                     = "Loja_tamanhos/salvar_tamanho";
$route['loja/salvar-novo-tamanho']                     = "Loja_tamanhos/salvar_novo_tamanho";
$route['loja/editar-tamanho']                     = "Loja_tamanhos/editar_tamanho";
$route['loja/excluir-tamanho']                    = "Loja_tamanhos/excluir_tamanho";

//-->promocoes_slides
$route['loja/promocoes-slides']                    = "Loja_promocoes_slides/lista";
$route['loja/nova-promocao']                       = "Loja_promocoes_slides/novo_promocao";
$route['loja/salvar-promocao']                     = "Loja_promocoes_slides/salvar_promocao";
$route['loja/editar-promocao']                     = "Loja_promocoes_slides/editar_promocao";
$route['loja/excluir-promocao']                    = "Loja_promocoes_slides/excluir_promocao";

//-->produtos
$route['loja/produtos']                             = "Loja_produtos/lista";
$route['loja/novo-produto']                         = "Loja_produtos/novo_produto";
$route['loja/salvar-produto']                       = "Loja_produtos/salvar_produto";
$route['loja/editar-produto']                       = "Loja_produtos/editar_produto";
$route['loja/excluir-produto']                      = "Loja_produtos/excluir_produto";
$route['loja/desativar-produto']                    = "Loja_produtos/desativar_produto";
$route['loja/destacar-produto']                     = "Loja_produtos/destacar_produto";
$route['loja/fotos-produto']                        = "Fotos_produtos/lista";
$route['loja/excluir-foto']                         = "Fotos_produtos/excluir_galeria";
$route['loja/add-fotos']                            = "Fotos_produtos/add_fotos";
$route['loja/salvar-fotos']                         = "Fotos_produtos/salvar_fotos";

//-->clientes
$route['loja/clientes']                             = "Loja_clientes/lista";
$route['loja/enderecos']                            = "Loja_clientes/lista_enderecos";

//-->pedidos
$route['loja/pedidos']                               = "Loja_pedidos/lista";
$route['loja/detalhes-pedido']                       = "Loja_pedidos/detalhes_pedido";
$route['loja/imprimir']                              = "Loja_pedidos/detalhes_pedido";
$route['loja/editar-pedido']                         = "Loja_pedidos/editar_pedido";
$route['loja/salvar-pedido']                         = "Loja_pedidos/salvar_pedido";
$route['loja/salvar-rastreio']                       = "Loja_pedidos/salvar_rastreio";
$route['finalizar-pedido']                       = "Loja_pedidos/finalizar_pedido";


//-->projetos de lei
$route['site/projetos']                                   = "Site_projetos_lei/lista";
$route['site/novo-projeto']                               = "Site_projetos_lei/novo_projeto";
$route['site/salvar-projeto-lei']                         = "Site_projetos_lei/salvar_projeto";
$route['site/editar-projeto']                         	  = "Site_projetos_lei/editar_projeto";
$route['site/excluir-projeto']                         	  = "Site_projetos_lei/excluir_projeto";



//-->Enquetes
$route['site/enquetes']                           	= "enquetes/Enquetes/lista";
$route['site/nova-enquete']                      	= "enquetes/Enquetes/nova_enquete";
$route['site/editar-enquete']                      	= "enquetes/Enquetes/editar_enquete";
$route['site/salvar-enquete']                       = "enquetes/Enquetes/salvar_nova_enquete";
$route['site/mudar-status-enquete-ativar']          = "enquetes/Enquetes/mudar_status_ativar";
$route['site/detalhes-enquete']       			    = "enquetes/Enquetes/detalhes_enquete";
$route['site/mudar-status-enquete-desativar']       = "enquetes/Enquetes/mudar_status_desativar";


//-->Denuncias
$route['site/denuncias']                           	= "denuncias/denuncias/lista";
$route['site/lista-denuncias']                       = "denuncias/denuncias/lista_denuncias";
$route['site/novo-tipo-denuncia']                   = "denuncias/denuncias/tela_novo_tipo";
$route['site/salvar-novo-tipo']                   = "denuncias/denuncias/salvar_novo_tipo";
$route['site/editar-tipo-denuncia']                 = "denuncias/denuncias/tela_editar_tipo";


//-->eleicao final
$route['site/eleicao-final']                          = "eleicaoFinal/EleicaoFinal/lista";
$route['site/nova-eleicao']                           = "eleicaoFinal/EleicaoFinal/nova_eleicao";
$route['site/pegar-estados']                          = "eleicaoFinal/EleicaoFinal/pegar_estados";
$route['site/pegar-cidades']                          = "eleicaoFinal/EleicaoFinal/pegar_cidades";
$route['site/salvar-eleicao']                         = "eleicaoFinal/EleicaoFinal/salvar_eleicao";
$route['site/editar-eleicao']                         = "eleicaoFinal/EleicaoFinal/editar_eleicao";
$route['site/excluir-eleicao']                        = "eleicaoFinal/EleicaoFinal/excluir_eleicao";


//-> Candidatos Oficiais

$route['site/candidatos-oficiais']                    = "candidatosOficiais/Site_candidatos_oficiais/lista";
$route['site/novo-candidato-oficial']                 = "candidatosOficiais/Site_candidatos_oficiais/novo_candidato";
$route['site/salvar-candidato-oficial']               = "candidatosOficiais/Site_candidatos_oficiais/salvar_candidato";
$route['site/editar-candidato-oficial']               = "candidatosOficiais/Site_candidatos_oficiais/editar_candidato";
$route['site/excluir-candidato-oficial']              = "candidatosOficiais/Site_candidatos_oficiais/excluir_candidato_oficial";


//processos
$route['site/processos']							= "processos/lista";
$route['site/novo-processo']						= "processos/novo_processo";
$route['site/salvar-processo']						= "processos/salvar_processo";
$route['site/detalhes-processo']					= "processos/detalhes_processo";
$route['site/editar-processo']						= "processos/editar_processo";
$route['site/excluir-processo']						= "processos/excluir_processo";



$route['site/filtro-palavrao']              		 = "filtro_palavrao/Filtro_palavrao/lista";
$route['site/filtro-palavrao-nova']             	 = "filtro_palavrao/Filtro_palavrao/nova_palavra";
$route['site/filtro-palavrao-salvar-palavra']        = "filtro_palavrao/Filtro_palavrao/salvar_palavra";
$route['site/filtro-palavrao-editar-palavra']        = "filtro_palavrao/Filtro_palavrao/editar_palavra";
$route['site/filtro-palavrao-excluir-palavra']       = "filtro_palavrao/Filtro_palavrao/excluir_palavra";



$route['site/utilidade']                   	   = "Site_institucional/utilidade_publica";

$route['site/salvar-utilidade']                   	   = "Site_institucional/salvar_utilidade";
$route['site/nova-utilidade']                   	   = "Site_institucional/nova_utilidade";
$route['site/editar-utilidade']                   	   = "Site_institucional/editar_utilidade";
$route['site/excluir-utilidade']                   	   = "Site_institucional/excluir_utilidade";





//-->Estrutura
$route['site/transparencia']                              = "Site_transparencia/lista";
$route['site/novo-transparencia']                          = "Site_transparencia/novo_transparencia";
$route['site/salvar-transparencia']                        = "Site_transparencia/salvar_transparencia";
$route['site/editar-transparencia']                        = "Site_transparencia/editar_transparencia";
$route['site/excluir-transparencia']                       = "Site_transparencia/excluir_transparencia";
