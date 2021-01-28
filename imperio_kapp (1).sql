-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2020 às 03:05
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imperio_kapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `id_produtos` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `id_produtos`, `quantidade`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 1),
(4, 1, 1),
(5, 2, 1),
(6, 1, 2),
(7, 1, 1),
(8, 1, 1),
(9, 7, 1),
(10, 7, 1),
(11, 1, 1),
(12, 7, 2),
(13, 7, 2),
(14, 7, 2),
(15, 6, 1),
(16, 7, 2),
(17, 6, 1),
(18, 7, 2),
(19, 6, 1),
(20, 1, 1),
(21, 1, 1),
(22, 1, 1),
(23, 3, 1),
(24, 7, 1),
(25, 7, 1),
(26, 2, 1),
(27, 1, 1),
(28, 1, 1),
(29, 1, 1),
(30, 1, 1),
(31, 1, 1),
(32, 6, 1),
(33, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_contato`
--

CREATE TABLE `tab_contato` (
  `id_contato` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` int(11) NOT NULL,
  `mensagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_fornecedor`
--

CREATE TABLE `tab_fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` int(13) NOT NULL,
  `nome_empresa` varchar(50) NOT NULL,
  `quant_produto` int(11) NOT NULL,
  `data_entrada` date NOT NULL,
  `preco_unit_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_garantia`
--

CREATE TABLE `tab_garantia` (
  `id_garantia` int(11) NOT NULL,
  `descricao_garant` varchar(50) NOT NULL,
  `data_entrada` date NOT NULL,
  `data_saida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_login`
--

CREATE TABLE `tab_login` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `data_nascimento` int(11) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `telefone` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `cpf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_login`
--

INSERT INTO `tab_login` (`id`, `nickname`, `senha`, `nome`, `sobrenome`, `data_nascimento`, `endereco`, `telefone`, `celular`, `cpf`) VALUES
(1, 'igor', '123', '', '', 0, '', 0, 0, 0),
(2, 'jÃ£o', '202cb962ac59075b964b07152d234b70', 'tijolo', 'Raphael', 1313, 'rua adawwa', 134733437, 34437534, 2147483647),
(3, 'teste', '202cb962ac59075b964b07152d234b70', 'testando', 'wadwad', 2003, 'rua adawwa', 2147483647, 34437534, 321964221),
(4, 'sasa', '202cb962ac59075b964b07152d234b70', 'sa', 'sasa', 1745, 'rua adawwa', 2147483647, 34437534, 2147483647),
(6, 'gu', 'a3622ca65e74a73963541ccce73fb02f', 'sa', 'wadwad', 4644, 'dawdadwd', 19487515, 34437534, 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_produto`
--

CREATE TABLE `tab_produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` float NOT NULL,
  `unid_estoque` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `imagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_produto`
--

INSERT INTO `tab_produto` (`id`, `nome`, `preco`, `unid_estoque`, `marca`, `modelo`, `imagem`) VALUES
(1, 'Capinha Poliuretano (Personalizada)', 20, 2, 'xaomi', 'note', 'teste1.jpg'),
(2, 'Capinha Poliuretano', 15, 5, 'xiaomi', 'note', 'teste2.jpg'),
(3, 'Capinha Policarbonato (Personalizada)', 15, 5, 'xiaomi', 'note', 'teste3.webp'),
(4, 'Capinha Policarbonato', 15, 10, 'xiaomi', 'note', 'xaomi_redmi7.jpg'),
(5, 'Mouse Pad', 30, 10, 'GAMING', 'pad', 'pad.jpg'),
(6, 'Fone Gamer', 35, 5, 'desconhecida', 'Gamer', 'fone.jpg'),
(7, 'Conjunto teclado e mouse', 150, 5, '.....', 'teclado e mouse', 'teclado3.jpg'),
(8, 'Carregador', 20, 5, 'samsung', 'Tomada Plug Adaptador Fonte Usb 5v', 'Caregadores.jpg'),
(9, 'PopSocket', 5, 10, 'Imperio Kapp', 'Suporte De Celular', 'popsocket.jpg'),
(10, 'Fone de ouvido', 25, 10, 'Iphone', 'Earpods MNHF2AM/A', 'fone_de_ouvido.jpg'),
(11, 'Mouse', 40, 20, 'Dell', 'WM126', 'mouse.jpg'),
(12, 'Webcam', 50, 25, 'FULLHD SUNCHAN', 'FULL HD USB-301', 'webcam.jpg'),
(13, 'Teclado', 60, 15, 'Multilaser', 'TC193 QWERTY', 'teclado_ind2.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`);

--
-- Índices para tabela `tab_contato`
--
ALTER TABLE `tab_contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices para tabela `tab_fornecedor`
--
ALTER TABLE `tab_fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `tab_garantia`
--
ALTER TABLE `tab_garantia`
  ADD PRIMARY KEY (`id_garantia`);

--
-- Índices para tabela `tab_login`
--
ALTER TABLE `tab_login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tab_produto`
--
ALTER TABLE `tab_produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tab_contato`
--
ALTER TABLE `tab_contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_fornecedor`
--
ALTER TABLE `tab_fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_garantia`
--
ALTER TABLE `tab_garantia`
  MODIFY `id_garantia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_login`
--
ALTER TABLE `tab_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tab_produto`
--
ALTER TABLE `tab_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
