-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/04/2025 às 21:42
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testeaame`
--
DROP DATABASE IF EXISTS `testeaame`;
CREATE DATABASE IF NOT EXISTS `testeaame` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testeaame`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(50) DEFAULT NULL,
  `valor_compra` decimal(10,2) DEFAULT NULL,
  `valor_venda` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `imagem_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `valor_compra`, `valor_venda`, `quantidade`, `imagem_produto`) VALUES
(1, 'Vaso de Cerâmica Decorativo', 25.00, 45.00, 58, 'imagem/vaso-ceramica.webp'),
(2, 'Luminária de Mesa ondular', 35.00, 75.00, 114, 'imagem/luminaria-mesa.webp'),
(3, 'Tapete Felpudo', 120.00, 250.00, 32, 'imagem/tapete-felpudo.jpg'),
(4, 'Quadro Decorativo Abstrato', 60.00, 120.00, 72, 'imagem/quadro-decorativo.webp'),
(5, 'Cortina de Linho', 40.00, 85.00, 80, 'imagem/cortina-linho.jpg'),
(6, 'Poltrona Vintage', 200.00, 400.00, 20, 'imagem/poltrona.avif'),
(7, 'Espelho Redondo Decorativo', 80.00, 160.00, 40, 'imagem/espelho-redondo.webp'),
(8, 'Mesinha de Centro de Madeira', 150.00, 300.00, 50, 'imagem/mesinha-centro.jpg'),
(9, 'Cristaleira', 1000.00, 1700.00, 150, 'imagem/cristaleira.webp'),
(10, 'Lustre de Cristal', 250.00, 500.00, 25, 'imagem/lustre.webp'),
(11, 'Abajur de Tecido', 30.00, 70.00, 60, 'imagem/abajur.jpg'),
(12, 'Relógio de Parede Moderno', 50.00, 100.00, 90, 'imagem/relogio.webp\r\n'),
(13, 'Cadeira de Jantar Estofada', 120.00, 250.00, 40, 'imagem/cadeira-jantar.webp'),
(14, 'Almofada de Veludo', 15.00, 35.00, 120, 'imagem/almofada.webp'),
(15, 'Prateleira Flutuante de Madeira', 35.00, 80.00, 200, 'imagem/prateleira.jfif');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `senha`, `usuario`) VALUES
(1, '123', 'ana'),
(5, '12', 'oi'),
(6, '1234', 'nome'),
(7, '12345', 'oi'),
(8, '12345', 'ana'),
(9, '12345', 'iure');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
