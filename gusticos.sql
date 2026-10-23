-- =========================================
-- BASE DE DATOS GUSTICOS
-- =========================================

CREATE DATABASE IF NOT EXISTS gusticos
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE gusticos;

-- =========================================
-- TABLA USUARIOS
-- =========================================

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    celular VARCHAR(20),
    contrasena VARCHAR(255) NOT NULL,
    municipio VARCHAR(100),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================================
-- TABLA CATEGORIAS
-- =========================================

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- =========================================
-- TABLA PRODUCTOS
-- =========================================

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255),
    estado ENUM('activo','inactivo') DEFAULT 'activo',
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

-- =========================================
-- TABLA CARRITO
-- =========================================

CREATE TABLE carrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- =========================================
-- TABLA DETALLE CARRITO
-- =========================================

CREATE TABLE detalle_carrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    carrito_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT DEFAULT 1,
    precio_unitario DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (carrito_id) REFERENCES carrito(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- =========================================
-- TABLA PEDIDOS
-- =========================================

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    estado ENUM('pendiente','pagado','entregado','cancelado') DEFAULT 'pendiente',
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- =========================================
-- INSERTAR CATEGORIAS
-- =========================================

INSERT INTO categorias (nombre) VALUES
('Helados'),
('Infantiles'),
('Especialidades'),
('Copas Deliciosas'),
('Malteadas'),
('Bebidas');

-- =========================================
-- INSERTAR PRODUCTOS DE EJEMPLO
-- =========================================

INSERT INTO productos (categoria_id, nombre, descripcion, precio, imagen) VALUES

-- Helados
(1, 'Cono Sencillo', 'Delicioso helado en cono tradicional', 3000, 'Cono sencillo.jpeg'),
(1, 'Cucurucho', 'Helado servido en crujiente cucurucho', 3500, 'Cucurucho.jpeg'),
(1, 'Concha', 'Helado especial en concha', 7000, 'Concha.jpeg'),

-- Especialidades
(3, 'Banana Split', 'Banano, helado, chantilly y chocolate', 10000, 'Banana split.jpeg'),
(3, 'Ensalada de Frutas', 'Frutas frescas con helado y chantilly', 10000, 'Ensalda de frutas.jpeg'),

-- Copas
(4, 'Copa Oreo', 'Helado, oreo, brownie y chocolate', 15000, 'Copa oreo.jpeg'),

-- Malteadas
(5, 'Malteadas', 'Diferentes sabores de malteadas', 7000, 'Malteadas.jpeg'),

-- Bebidas
(6, 'Milo Frío', 'Refrescante bebida de milo', 6000, 'Milo frio.jpeg'),
(6, 'Micheladas', 'Diferentes opciones de micheladas', 8000, 'Micheladas.jpeg');