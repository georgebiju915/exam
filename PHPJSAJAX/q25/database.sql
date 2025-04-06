CREATE DATABASE rating_system;

USE rating_system;

CREATE TABLE feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT(6) NOT NULL,
    username VARCHAR(50) NOT NULL,
    rating INT(1) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);