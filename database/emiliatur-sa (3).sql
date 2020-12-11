-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2020 a las 17:32:44
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emiliatur-sa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `id_usuario` int(20) NOT NULL,
  `id_destino` int(30) NOT NULL,
  `precio` int(10) NOT NULL,
  `fecha_compra` date NOT NULL,
  `numero_pasj` int(11) NOT NULL,
  `num_boleto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`id_usuario`, `id_destino`, `precio`, `fecha_compra`, `numero_pasj`, `num_boleto`) VALUES
(23, 1, 135, '2020-11-07', 3, 4725),
(23, 1, 135, '2020-11-07', 4, 4726),
(23, 1, 135, '2020-11-07', 5, 4727),
(23, 1, 135, '2020-11-07', 6, 4728),
(23, 1, 135, '2020-11-07', 7, 4729),
(23, 1, 135, '2020-11-07', 8, 4730),
(21, 18, 150, '2020-11-07', 0, 4731),
(21, 18, 150, '2020-11-07', 1, 4732),
(21, 18, 150, '2020-11-07', 2, 4733),
(21, 18, 150, '2020-11-07', 3, 4734),
(24, 17, 15, '2020-11-19', 0, 4735),
(24, 1, 135, '2020-11-21', 0, 4736),
(24, 1, 135, '2020-11-21', 1, 4737),
(24, 1, 135, '2020-11-21', 2, 4738),
(24, 1, 135, '2020-11-21', 3, 4739),
(24, 1, 135, '2020-11-21', 4, 4740),
(24, 1, 135, '2020-11-21', 5, 4741),
(24, 1, 135, '2020-11-21', 6, 4742),
(24, 1, 135, '2020-11-21', 7, 4743),
(24, 1, 135, '2020-11-21', 8, 4744),
(24, 8, 15, '2020-11-21', 0, 4745),
(24, 18, 90, '2020-11-22', 0, 4746),
(24, 18, 90, '2020-11-22', 1, 4747),
(24, 18, 90, '2020-11-22', 2, 4748),
(24, 18, 90, '2020-11-22', 3, 4749),
(24, 18, 90, '2020-11-22', 4, 4750),
(24, 18, 90, '2020-11-22', 5, 4751),
(24, 13, 105, '2020-11-22', 0, 4752),
(24, 13, 105, '2020-11-22', 1, 4753),
(24, 13, 105, '2020-11-22', 2, 4754),
(24, 13, 105, '2020-11-22', 3, 4755),
(24, 13, 105, '2020-11-22', 4, 4756),
(24, 13, 105, '2020-11-22', 5, 4757),
(24, 13, 105, '2020-11-22', 6, 4758),
(24, 17, 225, '2020-11-22', 0, 4759),
(24, 17, 225, '2020-11-22', 1, 4760),
(24, 17, 225, '2020-11-22', 2, 4761),
(24, 17, 225, '2020-11-22', 3, 4762),
(24, 17, 225, '2020-11-22', 4, 4763),
(24, 17, 225, '2020-11-22', 5, 4764),
(24, 17, 225, '2020-11-22', 6, 4765),
(24, 17, 225, '2020-11-22', 7, 4766),
(24, 17, 225, '2020-11-22', 8, 4767),
(24, 17, 225, '2020-11-22', 9, 4768),
(24, 17, 225, '2020-11-22', 10, 4769),
(24, 17, 225, '2020-11-22', 11, 4770),
(24, 17, 225, '2020-11-22', 12, 4771),
(24, 17, 225, '2020-11-22', 13, 4772),
(24, 17, 225, '2020-11-22', 14, 4773),
(24, 17, 225, '2020-11-22', 0, 4774),
(24, 17, 225, '2020-11-22', 1, 4775),
(24, 17, 225, '2020-11-22', 2, 4776),
(24, 17, 225, '2020-11-22', 3, 4777),
(24, 17, 225, '2020-11-22', 4, 4778),
(24, 17, 225, '2020-11-22', 5, 4779),
(24, 17, 225, '2020-11-22', 6, 4780),
(24, 17, 225, '2020-11-22', 7, 4781),
(24, 17, 225, '2020-11-22', 8, 4782),
(24, 17, 225, '2020-11-22', 9, 4783),
(24, 17, 225, '2020-11-22', 10, 4784),
(24, 17, 225, '2020-11-22', 11, 4785),
(24, 17, 225, '2020-11-22', 12, 4786),
(24, 17, 225, '2020-11-22', 13, 4787),
(24, 17, 225, '2020-11-22', 14, 4788);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buses`
--

