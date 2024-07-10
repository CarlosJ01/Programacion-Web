CREATE USER 'sacc'@'localhost' IDENTIFIED BY 'Alfacentauri_1';
GRANT ALL PRIVILEGES ON sacc.* TO 'sacc'@'localhost';
FLUSH PRIVILEGES;

SHOW GRANTS FOR 'sacc'@'localhost';