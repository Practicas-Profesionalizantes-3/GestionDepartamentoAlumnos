/*Creamos la base de datos*/
CREATE DATABASE itbeltran;

/*Seleccionamos la base de datos creada*/
USE itbeltran;

/*Empezamos a crear tablas en la base de datos*/

/*---USUARIOS---*/
CREATE TABLE usuarios(
	id_usuario INT AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(35) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
	id_documento_tipo INT NOT NULL,
    id_usuario_estado INT NOT NULL,
    numero_documento INT UNIQUE NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY (id_usuario, id_documento_tipo, id_usuario_estado),
    CONSTRAINT fk_id_documento_tipo FOREIGN KEY (id_documento_tipo) REFERENCES documento_tipos(id_documento_tipo),
    CONSTRAINT fk_id_usuario_estado FOREIGN KEY (id_usuario_estado) REFERENCES usuario_estados(id_usuario_estado)
);

/*---USUARIO_TIPOS---*/
CREATE TABLE usuario_tipos(
	id_usuario_tipo INT,
    permiso_nombre VARCHAR(50) NOT NULL,
	CONSTRAINT pk_usuario_tipos PRIMARY KEY(id_usuario_tipo)
);

/*---USUARIO_ROLES---*/
CREATE TABLE usuario_roles(
	id_usuario INT,
    id_usuario_tipo INT,
	CONSTRAINT pk_usuario_roles PRIMARY KEY(id_usuario, id_usuario_tipo),
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    CONSTRAINT fk_id_usuario_tipo FOREIGN KEY (id_usuario_tipo) REFERENCES usuario_tipos(id_usuario_tipo)
);

/*---USUARIO_ESTADOS---*/
CREATE TABLE usuario_estados(
	id_usuario_estado INT,
    descripcion VARCHAR(80) NOT NULL,
	CONSTRAINT pk_usuario_estados PRIMARY KEY(id_usuario_estado)
);

/*---USUARIO_CARRERAS---*/
CREATE TABLE usuario_carreras(
	id_usuario INT,
    id_carrera VARCHAR(80) NOT NULL,
    anio VARCHAR(5) NOT NULL,
    comision VARCHAR(5) NOT NULL,
	CONSTRAINT pk_usuario_carreras PRIMARY KEY(id_usuario, id_carrera)
);

/*---CARRERAS---*/
CREATE TABLE carreras(
	id_carrera INT,
	descripcion VARCHAR(255) NOT NULL,
	CONSTRAINT pk_carreras PRIMARY KEY(id_carrera)
);

/*---DOCUMENTO_TIPOS---*/
CREATE TABLE documento_tipos(
	id_documento_tipo INT,
	descripcion VARCHAR(50) NOT NULL,
	CONSTRAINT pk_documento_tipos PRIMARY KEY(id_documento_tipo)
);

/*---TRAMITES---*/
/*ID_USUARIO_RESPONSABLE?*/
CREATE TABLE tramites(
	id_tramite INT,
    id_usuario_creacion INT,
    id_usuario_responsable INT,
    id_tramite_tipo INT,
    id_estado_tramite INT,
    descripcion VARCHAR(255) NOT NULL,
    CONSTRAINT pk_tramites PRIMARY KEY(id_tramite),
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    CONSTRAINT fk_id_responsable FOREIGN KEY (id_responsable) REFERENCES responsables(id_responsable),
	CONSTRAINT fk_id_tipo FOREIGN KEY (id_tipo) REFERENCES tramites_tipo(id_tramite_tipo),
    CONSTRAINT fk_id_estado FOREIGN KEY (id_estado) REFERENCES tramites_estado(id_estado)
);

/*---TRAMITE_TIPOS---*/
CREATE TABLE tramite_tipos(
	id_tramite_tipo INT,
    descripcion VARCHAR(255) NOT NULL,
    CONSTRAINT pk_tramite_tipos PRIMARY KEY(id_tramite_tipo)
);

/*---TRAMITE_ESTADOS---*/
CREATE TABLE tramite_estados(
	id_estado_tramite INT,
    descripcion VARCHAR(50) NOT NULL,
    CONSTRAINT pk_tramite_estados PRIMARY KEY(id_estado_tramite)
);