CREATE TABLE `buses` (
  `matricula` varchar(10) COLLATE utf32_spanish_ci NOT NULL,
  `peso` int(50) NOT NULL,
  `altura` int(10) NOT NULL,
  `capacidad` int(10) NOT NULL,
  `estado` varchar(10) COLLATE utf32_spanish_ci NOT NULL,
  `numeroVehiculo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `buses`
--

INSERT INTO `buses` (`matricula`, `peso`, `altura`, `capacidad`, `estado`, `numeroVehiculo`) VALUES
('ESP-123', 45, 10, 40, 'activo', 1),
('gol-123', 0, 25, 40, 'activo', 8),
('gol-sls', 0, 25, 40, 'activo', 9),
('hps-453', 30, 25, 40, 'inactivo', 2),
('jps-546', 30, 40, 40, 'inactivo', 3),
('kls-325', 25, 40, 40, 'activo', 5),
('ksj-951', 50, 20, 40, 'activo', 7),
('lsd-753', 30, 25, 40, 'activo', 6),
('lsp-785', 30, 25, 40, 'activo', 4),
('mol-451', 0, 12, 40, 'activo', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_compra` int(15) NOT NULL,
  `destino` int(50) NOT NULL,
  `id_usuario` int(15) NOT NULL,
  `id_ruta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `boletos` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `ruta_id` int(11) NOT NULL,
  `Estado_pago` varchar(30) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_usuario`, `id_destino`, `boletos`, `costo`, `ruta_id`, `Estado_pago`) VALUES
(6, 21, 4, 3, 150, 34, 'pendiente'),
(8, 24, 17, 1, 15, 58, 'Aprobado'),
(10, 24, 8, 1, 15, 57, 'Aprobado'),
(12, 24, 18, 6, 90, 59, 'Aprobado'),
(13, 24, 13, 7, 105, 54, 'Aprobado'),
(14, 24, 17, 15, 225, 58, 'Aprobado'),
(15, 24, 17, 9, 135, 58, 'Cancelado'),
(16, 24, 16, 14, 210, 56, 'pendiente'),
(17, 24, 2, 7, 105, 41, 'pendiente'),
(18, 24, 15, 5, 75, 55, 'pendiente'),
(19, 24, 14, 2, 30, 53, 'pendiente'),
(20, 24, 12, 3, 45, 52, 'pendiente'),
(21, 24, 3, 4, 60, 44, 'pendiente'),
(22, 24, 10, 1, 15, 50, 'pendiente'),
(23, 24, 4, 3, 45, 34, 'pendiente'),
(24, 24, 4, 1, 15, 34, 'pendiente'),
(25, 24, 4, 3, 45, 34, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `id` int(11) NOT NULL,
  `asunto` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf32_spanish_ci NOT NULL,
  `estado_vista` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`id`, `asunto`, `descripcion`, `estado_vista`, `fecha`) VALUES
