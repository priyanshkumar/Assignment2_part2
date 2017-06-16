use gc200360677;
DROP TABLE IF EXISTS Ass2;

CREATE TABLE Ass2(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fName VARCHAR(30),
    address VARCHAR(50),
    age INT(2),
    sport VARCHAR(50),
    gender VARCHAR(6),
    city VARCHAR(20),
    province VARCHAR(2),
    number INT(11)
);

SELECT * FROM Ass2;

CREATE TABLE citi(
	city VARCHAR(20) PRIMARY KEY
);

INSERT INTO citi VALUES ('TORONTO'),('BARRIE'),('BRAMPTON'),('ORILLIA'),('MONTREAL'),('MISSISAGA');

SELECT * FROM citi;

CREATE TABLE provinces(
 province VARCHAR(2)
 );
 
 INSERT INTO provinces VALUES ('ON'),('QC'),('NS'),('NB'),('MB'),('BC'),('PE'),('SK'),('AB'),('NL');
 
 SELECT * FROM provinces;

CREATE TABLE sporty(
	sport VARCHAR(50)
);
INSERT INTO sporty 
VALUES('Volleyball'),('Football'),('Cricket'),('Hockey'),('Baseball'),('Basketball');

SELECT * FROM sporty;

CREATE TABLE users(
	AdminID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50),
	email VARCHAR(120) UNIQUE,
    password VARCHAR(255)
);

select * from users;