/*---TRAMITE_MOVIMIENTOS---*/
/*ESTA MAL*/
CREATE TABLE tramite_movimientos(
	id_tramite INT,
    fecha_movimiento DATE,
    id_usuario INT,
    id_estado_tramite INT,
    observacion VARCHAR(255) NOT NULL,
    CONSTRAINT pk_responsables PRIMARY KEY(id_responsable),
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

/*---TRAMITE_ADJUNTOS---*/
CREATE TABLE tramite_adjuntos(
	id_tramite_adjunto INT,
    id_tramite INT,
    ubicacion_archivo VARCHAR(255) NOT NULL,
    CONSTRAINT pk_tramite_adjuntos PRIMARY KEY(id_tramite_adjuntos, id_tramite),
    CONSTRAINT fk_id_tramite FOREIGN KEY(id_tramite) REFERENCES tramites(id_tramite)
);

/*---USUARIO_NOTIFICACIONES---*/
CREATE TABLE usuario_notificaciones(
	id_usuario INT,
    id_notificacion INT,
    id_notificacion_estado INT,
    CONSTRAINT pk_usuario_notificaciones PRIMARY KEY(id_usuario, id_notificacion, id_notificacion_estado),
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    CONSTRAINT fk_id_notificacion FOREIGN KEY (id_notificacion) REFERENCES notificaciones(id_notificacion),
    CONSTRAINT fk_id_notificacion_estado FOREIGN KEY (id_notificacion_estado) REFERENCES notificacion_estado(id_notificacion_estado)
);

/*---NOTIFICACION_ESTADO---*/
CREATE TABLE notificacion_estado(
    id_notificacion_estado INT,
    descripcion VARCHAR(255) NOT NULL,
    CONSTRAINT pk_notificacion_estado PRIMARY KEY(id_notificacion_estado)
);

/*---NOTIFICACIONES---*/
CREATE TABLE notificaciones(
	id_notificacion INT,
    id_aviso INT,
    id_tramite INT,
    id_notificacion_tipo INT,
    fecha_envio_notificacion DATE NOT NULL,
    CONSTRAINT pk_notificaciones PRIMARY KEY(id_notificacion, id_aviso, id_tramite, id_notificacion_tipo),
	CONSTRAINT fk_id_aviso FOREIGN KEY (id_aviso) REFERENCES avisos(id_aviso),
    CONSTRAINT fk_id_tramite FOREIGN KEY (id_tramite) REFERENCES tramites(id_tramite),
    CONSTRAINT fk_id_notificacion_tipo FOREIGN KEY (id_notificacion_tipo) REFERENCES tipo_notificaciones(id_notificacion_tipo)
);

/*---TIPO_NOTIFICACIONES---*/
CREATE TABLE tipo_notificaciones(
	id_notificacion_tipo INT,
    descripcion VARCHAR(255) NOT NULL,
    CONSTRAINT pk_tipo_notificaciones PRIMARY KEY(id_notificacion_tipo)
);

/*---AVISOS---*/
CREATE TABLE avisos(
    id_aviso INT,
    id_aviso_tipo INT,
    id_usuario INT,
    titulo VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    fecha_publicacion DATE,
    fecha_vencimiento DATE,
    adjunto VARCHAR(255) NOT NULL,
    fijado BOOLEAN,
    CONSTRAINT pk_avisos PRIMARY KEY(id_aviso),
    CONSTRAINT fk_id_aviso_tipo FOREIGN KEY (id_aviso_tipo) REFERENCES aviso_tipo(id_aviso_tipo),
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

/*---AVISO_TIPO---*/
CREATE TABLE aviso_tipo(
id_aviso_tipo INT,
descripcion VARCHAR(255) NOT NULL,
CONSTRAINT pk_aviso_tipo PRIMARY KEY(id_aviso_tipo)
);

/*---AVISO_USUARIO_TIPO---*/
CREATE TABLE aviso_usuario_tipo(
id_aviso INT,
id_usuario_tipo INT,
CONSTRAINT pk_aviso_usuario_tipo PRIMARY KEY(id_aviso, id_usuario_tipo),
CONSTRAINT fk_id_aviso FOREIGN KEY (id_aviso) REFERENCES avisos (id_aviso),
CONSTRAINT fk_id_usuario_tipo FOREIGN KEY (id_usuario_tipo) REFERENCES usuario_tipos (id_usuario_tipo)
);