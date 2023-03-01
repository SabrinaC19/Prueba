CREATE SCHEMA IF NOT EXISTS `reporte_cita` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `reporte_cita` ;

-- -----------------------------------------------------
-- Table `reporte_cita`.`tblClientes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `reporte_cita`.`tblClientes` (
  `cedulaCliente` VARCHAR(15) NOT NULL ,
  `nombreCliente` VARCHAR(100) NOT NULL ,
  `apellidoCliente` VARCHAR(100) NOT NULL ,
  `correo` VARCHAR(120) NOT NULL ,
  `nroTelefono` VARCHAR(11) NULL ,
  PRIMARY KEY (`cedulaCliente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reporte_cita`.`tblCitasReservacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `reporte_cita`.`tblCitasReservacion` (
  `nroCita` INT(11) AUTO_INCREMENT NOT NULL ,
  `nombreEvento` VARCHAR(100) NOT NULL ,
  `fechaCita` DATE NOT NULL ,
  `horaCita` TIME NOT NULL ,
  `servicio` VARCHAR(60) NOT NULL ,
  `espacio` VARCHAR(60) NOT NULL ,
  `descripcionEvento` VARCHAR(160) NOT NULL ,
  `razonSocial` VARCHAR(160) NULL ,
  `correoContacto` VARCHAR(120) NULL ,
  `tlfContacto` VARCHAR(11) NULL ,
  `cartaSolicitud` VARCHAR(260) NULL ,
  `tipoCita` INT NOT NULL ,
  `estadoCita` INT NOT NULL,
  `cedCliente` VARCHAR(15) NULL ,
  PRIMARY KEY (`nroCita`) ,
  INDEX `FK_CitasClientes_idx` (`cedCliente` ASC) ,
  CONSTRAINT `FK_CitasClientes`
    FOREIGN KEY (`cedCliente` )
    REFERENCES `reporte_cita`.`tblClientes` (`cedulaCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `tblcitasreservacion` (`nombreEvento`, `fechaCita`, `horaCita`, `servicio`, `espacio`, `descripcionEvento`, `razonSocial`, `correoContacto`, `tlfContacto`, `tipoCita`, `estadoCita`) VALUES
('Evento A', '2023-02-22', '14:14:00', 'Concierto', 'Escenario', 'cghjghjhgcjhgjhg', NULL, NULL, NULL, 1, 1),
('Prueba Evento B', '2023-02-22', '14:15:00', 'Concierto', 'Escenario', 'hygfjhgfjhjhgfghnhg', NULL, NULL, NULL, 1, 1),
('Eventito', '2023-02-13', '03:05:00', 'Concurso', 'Escenario', 'bgfhbgfxhbgfhfdghfg', NULL, NULL, NULL, 1, 1),
('Eventote', '2023-02-28', '10:06:00', 'Concierto', 'Salon de los Espejos', 'fghfjhfhjnhgnhgmnhgjhjmh', NULL, NULL, NULL, 1, 1),
('Spiderman', '2023-03-11', '11:26:00', 'Concurso', 'Escenario', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 2),
('Romeo Y Julieta', '2023-03-01', '11:31:00', 'Obra Teatral', 'Salon de los Espejos', 'hgfhgfdhgfdhgdfghfhgf', NULL, NULL, NULL, 1, 2),
('Spiderman 2', '2023-02-28', '13:26:00', 'Obra Teatral', 'Escenario', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 2),
('Harry Potter', '2023-03-11', '14:15:00', 'Circo', 'Escenario', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 2),
('Star Wars', '2023-04-18', '13:26:00', 'Danza', 'Salon de los Espejos', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 3),
('Wanda Vision', '2023-03-11', '15:00:00', 'Festival', 'Salon de los Espejos', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 3),
('No me raspe', '2023-01-15', '09:30:00', 'Graduacion', 'Escenario', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 3),
('TSU 2023', '2023-06-08', '11:05:00', 'Graduacion', 'Escenario', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 3),
('Black Widow', '2023-03-19', '13:45:00', 'Monologo', 'Salon de los Espejos', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 0),
('La Rosalía', '2023-02-03', '15:30:00', 'Discurso', 'Escenario', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 0),
('Gamer Event', '2023-04-14', '9:00:00', 'Conferencia', 'Salon de los Espejos', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 0),
('Barbie Ballet', '2023-08-29', '10:38:00', 'Ballet', 'Escenario', 'fghfghfghgfhfghgfhfgh', NULL, NULL, NULL, 1, 0),

('Prueba este si', '2023-03-04', '14:40:00', 'Conferencia', 'Salon de los Espejos', 'gadsfhgfdhfssfjghjhgfdhgd', 'Sabrina C.A', 'sabrii@gmail.com', '04143509213', 2, 1),
('Operación Proyecto', '2023-03-20', '09:30:00', 'Graduacion', 'Escenario', 'fgjhfhjhgdjgdhjg', 'Sabrina Company', 'sabriColme@gmail.com', '0412-2678698', 2, 1),
('Prueba D', '2023-03-09', '10:15:00', 'Graduacion', 'Escenario', 'esfsagsgfdhgdhgf', 'Elisa CA', 'sabri@gmail.com', '0414-456789', 2, 1),
('Cittita', '2023-02-20', '09:30:00', 'Graduacion', 'Salon de los Espejos', 'fgjhfhjhgdjgdhjg', 'Sabrina', 'sabriColme@gmail.com', '0412-245698', 2, 1),
('Doctor Strange', '2023-02-28', '14:52:00', 'Obra Teatral', 'Escenario', 'hdghgfjgfjhgfjgfdkggdk', 'Prueba C.A', 'aaa@gmail.com', '04125468735', 2, 2),
('Bonita la flor', '2023-01-09', '13:06:00', 'Motivacional', 'Escenario', 'fghfghfghgfhfghgfhfgh', 'Proyectito', 'gonza@gmail.com', '04264567812', 2, 2),
('Otakus Group', '2023-02-15', '14:24:00', 'Convencion', 'Salon de los Espejos', 'fghfghfghgfhfghgfhfgh', 'Chesito S.A', 'elche@gmail.com', '04125689741', 2, 2),
('Aerial Dance', '2023-03-11', '15:45:00', 'Festival', 'Escenario', 'fghfghfghgfhfghgfhfgh', 'Dev Capa C.A', 'capita123@gmail.com', '04146325894', 2, 2),
('Modelos S', '2023-03-11', '09:03:00', 'Concurso', 'Salon de los Espejos', 'fghfghfghgfhfghgfhfgh', 'Messi.org', 'Giss30@gmail.com', '02514455712', 2, 3),
('Prom Uptaeb', '2023-04-16', '10:00:00', 'Graduacion', 'Escenario', 'fghfghfghgfhfghgfhfgh', 'Tiñouu', 'tiñix@gmail.com', '04143509213', 2, 3),
('Telas y Danza', '2023-04-01', '11:36:00', 'Concurso', 'Salon de los Espejos', 'fghfghfghgfhfghgfhfgh', 'UnixEvent', 'eventoA@gmail.com', '04128575497', 2, 3),
('Spideyy', '2023-05-30', '08:30:00', 'Discurso', 'Salon de los Espejos', 'fghfghfghgfhfghgfhfgh', 'SabriChabel C.A', 'sabrichabel@gmail.com', '04163596870', 2, 3),
('Ant Man Musical', '2023-05-18', '14:12:00', 'Danza', 'Escenario', 'fghfghfghgfhfghgfhfgh', 'Alosito', 'alooo@gmail.com', '02516658974', 2, 0),
('Hamlet', '2023-06-05', '15:55:00', 'Monologo', 'Escenario', 'fghfghfghgfhfghgfhfgh', 'UptInfo', 'bbbb@gmail.com', '04145687941', 2, 0),
('Los Valentinos', '2023-06-19', '11:40:00', 'Circo', 'Salon de los Espejos', 'fghfghfghgfhfghgfhfgh', 'Life Org', 'organizacion@gmail.com', '04122145689', 2, 0),
('Desarrollo web', '2023-07-07', '10:20:00', 'Clase Magistral', 'Escenario', 'fghfghfghgfhfghgfhfgh', 'Chriisss', 'siuuuu@gmail.com', '04168897456', 2, 0);