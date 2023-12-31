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

create table products(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(20) NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    id_category INT NOT NULL,
    url_image VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_category) REFERENCES categories(id)
);

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
    FOREIGN KEY (id_product) REFERENCES products(id) ON DELETE CASCADE
);

create table suppliers(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    company_name VARCHAR(60) NOT NULL,
    address VARCHAR(200) NOT NULL,
    ruc VARCHAR(20) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(80) NOT NULL
);

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

insert into categories values (1,'Pollo Entero','Productos que incluyen pollos enteros sin cortes');

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
