--  BASE DE DATOS: "FRANCO CHICKEN IV"

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
    phone VARCHAR(9) NOT NULL,
    dni VARCHAR(8) UNIQUE NOT NULL,
    user_name VARCHAR(40) NOT NULL,
    email VARCHAR(40) UNIQUE NOT NULL,
    password VARCHAR(256) NOT NULL,
    id_charge INT NOT NULL,
    FOREIGN KEY (id_charge) REFERENCES charges(id)
);


create table requirements(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    state BOOLEAN NOT NULL,
    subtotal DECIMAL(8,2) NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
); 

create table products_requirements(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_requirement INT NOT NULL,
    id_product INT NOT NULL,
    quantity DECIMAL(8,2) NOT NULL,
    FOREIGN KEY (id_requirement) REFERENCES requirements(id),
    FOREIGN KEY (id_product) REFERENCES products(id)
);

create table suppliers(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    company_name VARCHAR(20) NOT NULL,
    address VARCHAR(40) NOT NULL,
    ruc VARCHAR(20) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(20) NOT NULL
);

create table purchase_orders(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    observation VARCHAR(100) NOT NULL,
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    state BOOLEAN NOT NULL,
    total DECIMAL(8,2) NOT NULL,
    id_supplier INT NOT NULL,
    id_requirement INT NOT NULL,
    FOREIGN KEY (id_requirement) REFERENCES requirements(id),
    FOREIGN KEY (id_supplier) REFERENCES suppliers(id)
);

create table proofs_of_purchase(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    description VARCHAR(100),
    file VARCHAR(100) NOT NULL, -- URL DEL PDF
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    id_purchase_order INT NOT NULL,
    FOREIGN KEY (id_purchase_order) REFERENCES purchase_orders(id)
);



INSERT INTO `charges` (`id`, `name`) VALUES (NULL, 'Almacenero');

insert users values (NULL ,'Adam', 'Milner', '922332', '34234', 'Adam  Milner', 'almacenero@gmail.com', 'almacenero', 1 );

-- delete FROm usuario where id_usuario = 1;