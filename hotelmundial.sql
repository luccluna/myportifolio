-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 15-Fev-2019 às 13:49
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelmundial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_alojamento`
--

DROP TABLE IF EXISTS `agenda_alojamento`;
CREATE TABLE IF NOT EXISTS `agenda_alojamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `pessoas` int(11) NOT NULL,
  `alojamentos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_agenda_alojamento_alojamentos1_idx` (`alojamentos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_alojamento`
--

INSERT INTO `agenda_alojamento` (`id`, `data`, `tipo`, `pessoas`, `alojamentos_id`) VALUES
(40, '19/07/2018', 'caravana', 3, 3),
(41, '20/07/2018', 'individual', 1, 2),
(42, '20/07/2018', 'individual', 1, 2),
(43, '20/07/2018', 'caravana', 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_alojamento_pessoas`
--

DROP TABLE IF EXISTS `agenda_alojamento_pessoas`;
CREATE TABLE IF NOT EXISTS `agenda_alojamento_pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `agenda_alojamento_id` int(11) NOT NULL,
  `responsavel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_agenda_alojamento_pessoas_agenda_alojamento1_idx` (`agenda_alojamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_alojamento_pessoas`
--

INSERT INTO `agenda_alojamento_pessoas` (`id`, `nome`, `email`, `telefone`, `cidade`, `sexo`, `agenda_alojamento_id`, `responsavel`) VALUES
(39, 'Jardel Nathan', 'jardelnathan22@hotmail.com', '3899913694', '13400241601', '', 40, 1),
(41, 'Diana Benson Resende', 'jardelnathan22@hotmail.com', '3899913694', 'Montes Claros', '', 42, 1),
(42, 'kennedy rafael', 'kennedytectotum@gmail.com', '38991712542', 'montes claros', '', 43, 1),
(43, 'farley amaral', 'farlei@medplim.com', '38999887788', 'montes claros', '', 43, 0),
(44, 'jardel natan', 'jardel@medplim.com', '38999767777', 'montes claros', '', 43, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alojamentos`
--

DROP TABLE IF EXISTS `alojamentos`;
CREATE TABLE IF NOT EXISTS `alojamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `vagas` int(11) NOT NULL,
  `data` text NOT NULL,
  `titulo` text NOT NULL,
  `imagem` text NOT NULL,
  `texto_breve` text NOT NULL,
  `preenchidos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alojamentos`
--

INSERT INTO `alojamentos` (`id`, `descricao`, `vagas`, `data`, `titulo`, `imagem`, `texto_breve`, `preenchidos`) VALUES
(2, '<p style=\"text-align: justify; \"><font face=\"Arial\">Com as ultimas chuvas nos rios afluentes, o rio são francisco encanta a todos que visitam Pirapora. As duchas estão transbordando e com este calor uma piscina natural.</font></p>', 10, '13-07-2018', 'O Rio São Francisco encanta seus visitantes', '6d9ef55ba327d6df6da873ca98648ab4.jpg', 'O rio são francisco encanta a todos que visitam Pirapora', 9),
(3, '<p style=\"text-align: justify; \"><font face=\"Arial\">Mais uma vez, a única embarcação a vapor navegável, o benjamim Guimarães, patrimônio histórico de Pirapora, será palco de uma novela global. Várias pessoas já estão literalmente a todo vapor, se preparando para gravar mais um campeão de audiência aqui em nossa cidade. Venha conhecer de perto como funciona os bastidores de gravação de uma novela global.</font></p>', 0, '1532022451', 'Vapor benjamim Guimarães é estrela global', 'd1418eddccbc357ca5a1d6df0796544b.jpg', 'O benjamim Guimarães', 1),
(4, '<p style=\"text-align: justify;\"><font face=\"Arial\">Serão 04 dias de muita folia. E desta vez é pra todo mundo! É de graça, é na praça. Grandes nomes da musica que animam, encantam e fazem o povo.</font></p>', 0, '1548757398', 'Pirapora terá carnaval', 'a703fbb5ecf14420192ef6ebdb64edd5.jpg', 'Serão 04 dias de muita folia.', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `data` text NOT NULL,
  `titulo` text NOT NULL,
  `imagem` text NOT NULL,
  `texto_breve` text NOT NULL,
  `preenchidos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `areas`
--

INSERT INTO `areas` (`id`, `descricao`, `data`, `titulo`, `imagem`, `texto_breve`, `preenchidos`) VALUES
(2, ' pretium tempus. Mus pariatur euismod amet! Do pariatur donec sint, consectetuer. Pretium sodales quaerat, habitant dignissimos tortor cillum anim at minim facilisi? Cum lacinia praesent condimentum, perspiciatis voluptates. Gravida omnis.', '13-07-2018', 'Alojamento 1', 'b74c82c07126ab0540fd724ed224cdc1.png', 'Alojamento 1', 9),
(3, '<p>Nascetur dictumst nostra cubilia soluta blanditiis? Voluptates ligula? Lorem sapien, ex itaque felis eos adipiscing vitae, etiam turpis magni nihil, integer repudiandae consequatur molestiae? Blanditiis ullamcorper leo nulla class maxime! Atque, fames labore ea condimentum vestibulum aliquam numquam faucibus adipiscing integer sollicitudin congue eiusmod etiam vitae animi ea wisi varius, cupiditate nonummy, varius quibusdam lobortis pellentesque sequi atque cras sed. Pulvinar exercitationem quasi laoreet quis consectetur adipisci dignissim sapien optio platea integer magna, facilisis, dolor ut, aut mauris, tempore laborum, habitasse necessitatibus dolorum curae semper! Cubilia suscipit quos aperiam, nam, fusce nunc neque senectus ipsam! Blandit, sem nibh ea perspiciatis.</p><div><br></div>', '1532022451', 'Alojamento 2', 'a7bfbe040fdca9c92d525470435ee9b9.jpg', 'Alojamento 2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) NOT NULL,
  `imagem_mobile` text NOT NULL,
  `titulo` text NOT NULL,
  `texto1` text NOT NULL,
  `texto2` text NOT NULL,
  `texto3` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `imagem`, `imagem_mobile`, `titulo`, `texto1`, `texto2`, `texto3`) VALUES
(12, 'fa1761454ec6d9e68e61dc76b102a97e.jpg', '', 'Entrada', 'Edifício com quatro andares', 'Infra-estrutura moderna, segura e arrojada', ''),
(13, 'fed5a7d8238a424ac7b0a7b34342023a.jpg', '', 'Quartos', 'Edifício com quatro andares', 'Infra-estrutura moderna, segura e arrojada', ''),
(14, 'd996f8e57fe2dfe362ed98c20e9323ad.jpg', '', 'Cafe da Manha', 'Edifício com quatro andares', 'Infra-estrutura moderna, segura e arrojada', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Livros'),
(2, 'Revistas'),
(5, 'Brindes'),
(6, 'Camisas'),
(7, 'Acessórios');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_produtos`
--

DROP TABLE IF EXISTS `categorias_produtos`;
CREATE TABLE IF NOT EXISTS `categorias_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorias_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorias_prosutos_categorias1_idx` (`categorias_id`),
  KEY `fk_categorias_prosutos_produtos1_idx` (`produtos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias_produtos`
--

INSERT INTO `categorias_produtos` (`id`, `categorias_id`, `produtos_id`) VALUES
(86, 1, 34),
(87, 1, 35),
(89, 1, 37),
(90, 1, 38),
(91, 1, 39),
(93, 1, 40),
(96, 2, 42),
(101, 2, 44),
(102, 2, 45),
(103, 2, 46),
(104, 2, 43),
(105, 2, 47),
(106, 2, 48),
(107, 2, 49),
(108, 2, 50),
(109, 2, 51),
(112, 2, 53),
(113, 2, 54),
(114, 2, 52),
(115, 1, 32),
(141, 2, 56),
(142, 5, 56),
(143, 6, 56),
(145, 5, 55),
(146, 6, 57),
(148, 1, 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `primeiro_nome` varchar(100) DEFAULT NULL,
  `ultimo_nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `senha` text NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(4) NOT NULL,
  `complemento` text,
  `token` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `primeiro_nome`, `ultimo_nome`, `email`, `telefone`, `senha`, `cpf`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `complemento`, `token`) VALUES
(2, 'jardel nathan de souza rodrigues', 'Jardel', 'Nathan', 'jardelnathan@hotmail.com', '(38) 9 9913-694', '202cb962ac59075b964b07152d234b70', '13.402.416-01', '39594-000', 'Manoel Ferreira Silva', 31, 'Alto da boa Vista', 'Itacambira', 'MG', '', ''),
(12, 'Jardel Nathan', NULL, '', 'jardel@hotmail.com', '(38) 9 9913-694', '202cb962ac59075b964b07152d234b70', '13.402.416-01', '39594-000', 'Rua Manoel Ferreira Silva', 0, 'Alto da boa Vista', 'Itacambira', 'MG', NULL, ''),
(13, 'Jardel Nathan', NULL, '', 'jardelnathan22@hotmail.com', '3899913694', '202cb962ac59075b964b07152d234b70', '132.132.151-54', '39594-000', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', NULL, '6ab8de05d86268003d18f514c2df595a32bd39f3'),
(14, 'Cliente Teste', NULL, '', 'teste@email.com', '(03) 8 9566-5465', '202cb962ac59075b964b07152d234b70', '134.654.654-84', '39400-037', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', NULL, ''),
(15, 'Jardel Nathan', NULL, '', 'jardelnathan222@hotmail.com', '(38) 9 9913-694', '202cb962ac59075b964b07152d234b70', '089.147.906-65', '39594-000', 'Alto da boa Vista', 22, 'Alto da boa Vista', 'Itacambira', 'MG', '', ''),
(16, 'Jardel Masculino Nathan', NULL, '', 'jardelnathan22@hotmail.co', '(38) 9 9913-694', '202cb962ac59075b964b07152d234b70', '123-13', '39594-000', 'Alto da boa Vista', 0, '313', '654', '6', '13', ''),
(17, 'Jardel Masculino Nathan', NULL, '', 'jardelnathasAS@hotmail.co', '(38) 9 9913-694', '1ffee7817e0fa1ff7560d85b1c2563eb', '115.800.856-28', '39594-000', 'Rua Maria Caldeira de Souza', 0, '\'12', 'Itacambira', 'MG', '', ''),
(18, 'Jardel Masculino Nathan', NULL, '', 'jardelnathan321@hotmail.com', '(38) 9 9913-694', '202cb962ac59075b964b07152d234b70', '115.800.856-28', '39594-000', 'Alto da boa Vista', 0, 'as', 'Itacambira', 'MG', 'asd', ''),
(19, 'Diana Benson Resende', NULL, '', 'jardelnathan31542@hotmail.com', '(38) 9 9913-694', 'c20ad4d76fe97759aa27a0c99bff6710', '115.800.856-28', '39400-037', 'Maria Caldeira de Sousa, 57', 0, 'João Gordo', 'Montes Claros', 'MG', '', ''),
(20, 'Jardel Nathan de Souza Rodrigues', NULL, '', 'jardelnathan123123123@hotmail.com', '(38) 9 9913-694', '202cb962ac59075b964b07152d234b70', '13', '39400-037', 'Rua Maria Caldeira de Souza', 123, 'João Gor123do', 'Montes Claros', 'MG', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text,
  `produtos_id` int(11) NOT NULL,
  `clientes_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `classificacao` int(11) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1' COMMENT '0:nao 1:sim',
  PRIMARY KEY (`id`),
  KEY `fk_comentarios_produtos1_idx` (`produtos_id`),
  KEY `fk_comentarios_clientes1_idx` (`clientes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `produtos_id`, `clientes_id`, `data`, `classificacao`, `ativo`) VALUES
(21, 'Bom!', 34, 2, '2018-03-16', 3, 1),
(22, 'teste', 35, 2, '2018-03-16', 5, 1),
(23, 'ótimo produto', 34, 2, '2018-03-19', 5, 1),
(24, 'teste', 34, 13, '2018-03-21', 5, 0),
(25, 'czxczxc', 34, 13, '2018-03-21', 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(100) NOT NULL,
  `endereco` text NOT NULL,
  `telefone1` varchar(100) NOT NULL,
  `telefone2` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `cidade`, `endereco`, `telefone1`, `telefone2`, `email`, `facebook`, `instagram`) VALUES
(1, '', 'Rua Tiradentes, 333 - Centro, Pirapora - MG', '(38) 3741 2926', '(38) 3741 2926', 'contato@hotelmundial.com.br', 'https://www.facebook.com/mundialhotel/?rf=1401687673213002', '#');

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimentos`
--

DROP TABLE IF EXISTS `depoimentos`;
CREATE TABLE IF NOT EXISTS `depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `titulo` text NOT NULL,
  `video` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `depoimentos`
--

INSERT INTO `depoimentos` (`id`, `descricao`, `titulo`, `video`) VALUES
(8, 'Visitei Pirapora novamente esse ano e fiquei no mesmo hotel. Primeiro pela localização que é ÓTIMA, segundo porque tinha gostado dos quartos e principalmente o custo benefício. Dessa vez usei a piscina do hotel e mesmo sendo pequena deu pra aproveitar bastante, fiz algumas solicitações e todas foram atendidas.', 'Pedro Antonio', ''),
(9, 'Eu estive no final de semana, muito bom perto da orla atravessou a avenida já esta pronto pra aproveitar o mar. Opções de restaurantes caminhando chega na passarela do caranguejo, passa pelos os monumentos dos formadores da identidade nacional, o oceanário bonito do lado do Hotel...', 'Dalia Perpetua ', ''),
(10, 'Esse é um maravilhoso hotel. Pessoas educadas, ótimos quartos, excelente café da manhã, ambiente tranquilo e próximo de tudo. Um dos meus hotéis mais prediletos. Quem se hospedar neste hotel, não irá se arrepender.', 'Kennedy Rafael', ''),
(12, 'Ótimo quarto e ótima localização, ótimo atendimento, excelente café da manhã, excelente limpeza do quarto, piscina limpa, ambiente tranquilo e aconchegante. Foi tudo muito bom, nada a reclamar. Voltaria outras vezes', 'Marco Felipe', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `envios`
--

DROP TABLE IF EXISTS `envios`;
CREATE TABLE IF NOT EXISTS `envios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `qtd` int(11) NOT NULL,
  `noticia` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `envios`
--

INSERT INTO `envios` (`id`, `data`, `qtd`, `noticia`, `email`) VALUES
(1, '2019-01-02 03:10:12', 123, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estrutura`
--

DROP TABLE IF EXISTS `estrutura`;
CREATE TABLE IF NOT EXISTS `estrutura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `imagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estrutura`
--

INSERT INTO `estrutura` (`id`, `titulo`, `texto`, `imagem`) VALUES
(3, 'Produtos de qualidade', 'Habitasse inventore totam aliquip veritatis maxime, mollitia magni. Eaque torquent sequi semper dolorum justo consequat, vivamus.', 'b10a18d6d98a74cc9828102213420b12.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria_alojamentos`
--

DROP TABLE IF EXISTS `galeria_alojamentos`;
CREATE TABLE IF NOT EXISTS `galeria_alojamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` text NOT NULL,
  `alojamento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_galeria_noticias_noticias1_idx` (`alojamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria_alojamentos`
--

INSERT INTO `galeria_alojamentos` (`id`, `imagem`, `alojamento_id`) VALUES
(1, 'b472b92eac1216d168ea9cc1e265827a.jpg', 4),
(2, '23e0bd35abc24c4b613febb84530a7ca.jpg', 3),
(3, '1a6a4e88b7760ad8d3d41956cc70f8ee.jpg', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria_noticias`
--

DROP TABLE IF EXISTS `galeria_noticias`;
CREATE TABLE IF NOT EXISTS `galeria_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` text NOT NULL,
  `noticias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_galeria_noticias_noticias1_idx` (`noticias_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria_noticias`
--

INSERT INTO `galeria_noticias` (`id`, `imagem`, `noticias_id`) VALUES
(1, '49c5e23ed8b97b41d1a981cc67003c29.jpg', 20),
(2, '6c11b6c88dcc53a68fc92867a3f1bfa2.jpg', 20),
(3, '39e1e49925be7b01c9c9c68d690b9b30.jpg', 20),
(4, 'f5e8a73dad833f661032e06823b7dbd4.jpg', 20),
(5, 'cec5a588e294d58a181aebf47812f8df.jpg', 20),
(6, 'fa7026310e729148054f7f15be0a28a0.jpg', 22),
(7, '4a6b051afa7f316177f7961f8ff40d21.jpg', 22),
(8, '945591420cb54f9fa40604a78599282c.jpg', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` text NOT NULL,
  `titulo` text NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id`, `imagem`, `titulo`, `descricao`) VALUES
(12, '20ab4456b7e459178f9970dca41bae60.jpg', 'Quarto 01', 'Foto Quarto '),
(13, '9cf2fa960a2c86299c65e90b621034b9.jpg', 'Quarto 02', 'Foto Quarto 02'),
(14, '6a544bb3e2fb15673371ad736b6e1777.jpg', 'Quarto 03', 'Foto Quarto 03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas_texto`
--

DROP TABLE IF EXISTS `marcas_texto`;
CREATE TABLE IF NOT EXISTS `marcas_texto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas_texto`
--

INSERT INTO `marcas_texto` (`id`, `texto`) VALUES
(1, '<div class=\"list-single-main-item-title fl-wrap\">\r\n                                    <h3>O seu conforto é o nosso objetivo.</h3>\r\n                                </div>\r\n                                <p>\r\n                                    Fruto de um espírito empreendedor, tendo como seus fundadores e investidores, o casal Sr. João Humberto Clemente e a Sra. Ligiane Clemente, O Hotel Mundial foi construído com o intuito de proporcionar aos seus clientes a mesma sensação de conforto e aconchego do lar, e tornar suas estadias em Pirapora, ainda mais prazerosas.\r\n                                </p>\r\n                                <p>Embora natural de outra cidade, o Sr. João Humberto, acreditou no potencial de Pirapora, ao investir no Hotel Mundial com o propósito de agregar valores à cidade e região, com o que há de melhor no ramo de hotelaria e desenvolvimento social. Fundado no ano de 2001, o Hotel Mundial iniciou suas atividades com apenas 15 apartamentos, nesse tempo ganhou mercado, renome, admiração e carinho de seus clientes e amigos, devido à hospitalidade desprendida dos seus proprietários e colaboradores. Hoje dispõe de 80 apartamentos cuidadosamente selecionados e categorizados, com a finalidade de realizar um atendimento personalizado.</p>\r\n                                \r\n                               \r\n                                <div class=\"list-single-main-item-title fl-wrap\" style=\"    padding-bottom: 10px;\">\r\n                                    <h3>Localização</h3>\r\n                                </div>\r\n\r\n                                <p>\r\n                                    Estrategicamente localizado no centro comercial da cidade de Pirapora, próximo aos pontos turísticos, centro de convenção (um dos maiores e mais modernos de Minas Gerais) e dos principais comércios da cidade. Favorece ainda o Turismo Executivo por estar localizado em frente ao Fórum e Prefeitura. A nossa cidade conta com um moderno Distrito Industrial de minério, tecelagem e possui um Terminal da Ferrovia Centro Atlântica (Porto Seco).\r\n                                </p>\r\n\r\n                                <div class=\"list-single-main-item-title fl-wrap\" style=\"    padding-bottom: 10px;\">\r\n                                    <h3>Paisagem</h3>\r\n                                </div>\r\n\r\n                                <p>\r\n                                    Há pouco mais de 40 metros da orla do maravilhoso Rio São Francisco, oferece uma vista deslumbrante das corredeiras, da ponte Marechal Hermes, e à tarde um lindíssimo pôr-do-sol, uma das mais belas paisagens à disposição, para quem hospeda no Hotel Mundial.\r\n                                </p>\r\n\r\n                                <div class=\"list-single-main-item-title fl-wrap\" style=\"    padding-bottom: 10px;\">\r\n                                    <h3>O que torna este um dos melhores hotéis de Minas Gerais?</h3>\r\n                                </div>\r\n\r\n                                <p>\r\n                                   Primeiro que ele é único como você. Suas acomodações são as melhores, e nele você encontra harmonia, felicidade e paz, que são riquíssimos ingredientes para uma excelente noite de sono.\r\n                                </p>\r\n\r\n                                <p>\r\n                                    Você pode escolher sua estadia com vista panorâmica para o rio e se deliciar com os balanços das águas da cachoeira, ou ao mais puro silêncio da neblina da noite. Nossos colaboradores são que há de melhor em excelência no mercado, com treinamentos atualizados, conhecimentos culturais e sociais da cidade. Temos uma agenda de eventos sempre atualizada a sua disposição. Por isso relaxe, utilize nossos serviços e aproveite bem sua estada.\r\n                                </p>\r\n\r\n                                <div class=\"list-single-main-item-title fl-wrap\" style=\"    padding-bottom: 10px;\">\r\n                                    <h3>Política de Qualidade</h3>\r\n                                </div>\r\n\r\n                                <p>\r\n                                    A Direção do Hotel Mundial definiu suas intenções em relação ao tema Qualidade, levando em consideração, a visão de futuro da empresa, sua vocação, seus valores, definindo assim sua política:\r\n                                </p>\r\n\r\n                                <p>\r\n                                    \r\n                                        - Prestar mais e melhores serviços aos nossos clientes, melhorando os processos continuamente;<br>\r\n                                        - Ser referência em hotelaria por seu charme, alto padrão de conforto, atendimento qualificado, personalizado e respeito ao meio ambiente. Bem como, atuar com profissionalismo e simpatia através do cumprimento das normas de gestão da qualidade visando sempre respeitar os processos de melhoramento contínuo e a satisfação total dos nossos clientes, fornecedores e colaboradores;<br>\r\n                                        - Manter melhor o conceito do nosso nome, com políticas favoráveis aos processos de hotelaria, alinhados ao meio ambiente;<br>\r\n                                        - Atender as legislações brasileiras e internacionais, com utilização dos melhores recursos a fim de garantir a eficácia dos resultados como favoráveis às políticas internas e externas da empresa.<br>\r\n\r\n                                </p>\r\n\r\n                                <div class=\"list-single-main-item-title fl-wrap\" style=\"    padding-bottom: 10px;\">\r\n                                    <h3>KNOW-HOW</h3>\r\n                                </div>\r\n\r\n                                <p>\r\n                                    Nosso know-how propicia total apoio e conveniência do ponto de vista do hóspede. Antevemos suas necessidades e anseios preocupando-nos em atendê-lo e surpreendê-lo.\r\n                                </p>\r\n\r\n\r\n\r\n                                <span class=\"fw-separator\"></span>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(2, 'jardelnathan22@hotmail.com'),
(3, 'asdasd'),
(4, 'asda@jasd.com'),
(5, 'dianabrese15@gmail.com'),
(6, 'kennedytectotum@gmail.com'),
(7, 'jardelnathan22@hotmail.com'),
(8, 'asdasd'),
(9, 'asda@jasd.com'),
(10, 'dianabrese15@gmail.com'),
(11, 'kennedytectotum@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `nome_url` varchar(255) DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `texto` mediumtext,
  `data` datetime DEFAULT NULL,
  `texto_breve` varchar(500) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `wifi` tinyint(4) NOT NULL,
  `arcondicionado` tinyint(4) NOT NULL,
  `cafedamanha` tinyint(4) NOT NULL,
  `acesso` tinyint(4) NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `nome_url`, `imagem`, `texto`, `data`, `texto_breve`, `autor`, `wifi`, `arcondicionado`, `cafedamanha`, `acesso`, `valor`) VALUES
(20, 'Suite Solteiro Premium', 'suite-solteiro-premium-1', '4a1483a2e4a25f4863cbe7059d95fbd1.jpg', '<p><span style=\"color: rgb(135, 140, 159);\"><font face=\"Arial\">O Hotel Mundial oferece aos seus clientes o que há de melhor e mais moderno em serviço de hotelaria, acomodações amplas e levemente decoradas com requinte e sofisticação, equipamentos eletro-eletrônicos – TV de LCD com canais à cabo, ar-condicionado, Painel de Controle na cabeceira da cama, acesso a internet com os melhores roteadores wi-fi, excelente velocidade e cobertura.</font></span><br></p>', '0000-00-00 00:00:00', 'Acomodação ampla, sofisticação, equipamentos eletronicos - tv de LSD com canais a cabo.', NULL, 1, 1, 1, 1, '80.00'),
(21, 'Suíte Solteiro Gold', 'suite-solteiro-gold-1', '4d6f4d3c3aeb0d0f44a95ea84d645d06.jpg', '<p><span style=\"color: rgb(135, 140, 159); font-family: Nunito, sans-serif;\">O Hotel Mundial oferece aos seus clientes o que há de melhor e mais moderno em serviço de hotelaria, acomodações amplas e levemente decoradas com requinte e sofisticação, equipamentos eletro-eletrônicos – TV de LCD com canais à cabo, ar-condicionado, Painel de Controle na cabeceira da cama, acesso a internet com os melhores roteadores wi-fi, excelente velocidade e cobertura.</span><br></p>', '0000-00-00 00:00:00', 'Acomodação ampla, sofisticação, equipamentos eletronicos - tv de LSD com canais a cabo.', NULL, 1, 1, 1, 0, '70.00'),
(22, 'Suíte Hidro Gold', 'suite-hidro-gold-1', '9b2b26251b122aff8a53d177335d253b.jpg', '<p><span style=\"color: rgb(135, 140, 159); font-family: Nunito, sans-serif;\">O Hotel Mundial oferece aos seus clientes o que há de melhor e mais moderno em serviço de hotelaria, acomodações amplas e levemente decoradas com requinte e sofisticação, equipamentos eletro-eletrônicos – TV de LCD com canais à cabo, ar-condicionado, Painel de Controle na cabeceira da cama, acesso a internet com os melhores roteadores wi-fi, excelente velocidade e cobertura.</span><br></p>', '0000-00-00 00:00:00', 'Acomodação ampla, sofisticação, equipamentos eletronicos - tv de LSD com canais a cabo.', NULL, 1, 1, 1, 1, '90.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(10,2) NOT NULL,
  `valor_frete` decimal(8,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `data` bigint(20) NOT NULL,
  `tipo_frete` varchar(10) DEFAULT NULL COMMENT '41106 - PAC\n40010 - SEDEX\n40215 - SEDEX10',
  `prazo` int(11) NOT NULL,
  `codigo_rastreio` varchar(20) DEFAULT NULL,
  `forma_pagamento` tinyint(1) NOT NULL COMMENT '1 - pagseguro\n2 - boleto',
  `codigo_pag` text NOT NULL,
  `tipo_pagamento` tinyint(1) DEFAULT NULL COMMENT '1 - Cartão de crédito\n2 - Boleto\n3 - Débito online\n4 - Saldo PagSeguro\n5 - Oi Paggo\n7 - Depósito em conta\n',
  `codigo_pedido` varchar(50) DEFAULT NULL,
  `status_pagseguro` int(11) NOT NULL DEFAULT '0',
  `status_pedido` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - Pagamento não inicializado\n1 - Aguardando confirmacao do pagamento\n2 - Pago\n3 - Em Transporte\n4 - Finalizado\n9 - cancelado',
  `id_transacao` varchar(100) DEFAULT NULL,
  `nome_cliente` varchar(200) DEFAULT NULL,
  `telefone_cliente` varchar(30) NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `rua_entrega` varchar(200) DEFAULT NULL,
  `numero_entrega` int(11) DEFAULT NULL,
  `bairro_entrega` varchar(200) DEFAULT NULL,
  `cidade_entrega` varchar(200) DEFAULT NULL,
  `estado_entrega` varchar(200) DEFAULT NULL,
  `cep_entrega` varchar(10) DEFAULT NULL,
  `complemento_entrega` varchar(255) DEFAULT NULL,
  `data_envio` int(11) DEFAULT NULL,
  `clientes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedidos_clientes1_idx` (`clientes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `valor`, `valor_frete`, `valor_total`, `data`, `tipo_frete`, `prazo`, `codigo_rastreio`, `forma_pagamento`, `codigo_pag`, `tipo_pagamento`, `codigo_pedido`, `status_pagseguro`, `status_pedido`, `id_transacao`, `nome_cliente`, `telefone_cliente`, `email_cliente`, `rua_entrega`, `numero_entrega`, `bairro_entrega`, `cidade_entrega`, `estado_entrega`, `cep_entrega`, `complemento_entrega`, `data_envio`, `clientes_id`) VALUES
(27, '253.19', '45.60', '298.79', 20180316, '0', 4, 'teste', 0, '', 1, 'U45.60-5aabfaa879cac', 0, 3, '9D2D7C83740E4447A9CEF1C77A0A015A', 'jardel nathan de souza rodrigues', '(38) 9 9913-694', 'jardelnathan@hotmail.com', 'Manoel Ferreira Silva', 31, 'Alto da boa Vista', 'Itacambira', 'MG', '39594-000', '', 1521224951, 2),
(28, '217.20', '18.60', '235.80', 20180320, '0', 1, NULL, 0, '', NULL, 'U18.60-5ab144cbcd1b6', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(29, '801.60', '52.20', '853.80', 20180321, '1', 5, NULL, 0, '', NULL, 'U55.80-5ab2ab96ae340', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(30, '801.60', '52.20', '853.80', 20180321, '1', 5, NULL, 0, '', NULL, 'U55.80-5ab2abdd09720', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(31, '217.20', '17.40', '234.60', 20180322, '1', 5, NULL, 0, '', NULL, 'U18.60-5ab3a3683f81e', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(32, '217.20', '17.40', '234.60', 20180323, '1', 5, NULL, 0, '', NULL, 'U18.60-5ab53bfc36b57', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(33, '217.20', '18.60', '235.80', 20180323, '0', 1, NULL, 0, '', NULL, 'U18.60-5ab53c71a480d', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(34, '217.20', '17.40', '234.60', 20180323, '1', 5, NULL, 0, '', NULL, 'U18.60-5ab53cc6bc0aa', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(35, '217.20', '17.40', '234.60', 20180405, '1', 5, NULL, 0, '', NULL, 'U18.60-5ac62838bf375', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(36, '71.50', '34.80', '106.30', 20180416, '1', 5, NULL, 0, '', NULL, 'U34.80-5ad4b3386392a', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(37, '71.50', '34.80', '106.30', 20180416, '1', 5, NULL, 0, '', NULL, 'U34.80-5ad4b3524bc3c', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(38, '71.50', '34.80', '106.30', 20180416, '0', 1, NULL, 0, '', NULL, 'U34.80-5ad4b44d2d551', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(39, '71.50', '34.80', '106.30', 20180416, '0', 1, NULL, 0, '', NULL, 'U34.80-5ad4b569aae32', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(40, '71.50', '34.80', '106.30', 20180416, '1', 5, NULL, 0, '', NULL, 'U34.80-5ad4bade965ad', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(41, '71.50', '34.80', '106.30', 20180416, '1', 5, NULL, 0, '', NULL, 'U34.80-5ad4bd076b0c9', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(42, '71.50', '34.80', '106.30', 20180416, '1', 5, NULL, 0, '', NULL, 'U34.80-5ad4bd2b20d73', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(43, '71.50', '34.80', '106.30', 20180416, '0', 1, NULL, 0, '', NULL, 'U34.80-5ad4bd7e18b8c', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(44, '71.50', '34.80', '106.30', 20180416, '1', 5, NULL, 0, '', NULL, 'U34.80-5ad4d4d1a9250', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(45, '71.50', '34.80', '106.30', 20180416, '1', 5, NULL, 0, '', NULL, 'U34.80-5ad4f4731c4fa', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(46, '71.50', '34.80', '106.30', 20180416, '1', 5, NULL, 0, '', NULL, 'U34.80-5ad4f49103568', 0, 0, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(47, '71.50', '34.80', '106.30', 20180416, '1', 5, '5ad4f4d4e3acc', 0, '', NULL, 'U34.80-5ad4f4d4e3acc', 0, 4, NULL, 'Jardel Nathan de souza', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 0, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, 1524513196, 13),
(48, '495.39', '57.60', '552.99', 20180712, '1', 5, NULL, 0, '', NULL, 'U68.40-5b478cbc58f34', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(49, '495.39', '52.20', '547.59', 20180712, '1', 5, NULL, 0, '', NULL, 'U55.80-5b478cdb2c757', 0, 0, NULL, 'Jardel Nathan', '(38) 99913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 54, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(50, '118.00', '17.40', '135.40', 20180717, '1', 5, NULL, 0, '', NULL, 'U17.40-5b4e28a428a3b', 0, 0, NULL, 'Jardel Nathan', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 54, 'João Gordo', 'Montes Claros', 'MG', '39400-037', NULL, NULL, 13),
(51, '118.00', '19.20', '137.20', 20180717, '1', 5, NULL, 0, '', NULL, 'U21.30-5b4e28b4ef5c5', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(52, '118.00', '19.20', '137.20', 20180717, '1', 5, NULL, 0, '', NULL, 'U21.30-5b4e2951b6b64', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(53, '118.00', '19.20', '137.20', 20180717, '1', 5, NULL, 0, '', NULL, 'U21.30-5b4e29a2f3a93', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(54, '118.00', '19.20', '137.20', 20180717, '1', 5, NULL, 0, '', NULL, 'U21.30-5b4e29accdf4e', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(55, '118.00', '19.20', '137.20', 20180717, '1', 5, NULL, 0, '', NULL, 'U21.30-5b4e29b613ce6', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(56, '177.00', '19.20', '196.20', 20180717, '1', 5, NULL, 0, '', NULL, 'U21.30-5b4e310d82861', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(57, '110.00', '40.00', '150.00', 20180719, NULL, 0, NULL, 0, '', NULL, 'U-5b509540872a0', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(58, '20.00', '20.00', '40.00', 20180719, NULL, 0, NULL, 0, '', NULL, 'U-5b50df25513c2', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(59, '20.00', '20.00', '40.00', 20180719, NULL, 0, NULL, 0, '', NULL, 'U-5b50e04751e40', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(60, '20.00', '20.00', '40.00', 20180719, NULL, 0, 'adadasd', 0, '', 1, 'U-5b50e16502b39', 0, 3, 'FAF5728ED49A48C3A79F4EAFC1DFFDF5', 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, 1532027434, 13),
(61, '40.00', '20.00', '60.00', 20180720, NULL, 0, NULL, 0, '', NULL, 'U-5b51e4ef0d16d', 0, 0, NULL, 'Jardel Nathan', '(38) 9 9913-694', 'jardelnathan22@hotmail.com', 'Rua Maria Caldeira de Souza', 54, 'João Gordo', 'Itacambira', 'MG', '39594-000', NULL, NULL, 13),
(62, '10.00', '10.00', '20.00', 20180720, NULL, 0, NULL, 0, '', NULL, 'U-5b5236bea5b1c', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(63, '30.00', '20.00', '50.00', 20180720, NULL, 0, NULL, 0, '', NULL, 'U-5b524ad081c3b', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(64, '30.00', '20.00', '50.00', 20180727, NULL, 0, NULL, 0, '', NULL, 'U-5b5b1c926b2e3', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(65, '30.00', '20.00', '50.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62fc472d7ea', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(66, '55.00', '40.00', '95.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62fcd126a1d', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(67, '55.00', '40.00', '95.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62fcde02adc', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(68, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62fd1f0d98d', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(69, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62fea90f6fd', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(70, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62febc7f096', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(71, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62fed3b744e', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(72, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62fee7bde58', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(73, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62ff08146d0', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(74, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62ff1ec7b2c', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(75, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62ff496c022', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(76, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62ff7692f81', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(77, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b62ffa6438e8', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(78, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b630202ae280', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(79, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b6302e4ab2d3', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(80, '80.00', '40.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b63051076daa', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(81, '100.00', '20.00', '120.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b63055b00ae4', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(82, '80.00', '20.00', '100.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b63077662143', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(83, '25.00', '20.00', '45.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b6350c2d8eca', 0, 0, NULL, 'Jardel Masculino Nathan', '(38) 9 9913-694', 'jardelnathan22@hotmail.co', 'Alto da boa Vista', 0, '313', '654', '6', '39594-000', '13', NULL, 16),
(84, '25.00', '20.00', '45.00', 20180802, NULL, 0, NULL, 0, '', NULL, 'U-5b635170ce9e0', 0, 0, NULL, 'Jardel Masculino Nathan', '(38) 9 9913-694', 'jardelnathan22@hotmail.co', 'Alto da boa Vista', 0, '313', '654', '6', '39594-000', '13', NULL, 16),
(85, '25.00', '20.00', '45.00', 20180803, NULL, 0, NULL, 0, '', NULL, 'U-5b646718d6442', 0, 10, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(86, '30.00', '20.00', '50.00', 20180813, NULL, 0, NULL, 0, 'DC5BAB8EC8C81C0FF46BFFBB375FBF4C', NULL, 'U-5b717a96d37b9', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(87, '30.00', '20.00', '50.00', 20180813, NULL, 0, NULL, 0, 'F906862EABABE75224F35FBE18AEF9E7', NULL, 'U-5b717b20a666e', 1, 10, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(88, '125.00', '20.00', '145.00', 20180813, NULL, 0, NULL, 0, '0A723BF57373BC011420FF954F6B136C', NULL, 'U-5b718ccfbf7a9', 0, 10, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(89, '30.00', '20.00', '50.00', 20180817, NULL, 0, NULL, 0, '657DD6B9E2E2BBCAA4B49FAAD180DC03', NULL, 'U-5b76b8ec9e282', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(90, '25.00', '20.00', '45.00', 20180817, NULL, 0, NULL, 0, '120634999191A58BB4D43F813D8E5932', NULL, 'U-5b76bb681cab6', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(91, '30.00', '20.00', '50.00', 20180823, NULL, 0, NULL, 0, '62E338A902026CCBB4A01F925744E738', NULL, 'U-5b7f043153861', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(92, '30.00', '20.00', '50.00', 20180823, NULL, 0, NULL, 0, '82BEFBB4CACADBD664F77F86DBF3D02E', NULL, 'U-5b7f04399a70b', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(93, '30.00', '20.00', '50.00', 20180823, NULL, 0, NULL, 0, '0E0B983A3A3A1542244D4FBCF187C424', NULL, 'U-5b7f045d58253', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(94, '30.00', '20.00', '50.00', 20180823, NULL, 0, NULL, 0, '43C2A24C1717998664AF8FBE3CB5E3D3', NULL, 'U-5b7f04ac739e0', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(95, '30.00', '20.00', '50.00', 20180823, NULL, 0, NULL, 0, 'DA79199F7474F34FF4CE4F8799DBA4DE', NULL, 'U-5b7f04d3133b9', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(96, '1.23', '1.23', '2.46', 20180823, NULL, 0, NULL, 0, '741F0B30151503533408AF8F67862006', NULL, 'U-5b7f17277ebcd', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(97, '1.23', '1.23', '2.46', 20180823, NULL, 0, NULL, 0, 'D22C9D990A0A754884AE7FB797B2E3EF', NULL, 'U-5b7f17c2b42e6', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(98, '1.23', '1.23', '2.46', 20180823, NULL, 0, NULL, 0, '6F2CABFD2727E19114476FBC01D4421D', NULL, 'U-5b7f17eadf778', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(99, '1.23', '1.23', '2.46', 20180823, NULL, 0, NULL, 0, '873103C7040418299453BF8568492092', NULL, 'U-5b7f1832915dc', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(100, '1.23', '1.23', '2.46', 20180823, NULL, 0, NULL, 0, 'BCEC28E88787DE6224F4DF941C2BB677', NULL, 'U-5b7f19c985207', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(101, '20.00', '20.00', '40.00', 20180823, NULL, 0, NULL, 0, 'E48EC99D76765AB9944A0F9EBF032129', NULL, 'U-5b7f1a152a054', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(102, '20.00', '20.00', '40.00', 20180823, NULL, 0, NULL, 0, '8C35F40B3939216CC4AD1F946F0DA579', NULL, 'U-5b7f1a4026a40', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(103, '20.00', '20.00', '40.00', 20180823, NULL, 0, NULL, 0, '72B83BDB4444C3E334AD5FA40A54C086', NULL, 'U-5b7f1a7b0b0aa', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(104, '8.61', '2.46', '11.07', 20180824, NULL, 0, NULL, 0, '4BB09C98D1D17B5334A60F9571EEE9C1', NULL, 'U-5b802637cd540', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(105, '10.00', '10.00', '20.00', 20180824, NULL, 0, '123', 0, '61198DE51D1D5D5AA4D2FF9EE7070AD0', NULL, 'U-5b802e2d0d984', 0, 3, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, 1535127151, 13),
(106, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, '1BDEAE933D3DD9A554B13F8C342C919C', NULL, 'U-5b8032b6bdf27', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(107, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, '6302D06B1919049BB4FFAFBADE6434FC', NULL, 'U-5b8032c94e254', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(108, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, 'A0EE5C1BC5C54532242FEFA9BA03F132', NULL, 'U-5b8032d925986', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(109, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, '9BBE095A3131652224CC7F951D8C42D5', NULL, 'U-5b8035a866d89', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(110, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, '8786AC684040AEF33477BF84080367C4', NULL, 'U-5b8036a98a039', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(111, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, 'F8EE2CE0A1A16F82249DEFB49495C25C', NULL, 'U-5b8036c68225e', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(112, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, '896ADB25FDFD745BB44DEFAD5E36A4AD', NULL, 'U-5b8037f18725b', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(113, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, '0755F76829290C8004FA6FA7C726CF0D', NULL, 'U-5b8039599e14e', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(114, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, 'FBD743F2C0C0ED5664DA2F900F002DF8', NULL, 'U-5b8041465693d', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(115, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, '925FD359C0C0416CC4F2CF8D74F88EC8', NULL, 'U-5b80416cf39c7', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(116, '1.23', '1.23', '2.46', 20180824, NULL, 0, NULL, 0, '211FA61D17170DDFF4214F8044938B2F', NULL, 'U-5b804191669d6', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(117, '35.00', '20.00', '55.00', 20180824, NULL, 0, NULL, 0, 'B798303D8181BAD114426FAEC018AC5C', NULL, 'U-5b804b7223fd3', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(118, '37.46', '22.46', '59.92', 20180824, NULL, 0, NULL, 0, '3561F789EFEFA73444DEBF8FE2E6CF92', NULL, 'U-5b804bd410b83', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(119, '93.69', '21.23', '114.92', 20180827, NULL, 0, NULL, 0, '4EF41F2BD1D173B444B87F8C828E597B', NULL, 'U-5b83ea521024f', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(120, '170.00', '1960.00', '2130.00', 20180827, NULL, 0, NULL, 0, 'F8186871B9B9B4D884A98F82866E7E56', NULL, 'U-5b83eb416a6a4', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(121, '135.00', '60.00', '195.00', 20180827, NULL, 0, NULL, 0, 'EA3EEFF466666EA0042E7FBF66B93B9E', NULL, 'U-5b83eb8035423', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(122, '407.46', '182.46', '589.92', 20180827, NULL, 0, NULL, 0, '6E1AB855F5F5671AA45FDFAD575B60D3', NULL, 'U-5b83ebe365f00', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13),
(123, '45.00', '20.00', '65.00', 20180827, NULL, 0, NULL, 0, 'C5CAC967A4A43E555409FF9EF4262D78', NULL, 'U-5b83ee890e3b7', 0, 0, NULL, 'Jardel Nathan', '3899913694', 'jardelnathan22@hotmail.com', 'Alto da boa Vista', 57, 'João Gordo', 'Itacambira', 'Mina', '39594-000', NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

DROP TABLE IF EXISTS `pedido_produto`;
CREATE TABLE IF NOT EXISTS `pedido_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `pedidos_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  `produto_tamanhos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_produto_pedidos1_idx` (`pedidos_id`),
  KEY `fk_pedido_produto_produtos1_idx` (`produtos_id`),
  KEY `fk_pedido_produto_produto_tamanhos1_idx` (`produto_tamanhos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido_produto`
--

INSERT INTO `pedido_produto` (`id`, `quantidade`, `pedidos_id`, `produtos_id`, `produto_tamanhos_id`) VALUES
(145, 1, 100, 56, 153),
(148, 1, 103, 40, NULL),
(149, 5, 104, 56, 153),
(150, 2, 104, 56, 155),
(151, 1, 105, 54, NULL),
(152, 1, 106, 56, 155),
(153, 1, 107, 56, 155),
(154, 1, 108, 56, 155),
(155, 1, 109, 56, 155),
(156, 1, 110, 56, 155),
(157, 1, 111, 56, 155),
(158, 1, 112, 56, 155),
(159, 1, 113, 56, 155),
(160, 1, 114, 56, 153),
(161, 1, 115, 56, 155),
(162, 1, 116, 56, 155),
(163, 1, 117, 57, 156),
(164, 1, 118, 56, 153),
(165, 1, 118, 57, 156),
(166, 1, 118, 55, 152),
(167, 3, 119, 56, 153),
(168, 2, 119, 41, NULL),
(169, 3, 120, 41, NULL),
(170, 1, 120, 57, 157),
(171, 3, 121, 41, NULL),
(172, 9, 122, 41, NULL),
(173, 2, 122, 56, 153),
(174, 1, 123, 41, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorias_id` int(11) DEFAULT '0',
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text,
  `valor` decimal(10,2) DEFAULT NULL,
  `imagem` text NOT NULL,
  `valor_antigo` decimal(10,2) DEFAULT NULL,
  `estoque` int(11) NOT NULL,
  `comprimento_embalagem` int(11) NOT NULL,
  `altura_embalagem` int(11) NOT NULL,
  `largura_embalagem` int(11) NOT NULL,
  `peso` decimal(6,3) NOT NULL,
  `ativo` tinyint(4) DEFAULT '1' COMMENT '1: sim   2 : não',
  `categoria_sexo` int(11) NOT NULL COMMENT '1 = MASCULINO 2 = FEMININO',
  `destaque` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: sim 0:nao',
  `detalhes` text NOT NULL,
  `valor_frete` varchar(100) NOT NULL,
  `tamanhos` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_produtos_categorias1_idx` (`categorias_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `categorias_id`, `titulo`, `descricao`, `valor`, `imagem`, `valor_antigo`, `estoque`, `comprimento_embalagem`, `altura_embalagem`, `largura_embalagem`, `peso`, `ativo`, `categoria_sexo`, `destaque`, `detalhes`, `valor_frete`, `tamanhos`) VALUES
(32, 1, 'Livro Essência Espírita', 'Livro Essência Espírita', '25.00', '73c24e541e01fbceb325a2658966b662.jpg', '35.00', 8, 16, 2, 11, '0.260', 1, 1, 1, '<p>Uma obra que faz sintonia com o que a Doutrina Espírita traz de essencial: Amar e seguir o caminho de Jesus, reformando a si mesmo. Um conjunto de cartas para estudarmos nosso íntimo e verificar se nossos passos estão no mesmo caminho que o Cristo nos convida. </p>', '20.00', 0),
(34, 1, 'Livro Mais Amor', 'Livro Mais Amor', '20.00', '2c2ed362e4ae5b24bcacfa66c1702272.jpg', '30.00', 0, 16, 2, 11, '1.000', 1, 1, 1, '<p>Uma obra que transmite o entendimento do amor sublime, sempre no intuito de permitir o aprimoramento moral e espiritual da humanidade.<br></p>', '20.00', 0),
(35, 1, 'Livro Relatos de Esperança', 'Livro Relatos de Esperança', '30.00', '08fa6d0b318af3026499a45be32fc181.jpg', '40.00', 0, 16, 2, 12, '0.300', 1, 1, 1, '<p>Belíssima obra que traz 20 relatos daqueles que de forma simples e objetiva contam como foi a experiência encarnados e a visão que tiveram ao retornar à vida espiritual. Suicídio, homossexualismo, sequestro, vingança, caridade, materialismo, doença... Um livro onde cada relato de dor, deverá ter um brilho de alegria.<br></p>', '20.00', 0),
(37, 1, 'Livro Compromisso Espírita', 'Livro Compromisso Espírita', '20.00', 'c136fa99d512726566b510bf4dcb11c1.jpg', '30.00', 18, 16, 2, 11, '1.000', 1, 1, 0, '<p>União, renúncia, abnegação, alegria, trabalho e tantas outras palavras fazem parte desta obra, que deixa claramente para nós que, provavelmente, estamos dentro da Doutrina Espírita, mas será que ela está dentro de nós?<br></p>', '20.00', 0),
(38, 1, 'Livro Palavras Amigas', 'Livro Palavras Amigas', '20.00', '881aa1a30258135dbd35b856e69a58bf.jpg', '30.00', 0, 16, 2, 11, '0.000', 1, 0, 0, '<p>\"Ânimo e conforto para encarar as lutas com mais otimismo e consciência\". Que as mensagens aqui contidas possam despertar-nos para uma vida mais saudável e alegre. Psicografia de Julio Carvalho, pelo Irmão Expedito</p><div><br></div>', '20.00', 0),
(39, 1, 'Livro Roteiro de Luz', 'Livro Roteiro de Luz', '20.00', '43bad27198c40e56fdb1754bb3e6962c.jpg', '30.00', 5, 16, 2, 11, '0.000', 1, 0, 0, '<p>Esta obra simplesmente auxilia a conscientizar-nos sobre a diretriz do Evangelho de Jesus, pois indica as rotas de luz ao recomendar amar, perdoar, esquecer o mal, trabalhar e comprometer-se com o bem. É um conjunto de dissertações para que reflita em torno da grande necessidade de nossas existências: Amar!<br></p>', '20.00', 0),
(40, 1, 'Livro Proposta para o Bem', 'Livro Proposta para o Bem', '20.00', '9e5e5bacd81498114849b0c42b4c36ea.jpg', '0.00', 5, 16, 11, 20, '0.000', 1, 0, 0, '<p>Este livro traz em singelas mensagens um convite para a lembrança do que o Cristo nos trouxe há mais de 2 mil anos. São textos, poemas e trovas que exaltam a importância da prática do Evangelho nos seus diversos pontos.<br></p>', '20.00', 0),
(41, 1, 'Livro Pétalas de Gabriela', 'Livro Pétalas de Gabriela', '45.00', '3a19ac7e7c5e98119204183c332aee02.jpg', '55.00', 5047, 16, 11, 11, '0.000', 1, 0, 0, '<p>Neste romance histórico, Pólux envolve o leitor do início ao fim, no dinamismo dramático dos personagens e na amplitude histórica da narrativa, recheada de tramas, traições, reviravoltas e desfechos inesperados. Uma oportunidade preciosa de reflexão sobre nosso papel nessa existência e sobre os valores morais e espirituais que devemos perseguir no dia-a-dia. <br></p>', '20.00', 0),
(42, 2, 'Assinatura Revista Iluminar', 'Assinatura Revista Iluminar', '240.00', 'd95c87eea9b78a3bc64393d0e4b16bb3.jpg', '260.00', 5, 16, 2, 11, '5.000', 1, 0, 0, '<p>A assinatura é feita à partir da 20º edição da revista. Você recebe as 4 edições: 20, 21, 22 e 23 de imediato. Depois recebe mensalmente o exemplar referente ao mês que será lançado.</p><p><b>Revista Iluminar</b></p><p>A forma mais inteligente de auxiliar aos que mais necessitam. Com a revista Iluminar, você recebe todo mês matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor.&nbsp;&nbsp;</p><p>Faça sua assinatura! São 12 parcelas de R$ 20,00 no cartão, cuja renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Verifique opção no boleto.<br></p>', '10.00', 0),
(43, 2, 'Edição 23 - Ansiedade', 'Edição 23 - Ansiedade', '20.00', '4f48edd86b68ff53f4bf0e158f51aeab.jpg', '30.00', 5, 20, 20, 20, '0.400', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor. </p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!</p>', '10.00', 0),
(44, 2, 'Edição 22 - Aniversário Instituto', 'Edição 22 - Aniversário Instituto', '20.00', '64b29d42c3d2d637d44766f04216fdea.jpg', '30.00', 65, 18, 10, 15, '50.000', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor. </p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!<br></p>', '10.00', 0),
(45, 2, 'Edição 21 - Emancipação da Alma', 'Edição 21 - Emancipação da Alma', '20.00', '75fa3b7fb5053b09d50e39b51f9e8e17.jpg', '30.00', 5, 20, 20, 20, '0.040', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor. </p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!</p>', '10.00', 0),
(46, 2, 'Edição 20 - A Cura Pela Fé', 'Edição 20 - A Cura Pela Fé', '20.00', 'c3730b960393c6e3da951a3a6574e7f0.jpg', '30.00', 5, 20, 20, 20, '0.500', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor.&nbsp;</p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!</p>', '0.00', 0),
(47, 2, 'Edição 19 - Perdão', 'Edição 19 - Perdão', '20.00', 'c0265eafc6199e28c06b4341a94284e5.jpg', '30.00', 5, 20, 20, 20, '0.020', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor.&nbsp;</p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!</p>', '10.00', 0),
(48, 2, 'Edição 18 - Sexualidade', 'Edição 18 - Sexualidade', '20.00', 'ee5fcb37cd6dfa1142f814b39b14bc0f.jpg', '30.00', 5, 20, 20, 20, '0.020', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor.&nbsp;</p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!</p>', '10.00', 0),
(49, 2, 'Edição 17 - Suicídio', 'Edição 17 - Suicídio', '20.00', 'c4032a463cf3730293a25a9958f6e51e.jpg', '30.00', 5, 20, 20, 20, '0.020', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor.&nbsp;</p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!</p>', '5.00', 0),
(50, 2, 'Edição 16 - Apoio a Vida', 'Edição 16 - Apoio a Vida', '20.00', '87b4adfa098ee39804c89770efa62bd9.jpg', '30.00', 5, 20, 20, 20, '0.020', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor.&nbsp;</p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!</p>', '0.00', 0),
(51, 2, 'Edição 15 - Há Muitas Moradas na Casa de meu Pai', 'Edição 15 - Há Muitas Moradas na Casa de meu Pai', '20.00', '7b53ea77fcc04bfdf5f1dee711f8c932.jpg', '30.00', 5, 20, 20, 20, '5.000', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor.&nbsp;</p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!</p>', '5.00', 0),
(52, 2, 'Edição 14 - 160 Anos O Consolador Prometido', 'Edição 14 - 160 Anos O Consolador Prometido', '20.00', '082e63a7a0c0591c3da9ad577eec5190.jpg', '30.00', 5, 20, 20, 20, '0.555', 1, 0, 0, '<p>Adquirindo a revista Iluminar, você tem acesso às matérias de grandes parceiros, como Quincas Veloso, William Jacob, Ala Mitchel, Ana Tereza Camasmie, Dra. Karina Alvarenga, além de cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos às vistas da Doutrina Espírita, a agenda do médium e tudo sobre o Instituto Espírita do Amor. </p><p>Em troca de todo conhecimento, você auxilia em nossos projetos assistenciais, pois a renda é 100% revertida aos nossos mais de 1 mil assistidos semanalmente. Escolha o tema e boa leitura!</p>', '5.00', 0),
(53, 2, 'kit 1 - Edições 1, 2 e 3', 'kit 1 - Edições 1, 2 e 3', '10.00', 'e24e0e0e5bb2e5a228f56a2d94864a1f.jpg', '15.00', 5, 20, 20, 20, '0.005', 1, 0, 0, '<p>Para você que não tem as primeiras edições da Revista Iluminar e quer completar sua coleção ou mesmo presentear, temos os kits com as edições 1, 2, 3. Você vai se surpreender com os artigos de nossos amigos e parceiros sobre a doutrina espírita! Tenha em mãos as cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos.&nbsp;</p><p>Amai-vos e instruí-vos!<br></p>', '10.00', 0),
(54, 2, 'kit 2 - Edições 4, 5 e 6', 'kit 2 - Edições 4, 5 e 6', '10.00', 'f045cbb5a3f31083fc25f635bec11195.jpg', '15.00', 4, 20, 20, 20, '0.020', 1, 0, 0, '<p>Para você que não tem as primeiras edições da Revista Iluminar e quer completar sua coleção ou mesmo presentear, temos os kits com as edições 4, 5, 6. Você vai se surpreender com os artigos de nossos amigos e parceiros sobre a doutrina espírita! Tenha em mãos as cartas consoladoras, artigos sobre Chico Xavier e Kardec e sempre uma matéria de capa recheada de ensinamentos.&nbsp;</p><p>Amai-vos e instruí-vos!</p>', '10.00', 0),
(55, 5, 'PRODUTO TESTE', '123', '1.23', 'ab607446047cba8751ab2a57f47f0821.png', '1.23', 0, 123, 123, 2131, '300.021', 1, 0, 0, '<p>123</p>', '1.23', 1),
(56, 2, 'PRODUTO TAMANHOS', '123', '1.23', 'fb49502a32bb324bdeeb250954afd794.png', '1.23', 0, 123, 123, 123, '0.123', 1, 0, 0, '<p>123</p>', '1.23', 1),
(57, 6, 'Camisa ', 'Camiseta Instituto Espírita do Amor', '35.00', '874acb949e7f6117ee2c3ec472c3a302.jpg', '0.00', 0, 16, 2, 11, '0.100', 1, 0, 0, '<p><div class=\"clear\" style=\"box-sizing: border-box; clear: both; display: block; font-size: 0px; height: 0px; line-height: 0; width: 843.594px; overflow: hidden; color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"></div></p><div class=\"single-product\" style=\"box-sizing: border-box; color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"product\" style=\"box-sizing: border-box; position: relative; width: 843.594px; margin: 0px;\"><div class=\"col_half col_last product-desc\" style=\"box-sizing: border-box; width: 404.922px; display: block; position: relative; margin-right: 0px !important; margin-bottom: 50px; float: left; clear: right; padding: 0px; font-size: 14px;\"><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 30px; line-height: 1.8;\">Preta (malha)<br style=\"box-sizing: border-box;\"></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 30px; line-height: 1.8;\"></p></div></div></div>', '20.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_fotos`
--

DROP TABLE IF EXISTS `produtos_fotos`;
CREATE TABLE IF NOT EXISTS `produtos_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(45) DEFAULT NULL,
  `produtos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produtos_fotos_produtos1_idx` (`produtos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_fotos`
--

INSERT INTO `produtos_fotos` (`id`, `foto`, `produtos_id`) VALUES
(2, 'f3bf1230bee7e12099a5609055d17e091.png', 54);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_tamanhos`
--

DROP TABLE IF EXISTS `produto_tamanhos`;
CREATE TABLE IF NOT EXISTS `produto_tamanhos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tamanhos_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id`,`tamanhos_id`,`produtos_id`),
  KEY `fk_produto_tamanhos_tamanho_numeracao1_idx` (`tamanhos_id`),
  KEY `fk_produto_tamanhos_produtos1_idx` (`produtos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto_tamanhos`
--

INSERT INTO `produto_tamanhos` (`id`, `tamanhos_id`, `produtos_id`, `quantidade`) VALUES
(137, 6, 32, 0),
(139, 6, 34, 0),
(140, 6, 35, 0),
(142, 6, 37, 0),
(143, 6, 38, 0),
(144, 6, 39, 0),
(146, 6, 40, 0),
(148, 6, 41, 0),
(152, 2, 55, 11),
(153, 1, 56, 115),
(154, 3, 56, 0),
(155, 4, 56, 0),
(156, 4, 57, 48),
(157, 5, 57, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes_home`
--

DROP TABLE IF EXISTS `promocoes_home`;
CREATE TABLE IF NOT EXISTS `promocoes_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` text NOT NULL,
  `horario` text NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `promocoes_home`
--

INSERT INTO `promocoes_home` (`id`, `imagem`, `horario`, `descricao`) VALUES
(1, 'd81c8620eaa0ff09864731dd6b80a816.png', '<h5 style=\"font-family: Montserrat; color: rgb(255, 64, 0); margin: 30px 0px; text-transform: uppercase; background-color: rgba(36, 36, 36, 0.5);\">SEGUNDA A SEXTA</h5><span class=\"open-hours\" style=\"margin: 0px; font-family: Montserrat; font-size: 24px; color: rgb(255, 255, 255); background-color: rgba(36, 36, 36, 0.5);\">08:00&nbsp;<span style=\"position: relative; font-size: 18px; line-height: 0; vertical-align: baseline; top: -0.5em;\">A.M</span>&nbsp;- 17:00<span style=\"position: relative; font-size: 18px; line-height: 0; vertical-align: baseline; top: -0.5em;\">P.M</span></span><span style=\"color: rgb(255, 255, 255); font-family: Montserrat; font-size: 12px; background-color: rgba(36, 36, 36, 0.5);\"></span><h5 style=\"font-family: Montserrat; color: rgb(255, 64, 0); margin: 30px 0px; text-transform: uppercase; background-color: rgba(36, 36, 36, 0.5);\">SÁBADO E DOMINGO</h5><span class=\"open-hours\" style=\"margin: 0px; font-family: Montserrat; font-size: 24px; color: rgb(255, 255, 255); background-color: rgba(36, 36, 36, 0.5);\">08:00&nbsp;<span style=\"position: relative; font-size: 18px; line-height: 0; vertical-align: baseline; top: -0.5em;\">A.M</span>&nbsp;- 13:00&nbsp;<span style=\"position: relative; font-size: 18px; line-height: 0; vertical-align: baseline; top: -0.5em;\">P.M</span></span>', 'Vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes_produtos`
--

DROP TABLE IF EXISTS `promocoes_produtos`;
CREATE TABLE IF NOT EXISTS `promocoes_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `imagem` text NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `promocoes_produtos`
--

INSERT INTO `promocoes_produtos` (`id`, `link`, `imagem`, `descricao`) VALUES
(1, 'asd', 'e1a76a78bfc6bfed4b15dcff45742049.jpg', 'asd'),
(2, 'asd', 'e1a76a78bfc6bfed4b15dcff457420491.jpg', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes_slides`
--

DROP TABLE IF EXISTS `promocoes_slides`;
CREATE TABLE IF NOT EXISTS `promocoes_slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `icone` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `promocoes_slides`
--

INSERT INTO `promocoes_slides` (`id`, `titulo`, `descricao`, `icone`) VALUES
(3, '#USELAMITIE', 'Enviamos para todo o Brasil.', 'fa-truck'),
(4, '#uselamitie', 'Enviamos para todo o Brasil.', ' fa-truck');

-- --------------------------------------------------------

--
-- Estrutura da tabela `secao1`
--

DROP TABLE IF EXISTS `secao1`;
CREATE TABLE IF NOT EXISTS `secao1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `texto` text NOT NULL,
  `imagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `secao1`
--

INSERT INTO `secao1` (`id`, `titulo`, `texto`, `imagem`) VALUES
(1, 'INSTITUTO ESPÍRITA DO AMOR', 'O Instituto Espírita do Amor (Grupo Espírita Eurípedes Barsanulfo), foi fundado publicamente em 01/05/2015 por um pequeno grupo de pessoas que se preocupavam com o bem-estar do semelhante.', '69b33d586744ef718c5495fa50f0f128.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `titulo` text NOT NULL,
  `imagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `descricao`, `titulo`, `imagem`) VALUES
(2, ' pretium tempus. Mus pariatur euismod amet! Do pariatur donec sint, consectetuer. Pretium sodales quaerat, habitant dignissimos tortor cillum anim at minim facilisi? Cum lacinia praesent condimentum, perspiciatis voluptates. Gravida omnis.', 'Alojamento 1', '5800ac2cd52a59e06e8eb86dc762b787.jpg'),
(3, '<p>Nascetur dictumst nostra cubilia soluta blanditiis? Voluptates ligula? Lorem sapien, ex itaque felis eos adipiscing vitae, etiam turpis magni nihil, integer repudiandae consequatur molestiae? Blanditiis ullamcorper leo nulla class maxime! Atque, fames labore ea condimentum vestibulum aliqua</p><div><br></div>', 'Alojamento 2', 'dc1bdba93f0995321af466a651eff045.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

DROP TABLE IF EXISTS `tamanhos`;
CREATE TABLE IF NOT EXISTS `tamanhos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tamanho` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `tamanhos` (`id`, `tamanho`) VALUES
(1, 'PP'),
(2, 'P'),
(3, 'M'),
(4, 'G'),
(5, 'GG'),
(6, 'U'),
(7, '33'),
(8, '34'),
(9, '35'),
(10, '36'),
(11, '37'),
(12, '38'),
(13, '39'),
(14, '40'),
(15, '41'),
(16, '42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `textos`
--

DROP TABLE IF EXISTS `textos`;
CREATE TABLE IF NOT EXISTS `textos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sobre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `textos`
--

INSERT INTO `textos` (`id`, `sobre`) VALUES
(2, 'INSTITUCIONAL\r\nFruto de um espírito empreendedor, tendo como seus fundadores e investidores, o casal Sr. João Humberto Clemente e a Sra. Ligiane Clemente, O Hotel Mundial foi construído com o intuito de proporcionar aos seus clientes a mesma sensação de conforto e aconchego do lar.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transparencia`
--

DROP TABLE IF EXISTS `transparencia`;
CREATE TABLE IF NOT EXISTS `transparencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `transparencia`
--

INSERT INTO `transparencia` (`id`, `nome`, `descricao`) VALUES
(5, 'Jardel', 'teste'),
(6, 'Jardel Nathan', 'Doaçao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0 - bloqueado\n1 - ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `senha`, `email`, `status`) VALUES
(1, 'Suporte', '115.800.856-28', '202cb962ac59075b964b07152d234b70', 'marcos@tec.com', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agenda_alojamento`
--
ALTER TABLE `agenda_alojamento`
  ADD CONSTRAINT `fk_agenda_alojamento_alojamentos1` FOREIGN KEY (`alojamentos_id`) REFERENCES `alojamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `agenda_alojamento_pessoas`
--
ALTER TABLE `agenda_alojamento_pessoas`
  ADD CONSTRAINT `fk_agenda_alojamento_pessoas_agenda_alojamento1` FOREIGN KEY (`agenda_alojamento_id`) REFERENCES `agenda_alojamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `categorias_produtos`
--
ALTER TABLE `categorias_produtos`
  ADD CONSTRAINT `fk_categorias_prosutos_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categorias_prosutos_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `galeria_noticias`
--
ALTER TABLE `galeria_noticias`
  ADD CONSTRAINT `fk_galeria_noticias_noticias1` FOREIGN KEY (`noticias_id`) REFERENCES `noticias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD CONSTRAINT `fk_pedido_produto_pedidos1` FOREIGN KEY (`pedidos_id`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_produto_produto_tamanhos1` FOREIGN KEY (`produto_tamanhos_id`) REFERENCES `produto_tamanhos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_produto_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos_fotos`
--
ALTER TABLE `produtos_fotos`
  ADD CONSTRAINT `fk_produtos_fotos_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto_tamanhos`
--
ALTER TABLE `produto_tamanhos`
  ADD CONSTRAINT `fk_produto_tamanhos_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_tamanhos_tamanho_numeracao1` FOREIGN KEY (`tamanhos_id`) REFERENCES `tamanhos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
