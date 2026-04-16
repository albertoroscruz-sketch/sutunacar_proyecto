-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2026 a las 07:12:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iniciarsesionprimeraprueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areasprueba`
--

CREATE TABLE `areasprueba` (
  `id_area` varchar(255) NOT NULL,
  `nombre_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `areasprueba`
--

INSERT INTO `areasprueba` (`id_area`, `nombre_area`) VALUES
('0', 'pendiente'),
('1', 'Derecho'),
('2', 'Ciencias Economicas Administrativas'),
('3', 'Quimica'),
('4', 'Ciencias Educativas'),
('5', 'Ciencias de la Informacion'),
('6', 'Ingenieria'),
('7', 'Salud'),
('8', 'Ciencias Naturales y Exactas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sindicalizadosprueba`
--

CREATE TABLE `sindicalizadosprueba` (
  `curp` varchar(18) NOT NULL,
  `num_emp` varchar(50) DEFAULT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `id_area` varchar(255) NOT NULL DEFAULT '0',
  `foto` varchar(255) DEFAULT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo_personal` varchar(255) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `comentarios` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sindicalizadosprueba`
--

INSERT INTO `sindicalizadosprueba` (`curp`, `num_emp`, `nombres`, `apellidos`, `id_area`, `foto`, `telefono`, `correo_personal`, `fecha_ingreso`, `comentarios`) VALUES
('AABN930508MCCMLL08', '4088', '', '', '0', NULL, '', '', NULL, NULL),
('AAGI750704MCSLNR04', '882', '', '', '0', NULL, '', '', NULL, NULL),
('AAMA790526MCCLNZ07', '1732', '', '', '0', NULL, '', '', NULL, NULL),
('AAMJ730624MYNLRN09', '504', '', '', '0', NULL, '', '', NULL, NULL),
('AAOL660427MCCYRT07', '694', '', '', '0', NULL, '', '', NULL, NULL),
('AAPM731217HCCBCN0E', '1959', '', '', '0', NULL, '', '', NULL, ''),
('AASA711116MPLYNB04', '1601', '', '', '0', NULL, '', '', NULL, NULL),
('AAVE731110HVZLGR09', '1590', '', '', '0', NULL, '', '', NULL, ''),
('AAVH670319HVZLGR05', '1028', '', '', '0', NULL, '', '', NULL, NULL),
('AAXM720317HNEBXH03', '2132', '', '', '0', NULL, '', '', NULL, ''),
('AEDH611028HCCB6R03', '1531', '', '', '0', NULL, '', '', NULL, ''),
('AEHN781114MCSNR00', '907', '', '', '0', NULL, '', '', NULL, NULL),
('AELC650503HCCLRR02', '389', '', '', '0', NULL, '', '', NULL, NULL),
('AEOG620604MTSCLL03', '1782', '', '', '0', NULL, '', '', NULL, ''),
('AEZM750524HTCRRT02', '1956', '', '', '0', NULL, '', '', NULL, NULL),
('AIAD791218HTCRRN09', '1979', '', '', '0', NULL, '', '', NULL, NULL),
('AICD810706MCCVR300', '2472', '', '', '0', NULL, '', '', NULL, NULL),
('AICG710311HTCRNR05', '1894', '', '', '0', NULL, '', '', NULL, NULL),
('AIDM930617HCCRRN09', '3558', '', '', '0', NULL, '', '', NULL, NULL),
('AIGL710720MCCRMT05', '300', '', '', '0', NULL, '', '', NULL, NULL),
('AILG760408HCCVPR06', '2077', '', '', '0', NULL, '', '', NULL, NULL),
('AIMC841009MCCRTR09', '2914', '', '', '0', NULL, '', '', NULL, NULL),
('AINJ681110HCCRLR18', '2054', '', '', '0', NULL, '', '', NULL, NULL),
('AISE860107HCCVNR08', '3841', '', '', '0', NULL, '', '', NULL, NULL),
('AISJ780304HCCMNL07', '899', '', '', '0', NULL, '', '', NULL, NULL),
('AOAG610616HCCCLN08', '2114', '', '', '0', NULL, '', '', NULL, ''),
('AOGS681120MCCRMR09', '1049', '', '', '0', NULL, '', '', NULL, NULL),
('AOHE730616HCCRRV06', '691', '', '', '0', NULL, '', '', NULL, NULL),
('AOHM641114HCCLRN00', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('AOLI920608HCCLPV02', '3984', '', '', '0', NULL, '', '', NULL, ''),
('AOMA700901MCCZDN04', '2524', '', '', '0', NULL, '', '', NULL, NULL),
('AORA751003HTCRCD00', '639', '', '', '0', NULL, '', '', NULL, NULL),
('AOSD790916HYNRRLD1', '1411', '', '', '0', NULL, '', '', NULL, NULL),
('AUAL000712HTCLLSA9', '4196', '', '', '0', NULL, '', '', NULL, NULL),
('AUAR631004HTCGRS05', '1983', '', '', '0', NULL, '', '', NULL, ''),
('AUCR740401MCCNMC07', '58', '', '', '0', NULL, '', '', NULL, NULL),
('AUCR810812HYNRMD04', '2185', '', '', '0', NULL, '', '', NULL, NULL),
('AUEV600727HCCGFC07', '99', '', '', '0', NULL, '', '', NULL, ''),
('AUFF670404HVZMRR14', '1310', '', '', '0', NULL, '', '', NULL, NULL),
('AUGJ730206HCCZTR03', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('AUGJ761015MCCQML01', '742', '', '', '0', NULL, '', '', NULL, NULL),
('AUIE790428HTCLZL04', '1990', '', '', '0', NULL, '', '', NULL, NULL),
('AULY851206MCCGCM01', '2577', '', '', '0', NULL, '', '', NULL, ''),
('AUSG871223HCCGNB08', '2106', '', '', '0', NULL, '', '', NULL, ''),
('AUUC760326MYNGCL04', '1176', '', '', '0', NULL, '', '', NULL, ''),
('BAAF800822MCCXRR02', '2668', '', '', '0', NULL, '', '', NULL, NULL),
('BAAU810104HVZRRL04', '2702', '', '', '0', NULL, '', '', NULL, NULL),
('BACR750710HCCRMC04', '539', '', '', '0', NULL, '', '', NULL, NULL),
('BAFC900313MVZRLR02', '2932', '', '', '0', NULL, '', '', NULL, NULL),
('BAGA700824MCCRNN01', '483', '', '', '0', NULL, '', '', NULL, NULL),
('BAGM720918HCCLRN03', '1908', '', '', '0', NULL, '', '', NULL, NULL),
('BAGO780603HTCTMT00', '2074', '', '', '0', NULL, '', '', NULL, NULL),
('BAJJ730628HCCQ8N08', '3568', '', '', '0', NULL, '', '', NULL, NULL),
('BAMS691109HVZTLL07', '46', '', '', '0', NULL, '', '', NULL, NULL),
('BARA751130HCCLDN00', '3808', '', '', '0', NULL, '', '', NULL, NULL),
('BATR670819MCCRJS03', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('BEAC831115HTCLCR07', '1653', '', '', '0', NULL, '', '', NULL, NULL),
('BEHA640131HCCNRN08', '1966', '', '', '0', NULL, '', '', NULL, NULL),
('BEHD750625HCCNRM08', '429', '', '', '0', NULL, '', '', NULL, NULL),
('BEOL710906MNENXL06', '945', '', '', '0', NULL, '', '', NULL, NULL),
('BEQM810908HCCNRN08', '1860', '', '', '0', NULL, '', '', NULL, NULL),
('BIAM670310HCCRVR04', '557', '', '', '0', NULL, '', '', NULL, NULL),
('BICT750719MCCRRR01', '4002', '', '', '0', NULL, '', '', NULL, NULL),
('BODR610703MNERLT03', '1829', '', '', '0', NULL, '', '', NULL, NULL),
('CAAA770808MVZNLZ02', '1577', '', '', '0', NULL, '', '', NULL, NULL),
('CAAG810329HCCSRL03', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('CABC910525MCCSRR06', '4391', '', '', '0', NULL, '', '', NULL, NULL),
('CABW760817MCCLNN08', '886', '', '', '0', NULL, '', '', NULL, NULL),
('CACF820502HCCNJL00', '1702', '', '', '0', NULL, '', '', NULL, NULL),
('CACH700714HTCNRRR0', '2936', '', '', '0', NULL, '', '', NULL, NULL),
('CACI510528MCCRHS05', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('CACM631030HVZHHR00', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('CACM690312MYNNHR12', '1043', '', '', '0', NULL, '', '', NULL, NULL),
('CACX800130MYNNC19', '1557', '', '', '0', NULL, '', '', NULL, NULL),
('CADA721022MTCHMM05', '338', '', '', '0', NULL, '', '', NULL, NULL),
('CADD850510MCCJRL07', '2202', '', '', '0', NULL, '', '', NULL, NULL),
('CADK849430MCCJRY04', '3926', '', '', '0', NULL, '', '', NULL, NULL),
('CADL810825MCCJRS07', '1861', '', '', '0', NULL, '', '', NULL, NULL),
('CAEG880830HCCHHD10', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('CAGE620806MCCHNR03', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('CAGL700419HCCMS08', '1013', '', '', '0', NULL, '', '', NULL, NULL),
('CAHB680517MCCSRT02', '49', '', '', '0', NULL, '', '', NULL, NULL),
('CAHM760115HYNSXR06', '1252', '', '', '0', NULL, '', '', NULL, NULL),
('CALL790211HTCMPS08', '1936', '', '', '0', NULL, '', '', NULL, NULL),
('CALY750526HMNNPN05', '647', '', '', '0', NULL, '', '', NULL, NULL),
('CAMA650613MTCRRN01', '1062', '', '', '0', NULL, '', '', NULL, NULL),
('CAMA660413HYNMTG02', '1844', '', '', '0', NULL, '', '', NULL, NULL),
('CAME830401HPLJLR01', '4060', '', '', '0', NULL, '', '', NULL, NULL),
('CAMF790215MYNRDL01', '1363', '', '', '0', NULL, '', '', NULL, NULL),
('CAMF790221HVZRNL00', '3185', '', '', '0', NULL, '', '', NULL, NULL),
('CAMJ780624HCCSRN05', '3467', '', '', '0', NULL, '', '', NULL, NULL),
('CAMP611012HCCHXB09', '2076', '', '', '0', NULL, '', '', NULL, NULL),
('CAMR761031HCCRNM05', '1946', '', '', '0', NULL, '', '', NULL, NULL),
('CAMR770314MCCLNQ04', '941', '', '', '0', NULL, '', '', NULL, NULL),
('CAOS810724MDFSRR03', '1553', '', '', '0', NULL, '', '', NULL, NULL),
('CAPM700122MCCLRN03', '635', '', '', '0', NULL, '', '', NULL, NULL),
('CAPR660514HCCRRS04', '2024', '', '', '0', NULL, '', '', NULL, NULL),
('CARA891108MCCMZN07', '3749', '', '', '0', NULL, '', '', NULL, NULL),
('CARB800318MYNRDL00', '1556', '', '', '0', NULL, '', '', NULL, NULL),
('CARJ710213HCCNDN03', '538', '', '', '0', NULL, '', '', NULL, NULL),
('CARO910910HTCHD501', '4370', '', '', '0', NULL, '', '', NULL, NULL),
('CASA670807MNNNCC22', '784', '', '', '0', NULL, '', '', NULL, NULL),
('CASA721222HTSHSQ04', '1499', '', '', '0', NULL, '', '', NULL, NULL),
('CASS871120MCCSRL07', '2698', '', '', '0', NULL, '', '', NULL, NULL),
('CATA760419HCCCCN04', '1997', '', '', '0', NULL, '', '', NULL, NULL),
('CATE660621HCCNNL05', '659', '', '', '0', NULL, '', '', NULL, NULL),
('CAVF720820HCCSRR02', '2084', '', '', '0', NULL, '', '', NULL, NULL),
('CAVM761111MCCBLR09', '1345', '', '', '0', NULL, '', '', NULL, NULL),
('CAZM751201MCCMQR08', '675', '', '', '0', NULL, '', '', NULL, NULL),
('CEBJ700410MVZRRL02', '1680', '', '', '0', NULL, '', '', NULL, NULL),
('CEBR700410MVRRS03', '1173', '', '', '0', NULL, '', '', NULL, NULL),
('CEMA711004MCCNTN09', '1338', '', '', '0', NULL, '', '', NULL, NULL),
('CENO740320MYZRXT03', '1327', '', '', '0', NULL, '', '', NULL, NULL),
('CICL620410HCCHN501', '133', '', '', '0', NULL, '', '', NULL, NULL),
('CIDA690103MYNHMD00', '2028', '', '', '0', NULL, '', '', NULL, NULL),
('CIDE760302HCCHZD03', '287', '', '', '0', NULL, '', '', NULL, NULL),
('CIGC731015MCCHRR05', '630', '', '', '0', NULL, '', '', NULL, NULL),
('CILR640802HTCHYL05', '1263', '', '', '0', NULL, '', '', NULL, NULL),
('CIMS800525HCCHNX08', '760', '', '', '0', NULL, '', '', NULL, NULL),
('COBJ750522HCSSLL00', '1383', '', '', '0', NULL, '', '', NULL, NULL),
('COCE700530HCCNHV03', '999', '', '', '0', NULL, '', '', NULL, NULL),
('COER690608HCCNSB00', '612', '', '', '0', NULL, '', '', NULL, NULL),
('COFT870806MYNNRH07', '2159', '', '', '0', NULL, '', '', NULL, NULL),
('COGA740815MCCRRS09', '2997', '', '', '0', NULL, '', '', NULL, NULL),
('COJF740223HTCCRL08', '513', '', '', '0', NULL, '', '', NULL, NULL),
('COPG720109HCCRRN04', '4054', '', '', '0', NULL, '', '', NULL, NULL),
('CORL780515MCCNDL02', '2557', '', '', '0', NULL, '', '', NULL, NULL),
('CORR550816MVZNLF04', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('CORY801103MCCRDL02', '1358', '', '', '0', NULL, '', '', NULL, NULL),
('COUA790525HTCLLL08', '2266', '', '', '0', NULL, '', '', NULL, NULL),
('COVA751109HTCRZB05', '2005', '', '', '0', NULL, '', '', NULL, NULL),
('COZL690104HDFRPN00', '1076', '', '', '0', NULL, '', '', NULL, NULL),
('COZM751103MTCRCR00', '1055', '', '', '0', NULL, '', '', NULL, NULL),
('CUAA760202HOCRVL07', '2086', '', '', '0', NULL, '', '', NULL, NULL),
('CUAA791206HTCRRL01', '1923', '', '', '0', NULL, '', '', NULL, NULL),
('CUBR740816HPLRRB00', '2090', '', '', '0', NULL, '', '', NULL, NULL),
('CUCA640627HTCRRN01', '1992', '', '', '0', NULL, '', '', NULL, NULL),
('CUCG750713MDFRMD20', '1078', '', '', '0', NULL, '', '', NULL, NULL),
('CUCJ711023MVZRRS05', '950', '', '', '0', NULL, '', '', NULL, NULL),
('CUCM540907MCCRRR06', '712', '', '', '0', NULL, '', '', NULL, NULL),
('CUCS770321MVZRRC05', '1246', '', '', '0', NULL, '', '', NULL, NULL),
('CUDA660327HCCRZN06', '2655', '', '', '0', NULL, '', '', NULL, NULL),
('CUDC780207HCCRRR04', '1036', '', '', '0', NULL, '', '', NULL, NULL),
('CUGO790112HCCRDT16', '1356', '', '', '0', NULL, '', '', NULL, NULL),
('CUJJ700128HCCRMN08', '1920', '', '', '0', NULL, '', '', NULL, NULL),
('CUJJ900525HCCRMS05', '3985', '', '', '0', NULL, '', '', NULL, NULL),
('CUJL670622MCCRRD06', '1821', '', '', '0', NULL, '', '', NULL, NULL),
('CULM691111MTCRPR02', '674', '', '', '0', NULL, '', '', NULL, NULL),
('CULR670527HTCRPF01', '1940', '', '', '0', NULL, '', '', NULL, NULL),
('CUML770213MCCRND09', '605', '', '', '0', NULL, '', '', NULL, NULL),
('CUOC620613HCSRCL09', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('CURC671013MCCRMR03', '664', '', '', '0', NULL, '', '', NULL, NULL),
('CURM740325MCCRSR09', '2520', '', '', '0', NULL, '', '', NULL, NULL),
('CURPPRUEBA', '99999', 'pepe', 'etesech', '1', 'istockphoto-626956870-612x612.jpg', '2222222', 'prueba123@gmail.com', NULL, 'pruebas'),
('CURPPRUEBA2', '9999999', 'a', 'a', '7', '', '1234567890', 'a@gmail.com', NULL, 'pruebas'),
('CUSI760426MCCRNR01', '1709', '', '', '0', NULL, '', '', NULL, NULL),
('CUSM770120MCCRBR03', '1867', '', '', '0', NULL, '', '', NULL, NULL),
('CUVY800301MQRRRZ09', '1673', '', '', '0', NULL, '', '', NULL, NULL),
('CXGA720304MCCLMM06', '871', '', '', '0', NULL, '', '', NULL, NULL),
('DANJ861015MTCMTD09', '3605', '', '', '0', NULL, '', '', NULL, NULL),
('DAQA810302MCCMJD01', '3178', '', '', '0', NULL, '', '', NULL, NULL),
('DEEA660301HDFLSL09', '2296', '', '', '0', NULL, '', '', NULL, NULL),
('DEZF820217HTSLRR03', '3262', '', '', '0', NULL, '', '', NULL, NULL),
('DICM831221MCCZHR18', '3278', '', '', '0', NULL, '', '', NULL, NULL),
('DIHA741210HCCZRB07', '1929', '', '', '0', NULL, '', '', NULL, NULL),
('DIIG550423MNEZRS06', '2126', '', '', '0', NULL, '', '', NULL, NULL),
('DIMF621009HTCSNR01', '189', '', '', '0', NULL, '', '', NULL, NULL),
('DIMS770115HCCZNS07', '1322', '', '', '0', NULL, '', '', NULL, NULL),
('DIPJ791220HCCZRN07', '1388', '', '', '0', NULL, '', '', NULL, NULL),
('DIRP821010HCCZVD03', '1848', '', '', '0', NULL, '', '', NULL, NULL),
('DISC581208HCCNLN06', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('DOCA701015HCCMRL07', '1090', '', '', '0', NULL, '', '', NULL, NULL),
('DOPA880424MCCRRN06', '2768', '', '', '0', NULL, '', '', NULL, NULL),
('DOPM860523MCCRRY04', '2539', '', '', '0', NULL, '', '', NULL, NULL),
('DORM741211MCCMDR02', '365', '', '', '0', NULL, '', '', NULL, NULL),
('duplicado', '1797', '', '', '0', NULL, '', '', NULL, 'duplicado curp AUCL730323HTCGRS02'),
('duplicated', '1897', '', '', '0', NULL, '', '', NULL, 'duplicado curp AUCL730323HTCGRS02'),
('EABJ990611HCCCRN06', '4372', '', '', '0', NULL, '', '', NULL, NULL),
('EAHE640304MMCNR805', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('EASJ781216HCCCRN04', '2018', '', '', '0', NULL, '', '', NULL, NULL),
('EECA890504HCCCRN05', NULL, '', '', '0', NULL, '', '', NULL, 'sin datos'),
('EULF109271HTCHSD09', '1858', '', '', '0', NULL, '', '', NULL, NULL),
('EXOC891029HCCKR00', '3804', '', '', '0', NULL, '', '', NULL, NULL),
('EXON820503MCCKRY06', '4058', '', '', '0', NULL, '', '', NULL, NULL),
('LUFC730715MPLNLR09', '2419', '', '', '0', NULL, '', '', NULL, NULL),
('PPPPPPPPPPPPPPPPPP', '9999', 'pablo', 'pascual gomez', '2', 'IMG-20250918-WA0017.jpg', '0987654321', 'pagom@gmail.com', NULL, 'pruebas'),
('ROCA070910HCCSRLA7', '7777', 'alberto', 'rosado cruz', '5', 'anime.jpg', '9381576364', 'albertoroscruz@gmail.com', '2026-03-31', 'pruebas'),
('SOFA661006MJCLRD08', '206', '', '', '0', NULL, '', '', NULL, ''),
('SOVA760717MVZTLL02', '1691', '', '', '0', NULL, '', '', NULL, ''),
('VAAR780313MGRZRS07', '1526', '', '', '0', NULL, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosprueba`
--

CREATE TABLE `usuariosprueba` (
  `id_usuario` int(255) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `curp_usuario` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariosprueba`
--

INSERT INTO `usuariosprueba` (`id_usuario`, `nombre_usuario`, `contraseña`, `curp_usuario`) VALUES
(1, 'albertopruebal', '81dc9bdb52d04dc20036dbd8313ed055', 'ROCA070910HCCSRLA7'),
(5, 'pablo_usuario', '81dc9bdb52d04dc20036dbd8313ed055', 'PPPPPPPPPPPPPPPPPP'),
(6, 'usuarioprueba', '698d51a19d8a121ce581499d7b701668', 'CURPPRUEBA'),
(8, 'a', 'c4ca4238a0b923820dcc509a6f75849b', 'CURPPRUEBA2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areasprueba`
--
ALTER TABLE `areasprueba`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `sindicalizadosprueba`
--
ALTER TABLE `sindicalizadosprueba`
  ADD PRIMARY KEY (`curp`),
  ADD UNIQUE KEY `curp` (`curp`),
  ADD UNIQUE KEY `correo` (`num_emp`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `usuariosprueba`
--
ALTER TABLE `usuariosprueba`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `curp_usuario` (`curp_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuariosprueba`
--
ALTER TABLE `usuariosprueba`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sindicalizadosprueba`
--
ALTER TABLE `sindicalizadosprueba`
  ADD CONSTRAINT `sindicalizadosprueba_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `areasprueba` (`id_area`);

--
-- Filtros para la tabla `usuariosprueba`
--
ALTER TABLE `usuariosprueba`
  ADD CONSTRAINT `usuariosprueba_ibfk_1` FOREIGN KEY (`curp_usuario`) REFERENCES `sindicalizadosprueba` (`curp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
