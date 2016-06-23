-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2016 às 20:45
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oficina`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `licensePlate` varchar(8) NOT NULL,
  `client` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `renavam` varchar(50) NOT NULL,
  `chassi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `car`
--

INSERT INTO `car` (`id`, `licensePlate`, `client`, `model`, `color`, `year`, `renavam`, `chassi`) VALUES
(1, 'ABC2000', 'JOSÉ SILVA', 'CELTA', 'CINZA', 2010, '90870737568', '9BWCA11J0Y400001'),
(2, 'JHG1234', 'MICHEL MENDES', 'GOL', 'PRATA', 2007, '96517704662', '9BFCA11G0Y000012');

-- --------------------------------------------------------

--
-- Estrutura da tabela `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `licensePlate` varchar(8) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `addres` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `client`
--

INSERT INTO `client` (`id`, `name`, `last_name`, `cpf`, `rg`, `birthdate`, `licensePlate`, `phone`, `addres`, `email`) VALUES
(1, 'JOSE', 'SILVA', '38288500226', '123456', '1980-04-01', 'ABC2000', '6199558877', 'BRASÍLIA', 'josesilva@hotmail.com'),
(2, 'MICHEL', 'MENDES', '25411739381', '654321', '1996-01-20', 'JHG1234', '6192338355', 'BRASÍLIA', 'michel-mello@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(11) NOT NULL,
  `addres` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `employee`
--

INSERT INTO `employee` (`id`, `name`, `last_name`, `cpf`, `rg`, `birthdate`, `phone`, `addres`, `category`, `salary`) VALUES
(1, 'JOÃO', 'SILVA', '83428124138', '123123', '1990-01-01', '6191915555', 'BRASÍLIA', 'MECÂNICO', 2000),
(2, 'VITOR', 'GOMES', '60559650035', '2332334', '1970-12-12', '6199557744', 'BRASÍLIA', 'MECÂNICO', 2000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` float NOT NULL,
  `category` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `name`, `value`, `category`, `amount`, `barcode`) VALUES
(1, 'PNEU', 200, 'PNEUS', 50, 'A1B1C1D1'),
(2, 'TINTA PRETA', 20, 'PINTURA', 100, 'D1C1B1A1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tradename` varchar(1000) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `addres` varchar(100) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `cnpj` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `provider`
--

INSERT INTO `provider` (`id`, `name`, `tradename`, `phone`, `addres`, `cep`, `city`, `cnpj`) VALUES
(1, 'ABC AUTOPEÇAS', 'ABC', '6133445566', 'BEM ALI', '70334455', 'BRASÍLIA', '85184331000181'),
(2, 'TUDO PARA CARROS', 'ALLCAR', '6134431234', 'DO OUTRO LADO', '70445577', 'BRASÍLIA', '97155809000124');

-- --------------------------------------------------------

--
-- Estrutura da tabela `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `employee` varchar(50) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `service`
--

INSERT INTO `service` (`id`, `name`, `employee`, `value`) VALUES
(1, 'CHEK-UP', 'JOÃO SILVA', 300),
(2, 'BALANCEAMENTO', 'VITOR GOMES', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
