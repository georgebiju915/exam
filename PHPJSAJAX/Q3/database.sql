CREATE TABLE blog_post (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    likes INT(6) UNSIGNED DEFAULT 0,
    reg_date TIMESTAMP
);