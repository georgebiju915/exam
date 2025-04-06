CREATE TABLE poll_options (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    option_text VARCHAR(255) NOT NULL,
    votes INT(6) DEFAULT 0
);

INSERT INTO poll_options (option_text) VALUES ('JavaScript'), ('Python'), ('Java'), ('PHP'), ('C++');