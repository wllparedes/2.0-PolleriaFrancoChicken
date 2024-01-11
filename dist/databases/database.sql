--  BASE DE DATOS: "FRANCO CHICKEN IV"
drop database Polleria_IV;
create database Polleria_IV;
use Polleria_IV;

-- ABASTECIMIENTO

create table categories(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(20) NOT NULL,
    description VARCHAR(250) NOT NULL
);

-- Inserciones de datos para categorias

INSERT INTO categories (name, description) VALUES
('Pollo Asado', 'Pollos asados a la parrilla con deliciosos condimentos y especias.'),
('Pollo a la Brasa', 'Pollos preparados con una receta especial a la brasa, con un toque ahumado inigualable.'),
('Alitas de Pollo', 'Alitas crujientes con diversas salsas y sabores para satisfacer tu paladar.'),
('Brochetas de Pollo', 'Brochetas de pollo marinadas y asadas a la perfección, ideales para compartir.'),
('Pollo Frito', 'Pollo frito estilo casero, crujiente por fuera y jugoso por dentro.'),
('Pollo a la Parrilla', 'Pollo cocido a la parrilla con hierbas frescas y especias aromáticas.'),
('Pollo a la Naranja', 'Pollo con salsa agridulce de naranja, una explosión de sabores en cada bocado.'),
('Pollo a la Mostaza', 'Pollo con salsa de mostaza y hierbas, una combinación única y deliciosa.'),
('Pollo a la Miel', 'Pollo glaseado con miel y especias, una opción dulce y sabrosa.'),
('Pollo a la Barbacoa', 'Pollo con salsa de barbacoa ahumada, perfecto para los amantes de los sabores intensos.'),
('Tiras de Pollo', 'Tiras de pollo empanizadas y crujientes, ideales como aperitivo o complemento.'),
('Ensalada de Pollo', 'Ensalada fresca con pollo a la parrilla, una opción ligera y saludable.'),
('Pollo con Limón', 'Pollo cocido con jugo de limón y hierbas frescas, una opción refrescante.'),
('Pollo a la Criolla', 'Pollo con salsa criolla de tomate y cebolla, una receta tradicional llena de sabor.'),
('Pollo a la Cerveza', 'Pollo cocido a la cerveza con especias aromáticas, una opción única y deliciosa.');

create table products(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(40) NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    id_category INT NOT NULL,
    FOREIGN KEY (id_category) REFERENCES categories(id)
);

-- Inserciones de datos para productos

INSERT INTO products (name, price, id_category) VALUES
('Pollo Entero Asado', 15.99, 1),
('Combo Familiar de Pollo', 29.99, 2),
('Alitas BBQ', 10.99, 3),
('Brochetas Mixtas', 12.99, 4),
('Pollo Frito Crujiente', 8.99, 5),
('Pechuga a la Parrilla', 13.99, 6),
('Pollo a la Naranja', 14.99, 7),
('Muslos con Salsa de Mostaza', 11.99, 8),
('Pollo Glaseado con Miel', 16.99, 9),
('Costillas de Pollo Barbacoa', 18.99, 10),
('Tiras de Pollo Empanizadas', 7.99, 11),
('Ensalada de Pollo a la Parrilla', 9.99, 12),
('Muslos de Pollo con Limón', 14.99, 13),
('Pollo Criollo con Tomate y Cebolla', 12.99, 14),
('Pollo a la Cerveza', 15.99, 15);

create table charges(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(20) NOT NULL
);

create table users( -- empleado
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    names VARCHAR(40) NOT NULL,
    surnames VARCHAR(40) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    dni VARCHAR(8) UNIQUE NOT NULL,
    user_name VARCHAR(80) NOT NULL,
    email VARCHAR(80) UNIQUE NOT NULL,
    password VARCHAR(256) NOT NULL,
    id_charge INT NOT NULL,
    FOREIGN KEY (id_charge) REFERENCES charges(id)
);


create table requirements(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    description VARCHAR(300) NOT NULL,
    state BOOLEAN NOT NULL DEFAULT 0,
    subtotal DECIMAL(8,2) NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
); 

create table products_requirements(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_requirement INT NOT NULL,
    id_product INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (id_requirement) REFERENCES requirements(id) ON DELETE CASCADE,
    FOREIGN KEY (id_product) REFERENCES products(id) 
);

create table suppliers(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    company_name VARCHAR(60) NOT NULL,
    address VARCHAR(200) NOT NULL,
    ruc VARCHAR(20) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(80) NOT NULL
);

-- Insercion de datos para proveedores

