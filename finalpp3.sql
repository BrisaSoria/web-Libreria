-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 12:35 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalpp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `email_usuario` varchar(300) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `id_precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `direccion_envio` varchar(300) NOT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL,
  `num_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuario`, `email_usuario`, `id_producto`, `id_precio`, `cantidad`, `direccion_envio`, `fecha_pedido`, `estado`, `num_venta`) VALUES
(1, 46548520, 'Olivera22_vic@gmail.com', 'MKM3193', '15300.00', 1, 'av saavedra lamas 1500', '2024-02-29 01:35:23', 1, 339872),
(2, 46548520, 'Olivera22_vic@gmail.com', 'CGL7791', '1800.00', 1, 'av saavedra lamas 1500', '2024-02-29 01:35:25', 1, 339872),
(3, 40115362, 'federico99sosa@gmail.com', 'WQE258', '17620.00', 1, 'carabobo 1400', '2024-02-29 01:35:27', 1, 184289),
(4, 40115362, 'federico99sosa@gmail.com', 'MDK301', '15000.00', 1, 'carabobo 1400', '2024-02-29 01:35:29', 1, 184289),
(5, 43251042, 'adrian_fernandez@gmail.com', 'CO51675', '4620.00', 1, 'juan jose castelli 5647', '2024-02-29 01:38:36', 0, 884455),
(6, 43251042, 'adrian_fernandez@gmail.com', 'JWR69', '10250.00', 1, 'juan jose castelli 5647', '2024-02-29 01:48:19', 1, 884455),
(7, 15236984, 'normalop25@gmail.com', 'LPS324', '4860.00', 1, 'av derqui 1800', '2024-02-29 01:48:14', 1, 976743),
(8, 15236984, 'normalop25@gmail.com', 'BLS45', '800.00', 1, 'av derqui 1800', '2024-02-29 01:41:01', 0, 976743),
(9, 43225010, 'Azul_suarez@gmail.com', 'GSF2563', '7200.00', 1, 'panama 3521', '2024-02-29 01:46:49', 0, 588589),
(10, 43225010, 'Azul_suarez@gmail.com', 'QLI47', '10302.00', 1, 'panama 3521', '2024-02-29 01:46:49', 0, 588589),
(11, 43225010, 'Azul_suarez@gmail.com', '6L757', '3148.00', 1, 'panama 3521', '2024-02-29 01:46:49', 0, 588589);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `descripcion`, `precio`, `imagen`) VALUES
(14, 'Cartuchera Sabonis 3 Pisos', '098SA', 'cartuchera 3 pisos, color negra con detalles en diferentes colores.', '7563.00', '../imagenes/cartuchera3pisos.jpeg'),
(4, 'Notas Adhesivas Stick', '6L757', 'Notas Adhesivas Stick Banderitas y Flechas Fluo x 200 Mooving Medida 12 x 45 mm.', '3148.00', '../imagenes/1234.jpeg'),
(21, 'Kit de agendas ', 'AJLP45', 'Kit de regalo \"Quedate con lo bueno\" Caja, Mini cuadernito, CUADERNO A5 TAPA DURA , hojas rayadas, Planner diario Tarjetita con frase especial para vos.', '19630.00', '../imagenes/kitagenda.jpeg'),
(10, 'Boligrafo Azul Stick Filgo', 'BLS45', 'Se venden por unidades.', '800.00', '../imagenes/azul.jpeg'),
(11, 'Boligrafo ROJO Stick Filgo', 'BLS581', 'Se venden por unidades.', '800.00', '../imagenes/rojo.jpeg'),
(18, 'Cuaderno A4 pasta dura – flor', 'CD456', 'Tamaño 21,5 cm x 30,3 cm Con 100 hojas 75 gr. Pasta dura laminada Doble anillo', '8000.00', '../imagenes/cuadernillo1.jpeg'),
(1, 'Cartuchera Everlast 2 Divisiones Varios Colores', 'CE453', 'Cartuchera canopla EVERLAST ORIGINAL   MEDIDAS: 22x12x10 CM Dos compartimiento', '4700.00', '../imagenes/cartuchera.jpeg'),
(2, 'CUADERNO GLORIA TAPA FLEXIBLE LISO X48 HS', 'CGL7791', 'El Cuaderno Gloria 16x21 48h Lisas Flexible 1067 Ledesma Color Colorido es un producto de alta calidad de la reconocida marca Ledesma.Su tamaño es de 160x210 mm.', '1800.00', '../imagenes/WhatsApp Image 2024-02-22 at 7.14.59 PM.jpeg'),
(15, 'Cartuchera Rectangular Transparente Como Quieres Mooving', 'CM4572', 'Cartuchera rectangular transparente medidas aprox : 21 cm largo x 7.5 cm ancho x alto 8 cm de alto.', '12300.00', '../imagenes/cartucherattransparebte.jpeg'),
(13, 'CARPETA OFFICE BOX CON GOMA SUPRA A4', 'CO51675', 'Carpeta con tres solapas y gomas redondas a juego con el color de la carpeta. Tamaño A4.', '4620.00', '../imagenes/carpetas.jpeg'),
(17, 'Agenda N° 7 Semana a la vista BP - universo', 'GSF2563', 'Agenda 2024 - LÍNEA BE POSITIVE! Tamaño 14x19,5 cm Interior semana a la vista impreso en color lila y negro', '7200.00', '../imagenes/cuadernillo.jpeg'),
(33, 'RESALTADORES FILGO CANDY ', 'HIE58', 'ANCHOS X4 COLORES PASTELES', '4600.00', '../imagenes/resaltador.jpeg'),
(16, 'Corrector liquid paper blanco lápiz filgo escolar 7 ml', 'HKL258', 'Estos correctores liquid paper son ideales para utilizar sobre cualquier tipo de papel. Perfectos para el colegio o la oficina', '1400.00', '../imagenes/corrector.jpeg'),
(25, 'Marcador Fibra Maped Color Peps X 10 Colores Pastel', 'HTR285', '10 COLORES PASTEL PUNTA DE 2,8 MM RESISTENTE Y ANTIHUNDIMIENTO TINTA LAVABLE', '9800.00', '../imagenes/mapped2.jpeg'),
(29, 'Resaltador Pelikan Flash Colores Pastel ', 'JWR69', 'Colores pasteles surtidos , punta biselada. Blister x 6 unidades', '10250.00', '../imagenes/pastel.jpeg'),
(28, 'Organizador de oficina vertical acrílico Acrimet 864', 'KPR53', 'El organizador de oficina vertical acrílico Acrimet 864 presenta un sofisticado color ahumado.', '14230.00', '../imagenes/organizador.jpeg'),
(6, 'CUADERNO PUNTO CERO PUNTOS GUÍA A5 ', 'LK8024', 'Tapa dura x80 hojas', '7500.00', '../imagenes/agenda.jpeg'),
(9, 'Agenda 2024 Pocket Anilladas Tapa Dura', 'LPS324', 'Material de la portada: Plástico Tipo de encuadernación: Anillado Tamaño de las hojas: A5 Cantidad de hojas: 180', '4860.00', '../imagenes/anotador.jpeg'),
(30, 'PORTAFOLIO ORGANIZADOR TAMAÑO A4', 'M400A', 'SABONIS 13 Divisiones Ideal para Oficina, universidad, administración, colegio, hogar.', '18600.00', '../imagenes/portafolio.jpeg'),
(20, 'Cuaderno A4 MICKEY', 'MDK301', '16x21 espiral tapa dura 80hj - Mickey', '15000.00', '../imagenes/cuadernillomk.jpeg'),
(3, 'Mochila Lisa ROSIT KLUB MODE', 'MKM3193', '2CIERRES 42X15X30CM', '15300.00', '../imagenes/WhatsApp Image 2024-02-22 at 7.14.59 PM (2).jpeg'),
(12, 'Bibliorato Forrado Util-of A4 Lomo Bajo Color', 'MNS78', 'Tipo de carpeta: Bibliorato Material: PVC Tamaño de las hojas: A4 Con anillos: Sí Largo x Ancho: 32 cm x 28 cm', '5200.00', '../imagenes/carpetaA3.jpeg'),
(23, 'Lapiz grafito Filgo x12un', 'NHT46', 'Lapiz grafito Filgo pinto x12un largos', '3250.00', '../imagenes/lapiz.jpeg'),
(8, '𝐀𝐠𝐞𝐧𝐝𝐚𝐬 𝐏𝐎𝐂𝐊𝐄𝐓 ', 'NT586', 'Agenda apaisaada, espiralada, semana a la vista  Tamaño 9x17', '3250.00', '../imagenes/agendas4.jpeg'),
(32, 'Post-it', 'PKL96', '3 x 3 pulgadas, colección Ciudad del Cabo, (4 paquetes de 5 blocs/paquete)', '4750.00', '../imagenes/potts.jpeg'),
(31, 'Organizador de carpetas de acordeón expansible', 'QLI47', '13 bolsillos, portátil,con cierre de hebilla, A6+A4', '10302.00', '../imagenes/portafolio2.jpeg'),
(5, 'Resmas BOREAL A4 70 Grs Caja x 10 UNIDADES', 'RB4585', 'Medidas: 21,0 x 29,7 cm. Características: Excelente grado de blanco, permitiendo un mayor contraste de colores.', '68040.00', '../imagenes/A4.jpeg'),
(7, 'AGENDA POCKET YOU CAN PUNTO CERO', 'T500', 'Agenda pocket apaisada, anillada, semana a la vista Tamaño 11x17cm', '2500.00', '../imagenes/agenda2.jpeg'),
(27, 'Mochila Escolar Diko Doble Bolsillo', 'UAS58', 'Mochila Urbana, Clásica, Escolar, Facultad - 100% Original de Excelente calidad! Colores azul, rojo, negro', '35000.00', '../imagenes/mochilas.jpeg'),
(19, 'Cuaderno Universitario Linea 16 - 84 Hojas Cuadriculado', 'VB4580', 'Ancho : 21 Cm Cantidad de hojas : 84 Largo : 29.7 Cm Línea : LEDESMA', '4860.00', '../imagenes/cuadernillo3.jpeg'),
(22, 'ROLLER BORRABLE LIKE ME', 'WE2113', 'Lapicera azul borrable ', '1600.00', '../imagenes/lapiceras.jpeg'),
(26, 'LAPICES MAPED COLOR PEPS X48COLORES', 'WQE258', 'Lapices escolares Maped Color Peps con 42 lápices de colores tradicionales, 1 lápiz color oro, 1 lápiz color plata y 4 lápices de colores fluo. Caja de cartón de 48 lápices.', '17620.00', '../imagenes/mapped3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_entrada` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_salida` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`id`, `id_usuario`, `fecha_entrada`, `fecha_salida`) VALUES
(1, 44002010, '2024-02-21 23:56:20', '2024-02-22 00:08:22'),
(2, 44002010, '2024-02-22 22:00:54', '2024-02-22 22:00:54'),
(3, 44002010, '2024-02-22 22:01:27', '2024-02-22 22:05:36'),
(4, 44002010, '2024-02-22 22:26:05', '2024-02-22 22:28:54'),
(5, 44002010, '2024-02-25 00:47:59', '2024-02-25 00:49:12'),
(6, 44002010, '2024-02-27 17:47:33', '2024-02-27 17:47:49'),
(7, 43251042, '2024-02-27 17:48:56', '2024-02-27 17:48:56'),
(8, 43251042, '2024-02-27 18:21:50', '2024-02-27 18:21:50'),
(9, 43251042, '2024-02-27 18:52:04', '2024-02-27 18:52:04'),
(10, 44002010, '2024-02-28 21:17:07', '2024-02-28 22:02:48'),
(11, 46548520, '2024-02-28 22:08:46', '2024-02-28 22:53:59'),
(12, 44002010, '2024-02-28 22:54:59', '2024-02-28 22:57:56'),
(13, 40115362, '2024-02-28 23:00:28', '2024-02-28 23:11:50'),
(14, 44002010, '2024-02-28 23:25:30', '2024-02-28 23:25:38'),
(15, 43251042, '2024-02-28 23:25:56', '2024-02-29 01:25:28'),
(16, 44002010, '2024-02-29 01:25:40', '2024-02-29 01:36:06'),
(17, 43251042, '2024-02-29 01:36:30', '2024-02-29 01:39:04'),
(18, 15236984, '2024-02-29 01:39:28', '2024-02-29 01:41:24'),
(19, 43225010, '2024-02-29 01:44:57', '2024-02-29 01:47:17'),
(20, 44002010, '2024-02-29 01:47:30', '2024-02-29 01:48:38'),
(21, 44002010, '2024-02-29 01:53:09', '2024-02-29 01:53:21'),
(22, 44002010, '2024-02-29 02:06:42', '2024-02-29 02:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dni` int(8) NOT NULL,
  `clave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `dni`, `clave`) VALUES
(6, 'Norma', 'Lopez', 'normalop25@gmail.com', 15236984, 'lopez_25'),
(2, 'Ivan', 'Sosa', 'federico99sosa@gmail.com', 40115362, 'sosa99'),
(7, 'Juan', 'Fernandez', 'fernandez23@gmail.com', 40125689, 'juan_4012'),
(8, 'Azul', 'Suarez', 'Azul_suarez@gmail.com', 43225010, 'azul4322'),
(4, 'Adrian', 'Fernandez', 'adrian_fernandez@gmail.com', 43251042, 'adrian4325'),
(1, 'Brisa', 'Soria', 'soria24victoria@gmail.com', 44002010, 'admin123'),
(3, 'Victoria', 'Olivera', 'Olivera22_vic@gmail.com', 46548520, 'victoria22');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `productos` varchar(200) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `precio_uni` decimal(10,2) NOT NULL,
  `total_pago` decimal(10,2) NOT NULL,
  `tipo_tarjeta` varchar(50) NOT NULL,
  `numero_tarjeta` int(16) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `cvv` int(3) NOT NULL,
  `direccion_envio` varchar(200) NOT NULL,
  `cod_postal` int(11) NOT NULL,
  `fecha_venta` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `nombre_usuario`, `productos`, `cantidad`, `precio_uni`, `total_pago`, `tipo_tarjeta`, `numero_tarjeta`, `fecha_vencimiento`, `cvv`, `direccion_envio`, `cod_postal`, `fecha_venta`) VALUES
(1, 46548520, 'Victoria', 'Mochila Lisa ROSIT KLUB MODE', 1, '15300.00', '17100.00', 'visa_debito', 2147483647, '2028-06-01', 124, 'av saavedra lamas 1500', 1665, '2024-02-28 22:35:10'),
(2, 46548520, 'Victoria', 'CUADERNO GLORIA TAPA FLEXIBLE LISO X48 HS', 1, '1800.00', '17100.00', 'visa_debito', 2147483647, '2028-06-01', 124, 'av saavedra lamas 1500', 1665, '2024-02-28 22:35:10'),
(3, 40115362, 'Ivan', 'LAPICES MAPED COLOR PEPS X48COLORES', 1, '17620.00', '32620.00', 'american_express', 2147483647, '2027-12-01', 165, 'carabobo 1400', 1666, '2024-02-28 23:02:23'),
(4, 40115362, 'Ivan', 'Cuaderno A4 MICKEY', 1, '15000.00', '32620.00', 'american_express', 2147483647, '2027-12-01', 165, 'carabobo 1400', 1666, '2024-02-28 23:02:23'),
(5, 43251042, 'Adrian', 'CARPETA OFFICE BOX CON GOMA SUPRA A4', 1, '4620.00', '14870.00', 'mastercard', 2147483647, '2028-06-01', 129, 'juan jose castelli 5647', 1667, '2024-02-29 01:38:36'),
(6, 43251042, 'Adrian', 'Resaltador Pelikan Flash Colores Pastel ', 1, '10250.00', '14870.00', 'mastercard', 2147483647, '2028-06-01', 129, 'juan jose castelli 5647', 1667, '2024-02-29 01:38:36'),
(7, 15236984, 'Norma', 'Agenda 2024 Pocket Anilladas Tapa Dura', 1, '4860.00', '5660.00', 'visa_debito', 2147483647, '2029-05-01', 256, 'av derqui 1800', 1665, '2024-02-29 01:41:01'),
(8, 15236984, 'Norma', 'Boligrafo Azul Stick Filgo', 1, '800.00', '5660.00', 'visa_debito', 2147483647, '2029-05-01', 256, 'av derqui 1800', 1665, '2024-02-29 01:41:01'),
(9, 43225010, 'Azul', 'Agenda N° 7 Semana a la vista BP - universo', 1, '7200.00', '20650.00', 'visa_debito', 2147483647, '2027-12-01', 214, 'panama 3521', 1669, '2024-02-29 01:46:49'),
(10, 43225010, 'Azul', 'Organizador de carpetas de acordeón expansible', 1, '10302.00', '20650.00', 'visa_debito', 2147483647, '2027-12-01', 214, 'panama 3521', 1669, '2024-02-29 01:46:49'),
(11, 43225010, 'Azul', 'Notas Adhesivas Stick', 1, '3148.00', '20650.00', 'visa_debito', 2147483647, '2027-12-01', 214, 'panama 3521', 1669, '2024-02-29 01:46:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
