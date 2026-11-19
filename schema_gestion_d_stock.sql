-- gestion_d_stock schema
CREATE DATABASE IF NOT EXISTS gestion_d_stock DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestion_d_stock;

CREATE TABLE IF NOT EXISTS utilisateur (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255),
  email VARCHAR(255) UNIQUE,
  mot_de_pass VARCHAR(255),
  role ENUM('admin','client') DEFAULT 'client'
);

CREATE TABLE IF NOT EXISTS produit (
  id_pdt INT AUTO_INCREMENT PRIMARY KEY,
  nom_pdt VARCHAR(255),
  description_pdt TEXT,
  prix DECIMAL(10,2) DEFAULT 0,
  quantite INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS commande (
  id_cmd INT AUTO_INCREMENT PRIMARY KEY,
  id_client INT,
  date DATETIME DEFAULT CURRENT_TIMESTAMP,
  total DECIMAL(10,2) DEFAULT 0
);

CREATE TABLE IF NOT EXISTS ligne_commande (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_cmd INT,
  id_pdt INT,
  quantite INT
);

-- Note: run this file in phpMyAdmin to create the DB and tables.