INSERT INTO suppliers (company_name, address, ruc, phone, email) VALUES
('Proveedor Uno S.A.', 'Calle Principal #123', '12345678901', '912345678', 'proveedor1@gmail.com'),
('Suministros Rápidos E.I.R.L.', 'Avenida Central #456', '98765432109', '912345678', 'suministros_rapidos@hotmail.com'),
('Distribuciones Express S.A.C.', 'Plaza Mayor #789', '87654321098', '912345678', 'distribuciones_express@gmail.com'),
('Importadora ABC E.I.R.L.', 'Calle Comercial #234', '76543210987', '912345678', 'importadora_abc@hotmail.com'),
('Proveedores Unidos S.A.C.', 'Avenida Industrial #567', '65432109876', '912345678', 'proveedores_unidos@gmail.com'),
('Comestibles y Más S.A.C.', 'Jirón Libertad #101', '11223344556', '912345678', 'comestibles_mas@gmail.com'),
('Logística Veloz E.I.R.L.', 'Calle Velocidad #202', '99887766554', '912345678', 'logistica_veloz@hotmail.com'),
('Exportaciones Globales S.A.', 'Avenida Global #303', '22334455667', '912345678', 'exportaciones_globales@gmail.com'),
('Distribuidora Velázquez S.A.C.', 'Calle Velázquez #404', '33445566778', '912345678', 'distribuidora_velazquez@hotmail.com'),
('Almacenes y Suministros E.I.R.L.', 'Jirón Almacenaje #505', '44556677889', '912345678', 'almacenes_suministros@gmail.com'),
('Inversiones y Abastecimientos S.A.', 'Avenida Abastecimiento #606', '55667788990', '912345678', 'inversiones_abastecimientos@hotmail.com'),
('Importaciones Directas S.A.C.', 'Calle Directa #707', '66778899001', '912345678', 'importaciones_directas@gmail.com'),
('Proveedor de Equipos Tecnológicos E.I.R.L.', 'Jirón Tecnológico #808', '77889900112', '912345678', 'proveedor_tecnologico@hotmail.com'),
('Suministros Médicos S.A.C.', 'Avenida Médica #909', '88990011223', '912345678', 'suministros_medicos@gmail.com'),
('Productos de Limpieza Express S.A.', 'Calle Limpieza #1010', '99001112234', '912345678', 'productos_limpieza_express@hotmail.com');

create table purchase_orders(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    observation VARCHAR(100) NOT NULL,
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    state BOOLEAN NOT NULL DEFAULT 0,
    total DECIMAL(8,2) NOT NULL,
    id_supplier INT NOT NULL,
    id_requirement INT NOT NULL,
    FOREIGN KEY (id_requirement) REFERENCES requirements(id) ON DELETE CASCADE,
    FOREIGN KEY (id_supplier) REFERENCES suppliers(id) ON DELETE CASCADE
);

create table proofs_of_purchase(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    description VARCHAR(200),
    file VARCHAR(100) NOT NULL, -- URL DEL PDF
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    id_purchase_order INT NOT NULL,
    FOREIGN KEY (id_purchase_order) REFERENCES purchase_orders(id)
);



INSERT INTO `charges` (`id`, `name`) VALUES (NULL, 'Almacenero');

-- Insercion de usuarios

insert users values (NULL ,'Adam', 'Milner', '987268698', '94875898', 'Adam  Milner', 'almacenero@gmail.com', '@Almacenero123', 1 );

-- Insercion de categorias

-- insert into categories values (1,'Pollo Entero','Productos que incluyen pollos enteros sin cortes');

-- Insercion de productos

-- INSERT INTO products (name, price, id_category) VALUES ('Pollo Asado Premium', 15.99, 1);

-- Insercion de proveedores
INSERT INTO suppliers (company_name, address, ruc, phone, email)
VALUES ('Granja Pollo', 'Av. Plumas 123, Lima', '18765432168', '985768216', 'granja@gmail.com');

-- delete FROm usuario where id_usuario = 1;


CREATE VIEW SELECTEDPRODUCTS AS
SELECT p.id, p.name, p.price, p.id_category, c.name as category_name
FROM products p, categories c
WHERE p.id_category = c.id;

-- * sub total para el requerimiento de compra

CREATE VIEW CALCULATE_SUBTOTAL_REQUIREMENT AS
SELECT pr.id_requirement, SUM(pr.quantity * p.price) AS subtotal
FROM products_requirements pr
JOIN products p ON pr.id_product = p.id
GROUP BY pr.id_requirement;

CREATE VIEW SELECTPROFILE AS
SELECT u.id, u.names, u.surnames, u.phone, u.dni, u.user_name, u.email, u.password, c.name as charge_user
FROM users u, charges c
WHERE c.id = u.id_charge;
-- * Boton Ver del listar requerimientos.

CREATE VIEW VIEW_REQUIREMENT AS
SELECT r.id , u.id as id_user , concat(u.names, ' ' ,u.surnames) as name, r.date_time, r.description, r.state,
r.subtotal
FROM requirements r, products_requirements pr, products p, categories c, users u
WHERE pr.id_requirement = r.id
AND r.id_user = u.id;

CREATE VIEW PRODUCT_REQUIREMENT AS
SELECT r.id, pr.id as pr_id, p.name, c.name as category_name, p.price, pr.quantity
FROM requirements r, products_requirements pr, products p, categories c
WHERE r.id = pr.id_requirement
AND pr.id_product = p.id
AND p.id_category = c.id;

CREATE OR REPLACE VIEW VIEW_ORDER AS 
SELECT po.id, po.id_requirement, s.company_name, s.ruc, s.address, po.state, po.observation, po.date_time, r.subtotal, po.total, r.date_time as date_time_r
FROM purchase_orders po, suppliers s, requirements r
WHERE po.id_supplier = s.id
AND po.id_requirement = r.id;


