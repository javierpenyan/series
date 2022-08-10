-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2022 a las 14:19:16
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `series`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `socio` bigint(20) NOT NULL,
  `serie` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`socio`, `serie`, `fecha`, `texto`) VALUES
(1, 39, '2022-02-08', 'Me aburre un poco'),
(1, 43, '2022-02-08', 'Una serie estupenda'),
(1, 50, '2022-02-08', 'Impresionante!!!!'),
(2, 42, '2022-02-01', 'Por el momento me ha enganchado'),
(3, 48, '2022-02-08', 'Muy buena serie'),
(3, 49, '2022-02-01', 'Una gran serie, muy entretenida'),
(4, 46, '2022-02-01', 'Me encanta la serie'),
(7, 45, '2022-02-19', 'Comencé a verla pero la deje, me aburría demasiado'),
(7, 47, '2022-02-19', 'Una gran serie'),
(12, 45, '2022-02-19', 'No está mal, aunque es liosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lanzamientos`
--

CREATE TABLE `lanzamientos` (
  `serie` bigint(20) NOT NULL,
  `plataforma` bigint(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lanzamientos`
--

INSERT INTO `lanzamientos` (`serie`, `plataforma`, `fecha`) VALUES
(39, 5, '2022-02-01'),
(40, 5, '2022-02-02'),
(42, 5, '2022-02-03'),
(42, 6, '2022-02-14'),
(42, 11, '2022-02-16'),
(43, 2, '2022-02-08'),
(44, 11, '2022-02-21'),
(45, 6, '2022-02-01'),
(45, 7, '2022-02-16'),
(45, 11, '2022-02-02'),
(46, 5, '2022-02-08'),
(46, 11, '2022-02-09'),
(47, 2, '2022-02-16'),
(47, 5, '2022-02-14'),
(47, 6, '2022-02-02'),
(47, 9, '2022-02-08'),
(48, 5, '2022-02-14'),
(48, 7, '2022-02-02'),
(50, 11, '2022-02-17'),
(51, 2, '2022-02-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` int(1) NOT NULL,
  `logotipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre`, `activo`, `logotipo`) VALUES
(2, 'DAZN', 1, '../imagenes/p_2.jpg'),
(5, 'HBO prime', 1, '../imagenes/p_8.jpg'),
(6, 'Star Play', 1, '../imagenes/p_6.jpg'),
(7, 'FILMIN', 1, '../imagenes/p_7.jpg'),
(9, 'Mitele PLUS', 1, '../imagenes/p_9.jpg'),
(10, 'pluto', 1, '../imagenes/p_10.jpg'),
(11, 'Netflix', 1, '../imagenes/p_11.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `nombre`, `descripcion`, `foto`, `activo`) VALUES
(38, 'Los 1000', 'Los 100 (en inglés: The 100, pronunciado The Hundred?)3? es una serie de televisión estadounidense de drama y ciencia ficción postapocalíptica que se estrenó el 19 de marzo de 2014 en The CW. La serie, desarrollada por Jason Rothenberg, se basa vagamente en la serie de novelas del mismo nombre de Kass Morgan', '../imagenes/Los 1000_51.jpg', 0),
(39, 'Dark', 'Dark es una serie de televisión web alemana de suspense y ciencia ficción creada por Baran bo Odar y Jantje Friese.5?6?7? Situada en la ficticia ciudad de Winden (Alemania), Dark sigue las secuelas de la desaparición de un niño que expone los secretos y las conexiones ocultas entre cuatro familias mientras desentrañan lentamente una siniestra conspiración de viaje en el tiempo que abarca tres generaciones. A lo largo de la serie, Dark explora las implicaciones existenciales del tiempo y sus efec', '../imagenes/DARK_39.jpg', 1),
(40, 'You', 'You es una serie de televisión estadounidense de suspenso psicológico desarrollada por Greg Berlanti y Sera Gamble. Producida por Warner Horizon Television, en asociación con Alloy Entertainment y A&E Studios, la primera temporada se basa en la novela homónima de 2014 de Caroline Kepnes y sigue a Joe Goldberg, un gerente de librería y asesino en serie de Nueva York que cuando se enamora desarrolla rápidamente una obsesión extrema, tóxica y delirante. Cuenta con Penn Badgley y Elizabeth Lail como', '../imagenes/You_51.jpg', 1),
(42, '13 Reasons', 'pantalla como TH1RTEEN R3ASONS WHY) es una serie de televisión estadounidense de misterio y drama adolescente producida por Selena Gomez, basada en la novela de 2007 Por trece razones de Jay Asher y adaptada por Brian Yorkey para Netflix.2? La trama gira en torno a una estudiante de preparatoria que se suicida después de una serie de fracasos culminantes, provocados por individuos selectos dentro de su escuela. Una caja de cintas de casete, grabadas por Hannah antes de su suicidio, detalla las t', '../imagenes/13 REASONS WHY_42.jpg', 1),
(43, 'NARCOS', 'Narcos es una serie de televisión web de ficción histórica producida por Dynamo Producciones y Gaumon International Television para Netflix. Creada por los estadounidenses Chris Brancato, Eric Newman y Carlo Bernard; y basada en la lucha contra el narcotráfico en Colombia durante los años 1990. Está protagonizada por Pedro Pascal, Boyd Holbrook, Wagner Moura y Juan Pablo Raba.  Las dos primeras temporadas se centran en la lucha de la DEA estadounidense y su principal objetivo, el líder del Carte', '../imagenes/Narcos_43.jpg', 1),
(44, 'Stranger Things', 'Stranger Things es una serie de televisión web estadounidense de suspenso y ciencia ficción coproducida y distribuida por Netflix.3? Escrita y dirigida por los hermanos Matt y Ross Duffer y producida ejecutivamente por Shawn Levy,4? fue estrenada en la plataforma Netflix el 15 de julio de 2016, con críticas positivas por parte de la prensa especializada, quienes elogiaron la interpretación, caracterización, ritmo, atmósfera y el claro homenaje al Hollywood de la década de 1980, con referencias a', '../imagenes/Strangers Tings_44.jpg', 1),
(45, 'The Whitcher', 'he Witcher es una serie de televisión web estadounidense de drama y fantasía oscura creada por Lauren Schmidt Hissrich para Netflix. Se basa en la Saga de Geralt de Rivia del escritor polaco Andrzej Sapkowski.  Ubicada en un mundo medieval en una masa de tierra conocida como \"el Continente\", The Witcher explora la leyenda de Geralt de Rivia y la princesa Ciri, que están unidos el uno al otro por el destino. Está protagonizada por Henry Cavill, Freya Allan y Anya Chalotra.  La primera temporada, ', '../imagenes/The Witcher_45.jpg', 1),
(46, 'Rétame', 'Dare Me sigue «la tensa relación entre dos mejores amigas después de que una nueva entrenadora llega para que su equipo se destaque. Mientras la amistad de las chicas se pone a prueba, sus jóvenes vidas cambian para siempre cuando un crimen impactante sacude su tranquilo mundo suburbano».2?', '../imagenes/Rétame_46.jpg', 1),
(47, 'Defenders', 'Marvel\'s The Defenders, o simplemente The Defenders,1? es una miniserie incluida en el Universo cinematográfico de Marvel. Su estreno tuvo lugar el 18 de agosto de 2017 en el servicio de streaming de Netflix.2? Está basada en la historia del grupo de mismo nombre de Marvel Comics. Se trata de un crossover de 4 personajes de diferentes series distribuidas también por Netflix, en este grupo se incluye a los superhéroes Daredevil, Jessica Jones, Luke Cage y Iron Fist.  Esta serie fue anunciada en 2', '../imagenes/Defenders_47.jpg', 1),
(48, 'Black Mirror', 'Black Mirror es una serie de televisión antológica británica de ciencia ficción distópica/costumbrista creada por Charlie Brooker.1? Descrita por su productora como «un híbrido de The Twilight Zone y Relatos de lo inesperado que se nutre de nuestro malestar contemporáneo sobre nuestro mundo moderno» la serie se caracteriza por presentar relatos distópicos autoconclusivos que muestran generalmente un sentimiento de «tecno-paranoia» y analizan cómo la tecnología afecta al ser humano.2?  La serie h', '../imagenes/Blaack Mirror_48.jpg', 1),
(49, 'Gambito de Dama', 'Gambito de dama es una historia ficticia que sigue la vida de una huérfana prodigio del ajedrez, Beth Harmon (Anya Taylor-Joy), durante su búsqueda para convertirse en la mejor jugadora de ajedrez del mundo mientras lucha con problemas emocionales y dependencia de las drogas y el alcohol. La historia comienza a mediados de la década de 1950 y continúa hasta la de 1960.5?  La serie comienza en un orfanato de niñas donde Beth conoce a Jolene (Moses Ingram), una niña vibrante y amigable unos años m', '../imagenes/Gambito de Dama_49.jpg', 0),
(50, 'MindHunter', 'Mindhunter es una serie de televisión estadounidense que fue estrenada el 13 de octubre de 2017 por Netflix.1?2? Está basada en el libro Mind Hunter: Inside FBI\'s Elite Serial Crime Unit de Mark Olshaker y John E. Douglas.3? En noviembre de 2017, Netflix anunció la renovación para una segunda temporada,4? que se estrenó el 16 de agosto de 2019.5?  Dirigida por David Fincher, Asif Kapadia, Tobias Lindholm y Andrew Douglas,2? la serie está ambientada en 1977 y se centra en dos agentes del FBI —int', '../imagenes/Mindhunter_50.jpg', 1),
(51, 'Dexter', 'Dexter es una serie de televisión emitida originalmente por la cadena Showtime desde el 1 de octubre de 2006 hasta el 22 de septiembre de 2013. Es protagonizada por Michael C. Hall (como Dexter) y está ambientada en Miami. La primera temporada está basada en la novela Darkly dreaming Dexter, de Jeff Lindsay. Las temporadas posteriores evolucionaron de forma independiente de las obras de Lindsay. Fue adaptada para la televisión por el guionista James Manos Jr., que escribió el primer episodio.  L', '../imagenes/Dexter_51.jpg', 1),
(52, 'Mad Men', 'Mad Men está situada en los años 1960, inicialmente en la ficticia agencia de marketing Sterling Cooper, en la Avenida Madison, Nueva York, y más tarde en la recientemente creada empresa de Sterling Cooper Draper Pryce (más tarde Sterling Cooper & Partners) situada, a dos avenidas de distancia, en el edificio Time-Life, en la Avenida de las Américas (Sexta Avenida) 1271. Según el piloto de la serie, el término mad men procede del argot acuñado en la década de 1950 por los publicistas que trabaja', '../imagenes/Mad Men_52.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombre`, `nick`, `pass`, `activo`) VALUES
(1, 'Administrador', 'admin', 'admin', 1),
(3, 'Jose', 'pepe', 'pepe', 0),
(4, 'javi', 'javi', 'javi', 0),
(7, 'Fran', 'fran', 'fran', 0),
(8, 'Carlos', 'carlos', 'carlos', 0),
(9, 'María', 'mari', 'mari', 1),
(10, 'Silvia', 'silvi', 'silvi', 1),
(11, 'Miriam', 'miriam', 'miriam', 1),
(12, 'Henar', 'heni', 'heni', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`socio`,`serie`),
  ADD KEY `serie` (`serie`);

--
-- Indices de la tabla `lanzamientos`
--
ALTER TABLE `lanzamientos`
  ADD PRIMARY KEY (`serie`,`plataforma`),
  ADD KEY `plataforma` (`plataforma`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`serie`) REFERENCES `series` (`id`);

--
-- Filtros para la tabla `lanzamientos`
--
ALTER TABLE `lanzamientos`
  ADD CONSTRAINT `lanzamientos_ibfk_1` FOREIGN KEY (`serie`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `lanzamientos_ibfk_2` FOREIGN KEY (`plataforma`) REFERENCES `plataformas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
