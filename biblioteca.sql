
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;




CREATE TABLE `libros` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Autor` varchar(100) DEFAULT NULL,
  `ISBN` varchar(20) DEFAULT NULL,
  `Editorial` varchar(50) DEFAULT NULL,
  `Categoria` varchar(50) DEFAULT NULL,
  `cantidad_disponible` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `libros` (`ID`, `Titulo`, `Autor`, `ISBN`, `Editorial`, `Categoria`, `cantidad_disponible`) VALUES
(1, 'La vuelta al mundo en 80 dias', 'manolo serna', '3', 'america', 'ficcion', '2');


CREATE TABLE `prestamos` (
  `ID` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `ID_libro` int(11) DEFAULT NULL,
  `Fecha_prestamo` date DEFAULT NULL,
  `Fecha_devolucion` date DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `prestamos` (`ID`, `ID_usuario`, `ID_libro`, `Fecha_prestamo`, `Fecha_devolucion`, `Estado`) VALUES
(3, 2, 1, '2024-08-16', '2024-08-23', 'pre');



CREATE TABLE login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `tipo_doc` varchar(20) DEFAULT NULL,
  `documento` int(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `usuarios` (`ID`, `Nombres`, `Apellidos`, `tipo_doc`, `documento`, `correo`) VALUES
(2, 'Manolo', 'Arevalo Serna', 'Targeta de Identidad', 1017931741, 'manolo.arevalo22@gmail.com'),
(3, 'yuliana', 'serna', 'Cedula de Ciudadania', 123531233, 'yuliana@gmail.com');


ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_libro` (`ID_libro`);

--
-- Indices de la tabla `registro_login`
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`ID_libro`) REFERENCES `libros` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
