CREATE DATABASE trybit;
USE trybit;
CREATE TABLE usuarios
(
    NIT VARCHAR(255) NOT NULL,
    Razon_social VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    id_rol VARCHAR(255) NOT NULL,
    fecha_registro DATETIME NOT NULL,
    estado TINYINT NOT NULL,
    CONSTRAINT UN_NIT UNIQUE (NIT),
    CONSTRAINT UN_correo UNIQUE (correo),
    PRIMARY KEY (NIT)
);
CREATE TABLE productos
(
    id_producto VARCHAR(255) NOT NULL,
    NIT VARCHAR(255) NOT NULL,
    id_contactos VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    referencia VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    cantidad INT(255) NOT NULL,
    precio INT(255) NOT NULL,
    fecha_entrada DATETIME NOT NULL,
    vencimiento DATETIME NOT NULL,
    CONSTRAINT UN_id_producto UNIQUE (id_producto),
    CONSTRAINT UN_id_referencia UNIQUE (referencia),
    PRIMARY KEY (id_producto),
    FOREIGN KEY (NIT)
        REFERENCES usuarios(NIT)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);
CREATE TABLE gastos
(
    id_gasto VARCHAR(255) NOT NULL,
    NIT VARCHAR(255) NOT NULL,
    fecha_gasto DATETIME NOT NULL,
    concepto VARCHAR(255) NOT NULL,
    valor INT(255) NOT NULL,
    categoria VARCHAR(255) NOT NULL,
    CONSTRAINT UN_id_gasto UNIQUE (id_gasto),
    PRIMARY KEY (id_gasto),
    FOREIGN KEY (NIT)
        REFERENCES usuarios(NIT)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);
CREATE TABLE contactos
(
    id_contacto VARCHAR(255) NOT NULL,
    NIT VARCHAR(255) NOT NULL,
    id_productos VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    telefono INT(255) NOT NULL,
    proveedor BOOLEAN NOT NULL,
    CONSTRAINT UN_id_contacto UNIQUE (id_contacto),
    CONSTRAINT UN_telefono UNIQUE (telefono),
    PRIMARY KEY (id_contacto),
    FOREIGN KEY (id_productos)
        REFERENCES productos(id_producto)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (NIT)
        REFERENCES usuarios(NIT)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);
CREATE TABLE ventas
(
    id_venta VARCHAR(255) NOT NULL,
    NIT VARCHAR(255) NOT NULL,
    id_producto varchar(255) NOT NULL,
    cantidad INT(255) NOT NULL,
    fecha VARCHAR(255) NOT NULL,
    total INT(255) NOT NULL,
    modo_pago VARCHAR(255) NOT NULL,
    estatus VARCHAR(255) NOT NULL,
    num_pago VARCHAR(255) NOT NULL,
    CONSTRAINT UN_id_venta UNIQUE (id_venta),
    CONSTRAINT UN_num_pago UNIQUE (num_pago),
    PRIMARY KEY (id_venta),
    FOREIGN KEY (id_producto)
        REFERENCES productos(id_producto)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (NIT)
        REFERENCES usuarios(NIT)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);
CREATE TABLE compras
(
    id_compra VARCHAR(255) NOT NULL,
    NIT VARCHAR(255) NOT NULL,
    id_contacto VARCHAR(255) NOT NULL,
    id_producto VARCHAR(255) NOT NULL ,
    valor INT(255) NOT NULL,
    cantidad INT(255) NOT NULL,
    fecha_compra DATETIME NOT NULL,
    CONSTRAINT UN_id_compra UNIQUE (id_compra),
    PRIMARY KEY (id_compra),
    FOREIGN KEY (id_contacto)
        REFERENCES contactos(id_contacto)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (id_producto)
        REFERENCES productos(id_producto)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (NIT)
        REFERENCES usuarios(NIT)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);
CREATE TABLE contabilidad
(
    id_contabilidad VARCHAR(255) NOT NULL,
    NIT VARCHAR(255) NOT NULL,
    id_gasto VARCHAR(255) NOT NULL,
    id_compra VARCHAR(255) NOT NULL,
    id_ventas VARCHAR(255) NOT NULL,
    ingresos INT(255) NOT NULL,
    egresos INT(255) NOT NULL,
    CONSTRAINT UN_id_contabilidad UNIQUE (id_contabilidad),
    PRIMARY KEY (id_contabilidad),
    FOREIGN KEY (NIT)
        REFERENCES usuarios(NIT)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (id_gasto)
        REFERENCES gastos(id_gasto)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (id_compra)
        REFERENCES compras(id_compra)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (id_ventas)
        REFERENCES ventas(id_venta)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);
