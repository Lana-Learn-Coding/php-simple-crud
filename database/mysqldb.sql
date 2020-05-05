CREATE DATABASE manage CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE manage;

CREATE TABLE category
(
    id         INT PRIMARY KEY AUTO_INCREMENT,
    name       VARCHAR(128) NOT NULL UNIQUE,
    status     TINYINT DEFAULT 1,
    created_at DATETIME
);

CREATE TABLE product
(
    id          INT PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(128) NOT NULL,
    price       DOUBLE       NOT NULL,
    description TEXT,
    image       VARCHAR(256),
    status      TINYINT DEFAULT 1,
    created_at  DATETIME,
    category_id INT REFERENCES category (id)
)