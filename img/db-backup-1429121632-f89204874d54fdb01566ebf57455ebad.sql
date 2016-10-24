DROP TABLE admision_paciente;

CREATE TABLE `admision_paciente` (
  `id_admision` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` varchar(14) NOT NULL,
  `observaciones` varchar(600) NOT NULL,
  PRIMARY KEY (`id_admision`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO admision_paciente VALUES("5","456789","2015-04-06","10:12:36 am","...!");
INSERT INTO admision_paciente VALUES("6","333","2015-04-06","10:20:43 am","NO obs");
INSERT INTO admision_paciente VALUES("7","111","2015-04-06","10:22:39 am","awdawd");
INSERT INTO admision_paciente VALUES("8","999","2015-04-06","10:51:28 am","d");



DROP TABLE almacen;

CREATE TABLE `almacen` (
  `idalmacen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `estatus` int(11) NOT NULL COMMENT '1 = Activo 0 = Inactivo',
  `id_user` int(11) NOT NULL COMMENT 'responsable',
  PRIMARY KEY (`idalmacen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO almacen VALUES("4","Almacen2","Alamacen generico.","0","3");
INSERT INTO almacen VALUES("5","Nuevo almacén","Productos de limpieza","0","2");



DROP TABLE banco;

CREATE TABLE `banco` (
  `idbanco` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL COMMENT '0 = Inactivo 1 = Activo',
  PRIMARY KEY (`idbanco`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO banco VALUES("1","Banesco","0");
INSERT INTO banco VALUES("5","Banco de Venezuela","1");
INSERT INTO banco VALUES("7","Mercantil","1");
INSERT INTO banco VALUES("8","Fondo común","1");



DROP TABLE categoria_productos;

CREATE TABLE `categoria_productos` (
  `id_cat_prod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cat_prod`),
  UNIQUE KEY `id_cat` (`id_cat_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO categoria_productos VALUES("1","Medicinas");
INSERT INTO categoria_productos VALUES("2","Productos de limpieza");



DROP TABLE consumos_paciente;

CREATE TABLE `consumos_paciente` (
  `id_consumo` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_consumo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE habitacion;

CREATE TABLE `habitacion` (
  `idhabitacion` int(11) NOT NULL AUTO_INCREMENT,
  `habitacion` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`idhabitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO habitacion VALUES("5","SB2000","1");



DROP TABLE iva;

CREATE TABLE `iva` (
  `id_iva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_vigencia` date NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id_iva`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO iva VALUES("1","2015-04-13","12");



DROP TABLE margen_ganancia;

CREATE TABLE `margen_ganancia` (
  `id_mg` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_vigencia` date NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id_mg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO margen_ganancia VALUES("1","2015-04-14","30");



DROP TABLE modulos_sistema;

CREATE TABLE `modulos_sistema` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(150) NOT NULL,
  `icono` varchar(20) NOT NULL,
  `orden` int(11) NOT NULL COMMENT 'Orden en que aparecera el modulo en el menu',
  `estatus` int(11) NOT NULL COMMENT '1=habilitado, 2=deshabilitado',
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO modulos_sistema VALUES("1","Maestro","key","0","1");
INSERT INTO modulos_sistema VALUES("7","Pacientes","users","1","1");
INSERT INTO modulos_sistema VALUES("8","Proveedores","briefcase","2","1");
INSERT INTO modulos_sistema VALUES("9","Almacén","cubes","3","1");
INSERT INTO modulos_sistema VALUES("10","Bancos","university","4","1");
INSERT INTO modulos_sistema VALUES("11","Servicios","book","5","1");
INSERT INTO modulos_sistema VALUES("12","Habitaciones","bed","6","1");
INSERT INTO modulos_sistema VALUES("13","Admisión","sign-in","7","1");
INSERT INTO modulos_sistema VALUES("14","Personal","user-md","9","1");
INSERT INTO modulos_sistema VALUES("15","Carga de consumos","medkit","8","1");
INSERT INTO modulos_sistema VALUES("16","Facturación","credit-card","10","1");



DROP TABLE modulos_usuarios;

CREATE TABLE `modulos_usuarios` (
  `id_modulo` int(11) NOT NULL,
  `tipo_user` int(11) NOT NULL COMMENT 'Tipo de usuario que tiene acceso al modulo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO modulos_usuarios VALUES("1","0");
INSERT INTO modulos_usuarios VALUES("4","0");
INSERT INTO modulos_usuarios VALUES("5","0");
INSERT INTO modulos_usuarios VALUES("9","0");
INSERT INTO modulos_usuarios VALUES("7","0");
INSERT INTO modulos_usuarios VALUES("8","0");
INSERT INTO modulos_usuarios VALUES("9","1");
INSERT INTO modulos_usuarios VALUES("10","0");
INSERT INTO modulos_usuarios VALUES("11","0");
INSERT INTO modulos_usuarios VALUES("12","0");
INSERT INTO modulos_usuarios VALUES("13","0");
INSERT INTO modulos_usuarios VALUES("14","0");
INSERT INTO modulos_usuarios VALUES("15","0");
INSERT INTO modulos_usuarios VALUES("16","0");



DROP TABLE pacientes;

CREATE TABLE `pacientes` (
  `idpaciente` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(11) NOT NULL,
  PRIMARY KEY (`idpaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO pacientes VALUES("1","1234","Nora","Ramirez","Maracay","04245555555");
INSERT INTO pacientes VALUES("2","1212","Javier","Noriega","Maracay","");
INSERT INTO pacientes VALUES("3","456789","Cárlos Alberto","D Sousa ","Maracay","0412896565");
INSERT INTO pacientes VALUES("15","444","New ","Pacient","Maracay","0515-621562");
INSERT INTO pacientes VALUES("17","222","News","Paci","Maracay","1234-567890");
INSERT INTO pacientes VALUES("18","333","Nom","Ape","Maracay","2345-678923");
INSERT INTO pacientes VALUES("19","111","Nom","Pas","Maracay","2345-678764");



DROP TABLE personal;

CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `sexo` int(11) NOT NULL COMMENT '1 = Masculino 2 = Femenino',
  `idtipopersonal` int(11) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `permisosanitario` varchar(255) NOT NULL,
  PRIMARY KEY (`idpersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE presentacion_productos;

CREATE TABLE `presentacion_productos` (
  `id_presentacion` int(11) NOT NULL AUTO_INCREMENT,
  `nom_presentacion` varchar(100) NOT NULL,
  `ab_presentacion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_presentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO presentacion_productos VALUES("4","Miligramos","Mg");



DROP TABLE producto_inventario;

CREATE TABLE `producto_inventario` (
  `idproductoinventario` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `prec_pro` varchar(30) NOT NULL,
  `precio_factura` varchar(11) NOT NULL,
  `cant_prod` int(11) NOT NULL,
  `fecha_recepcion` date NOT NULL,
  `fecha_lote` date NOT NULL,
  `idalmacen` int(11) NOT NULL,
  PRIMARY KEY (`idproductoinventario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO producto_inventario VALUES("2","2","40.00","!0000004000","30","2015-04-14","2015-04-14","4");
INSERT INTO producto_inventario VALUES("4","3","200.00","!0000020000","29","2015-04-14","2016-04-14","4");
INSERT INTO producto_inventario VALUES("5","3","60.00","!0000006000","15","2015-04-14","2015-12-14","4");



DROP TABLE productos;

CREATE TABLE `productos` (
  `id_prod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_prod` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nom_prod` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `desc_prod` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `id_cat_prod` int(11) NOT NULL,
  `id_sub_cat_prod` int(11) NOT NULL,
  `idpresentacion` int(11) NOT NULL,
  `cant_presentacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cant_minima` int(11) NOT NULL,
  PRIMARY KEY (`id_prod`),
  UNIQUE KEY `id_prod` (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO productos VALUES("2","002","Acetaminofem","Fiebre","1","9","4","100","0");
INSERT INTO productos VALUES("3","001","Dol","para el dolor de cabeza","1","9","4","100","0");



DROP TABLE programa_usuarios;

CREATE TABLE `programa_usuarios` (
  `id_programa` int(11) NOT NULL,
  `tipo_user` int(11) NOT NULL COMMENT 'Tipo de usuario que tiene acceso al programa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO programa_usuarios VALUES("10","1");
INSERT INTO programa_usuarios VALUES("13","1");
INSERT INTO programa_usuarios VALUES("20","0");
INSERT INTO programa_usuarios VALUES("10","0");
INSERT INTO programa_usuarios VALUES("14","0");
INSERT INTO programa_usuarios VALUES("13","0");
INSERT INTO programa_usuarios VALUES("19","0");
INSERT INTO programa_usuarios VALUES("15","0");
INSERT INTO programa_usuarios VALUES("23","0");
INSERT INTO programa_usuarios VALUES("25","0");
INSERT INTO programa_usuarios VALUES("18","0");
INSERT INTO programa_usuarios VALUES("24","0");
INSERT INTO programa_usuarios VALUES("26","0");
INSERT INTO programa_usuarios VALUES("1","0");
INSERT INTO programa_usuarios VALUES("5","0");
INSERT INTO programa_usuarios VALUES("2","0");
INSERT INTO programa_usuarios VALUES("12","0");
INSERT INTO programa_usuarios VALUES("11","0");
INSERT INTO programa_usuarios VALUES("8","0");
INSERT INTO programa_usuarios VALUES("27","0");
INSERT INTO programa_usuarios VALUES("22","0");
INSERT INTO programa_usuarios VALUES("21","0");
INSERT INTO programa_usuarios VALUES("9","0");
INSERT INTO programa_usuarios VALUES("17","0");



DROP TABLE programas_sistema;

CREATE TABLE `programas_sistema` (
  `id_programa` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) NOT NULL,
  `nombre_programa` varchar(200) NOT NULL,
  `ruta` varchar(300) NOT NULL,
  `orden` int(11) NOT NULL COMMENT 'Orden en que aparecera el programa en el menu',
  `opt` int(11) NOT NULL COMMENT 'Esto es para el REQUEST (Este valor es el mismo id_programa)',
  `estatus` int(11) NOT NULL COMMENT '1=Habilitado, 2=Deshabilitado',
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO programas_sistema VALUES("1","1","Módulos sistema","mantenimiento/modulos_sistema.php","0","1","1");
INSERT INTO programas_sistema VALUES("2","1","Programas sistema","mantenimiento/programas_sistema.php","1","2","1");
INSERT INTO programas_sistema VALUES("5","1","Permisos usuarios","mantenimiento/permisos.php","2","5","1");
INSERT INTO programas_sistema VALUES("8","7","Pacientes","pacientes/pacientes.php","1","8","1");
INSERT INTO programas_sistema VALUES("9","8","Proveedores","proveedores/proveedor.php","1","9","1");
INSERT INTO programas_sistema VALUES("10","9","Almacén","inventario/almacen.php","1","10","1");
INSERT INTO programas_sistema VALUES("11","1","Usuarios","mantenimiento/usuarios.php","3","11","1");
INSERT INTO programas_sistema VALUES("12","1","Tipos de usuarios","mantenimiento/tipo_usuarios.php","4","12","1");
INSERT INTO programas_sistema VALUES("13","9","Inventario general","inventario/productos.php","2","13","1");
INSERT INTO programas_sistema VALUES("14","9","Categorías/Sub-Categorías","inventario/config_categorias.php","3","14","1");
INSERT INTO programas_sistema VALUES("15","10","Bancos","mantenimiento/banco.php","1","15","1");
INSERT INTO programas_sistema VALUES("16","1","Cambio de contraseña","mantenimiento/cambio_pass.php","4","16","1");
INSERT INTO programas_sistema VALUES("17","11","Servicios","servicios/servicios.php","1","17","1");
INSERT INTO programas_sistema VALUES("18","12","Habitaciones","habitaciones/habitacion.php","1","18","1");
INSERT INTO programas_sistema VALUES("19","9","Presentación productos","inventario/presentacion_productos.php","4","19","1");
INSERT INTO programas_sistema VALUES("20","13","Ingreso de paciente","admision/admision_paciente.php","1","20","1");
INSERT INTO programas_sistema VALUES("21","14","Tipo de Personal","personal/tipo_personal.php","1","21","1");
INSERT INTO programas_sistema VALUES("22","14","Personal","personal/personal.php","2","22","1");
INSERT INTO programas_sistema VALUES("23","15","Cargar consumos","consumos/carga_consumos1.php","0","23","1");
INSERT INTO programas_sistema VALUES("24","1","I.V.A","mantenimiento/iva.php","5","24","1");
INSERT INTO programas_sistema VALUES("25","16","Seguros médicos","facturacion/seguros_medicos.php","0","25","1");
INSERT INTO programas_sistema VALUES("26","1","Margen de ganancia","mantenimiento/margen_ganancia.php","6","26","1");
INSERT INTO programas_sistema VALUES("27","7","Reporte de pacientes","pacientes/r_pacientes.php","2","27","1");



DROP TABLE proveedores;

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `rif` varchar(13) NOT NULL,
  `tipo_persona` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `telefono2` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO proveedores VALUES("1","BONAIRENSE","Distribuidora","Maria Siso","Calle Libertad","1212131","1","0","1","02432323232","0424323935","portuguesa@siso.com");



DROP TABLE seguros_medicos;

CREATE TABLE `seguros_medicos` (
  `id_seguro_m` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_seguro` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL COMMENT '1=Activo, 2=Inactivo',
  PRIMARY KEY (`id_seguro_m`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO seguros_medicos VALUES("1","Seguros la previsora","2");
INSERT INTO seguros_medicos VALUES("2","Nuevo seguro","1");



DROP TABLE servicios;

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `cod_servicio` varchar(100) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `precio` varchar(20) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO servicios VALUES("2","S002","Hospitalización","Hosp. Paciente","1600.80");



DROP TABLE sub_categoria_productos;

CREATE TABLE `sub_categoria_productos` (
  `id_sub_cat_prod` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat_prod` int(11) NOT NULL,
  `sub_categoria` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_sub_cat_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO sub_categoria_productos VALUES("9","1","Analgésicos");
INSERT INTO sub_categoria_productos VALUES("10","1","Antigripales");
INSERT INTO sub_categoria_productos VALUES("11","2","Desinfectante");
INSERT INTO sub_categoria_productos VALUES("12","2","Artículos varios");



DROP TABLE tipo_personal;

CREATE TABLE `tipo_personal` (
  `idtipopersonal` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`idtipopersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tipo_personal VALUES("1","Test");



DROP TABLE tipo_usuarios;

CREATE TABLE `tipo_usuarios` (
  `tipo_user` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`tipo_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tipo_usuarios VALUES("0","Administrador");
INSERT INTO tipo_usuarios VALUES("1","Almacenista");



DROP TABLE users;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(200) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `tipo_user` int(11) NOT NULL COMMENT '0=Admin',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("1","Administrador","admin","21232f297a57a5a743894a0e4a801fc3","0");
INSERT INTO users VALUES("2","","almacenista_generico","21232f297a57a5a743894a0e4a801fc3","1");
INSERT INTO users VALUES("3","Almacenista 2","almacenista2","21232f297a57a5a743894a0e4a801fc3","1");



