CREATE TABLE post_likes (
    post_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    like_count INT(6) DEFAULT 0
);

INSERT INTO post_likes (post_id, like_count) VALUES (1, 0);