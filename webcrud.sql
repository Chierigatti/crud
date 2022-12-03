CREATE DATABASE crud;

USE crud;

CREATE TABLE customers (
  id int(11) NOT NULL,
  name varchar(80) NOT NULL,
  cpf_cnpj varchar(14) NOT NULL,
  birthdate date NOT NULL,
  address varchar(100) NOT NULL,
  hood varchar(50) NOT NULL,
  zip_code varchar(10) DEFAULT NULL,
  city varchar(60) NOT NULL,
  state varchar(2) NOT NULL,
  phone varchar(20) DEFAULT NULL,
  mobile varchar(20) DEFAULT NULL,
  ie varchar(12) DEFAULT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL,
  email varchar(60) DEFAULT NULL
) ;


CREATE TABLE users (
  id int(11) AUTO_INCREMENT,
  username varchar(255),
  password varchar(255),
  PRIMARY KEY(id)
);

--
-- Insert na tabela
  insert into users VALUES ( 
    0, 'admin', SHA2('admin', 256));

--
-- Índices para tabela customers
--
ALTER TABLE customers
  ADD PRIMARY KEY (id);
  
ALTER TABLE customers
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
