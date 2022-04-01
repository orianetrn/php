CREATE DATABASE tp_sql ; 

CREATE TABLE garages (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(64),
    city VARCHAR(64),
    creationdate DATETIME(6),
    turnover INT(64)
);

CREATE TABLE cars (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    model VARCHAR(64),
    color VARCHAR(64),
    price INT(64),
    garage_id INT
);

ALTER TABLE cars ADD FOREIGN KEY (garage_id) REFERENCES garages(id);

INSERT INTO garages (name, city, creationdate, turnover) VALUES
('Garage lyonnais','Lyon','2002-07-21','100000'),
('Garage 2','Poissy','2012-05-21','700000'),
('Garage 3','Paris','2006-10-21','10000'),
('Garage 4','Villefranche','2015-11-21','200000'),
('Garage 5','Medan','1975-12-21','300000'),
('Garage 6','Meyzieu','2000-01-21','500500'),
('Garage 7','Vernouillet','1997-03-21','100600'),
('Garage 8','Annecy','1984-08-21','190000'),
('Garage 9','Ploubalay','2001-02-21','570000'),
('Garage 10','Dinard','1991-04-21','99000');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Ernest','blue','10000','1'),
('Car 2','green','13000','1'),
('Car 3','red','25000','1'),
('Car 4','purple','16000','1'),
('Car 5','orange','11000','1');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Car 6','blue','10000','2'),
('Car 7','green','13000','2'),
('Car 8','red','25000','2'),
('Car 9','purple','16000','2'),
('Car 10','orange','11000','2');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Car 11','blue','10000','3'),
('Car 12','green','13000','3'),
('Car 13','red','25000','3'),
('Car 14','purple','16000','3'),
('Car 15','orange','11000','3');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Car 16','blue','10000','4'),
('Car 17','green','13000','4'),
('Car 18','red','25000','4'),
('Car 19','purple','16000','4'),
('Car 20','orange','11000','4');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Car 21','blue','10000','5'),
('Car 22','green','13000','5'),
('Car 23','red','25000','5'),
('Car 24','purple','16000','5'),
('Car 25','orange','11000','5');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Car 26','blue','10000','6'),
('Car 27','green','13000','6'),
('Car 28','red','25000','6'),
('Car 29','purple','16000','6'),
('Car 30','orange','11000','6');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Car 31','blue','10000','7'),
('Car 32','green','13000','7'),
('Car 33','red','25000','7'),
('Car 34','purple','16000','7'),
('Car 35','orange','11000','7');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Car 36','blue','10000','8'),
('Car 37','green','13000','8'),
('Car 38','red','25000','8'),
('Car 39','purple','16000','8'),
('Car 40','orange','11000','8');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Car 41','blue','10000','9'),
('Car 42','green','13000','9'),
('Car 43','red','25000','9'),
('Car 44','purple','16000','9'),
('Car 45','orange','11000','9');

INSERT INTO  cars (model, color, price, garage_id) VALUES
('Car 46','blue','10000','10'),
('Car 47','yellow','230000','10'),
('Car 48','red','25000','10'),
('Car 49','purple','16000','10'),
('Car 50','orange','11000','10');

SELECT * FROM cars;
SELECT * FROM garages WHERE name LIKE '%l%';
SELECT * FROM cars ORDER BY price DESC;

SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
SELECT count(model),garage_id FROM cars GROUP BY garage_id ;

SELECT SUM(price),name,garage_id FROM cars JOIN garages ON cars.garage_id = garages.id GROUP BY garage_id ORDER BY SUM(price) DESC LIMIT 1; 

DELETE FROM cars WHERE model LIKE 'E%' ;

DELETE FROM garages WHERE city='Lyon' ;

UPDATE cars SET color = 'green' WHERE price >200000 ;

UPDATE cars SET price = '35000' WHERE garage_id = 2 ;

