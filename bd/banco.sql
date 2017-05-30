-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Mai 07, 2007 as 02:35 PM
-- Versão do Servidor: 4.1.9
-- Versão do PHP: 4.3.10

-- 
-- Banco de Dados: `loja`
-- 
CREATE DATABASE `loja` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci; 
USE loja;

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `admins`
-- 

CREATE TABLE `admins` (
  `codigo` int(11) NOT NULL auto_increment,
  `usuario` varchar(15) NOT NULL default '',
  `senha` varchar(15) NOT NULL default '',
  `nome` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`codigo`)
);

-- 
-- Extraindo dados da tabela `admins`
-- 

INSERT INTO `admins` (`codigo`, `usuario`, `senha`, `nome`) VALUES 
(1, 'admin', 'admin', 'Administrador'),
(2, 'banzai', 'banzai', 'Raphael Gomide'),
(3, 'root', 'root', 'Root');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `categorias`
-- 

CREATE TABLE `categorias` (
  `codigo` int(11) NOT NULL auto_increment,
  `categoria` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`codigo`)
);

-- 
-- Extraindo dados da tabela `categorias`
-- 

INSERT INTO `categorias` (`codigo`, `categoria`) VALUES 
(1, 'Suspense'),
(2, 'Informática'),
(3, 'Infantil');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `clientes`
-- 

CREATE TABLE `clientes` (
  `codigo` int(11) NOT NULL auto_increment,
  `usuario` varchar(15) NOT NULL default '',
  `senha` varchar(15) NOT NULL default '',
  `nome` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `endereco` varchar(200) NOT NULL default '',
  `cidade` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`codigo`),
  UNIQUE KEY `usuario` (`usuario`)
);

-- 
-- Extraindo dados da tabela `clientes`
-- 

