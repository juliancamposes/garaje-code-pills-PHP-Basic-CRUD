CREATE DATABASE IF NOT EXISTS code_pills DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE code_pills;
CREATE TABLE IF NOT EXISTS listado_videos(
		id INT AUTO_INCREMENT,
		title VARCHAR(255) NOT NULL,
		author VARCHAR(255) NOT NULL,
		date DATE,
		PRIMARY KEY (id)
)  ENGINE=INNODB;

INSERT INTO listado_videos(title, author, date) VALUES('Instagram Navbar con HTML y CSS Nativo', 'Afor_Digital', '2023-08-22');
INSERT INTO listado_videos(title, author, date) VALUES('6 Plugins de VSCode imprescindibles para PHP', 'Julian Campos', '2023-08-17');