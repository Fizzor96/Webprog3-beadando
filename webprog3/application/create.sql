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

CREATE TABLE buildings
(
    id INT NOT NULL AUTO_INCREMENT,
    campus_id INT NOT NULL,
    kod VARCHAR(5) NOT NULL,
    nev VARCHAR(100) NOT NULL,
    leiras TEXT DEFAULT NULL,
    aktiv TINYINT DEFAULT 1,

    CONSTRAINT PK_buildings PRIMARY KEY(id),
    CONSTRAINT FK_buildings_campus_id FOREIGN KEY (campus_id) REFERENCES campusok(id),
    CONSTRAINT UQ_buildings_campus_id_kod UNIQUE(campus_id, kod)
);