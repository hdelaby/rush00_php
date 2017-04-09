-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2017 at 09:34 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `rush_ecommerce`
--
CREATE DATABASE IF NOT EXISTS `RUSH` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `RUSH`;

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `id_product` int(11) NOT NULL,
  `label` text NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `id_user` int(11) NOT NULL,
  `login` text NOT NULL,
  `passwd` text NOT NULL,
  `basket` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `CATEGORY` (
  `id_category` int(11) NOT NULL,
  `label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `PRODUCT_CATEGORY` (
  `id_p_c` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

CREATE TABLE `ORDERS` (
  `id_order` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `category`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`id_category`);

ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `PRODUCT_CATEGORY`
  ADD PRIMARY KEY (`id_p_c`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_cat` (`id_cat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `CATEGORY`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `PRODUCT_CATEGORY`
  MODIFY `id_p_c` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ORDERS`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_category`
--
ALTER TABLE `PRODUCT_CATEGORY`
  ADD CONSTRAINT `foreign_cat` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `foreign_prod` FOREIGN KEY (`id_prod`) REFERENCES `PRODUCT` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;
