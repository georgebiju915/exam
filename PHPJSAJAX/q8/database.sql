CREATE TABLE attendance (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student VARCHAR(50) NOT NULL,
    status VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);