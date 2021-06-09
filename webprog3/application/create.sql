CREATE TABLE campusok
(
    id INT NOT NULL AUTO_INCREMENT,
    nev VARCHAR(500) NOT NULL,
    leiras TEXT DEFAULT NULL,
    aktiv TINYINT DEFAULT 1,
    
    CONSTRAINT PK_campusok PRIMARY KEY(id)
);

INSERT INTO campusok(nev) values('Eger');
INSERT INTO campusok(nev) values('Jaszbereny');
