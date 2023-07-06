-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Jun-2023 às 17:49
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `supermercado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `idavaliacao` int NOT NULL AUTO_INCREMENT,
  `nota` int NOT NULL,
  `comentario` varchar(150) NOT NULL,
  `pedido` int NOT NULL,
  PRIMARY KEY (`idavaliacao`),
  KEY `fk_avaliacao_pedido1_idx` (`pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `idcarrinho` int NOT NULL,
  `produto` int NOT NULL,
  `quantidade` int NOT NULL,
  `data` date NOT NULL,
  `cliente` int NOT NULL,
  PRIMARY KEY (`idcarrinho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

DROP TABLE IF EXISTS `cartao`;
CREATE TABLE IF NOT EXISTS `cartao` (
  `idcartao` int NOT NULL AUTO_INCREMENT,
  `nomeCartao` varchar(50) NOT NULL,
  `bandeira` varchar(25) NOT NULL,
  `numero` int NOT NULL,
  `cvv` int NOT NULL,
  `idcliente` int NOT NULL,
  PRIMARY KEY (`idcartao`,`idcliente`),
  KEY `fk_cartao_cliente1_idx` (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `cartao`
--

INSERT INTO `cartao` (`idcartao`, `nomeCartao`, `bandeira`, `numero`, `cvv`, `idcliente`) VALUES
(1, 'Gleidson R ', 'visa', 0, 115, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `imgCategoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nomeCategoria`, `imgCategoria`) VALUES
(1, 'Açougue', './img/ctg/açougue.png'),
(2, 'Bebidas', './img/ctg/bebidas.png'),
(3, 'Biscoitos', './img/ctg/biscoitos.png'),
(4, 'Frios & Laticínios', './img/ctg/frios.png'),
(5, 'Hortifruti', './img/ctg/hortifruti.png'),
(6, 'Limpeza', './img/ctg/limpeza.png'),
(7, 'Mercearia', './img/ctg/mercearia.png'),
(8, 'Padaria', './img/ctg/padaria.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `usuario_cliente` int NOT NULL,
  KEY `usuario_cliente` (`usuario_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`usuario_cliente`) VALUES
