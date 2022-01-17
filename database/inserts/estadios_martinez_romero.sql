-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2022 a las 17:19:29
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estadios_martinez_romero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `nombre`, `pais_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Berlín', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Hamburgo', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Bremen', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Dresde', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Múnich', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Bucaramanga', 52, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Bogotá', 52, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'cali', 52, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Medellin', 52, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Cúcuta', 52, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Londres', 78, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Liverpool', 78, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Bristol', 78, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Oxford', 78, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Nottingham', 78, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadios`
--

CREATE TABLE `estadios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_estadio` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acerca_estadio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terreno_id` bigint(20) UNSIGNED NOT NULL,
  `ciudad_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadio_motivo_inactividad`
--

CREATE TABLE `estadio_motivo_inactividad` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estadio_id` bigint(20) UNSIGNED NOT NULL,
  `motivo_inactividad_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruta_img` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadio_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_03_160840_create_terrenos_table', 1),
(6, '2022_01_03_161000_create_paises_table', 1),
(7, '2022_01_03_161056_create_ciudades_table', 1),
(8, '2022_01_03_172235_create_motivos_inactividades_table', 1),
(9, '2022_01_03_185712_create_estadios_table', 1),
(10, '2022_01_03_185843_create_tribunas_table', 1),
(11, '2022_01_03_191354_create_imagenes_table', 1),
(12, '2022_01_04_133225_create_estadio_motivo_inactividad_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivos_inactividades`
--

CREATE TABLE `motivos_inactividades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_motivo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `motivos_inactividades`
--

INSERT INTO `motivos_inactividades` (`id`, `nombre_motivo`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'prueba_motivo', NULL, NULL, NULL, '2022-01-14 01:54:01', '2022-01-14 01:54:01', NULL),
(2, 'prueba_2', 1, 1, NULL, '2022-01-14 01:55:15', '2022-01-14 01:55:15', NULL),
(3, 'pelea', NULL, NULL, NULL, '2022-01-14 03:34:15', '2022-01-14 03:34:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_corto` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre_corto`, `nombre`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AF', 'Afganistán', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'AX', 'Islas Gland', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'AL', 'Albania', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'DE', 'Alemania', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'AD', 'Andorra', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'AO', 'Angola', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'AI', 'Anguilla', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'AQ', 'Antártida', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'AG', 'Antigua y Barbuda', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'AN', 'Antillas Holandesas', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'SA', 'Arabia Saudí', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'DZ', 'Argelia', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'AR', 'Argentina', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'AM', 'Armenia', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'AW', 'Aruba', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'AU', 'Australia', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'AT', 'Austria', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'AZ', 'Azerbaiyán', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'BS', 'Bahamas', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'BH', 'Bahréin', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'BD', 'Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'BB', 'Barbados', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'BY', 'Bielorrusia', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'BE', 'Bélgica', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'BZ', 'Belice', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'BJ', 'Benin', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'BM', 'Bermudas', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'BT', 'Bhután', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'BO', 'Bolivia', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'BA', 'Bosnia y Herzegovina', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'BW', 'Botsuana', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'BV', 'Isla Bouvet', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'BR', 'Brasil', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'BN', 'Brunéi', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'BG', 'Bulgaria', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'BF', 'Burkina Faso', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'BI', 'Burundi', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'CV', 'Cabo Verde', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'KY', 'Islas Caimán', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'KH', 'Camboya', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'CM', 'Camerún', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'CA', 'Canadá', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'CF', 'República Centroafricana', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'TD', 'Chad', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'CZ', 'República Checa', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'CL', 'Chile', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'CN', 'China', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'CY', 'Chipre', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'CX', 'Isla de Navidad', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'VA', 'Ciudad del Vaticano', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'CC', 'Islas Cocos', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'CO', 'Colombia', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'KM', 'Comoras', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'CD', 'República Democrática del Congo', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'CG', 'Congo', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'CK', 'Islas Cook', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'KP', 'Corea del Norte', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'KR', 'Corea del Sur', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'CI', 'Costa de Marfil', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'CR', 'Costa Rica', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'HR', 'Croacia', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'CU', 'Cuba', NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'DK', 'Dinamarca', NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'DM', 'Dominica', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'DO', 'República Dominicana', NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'EC', 'Ecuador', NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'EG', 'Egipto', NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'SV', 'El Salvador', NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'AE', 'Emiratos Árabes Unidos', NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'ER', 'Eritrea', NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'SK', 'Eslovaquia', NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'SI', 'Eslovenia', NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'ES', 'España', NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'UM', 'Islas ultramarinas de Estados Unidos', NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'US', 'Estados Unidos', NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'EE', 'Estonia', NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'ET', 'Etiopía', NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'GB', 'Inglaterra', NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'FO', 'Islas Feroe', NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'PH', 'Filipinas', NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'FI', 'Finlandia', NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'FJ', 'Fiyi', NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'FR', 'Francia', NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'GA', 'Gabón', NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'GM', 'Gambia', NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'GE', 'Georgia', NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'GS', 'Islas Georgias del Sur y Sandwich del Sur', NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'GH', 'Ghana', NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'GI', 'Gibraltar', NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'GD', 'Granada', NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'GR', 'Grecia', NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'GL', 'Groenlandia', NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'GP', 'Guadalupe', NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'GU', 'Guam', NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'GT', 'Guatemala', NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'GF', 'Guayana Francesa', NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'GN', 'Guinea', NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'GQ', 'Guinea Ecuatorial', NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'GW', 'Guinea-Bissau', NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'GY', 'Guyana', NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'HT', 'Haití', NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'HM', 'Islas Heard y McDonald', NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'HN', 'Honduras', NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'HK', 'Hong Kong', NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'HU', 'Hungría', NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'IN', 'India', NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'ID', 'Indonesia', NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'IR', 'Irán', NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'IQ', 'Iraq', NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'IE', 'Irlanda', NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'IS', 'Islandia', NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'IL', 'Israel', NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'IT', 'Italia', NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'JM', 'Jamaica', NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'JP', 'Japón', NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'JO', 'Jordania', NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'KZ', 'Kazajstán', NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'KE', 'Kenia', NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'KG', 'Kirguistán', NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'KI', 'Kiribati', NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'KW', 'Kuwait', NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'LA', 'Laos', NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'LS', 'Lesotho', NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'LV', 'Letonia', NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'LB', 'Líbano', NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'LR', 'Liberia', NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'LY', 'Libia', NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'LI', 'Liechtenstein', NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'LT', 'Lituania', NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'LU', 'Luxemburgo', NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'MO', 'Macao', NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'MK', 'ARY Macedonia', NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'MG', 'Madagascar', NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'MY', 'Malasia', NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'MW', 'Malawi', NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'MV', 'Maldivas', NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'ML', 'Malí', NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'MT', 'Malta', NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'FK', 'Islas Malvinas', NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'MP', 'Islas Marianas del Norte', NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'MA', 'Marruecos', NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'MH', 'Islas Marshall', NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'MQ', 'Martinica', NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'MU', 'Mauricio', NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'MR', 'Mauritania', NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'YT', 'Mayotte', NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'MX', 'México', NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'FM', 'Micronesia', NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'MD', 'Moldavia', NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'MC', 'Mónaco', NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'MN', 'Mongolia', NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'MS', 'Montserrat', NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'MZ', 'Mozambique', NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'MM', 'Myanmar', NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'NA', 'Namibia', NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'NR', 'Nauru', NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'NP', 'Nepal', NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'NI', 'Nicaragua', NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'NE', 'Níger', NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'NG', 'Nigeria', NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'NU', 'Niue', NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'NF', 'Isla Norfolk', NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'NO', 'Noruega', NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'NC', 'Nueva Caledonia', NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'NZ', 'Nueva Zelanda', NULL, NULL, NULL, NULL, NULL, NULL),
(166, 'OM', 'Omán', NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'NL', 'Países Bajos', NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'PK', 'Pakistán', NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'PW', 'Palau', NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'PS', 'Palestina', NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'PA', 'Panamá', NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'PG', 'Papúa Nueva Guinea', NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'PY', 'Paraguay', NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'PE', 'Perú', NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'PN', 'Islas Pitcairn', NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'PF', 'Polinesia Francesa', NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'PL', 'Polonia', NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'PT', 'Portugal', NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'PR', 'Puerto Rico', NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'QA', 'Qatar', NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'RE', 'Reunión', NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'RW', 'Ruanda', NULL, NULL, NULL, NULL, NULL, NULL),
(183, 'RO', 'Rumania', NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'RU', 'Rusia', NULL, NULL, NULL, NULL, NULL, NULL),
(185, 'EH', 'Sahara Occidental', NULL, NULL, NULL, NULL, NULL, NULL),
(186, 'SB', 'Islas Salomón', NULL, NULL, NULL, NULL, NULL, NULL),
(187, 'WS', 'Samoa', NULL, NULL, NULL, NULL, NULL, NULL),
(188, 'AS', 'Samoa Americana', NULL, NULL, NULL, NULL, NULL, NULL),
(189, 'KN', 'San Cristóbal y Nevis', NULL, NULL, NULL, NULL, NULL, NULL),
(190, 'SM', 'San Marino', NULL, NULL, NULL, NULL, NULL, NULL),
(191, 'PM', 'San Pedro y Miquelón', NULL, NULL, NULL, NULL, NULL, NULL),
(192, 'VC', 'San Vicente y las Granadinas', NULL, NULL, NULL, NULL, NULL, NULL),
(193, 'SH', 'Santa Helena', NULL, NULL, NULL, NULL, NULL, NULL),
(194, 'LC', 'Santa Lucía', NULL, NULL, NULL, NULL, NULL, NULL),
(195, 'ST', 'Santo Tomé y Príncipe', NULL, NULL, NULL, NULL, NULL, NULL),
(196, 'SN', 'Senegal', NULL, NULL, NULL, NULL, NULL, NULL),
(197, 'CS', 'Serbia y Montenegro', NULL, NULL, NULL, NULL, NULL, NULL),
(198, 'SC', 'Seychelles', NULL, NULL, NULL, NULL, NULL, NULL),
(199, 'SL', 'Sierra Leona', NULL, NULL, NULL, NULL, NULL, NULL),
(200, 'SG', 'Singapur', NULL, NULL, NULL, NULL, NULL, NULL),
(201, 'SY', 'Siria', NULL, NULL, NULL, NULL, NULL, NULL),
(202, 'SO', 'Somalia', NULL, NULL, NULL, NULL, NULL, NULL),
(203, 'LK', 'Sri Lanka', NULL, NULL, NULL, NULL, NULL, NULL),
(204, 'SZ', 'Suazilandia', NULL, NULL, NULL, NULL, NULL, NULL),
(205, 'ZA', 'Sudáfrica', NULL, NULL, NULL, NULL, NULL, NULL),
(206, 'SD', 'Sudán', NULL, NULL, NULL, NULL, NULL, NULL),
(207, 'SE', 'Suecia', NULL, NULL, NULL, NULL, NULL, NULL),
(208, 'CH', 'Suiza', NULL, NULL, NULL, NULL, NULL, NULL),
(209, 'SR', 'Surinam', NULL, NULL, NULL, NULL, NULL, NULL),
(210, 'SJ', 'Svalbard y Jan Mayen', NULL, NULL, NULL, NULL, NULL, NULL),
(211, 'TH', 'Tailandia', NULL, NULL, NULL, NULL, NULL, NULL),
(212, 'TW', 'Taiwán', NULL, NULL, NULL, NULL, NULL, NULL),
(213, 'TZ', 'Tanzania', NULL, NULL, NULL, NULL, NULL, NULL),
(214, 'TJ', 'Tayikistán', NULL, NULL, NULL, NULL, NULL, NULL),
(215, 'IO', 'Territorio Británico del Océano Índico', NULL, NULL, NULL, NULL, NULL, NULL),
(216, 'TF', 'Territorios Australes Franceses', NULL, NULL, NULL, NULL, NULL, NULL),
(217, 'TL', 'Timor Oriental', NULL, NULL, NULL, NULL, NULL, NULL),
(218, 'TG', 'Togo', NULL, NULL, NULL, NULL, NULL, NULL),
(219, 'TK', 'Tokelau', NULL, NULL, NULL, NULL, NULL, NULL),
(220, 'TO', 'Tonga', NULL, NULL, NULL, NULL, NULL, NULL),
(221, 'TT', 'Trinidad y Tobago', NULL, NULL, NULL, NULL, NULL, NULL),
(222, 'TN', 'Túnez', NULL, NULL, NULL, NULL, NULL, NULL),
(223, 'TC', 'Islas Turcas y Caicos', NULL, NULL, NULL, NULL, NULL, NULL),
(224, 'TM', 'Turkmenistán', NULL, NULL, NULL, NULL, NULL, NULL),
(225, 'TR', 'Turquía', NULL, NULL, NULL, NULL, NULL, NULL),
(226, 'TV', 'Tuvalu', NULL, NULL, NULL, NULL, NULL, NULL),
(227, 'UA', 'Ucrania', NULL, NULL, NULL, NULL, NULL, NULL),
(228, 'UG', 'Uganda', NULL, NULL, NULL, NULL, NULL, NULL),
(229, 'UY', 'Uruguay', NULL, NULL, NULL, NULL, NULL, NULL),
(230, 'UZ', 'Uzbekistán', NULL, NULL, NULL, NULL, NULL, NULL),
(231, 'VU', 'Vanuatu', NULL, NULL, NULL, NULL, NULL, NULL),
(232, 'VE', 'Venezuela', NULL, NULL, NULL, NULL, NULL, NULL),
(233, 'VN', 'Vietnam', NULL, NULL, NULL, NULL, NULL, NULL),
(234, 'VG', 'Islas Vírgenes Británicas', NULL, NULL, NULL, NULL, NULL, NULL),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos', NULL, NULL, NULL, NULL, NULL, NULL),
(236, 'WF', 'Wallis y Futuna', NULL, NULL, NULL, NULL, NULL, NULL),
(237, 'YE', 'Yemen', NULL, NULL, NULL, NULL, NULL, NULL),
(238, 'DJ', 'Yibuti', NULL, NULL, NULL, NULL, NULL, NULL),
(239, 'ZM', 'Zambia', NULL, NULL, NULL, NULL, NULL, NULL),
(240, 'ZW', 'Zimbabue', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terrenos`
--

CREATE TABLE `terrenos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_terreno` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `terrenos`
--

INSERT INTO `terrenos` (`id`, `nombre_terreno`, `img`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 'Gramilla', '/storage/6p7mT8ndk9.jpeg', 1, 1, NULL, '2022-01-13 19:14:17', '2022-01-13 19:14:17', NULL),
(31, 'Polvo de ladrillo', '/storage/7RI8LpMkGD.jpeg', 1, 1, NULL, '2022-01-13 19:15:21', '2022-01-13 19:15:21', NULL),
(32, 'Gramilla sintética', '/storage/7Bsi8H2KGN.jpeg', 1, 1, NULL, '2022-01-13 19:30:45', '2022-01-13 19:30:45', NULL),
(33, 'Madera', '/storage/UGEl5lrciM.jpeg', 1, 1, NULL, '2022-01-13 19:31:23', '2022-01-13 19:31:23', NULL),
(34, 'Cemento', '/storage/pb77AeV8ol.jpeg', 1, 1, NULL, '2022-01-13 19:31:43', '2022-01-13 19:31:43', NULL),
(35, 'gramilla 2', '/storage/POa01il5GJ.jpeg', NULL, NULL, NULL, '2022-01-14 03:36:18', '2022-01-14 03:36:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tribunas`
--

CREATE TABLE `tribunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_tribuna` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_boleta` double(8,2) NOT NULL,
  `estadio_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acerca` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `phone`, `acerca`, `email`, `email_verified_at`, `password`, `img`, `remember_token`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'JHON A.', 'MARTINEZ R.', '3012039898', 'Proyecto de estadios coex', 'jhonmartinez@gmail.com', NULL, '$2y$10$Na4E5XsK8/DK.lA.0kY3KOHItaefk3G0KhH4yBPHdoNvH4uREn9Pu', NULL, NULL, NULL, NULL, NULL, '2022-01-08 21:42:52', '2022-01-08 21:42:52', NULL),
(2, 'jorshua', 'coex', '4312234', 'asdasd', 'jorshua@gmail.com', NULL, '$2y$10$/8.fLuzds7Gbp754fMLKDeZv5ethODyJpyOZ1JKDAjLjsNO6wex6.', NULL, NULL, NULL, NULL, NULL, '2022-01-12 00:28:44', '2022-01-12 00:28:44', NULL),
(3, 'JHON ALEXANDER', 'MARTINEZ ROMERO', '3012039898', 'prueba de registro con foto', 'jhoncoex@gmail.com', NULL, '$2y$10$QFdv9CgzHu32RdNc1giAruZMuDBlgGayifocsE6Ro2QY8aRMLmo3K', '/storage/yIqDKqXWpS.jpeg', NULL, 1, 1, NULL, '2022-01-14 18:57:11', '2022-01-14 18:57:11', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudades_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `estadios`
--
ALTER TABLE `estadios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estadios_terreno_id_foreign` (`terreno_id`),
  ADD KEY `estadios_ciudad_id_foreign` (`ciudad_id`);

--
-- Indices de la tabla `estadio_motivo_inactividad`
--
ALTER TABLE `estadio_motivo_inactividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estadio_motivo_inactividad_estadio_id_foreign` (`estadio_id`),
  ADD KEY `estadio_motivo_inactividad_motivo_inactividad_id_foreign` (`motivo_inactividad_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_estadio_id_foreign` (`estadio_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `motivos_inactividades`
--
ALTER TABLE `motivos_inactividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `terrenos`
--
ALTER TABLE `terrenos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tribunas`
--
ALTER TABLE `tribunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tribunas_estadio_id_foreign` (`estadio_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `estadios`
--
ALTER TABLE `estadios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadio_motivo_inactividad`
--
ALTER TABLE `estadio_motivo_inactividad`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `motivos_inactividades`
--
ALTER TABLE `motivos_inactividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terrenos`
--
ALTER TABLE `terrenos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tribunas`
--
ALTER TABLE `tribunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`);

--
-- Filtros para la tabla `estadios`
--
ALTER TABLE `estadios`
  ADD CONSTRAINT `estadios_ciudad_id_foreign` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`),
  ADD CONSTRAINT `estadios_terreno_id_foreign` FOREIGN KEY (`terreno_id`) REFERENCES `terrenos` (`id`);

--
-- Filtros para la tabla `estadio_motivo_inactividad`
--
ALTER TABLE `estadio_motivo_inactividad`
  ADD CONSTRAINT `estadio_motivo_inactividad_estadio_id_foreign` FOREIGN KEY (`estadio_id`) REFERENCES `estadios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `estadio_motivo_inactividad_motivo_inactividad_id_foreign` FOREIGN KEY (`motivo_inactividad_id`) REFERENCES `motivos_inactividades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_estadio_id_foreign` FOREIGN KEY (`estadio_id`) REFERENCES `estadios` (`id`);

--
-- Filtros para la tabla `tribunas`
--
ALTER TABLE `tribunas`
  ADD CONSTRAINT `tribunas_estadio_id_foreign` FOREIGN KEY (`estadio_id`) REFERENCES `estadios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