INSERT INTO `clientes` (`codigo`, `usuario`, `senha`, `nome`, `email`, `endereco`, `cidade`) VALUES 
(1, 'augusto', 'augusto', 'Augusto Licks', 'augusto@gmail.com', 'Rua dos Pampas, 898', 'Porto Alegre/RS'),
(2, 'carlos', 'carlos', 'Carlos Maltz', 'carlos@gmail.com', 'Rua Paranoá, 1', 'Brasília/DF'),
(3, 'humberto', 'humberto', 'Humberto Gessinger', 'humberto@gmail.com', 'Rua dos Engenheiros, 783', 'Gramado/RS'),
(4, 'raphael', 'raphael', 'Raphael Ribeiro Gomide', 'raphael.gomide@gmail.com', 'Rua dos Goitacazes, 234', 'Belo Horizonte/MG'),
(5, 'pilolo', 'pilolo', 'Plínio Amorim', 'plinio@gmail.com', 'Rua dos Caetés, 232', 'Belo Horizonte/MG'),
(6, 'silva', 'silva', 'José Silva', 'silva@gmail.com', 'Rua dos Caetés, 789', 'Belo Horizonte/MG'),
(7, 'flaviorst', '123456', 'Flavio Roberto de Sousa Teixeira', 'flaviorst@hotmail.com', 'Av. Augusto de Lima', 'Belo Horizonte/MG'),
(8, '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `itens`
-- 

CREATE TABLE `itens` (
  `codigo` int(11) NOT NULL auto_increment,
  `pedido` int(11) NOT NULL default '0',
  `livro` int(11) NOT NULL default '0',
  `qtde` int(11) NOT NULL default '0',
  PRIMARY KEY  (`codigo`),
  KEY `pedido` (`pedido`),
  KEY `livro` (`livro`)
);

-- 
-- Extraindo dados da tabela `itens`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `livros`
-- 

CREATE TABLE `livros` (
  `codigo` int(11) NOT NULL auto_increment,
  `categoria` int(11) NOT NULL default '1',
  `titulo` varchar(100) NOT NULL default '',
  `autor` varchar(100) NOT NULL default '',
  `preco` decimal(5,2) NOT NULL default '10.00',
  `imagem` varchar(100) NOT NULL default '',
  `qtde` int(11) NOT NULL default '50',
  PRIMARY KEY  (`codigo`),
  KEY `categoria` (`categoria`)
);

-- 
-- Extraindo dados da tabela `livros`
-- 

INSERT INTO `livros` (`codigo`, `categoria`, `titulo`, `autor`, `preco`, `imagem`, `qtde`) VALUES 
(1, 3, 'Irmão Lobo', 'Michelle Paver', 25.00, './imagens/1.jpg', 40),
(2, 3, 'Harry Potter e o Enigma do Príncipe', 'J. K. Rowling', 36.00, './imagens/2.jpg', 46),
(3, 3, 'O Menino Maluquinho', 'Ziraldo', 16.00, './imagens/3.jpg', 46),
(4, 3, 'As Crônicas de Nárnia', 'C.S. Lewis', 67.00, './imagens/4.jpg', 49),
(5, 3, 'Rita, não grita!', 'Flávia Muniz', 16.00, './imagens/5.jpg', 46),
(6, 1, 'A Dama de Ferro', 'Richard North Patterson', 61.00, './imagens/6.jpg', 49),
(7, 1, 'Boca do Lixo', 'Sílvio de Abreu', 61.00, './imagens/7.jpg', 47),
(8, 1, 'Receita para a Morte', 'Nero Blanc', 29.00, './imagens/8.jpg', 50),
(9, 1, 'A Terra não sofre', 'Michele Blake', 21.00, './imagens/9.jpg', 50),
(10, 1, 'Mutante: Ameaça Oculta', 'Peter Clement', 37.00, './imagens/10.jpg', 50),
(11, 2, 'Java: como programar', 'Harvey Deitel', 174.00, './imagens/11.jpg', 47),
(12, 2, 'Manual completo do Linux', 'Evi Nemeth', 139.00, './imagens/12.jpg', 47),
(13, 2, 'Hardware: curso completo', 'Gabriel Torres', 159.00, './imagens/13.jpg', 50),
(14, 2, 'Redes de Computadores', 'Andrew S. Tanenbaum', 159.00, './imagens/14.jpg', 50),
(15, 2, 'E-business e E-commerce para Administradores', 'Paul Deitel', 104.00, './imagens/15.jpg', 50),
(16, 2, 'Kurumin 7: Guia Prático', 'Carlos Morimoto', 45.90, './imagens/16.jpg', 50),
(17, 2, 'Desenvolvendo websites com PHP', 'Juliano Niederauer', 45.90, './imagens/17.jpg', 50);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pagamentos`
-- 

CREATE TABLE `pagamentos` (
  `codigo` int(11) NOT NULL auto_increment,
  `tipo` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`codigo`)
);

-- 
-- Extraindo dados da tabela `pagamentos`
-- 

INSERT INTO `pagamentos` (`codigo`, `tipo`) VALUES 
(1, 'Cartão de crédito'),
(2, 'Cartão de Débito'),
(3, 'Boleto Bancário');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pedidos`
-- 

CREATE TABLE `pedidos` (
  `codigo` int(11) NOT NULL auto_increment,
  `cliente` int(11) NOT NULL default '0',
  `datapedido` date NOT NULL default '2007-01-01',
  `valorpedido` decimal(5,2) NOT NULL default '0.00',
  `pagamento` int(11) NOT NULL default '0',
  PRIMARY KEY  (`codigo`),
  KEY `cliente` (`cliente`),
  KEY `pagamento` (`pagamento`)
);

-- 
-- Extraindo dados da tabela `pedidos`
-- 

-- 
-- Restrições para as tabelas dumpadas
-- 

-- 
-- Restrições para a tabela `itens`
-- 
ALTER TABLE `itens`
  ADD CONSTRAINT `itens_ibfk_1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`codigo`),
  ADD CONSTRAINT `itens_ibfk_2` FOREIGN KEY (`livro`) REFERENCES `livros` (`codigo`);

-- 
-- Restrições para a tabela `livros`
-- 
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Restrições para a tabela `pedidos`
-- 
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`codigo`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`pagamento`) REFERENCES `pagamentos` (`codigo`);
