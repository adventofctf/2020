CREATE USER 'admin'@'%' IDENTIFIED BY 'novi!';
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'novi!';

GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;

CREATE DATABASE testdb;
USE testdb;

CREATE table secrets (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,description varchar(50), proof varchar(150));
INSERT INTO secrets (description, proof)
  VALUES ('Access codes for Area 51','The access code is 1234'),
         ('KFC Recipe', 'The 10 spices are in the diary on page 658' ),
         ('Advent of Code', 'FLAG are such a good thing to find, but this is not it. I do really love that you are playing the game! Keep it up.' ),
         ('The door', 'Do you know where that one door leads? It leads to the basement!');

CREATE table flags (description VARCHAR(50));
INSERT INTO flags(description) VALUEs ('NOVI{7h1s_flag_w@s_chuncky_right}');
