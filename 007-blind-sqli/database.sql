CREATE USER 'admin'@'%' IDENTIFIED BY 'novi!';
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'novi!';

GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;

CREATE DATABASE testdb;
USE testdb;

CREATE table naughty (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username varchar(50), badthing varchar(50) default null);
INSERT INTO naughty (username, badthing)
  VALUES
  ('egische', 'NOVI{bl1nd_sql1_is_naughty}' );
