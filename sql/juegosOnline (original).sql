CREATE TABLE IF NOT EXISTS `juegosonline`.`juegosonline_juegos` (
  `id`      INT NOT NULL AUTO_INCREMENT, 
  `tipo_id`  INT NOT NULL,
  `categoria_id`  INT NOT NULL,

  `nombre`  VARCHAR(32) NOT NULL,
  `descripcion`  VARCHAR(256) DEFAULT NULL,

  `url_juego`  VARCHAR(256) NOT NULL,
  `img_principal`  VARCHAR(128) NOT NULL,
  `img_secundaria`  VARCHAR(128) DEFAULT NULL,

  `estado`  INT NOT NULL,
  `creado`  DATETIME NOT NULL,
  `actualizado` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `juegosonline`.`juegosonline_juegos_categorias` (
  `id`      INT NOT NULL AUTO_INCREMENT, 

  `nombre`  VARCHAR(32) NOT NULL,
  `descripcion`  VARCHAR(256) DEFAULT NULL,
  
  `estado`  INT NOT NULL,
  `creado`  DATETIME NOT NULL,
  `actualizado` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `juegosonline_usuarios` (
  `id`              INT NOT NULL AUTO_INCREMENT,

  `apellido`      VARCHAR(64) DEFAULT NULL,
  `nombre`          VARCHAR(64) DEFAULT NULL,
  `telefono`        INT DEFAULT NULL,
  `correo`          VARCHAR(120) DEFAULT NULL,

  `log_correo`      VARCHAR(120) DEFAULT NULL,
  `log_pass`        VARCHAR(32) DEFAULT NULL,

  `validado`        INT DEFAULT NULL,
  `keymaster`       VARCHAR(32) DEFAULT NULL,

  `estado`          INT DEFAULT NULL,
  `creado`          DATETIME DEFAULT NULL,
  `actualizado`     DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `juegosonline_juegos` ADD `destacado` INT DEFAULT 0 AFTER `codigo`;
ALTER TABLE `juegosonline_juegos` ADD `slug` VARCHAR(256) DEFAULT NULL AFTER `nombre`;
