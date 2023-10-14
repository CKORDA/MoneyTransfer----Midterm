CREATE DATABASE moneyTransfer;

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NULL,
	email VARCHAR(255) NULL,
    password VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status INT DEFAULT 0
);
INSERT INTO users (username, email, password) VALUES ('john_doe', 'john@example.com', 'hashed_password');
SELECT * FROM users;
