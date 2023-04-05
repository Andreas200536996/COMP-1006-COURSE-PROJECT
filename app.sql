CREATE DATABASE IF NOT EXISTS comp_1006_200536996;
USE comp_1006_200536996;

-- YOU MUST USE THIS TABLE AS IS (or at least the 3 defined fields name, email, and password)
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(200) NOT NULL,
    password VARCHAR(256) NOT NULL
);

CREATE TABLE restaurant (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    restaurant_name VARCHAR(50) NOT NULL
);

CREATE TABLE restaurant_reservations (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    parent_id INT NOT NULL,
    customer_name varchar(50) not null,
    reservation_date date not null,
    FOREIGN KEY (parent_id) REFERENCES restaurant (id) ON DELETE CASCADE
);