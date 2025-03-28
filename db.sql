-- usersテーブル
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fio VARCHAR(150),
    phone VARCHAR(20),
    email VARCHAR(100),
    birthdate DATE,
    gender VARCHAR(10),
    bio TEXT,
    agree BOOLEAN
);

-- user_languagesテーブル
CREATE TABLE user_languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    language VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