(0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhesdopedido`
--

DROP TABLE IF EXISTS `detalhesdopedido`;
CREATE TABLE IF NOT EXISTS `detalhesdopedido` (
  `quantidade` int DEFAULT NULL,
  `valorTotal` float DEFAULT NULL,
  `pedido` int NOT NULL,
  `produto` int NOT NULL,
  KEY `fk_detalhesDoPedido_pedido1_idx` (`pedido`),
  KEY `fk_detalhesDoPedido_produto1_idx` (`produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `usuario_funcionario` int NOT NULL,
  PRIMARY KEY (`usuario_funcionario`),
  KEY `usuario_funcionario` (`usuario_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `infoenvio`
--

DROP TABLE IF EXISTS `infoenvio`;
CREATE TABLE IF NOT EXISTS `infoenvio` (
  `codEnvio` int NOT NULL AUTO_INCREMENT,
  `endereco` varchar(45) NOT NULL,
  `cliente` int NOT NULL,
  PRIMARY KEY (`codEnvio`),
  KEY `fk_infoEnvio_cliente1_idx` (`cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `infoenvio`
--

INSERT INTO `infoenvio` (`codEnvio`, `endereco`, `cliente`) VALUES
(1, 'Rua dos Bobos', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercado`
--

DROP TABLE IF EXISTS `mercado`;
CREATE TABLE IF NOT EXISTS `mercado` (
  `cnpj` int NOT NULL,
  `nomeMercado` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `mercado`
--

INSERT INTO `mercado` (`cnpj`, `nomeMercado`, `endereco`) VALUES
(0, 'Compra Certa', 'Rua dos Bobos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `status` int NOT NULL,
  `dataDaCompra` date NOT NULL,
  `pedidoAvaliado` int NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `fk_pedido_cliente_idx` (`userId`),
  KEY `fk_pedido_statusPedido1_idx` (`status`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `userId`, `status`, `dataDaCompra`, `pedidoAvaliado`) VALUES
(1, 0, 3, '0000-00-00', 0),
(75, 0, 2, '0000-00-00', 0),
(76, 0, 4, '0000-00-00', 0),
(77, 0, 1, '0000-00-00', 0),
(78, 0, 4, '0000-00-00', 0),
(79, 0, 1, '0000-00-00', 0),
(80, 0, 5, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidositem`
--

DROP TABLE IF EXISTS `pedidositem`;
CREATE TABLE IF NOT EXISTS `pedidositem` (
  `idPedidoItem` int NOT NULL AUTO_INCREMENT,
  `idProduto` int NOT NULL,
  `precoPedido` float NOT NULL,
  `quantidadePedido` int NOT NULL,
  `sessionId` varchar(100) NOT NULL,
  PRIMARY KEY (`idPedidoItem`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `pedidositem`
--

INSERT INTO `pedidositem` (`idPedidoItem`, `idProduto`, `precoPedido`, `quantidadePedido`, `sessionId`) VALUES
(1, 0, 4, 1, ''),
(2, 1, 1, 1, 'gdo0pns5tkl2ggfmm33e5o8705'),
(3, 1, 1, 1, '1q68kgu34keekg0n9n5clovbd9'),
(34, 2, 7.99, 1, 'eelsq9r9tg92bbmablsuujisia'),
(35, 4, 4.59, 1, 'eelsq9r9tg92bbmablsuujisia'),
(36, 2, 7.99, 5, 'eelsq9r9tg92bbmablsuujisia'),
(137, 4, 4.59, 1, 'jqon4s7827ktu6ee4rsgj8n1fo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `precoProduto` float NOT NULL,
  `categoriaProduto` int NOT NULL,
  `mercado` int NOT NULL,
  `imgProduto` varchar(45) NOT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `fk_produto_mercado1_idx` (`mercado`),
  KEY `fk_produto_categoria1_idx` (`categoriaProduto`) USING BTREE,
  KEY `categoriaProduto` (`categoriaProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nomeProduto`, `precoProduto`, `categoriaProduto`, `mercado`, `imgProduto`) VALUES
(2, 'Óleo de Soja Soya Pet 900ML', 7.99, 7, 0, './img/produtos/oleo.png'),
(3, 'Açúcar Cristal Pinheiro 1KG', 3.99, 7, 0, './img/produtos/acucar.png'),
(4, 'Arroz Parboilizado Urbano Tipo1 1KG', 4.59, 7, 0, './img/produtos/arroz.png'),
(5, 'Flocão de Milho Maratá 500G', 1.99, 7, 0, './img/produtos/flocao.png'),
(6, 'Salsicha Hot Dog Perdigão Resfriada', 10.99, 4, 0, './img/produtos/salsicha.png'),
(7, 'Café Maratá a Vácuo 250G', 7.49, 7, 0, './img/produtos/cafe.png'),
(8, 'Limão Taiti unidade (aprox: 120G)', 0.29, 5, 0, './img/produtos/limao.png'),
(9, 'Ovos Brancos Grandes c/ 30 Unid', 71.9, 7, 0, './img/produtos/ovo.png'),
(10, 'Azeite de Oliva 500ML', 24.9, 7, 0, './img/produtos/azeite.png'),
(11, 'Leite em Pó Ninho Integral 750G', 29.9, 7, 0, './img/produtos/ninho.png'),
(12, 'Queijo Muçarela Davaca Fatiado', 13.73, 4, 0, './img/produtos/queijo.png'),
(13, 'Cerveja Schin Lata 350ML', 2.49, 2, 0, './img/produtos/schin.png'),
(14, 'Cerveja Heineken Puro Malte 350ML', 4.49, 2, 0, './img/produtos/heineken.png'),
(15, 'Margarina Qualy Com Sal 500g', 9.99, 4, 0, './img/produtos/margarina.png'),
(16, 'Cerveja Devassa Puro Malte 350ML', 2.99, 2, 0, './img/produtos/devassa.png'),
(17, 'Iogurte Danone Morango Garrafa', 16, 4, 0, './img/produtos/iorgute.png'),
(18, 'Gin Beefeater London Dry 750ML', 99.9, 2, 0, './img/produtos/beefeater.png'),
(19, 'Vodka Smirnoff Red 998ML', 39.9, 2, 0, './img/produtos/smirnoff.png'),
(20, 'Whisky Jack Daniels Tennesse 1L', 129.9, 2, 0, './img/produtos/jd.png'),
(22, ' Gin Bombay Sapphire 750ML', 119.9, 2, 0, './img/produtos/bombay.png'),
(23, 'Bacon Suíno Seara Defumado Pedaço', 13.99, 1, 0, './img/produtos/bacon.png'),
(24, 'Mocotó Bovino Inteiro Congelado', 12.15, 1, 0, './img/produtos/mocoto.png'),
(25, 'Fígado de Frango Perdigão 1Kg', 6.49, 1, 0, './img/produtos/figadof.png'),
(26, 'Filé de Peito de Frango Sadia 1Kg', 15.34, 1, 0, './img/produtos/fpeito.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `statuspedido`
--

DROP TABLE IF EXISTS `statuspedido`;
CREATE TABLE IF NOT EXISTS `statuspedido` (
  `idStatus` int NOT NULL AUTO_INCREMENT,
  `statusPedido` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `statuspedido`
--

INSERT INTO `statuspedido` (`idStatus`, `statusPedido`) VALUES
(1, 'Aguardando Atendimento'),
(2, 'Em Separação'),
(3, 'Aguardando Envio'),
(4, 'Saiu para Entrega'),
(5, 'Entregue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(145) NOT NULL,
  `cpf` int NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` int NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUser`, `nome`, `cpf`, `email`, `telefone`, `endereco`, `senha`) VALUES
(34, '1@1', 1, '1@1', 1, '1', '1');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliacao_pedido1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`idPedido`);

--
-- Limitadores para a tabela `cartao`
--
ALTER TABLE `cartao`
  ADD CONSTRAINT `fk_cartao_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`usuario_cliente`);

--
-- Limitadores para a tabela `detalhesdopedido`
--
ALTER TABLE `detalhesdopedido`
  ADD CONSTRAINT `fk_detalhesDoPedido_pedido1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`idPedido`),
  ADD CONSTRAINT `fk_detalhesDoPedido_produto1` FOREIGN KEY (`produto`) REFERENCES `produto` (`idProduto`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`usuario_funcionario`) REFERENCES `usuario` (`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `infoenvio`
--
ALTER TABLE `infoenvio`
  ADD CONSTRAINT `fk_infoEnvio_cliente1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`usuario_cliente`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`userId`) REFERENCES `cliente` (`usuario_cliente`),
  ADD CONSTRAINT `fk_pedido_statusPedido1` FOREIGN KEY (`status`) REFERENCES `statuspedido` (`idStatus`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria1` FOREIGN KEY (`categoriaProduto`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `fk_produto_mercado1` FOREIGN KEY (`mercado`) REFERENCES `mercado` (`cnpj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
