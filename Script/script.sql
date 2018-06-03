CREATE DATABASE  IF NOT EXISTS bdtrabajo /*!40100 DEFAULT CHARACTER SET utf8 */;
USE bdtrabajo;

DROP TABLE IF EXISTS usuario;

CREATE TABLE usuario (
  idusuario int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(150) NOT NULL,
  login varchar(100) NOT NULL,
  password varchar(32) NOT NULL,
  PRIMARY KEY (idusuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS linea;

CREATE TABLE linea (
  idlinea int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(80) NOT NULL,
  descripcion varchar(80) NOT NULL,
  PRIMARY KEY (idlinea)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS marca;

CREATE TABLE marca (
  idmarca int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL,
  descripcion varchar(80) NOT NULL,
  PRIMARY KEY (idmarca)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS producto;

CREATE TABLE producto (
  idproducto int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(80) NOT NULL,
  unidadmedida varchar(6) DEFAULT NULL,
  precio decimal(10,0) NOT NULL,
  stock int(11) DEFAULT NULL,
  descuento decimal(10,0) DEFAULT '0',
  estado bit(1) NOT NULL DEFAULT b'1',
  idlinea int(11) NOT NULL,
  idmarca int(11) NOT NULL,
  PRIMARY KEY (idproducto),
  KEY fk_producto_linea (idlinea),
  KEY fk_producto_marca_idx (idmarca),
  CONSTRAINT fk_producto_linea FOREIGN KEY (idlinea) REFERENCES linea (idlinea) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT fk_producto_marca FOREIGN KEY (idmarca) REFERENCES marca (idmarca) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


USE bdtrabajo;
insert into usuario values (NULL,'Antony Monteza Ypanaque','AntonyUser',MD5('tony123'));
insert into usuario values (NULL,'Christian Mori Siesquen','ChritianUser',MD5('cris123'));
insert into usuario values (NULL,'Aldo Llatas Ontaneda','AldoUser',MD5('aldo123'));

USE bdtrabajo;
select * from usuario;

USE bdtrabajo;
insert into linea values (NULL,'Antitraspirantes','Todos los desodorantes');
insert into linea values (NULL,'Televisores Smart','Linea General de TV inteleigentes');
insert into linea values (NULL,'Abarrotes','Linea de verduras en general');

USE bdtrabajo;
update linea set nombre='Televisores Smart', descripcion='Linea General de TV inteleigentes' where idlinea=2;
select * from linea;