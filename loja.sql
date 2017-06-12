-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2017 às 18:54
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `senha` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `codigo` int(11) NOT NULL,
  `categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `codigo` int(11) NOT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `senha` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `endereco` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cidade` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `codigo` int(11) NOT NULL,
  `pedido` int(11) NOT NULL DEFAULT '0',
  `livro` int(11) NOT NULL DEFAULT '0',
  `qtde` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `codigo` int(11) NOT NULL,
  `categoria` int(11) NOT NULL DEFAULT '1',
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `preco` decimal(5,2) NOT NULL DEFAULT '10.00',
  `imagem` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `qtde` int(11) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`codigo`, `categoria`, `titulo`, `autor`, `preco`, `imagem`, `qtde`) VALUES
(1, 3, 'Irmão Lobo', 'Michelle Paver', '25.00', './imagens/1.jpg', 40),
(2, 3, 'Harry Potter e o Enigma do Príncipe', 'J. K. Rowling', '36.00', './imagens/2.jpg', 46),
(3, 3, 'O Menino Maluquinho', 'Ziraldo', '16.00', './imagens/3.jpg', 46),
(4, 3, 'As Crônicas de Nárnia', 'C.S. Lewis', '67.00', './imagens/4.jpg', 49),
(5, 3, 'Rita, não grita!', 'Flávia Muniz', '16.00', './imagens/5.jpg', 46),
(6, 1, 'A Dama de Ferro', 'Richard North Patterson', '61.00', './imagens/6.jpg', 49),
(7, 1, 'Boca do Lixo', 'Sílvio de Abreu', '61.00', './imagens/7.jpg', 47),
(8, 1, 'Receita para a Morte', 'Nero Blanc', '29.00', './imagens/8.jpg', 50),
(9, 1, 'A Terra não sofre', 'Michele Blake', '21.00', './imagens/9.jpg', 50),
(10, 1, 'Mutante: Ameaça Oculta', 'Peter Clement', '37.00', './imagens/10.jpg', 50),
(11, 2, 'Java: como programar', 'Harvey Deitel', '174.00', './imagens/11.jpg', 47),
(12, 2, 'Manual completo do Linux', 'Evi Nemeth', '139.00', './imagens/12.jpg', 47),
(13, 2, 'Hardware: curso completo', 'Gabriel Torres', '159.00', './imagens/13.jpg', 50),
(14, 2, 'Redes de Computadores', 'Andrew S. Tanenbaum', '159.00', './imagens/14.jpg', 50),
(15, 2, 'E-business e E-commerce para Administradores', 'Paul Deitel', '104.00', './imagens/15.jpg', 50),
(16, 2, 'Kurumin 7: Guia Prático', 'Carlos Morimoto', '45.90', './imagens/16.jpg', 50),
(17, 2, 'Desenvolvendo websites com PHP', 'Juliano Niederauer', '45.90', './imagens/17.jpg', 50),
(18, 1, 'O Poder do Hábito', 'Charles Duhing', '50.00', './imagens/18.png', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `codigo` int(11) NOT NULL,
  `cliente` int(11) NOT NULL DEFAULT '0',
  `datapedido` date NOT NULL DEFAULT '2007-01-01',
  `valorpedido` decimal(5,2) NOT NULL DEFAULT '0.00',
  `pagamento` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `pedido` (`pedido`),
  ADD KEY `livro` (`livro`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `categoria` (`categoria`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `pagamento` (`pagamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `itens_ibfk_1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`codigo`),
  ADD CONSTRAINT `itens_ibfk_2` FOREIGN KEY (`livro`) REFERENCES `livros` (`codigo`);

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`codigo`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`pagamento`) REFERENCES `pagamentos` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