(1, 'compra de voletos', 'destino X manera X ', 'visto', '2020-11-18'),
(2, 'compra de voletos', 'destino guallaquil', 'visto', '2020-11-24'),
(3, 'compra de voletos', 'x destino', 'visto', '2020-11-24'),
(4, 'compra de voletos', 'x destinos', 'visto', '2020-11-03'),
(5, 'compra de voletos', 'el usuario  a comprado voletos para el destino: Ambato', 'visto', '2020-11-03'),
(6, 'compra de voletos', 'el usuario  a comprado voletos para el destino: Ambato', 'visto', '2020-11-03'),
(7, 'compra de voletos', 'el usuario admin a comprado voletos para el destino: Ambato', 'visto', '2020-11-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf32_spanish_ci NOT NULL,
  `descripcion` varchar(1800) COLLATE utf32_spanish_ci NOT NULL,
  `fecha_1` date NOT NULL,
  `fecha_2` date NOT NULL,
  `fecha_3` date NOT NULL,
  `hora_1` varchar(15) COLLATE utf32_spanish_ci NOT NULL,
  `hora_2` varchar(15) COLLATE utf32_spanish_ci NOT NULL,
  `hora_3` varchar(15) COLLATE utf32_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `nombre`, `descripcion`, `fecha_1`, `fecha_2`, `fecha_3`, `hora_1`, `hora_2`, `hora_3`, `imagen`) VALUES
