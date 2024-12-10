-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2024 a las 05:52:55
-- Versión del servidor: 11.6.2-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `loginphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`) VALUES
(1, 'Juan', 'Moreno', 'juan1@email.com', '$2y$10$LuBx25oVrZI89uuNJnzjBefAoeZAGIP92CY2hhjp7/GJ0gI6SN8ua'),
(2, 'Juan', 'Carlos', 'carlos1@email.com', '$2y$10$Z3mYeuPlmh1RsvQ7Wvj64ePMWvvQTWmk54Zp/vaSaTqzoM1az.DSy'),
(3, 'Nahomi', 'Moreno', 'naho1@email.com', '$2y$10$Z7HcZpYKq4MsSecJis7xEuMmsf9rznUrYMruSYXVYGaWePEhNTp2.'),
(4, 'Camila', 'Alcivar', 'camila2@email.com', '$2y$10$NQHjwJ5nIKwGNWQsDC6p4eKm2Y8SlcK3XGhKTM45CE0QTFr2Ilhea'),
(5, 'John', 'Salazar', 'john1@email.com', '$2y$10$scZNk4JfWvxnZirl.iiF5ORR1WjQ.SaPI38BP.xYrU4TculnsZKxO'),
(17, 'cebolla', 'tomate', 'cebolla1@email.com', '$2y$10$.m/X4yIRy8ATEXZ4eSXkeeG7dJppdUbasjWh7i5aXLv1vhyUcC4jy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