(1, 'Guallaquil', 'Guayaquil es la ciudad más grande de Ecuador y ocupa un lugar primordial en la economía nacional. Gran parte de este avance económico se debe a su ubicación geográfica, pues se encuentra en la convergencia de dos grandes ríos: el Daule y el Babahoyo, a sólo 70 km del océano Pacífico. Luego de años de negligencia burocrática, finalmente la ciudad ha tomado su desarrollo en sus propias manos. Energizada por su recién descubierto interés en el turismo y su eterno compromiso con el desarrollo de la pequeña empresa y de los emprendedores comerciales, Guayaquil está plenamente consciente del potencial con que históricamente ha contado. No es posible decir, a estas alturas, que el renacimiento de Guayaquil sea un hecho consumado, pero sí que los signos de su avance están por todo lado. La prueba ', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'guayaquil.jpg'),
(2, 'Quito', 'Quito es una de las ciudades más irresistibles de América Latina. Anidada en un largo y estrecho valle andino, con las laderas del volcán Pichincha flanqueando todo su costado occidental, la ciudad es privilegiada por su espectacular entorno natural. La ciudad capital de Ecuador, con su mezcla de arquitectura colonial y moderna, ofrece un ambiente fascinante a quienes la visitan. Además de ser el centro político de la nación, es también su capital cultural, pues cuenta con una impresionante selección de museos, festivales, y también de vida nocturna .\r\n\r\nPor su ubicación, convenientemente centrada, Quito es también el punto de partida ideal para explorar todo el Ecuador. En sus alrededores es posible realizar múltiples excursiones de un día. Las calles del sector de La Mariscal están atestadas de agencias de viaje, restaurantes y bares, donde muchos de los visitantes pasan gran parte de su tiempo.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'quito.jpg'),
(3, 'Ibarra', 'Ibarra es la capital de la Provincia de Imbabura y la Región Norte (Ecuador). Por eso es el centro de desarrollo económico, educativo y científico de la zona. La ciudad se encuentra edificada a las faldas del volcán que lleva el mismo nombre de la provincia. Su clima veraniego y amabilidad de sus habitantes. Es muy visitada por los turistas nacionales y extranjeros como sitio de descanso, paisajistíco, cultural e histórico. Es una ciudad cultural en donde predomina el arte, la escritura, la pintura, el teatro y la historia; además existe una creciente oferta turística y hotelera ofrecida para toda la zona.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'ibarra.jpg'),
(4, 'Ambato', 'Ambato es la capital de la Provincia de Tungurahua, situada a 2600 metros de altitud, está enclavada en una hondonada formada por seis mesetas: Píllaro, Quisapincha, Tisaleo, Quero, Huambalo y Cotaló. La ciudad es conocida como Jardín del Ecuador, Tierra de Flores y Frutas o también como la ciudad de los tres Juanes, por ser cuna de Juan León Mera, Juan Montalvo y Juan Benigno Vela. Ambato ha sido castigado por varios terremotos y reconstruida casi en su totalidad en el año 1949, donde da inicio la Fiesta de las Flores y las Frutas en honor a la lucha de sus habitantes y hoy por hoy es una de las fiestas más importantes del Ecuador, en la cual participan delegaciones de varios países.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'ambato.jpg'),
(5, 'Salinas', 'Salinas es un importante centro turístico por sus hermosas y acogedoras playas, ofrece una gran diversidad de paisajes, deportes y diversión. Cuenta con hoteles de primera categoría, así como clubes, casinos, bares, discotecas y centros deportivos. Este es un lugar ideal para la práctica de deportes náuticos como: snorkel, velerismo, buceo, tabla vela, voleibol playero, jet sky, surf, pesca deportiva de profundidad, entre otras. Para la práctica de pesca de profundidad, Salinas es un lugar escogido para competiciones en el ámbito internacional debido a que en sus aguas abundan toda clase de codiciados peces como el picudo negro, azul, rayado, pez espada, tuna, dorado, entre otros. Desde aquí se han roto algunas marcas mundiales. Es considerada el balneario más importante, popular y visitado del Ecuador, por sus hermosas y acogedoras playas: Chipipe, San Lorenzo, Mar Bravo, La Chocolatera y piscinas de Ecuasal. Además, se puede apreciar la danza de las ballenas jorobadas que se acercan a tan solo 8 km de sus costas.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'salinas.jpg'),
(6, 'Manta', 'Es el primer puerto turístico, marítimo y pesquero del Ecuador, donde cada año llegan decenas de cruceros. Tiene gran actividad de exportación e importación. Cuenta con un aeropuerto internacional. En las playas de Santa Marianita y San Mateo se practican deportes extremos. Su actividad nocturna es intensa. En su interior cuenta con montañas como Pacoche, San Lorenzo y el Aromo, situados en el centro del territorio cantonal, que ofrecen vegetación y fauna, por donde se hacen recorridos de excursión.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'manta.jpg'),
(7, 'Machala', 'Machala, capital de la Provincia de El Oro, es un cantón agrícola productivo y con un gran movimiento comercial, constituyéndose en el polo económico del sur ecuatoriano. Sus pobladores se dedican a la actividad bananera, por ello es reconocida internacionalmente como “Capital Bananera del mundo”. La siembra y cosecha de camarón es otra de las actividades productivas. Su población se dedica en su mayoría a la actividad agrícola, industrial y portuaria, por ello es reconocida internacionalmente como “Capital Bananera del mundo”. La ciudad es el centro político, financiero y económico de la provincia, y uno de los principales del país, alberga grandes organismos culturales, financieros, administrativos y comerciales. Es conocida como la Capital Mundial del Banano, porque desde allí a través del Puerto Bolívar se exporta esta preciada fruta a todo el mundo.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'machala.jpg'),
(8, 'Napo', 'Los cronistas españoles e historiadores identifican al menos dos grandes grupos humanos que habitaron la actual provincia de Napo, los Omaguas y los Quijos. En el caso de los primeros, parece ser que antes del encuentro con los españoles, los Omaguas ya habían tenido al menos un contacto con el Inca Huayna Cápac. Toribio de Ortigueira obtiene esta información a través de Isabel Guachi, quien estuvo en la expedición del Inca, dando la siguiente descripción: “eran de buena disposición, bien ajustados, vestidos de manta y camisas del algodón pintadas de pincel y de diferentes pinturas”. En el caso de los Quijos, era evidente que su contacto con los pueblos de la sierra interandina era muy fluido al igual que con los Incas.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'napo.jpg'),
(9, 'Loja', 'Llamada desde siempre “Cuna del arte, las letras y la música” por el valioso aporte que ha dado al país y al mundo en esos ámbitos, pero además, “Jardín Botánico del Ecuador” por la rica diversidad de flora y fauna que posee. Loja, ubicada al sur-oriente de la provincia, es considerada un buen ejemplo para el Ecuador, pues en sus parques y calles el denominador común es el orden y el aseo. Es conocida como el Jardín Botánico del Ecuador por la rara, interesante y elevada biodiversidad.\r\n\r\nPor su desarrollo y ubicación geográfica fue nombrada sede administrativa de la región sur o zona 7 comprendida por las provincias de El Oro, Loja y Zamora Chinchipe. En Loja las actividades principales son la agricultura, ganadería, comercio, minería y pequeña industria. En el sector rural la ocupación campesina es combinada pues se dedican al cultivo de bienes agrícolas, la crianza de animales y obras artesanales.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'loja.jpg'),
(10, 'Tena', 'La ciudad de Tena denominada por muchos historiadores como San Juan de los Dos Ríos de Tena, recibe su nombre porque la ciudad se encuentra bañada por los ríos Tena y Panao. Tena a pequeña ciudad ordenada y dividida en dos por el río. La tranquilidad y amabilidad de su gente se siente en sus estrechas calles. Está ubicada en la zona sur de la provincia sobre el valle del río Misahuallí a una altitud de 510 msnm., en la Región Amazónica del Ecuador. Posee un clima cálido-húmedo con temperatura promedio de 25 Grado Celsius y humedad del 90 al 100 %. Tena tiene 23.307 habitantes; la ciudad está dividida en decenas de barrios. Es el centro político de la provincia, alberga los principales organismos gubernamentales, culturales y comerciales.\r\n\r\nEl Cantón Tena cuenta con una diversidad de atractivos naturales y manifestaciones culturales que se ubican en cada una de las parroquias las mismas que poseen características especiales que permiten a los visitantes conocer su historia y tradiciones de las etnias Kichwa y Huaorani. Entre las actividades que se pueden realizar son: excursiones a la selva, deportes de riesgo: rafting, kayak, tubing, canyoning trekking; eventos culturales como: música kichwa, danza, shamanismo, visita a los petroglifos, observación de aves, comidas típicas entre otras. La ciudad es el centro político de la provincia, alberga los principales organismos gubernamentales, culturales y comerciales.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'tena.jpg'),
(11, 'Guaranda', 'San Pedro de Guaranda es la capital de la Provincia de Bolívar, en la República del Ecuador, América del Sur. Está ubicada a 2.668 msnm., a solo 220 km. de Quito, la capital del país, y a 150 km. de Guayaquil, puerto principal.\r\n\r\nSe la conoce como «Ciudad de las Siete Colinas», por estar rodeada de siete colinas: San Jacinto, Loma de Guaranda, San Bartolo, Cruzloma, Tililag, Talalag y el Mirador.\r\n\r\nGuaranda es una ciudad pequeña, muy pintoresca, multicolor, enclavada en la Cordillera Occidental de los Andes. Con una vista espectacular del volcán Chimborazo. Cuenta con un clima muy agradable que oscila entre los 15 y 21 grados centígrados. Guaranda tiene una infraestructura única y llamativa, sus edificaciones llegan máximo a tres pisos, sus calles angostas son adoquinadas. Es una ciudad apacible, tranquila, sosegada, llena de calma, con gente muy amable y acogedora. Tiene el encanto de las ciudades idóneas para un buen descanso, en donde la cercanía y la camaradería es un plus que le da un encanto particular.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'guaranda.jpg'),
(12, 'La libertad', 'El Cantón La Libertad se encuentra comunicado con los cantones Salinas y Santa Elena por una red vial de buen estado en épocas seca y lluviosa. Este cantón es de superficie arenosa no muy plana y accidentada en su cercanía por riscos poco propicia para bañistas en marea alta. Este hermoso cantón de la Provincia de Santa Elena, posee una interesante tradición en lo relacionado con su denominación. Su territorio está situado en un lugar de verdadero privilegio en la Bahía de Santa Elena, contiguo a un conjunto pintoresco formado por rocas y denominado geográficamente \"Caleta\" en el que en forma natural se ha formado un vistoso arco geométrico. Su formación data de tiempos prehistóricos.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'libertad.jpg'),
(13, 'Sanborondon', 'Samborondón es una ciudad ecuatoriana; cabecera cantonal del Cantón Samborondón, así como la quinta urbe más grande y poblada de la Provincia de Guayas. Se localiza al centro-sur de la región litoral del Ecuador, en una extensa llanura, en la orilla derecha del río Babahoyo, a una altitud de 9 msnm y con un clima lluvioso tropical de 25°C en promedio.\r\n\r\nEs llamada \"La Capital ecuestre del Ecuador\" por su tradición caballista y la constante actividad equina. En el censo de 2010 tenía una población de 42.637 habitantes, lo que la convierte en la vigésima novena ciudad más poblada del país. Forma parte del área metropolitana de Guayaquil, pues su actividad económica, social y comercial está fuertemente ligada a Guayaquil, siendo \"ciudad dormitorio\" para miles de personas que se trasladan a Guayaquil por vía terrestre. El conglomerado alberga a 2.991.061 habitantes, y ocupa la primera posición entre las conurbaciones del Ecuador.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'samborondon.jpg'),
(14, 'Baños de Ag', 'Baños de Agua Santa se encuentra en la Provincia de Tungurahua solamente a 180 Km de Quito y 35 Km de Ambato. La ciudad turística de está ubicado en un valle con cascadas y aguas termales a lado del volcán Tungurahua con una altura de 5.016 metros. Baños tiene una población con 20.000 habitantes, está a una altura de 1.826 metros y posee temperaturas promedios de 20°C. El Cantón les invita a descansar en sus piscinas de aguas termales y spas, aventura para toda la familia o deportes extremos como descenso de ríos, escaladas, descenso de cañones, tirolina (tirolesa o canopy), senderismo, ciclismo de montaña o salto de puente (bungee jumping). Fiestas y feriados principales: Carnaval en Febrero, Semana Santa, 24 de mayo (Batalla de Pichincha), 10 de agosto (Primer grito de independencia), Fiestas de la Virgen en Octubre, 2 de noviembre (Día de los fieles difuntos) y la fiesta de Cantonización en Diciembre.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'va.png'),
(15, 'Otavalo', 'La verdadera belleza de Otavalo reside en su gente, los indígenas Otavaleños. El Mercado de Artesanías que hace famosa a esta ciudad es, sin dudas, uno de los más espectaculares de toda Sudamérica. Dos cosas fundamentales vuelven tan atractivo a este Mercado: su excepcional oferta y su relevancia cultural. Lo que lo vuelve fascinante es el modo en que el visitante puede vivir la cultura ecuatoriana y las tradiciones de la Sierra en un mercado donde las generaciones actuales interactúan del mismo modo que lo hacían en la época histórica en que fue creado.\r\n\r\nEl mejor día de la semana para visitar este rincón de los Andes es el sábado. Este día el mercado se expande por las calles de la ciudad desde su sitio original de la Plaza de los Ponchos. También es posible visitar el Mercado de Animales. Siga nuestro consejo: llegue el viernes en la tarde, relaciónese con la ciudad, váyase temprano a la cama y ponga su alarma para las 5:30 AM. Sacúdase la pereza del sueño y camine o tome un taxi hasta el Mercado de Animales.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'otavalo.jpg'),
(16, 'Montañita', 'Montañita es una zona no delimitada de comuna de pescadores de la Parroquia Manglaralto, en las costas ecuatorianas y en el cantón Santa Elena de la provincia Santa Elena en el Ecuador y por donde pasa la carretera de la Ruta del Sol o \"Ruta del Spondylus\". Se encuentra a solamente 200 km de la ciudad de Guayaquil, frente a la costa del Océano Pacífico, en la costa occidental de América del Sur.\r\n\r\nMontañita toma su nombre por estar ubicada en una ensenada rodeada por cerros y vegetación al pie del mar, como un valle con una playa extensa, actualmente es un balneario turístico internacional visitado por jóvenes que practican el turismo de aventura y surfistas, sus olas derechas perfectas que llegan hasta los 2.5 m atraen a turistas de todo el mundo.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'montanita.jpg'),
(17, 'Rio bamba', 'Es una ciudad de Ecuador, conocida también como: “Cuna de la Nacionalidad Ecuatoriana” , “Sultana de los Andes”, “Ciudad Bonita”, “Ciudad de las Primicias”, “Corazón de la Patria”, por su historia y belleza. Es la capital de la Provincia de Chimborazo. La Sultana de los Andes, llamada así porque está rodeada de majestuosos nevados que parecen formar una hermosa corona, fue en 1830, la ciudad en donde se realizó la Primera Asamblea Constituyente del Ecuador. Tal vez la última muestra de su coraje la dio su equipo, el Olmedo, que logró el Campeonato Nacional de Fútbol en el año 2000. Riobamba se levanta en la Llanura de Tapi, que se extiende inclinada desde las faldas del Chimborazo hasta las riberas de los ríos Chibunga, Guano y Chambo, donde cae abruptamente en cortes de 600 a800 metros.\r\n\r\nLa población de Riobamba se ha caracterizado por un constante flujo de migración a la que se ha sometido; que ha variado los índices de las diferentes etnias en la ciudad. Desde su fundación, la ciudad se compuso por descendientes de europeos e indígenas, poco a poco esa visión cambió y en la actualidad la mezcla se acentuó a tal grado que aunque aún se distingue en las calles personas blancas, mestizas e indígenas, es difícil definir con exactitud los porcentajes que contienen cada uno en la ciudad, a eso se suma la inmigración que tuvo la ciudad en la última década de ciudadanos chinos, cubanos y colombianos que generaron mayor mezcla de culturas.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'riobmba.jpg'),
(18, 'Cuenca', 'Se podría decir que Cuenca es la más encantadora entre todas las ciudades de Ecuador. Con sus calles empedradas, sus catedrales antiguas, sus parques coloniales y los ríos que la atraviesan.\r\n\r\nEn los últimos años Cuenca se ha convertido en el destino favorito de extranjeros jubilados que se han asentado en esta ciudad por el resto de sus vidas. Segura, con un bajo costo de la vida, y agradable a pesar de su clima relativamente frío, esta pequeña ciudad andina atrae actualmente a gran cantidad de inmigrantes.\r\n\r\nLos cuencanos son famosos por ser muy tradicionales, pero también por su tradición cultural, que ha producido más escritores, poetas, artistas y filósofos notables que cualquier otra ciudad de Ecuador. La cultura cuencana, así como su historia están ampliamente representadas en los muchos museos que existen en la ciudad. Quienes busquen opciones culturales en Cuenca podrán escoger durante el día entre museos, iglesias y plazas coloniales.', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'cuenca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cedula` int(10) NOT NULL,
  `nombre_emp` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `edad` int(10) NOT NULL,
  `sexo` varchar(10) COLLATE utf32_spanish_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cedula`, `nombre_emp`, `apellido`, `edad`, `sexo`, `telefono`) VALUES
(12356543, 'Olatz', 'Fuentes', 35, 'Masculino', '975465762'),
(123245324, 'juan', 'diaz', 25, 'hombre', '9142324'),
(245653535, 'Andrea', 'Prat', 25, 'femenino', '945454757'),
(564545655, 'Pablo', 'Caro', 25, 'masculino', '942572362'),
(1207207755, 'manuel', 'torrez', 35, 'masculino', '997424354'),
(1207564565, 'Esther', 'Pedraza', 45, 'femenino', '974432455'),
(1235454324, 'vicente', 'torrez', 42, 'hombre', '97542435');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `ID` int(11) NOT NULL,
  `id_emple` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `id_buses` varchar(11) COLLATE utf32_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(15) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`, `hora`) VALUES
(34, 245653535, 4, 'ESP-123', '2020-10-08', '2:25'),
(40, 12356543, 1, 'hps-453', '2020-10-07', '23:36'),
(41, 12356543, 2, 'ESP-123', '2020-10-06', '22:32'),
(42, 12356543, 1, 'ESP-123', '2020-10-28', '03:42'),
(43, 12356543, 2, 'hps-453', '2020-10-30', '21:47'),
(44, 123245324, 3, 'ESP-123', '2020-10-30', '23:48'),
(45, 245653535, 4, 'jps-546', '2020-10-31', '23:49'),
(46, 123245324, 5, 'ESP-123', '2020-10-31', '23:50'),
(47, 564545655, 6, 'lsd-753', '2020-11-01', '23:50'),
(48, 1207564565, 7, 'hps-453', '2020-10-31', '19:51'),
(49, 1235454324, 9, 'kls-325', '2020-11-03', '15:51'),
(50, 564545655, 10, 'lsp-785', '2020-11-02', '23:51'),
(51, 1235454324, 11, 'lsd-753', '2020-11-04', '14:52'),
(52, 12356543, 12, 'ESP-123', '2020-11-07', '23:52'),
(53, 245653535, 14, 'lsp-785', '2020-11-03', '23:53'),
(54, 1235454324, 13, 'lsd-753', '2020-10-31', '22:54'),
(55, 12356543, 15, 'lsd-753', '2020-11-02', '23:55'),
(56, 123245324, 16, 'hps-453', '2020-11-07', '23:56'),
(57, 564545655, 8, 'kls-325', '2020-10-31', '23:56'),
(58, 1207564565, 17, 'lsd-753', '2020-10-30', '23:57'),
(59, 123245324, 18, 'lsp-785', '2020-11-26', '18:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `username`, `email`, `clave`) VALUES
(8, 'este', 'as@hd.com', '741'),
(16, 'date', 'd@dm.com', '1234567'),
(19, 'N@omy', 'adf@gm.com', '$2y$10$vXnC4uR0wd1gJ.FqarA/MuXzV.4m.WekBdjsVpY7P6b'),
(20, 'jontahan', 'l@gm.com', '$2y$10$VeHjIj3dKBfk46AueZCHq.J.0GcB5P/za.w5LD.nOuT'),
(21, 'coello', 'g@mai.com', '$2y$10$I52109L.Y135.0hWDv6lTePzFEj.CXdwZgcubdGLgKz'),
(23, 'n@omy', 'n@omy.com', '$2y$10$M6u3bK5CPaTSbYXCyh3aYOkA729fEg0g1SGg.Zd8WcHUbzS25q.82'),
(24, 'admin', 'admin@gmail.com', '$2y$10$HPL5aX3NwmmgFju2M5WKregjXYXqt8Y2u4Bf1ic7u8qasSTCacjqi'),
(25, 'lsp12', 'asd2@das.cop', '$2y$10$yjhzBvgMgdPmEErvRbYuxOVSPXmTr4Maw4sboBzAAwpcYvB.lX3FW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`num_boleto`),
  ADD KEY `usuario` (`id_usuario`),
  ADD KEY `id_destino` (`id_destino`) USING BTREE;

--
-- Indices de la tabla `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `numeroVehiculo` (`numeroVehiculo`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `destino` (`destino`) USING BTREE,
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_ruta` (`id_ruta`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_destino` (`id_destino`),
  ADD KEY `ruta_id` (`ruta_id`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_emple` (`id_emple`),
  ADD KEY `id_destino` (`id_destino`),
  ADD KEY `id_buses` (`id_buses`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `num_boleto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4789;

--
-- AUTO_INCREMENT de la tabla `buses`
--
ALTER TABLE `buses`
  MODIFY `numeroVehiculo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_compra` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `boleto_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleto_ibfk_3` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_ruta`) REFERENCES `rutas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r` FOREIGN KEY (`destino`) REFERENCES `destino` (`id_destino`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_3` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD CONSTRAINT `rutas_ibfk_1` FOREIGN KEY (`id_emple`) REFERENCES `empleado` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rutas_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rutas_ibfk_3` FOREIGN KEY (`id_buses`) REFERENCES `buses` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
