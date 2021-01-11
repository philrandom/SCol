use SCol;
create table tags (
	id INT AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	color CHAR(7) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO tags (`name`,`color` ) VALUES 
	('Nouveau','#2c9dd4'), --blue
	('Brouillons','#db7b2b'), --orange
	('En attentes' ,'#cc3232'), --red
	('Traités','#99c140'); --green light

CREATE TABLE releves (
	`id` INT AUTO_INCREMENT,
	`cursus` VARCHAR(10),
	`matieres` INT,
	`annee_scol` CHAR(9),
	`promotion` VARCHAR(10),
	`date_epreuve` DATE,
	`type_epreuve` INT ,
	`date_retour` DATE,
	`tag` INT,
	PRIMARY KEY (id),
	FOREIGN KEY (matieres) REFERENCES prof_mat(idmat),
	FOREIGN KEY (tag) REFERENCES tags(id)
);

CREATE TABLE prof_rel ( 
	`iduser` INT NOT NULL,
	`idreleve` INT,
	FOREIGN KEY (iduser) REFERENCES utilisateurs(id),
	FOREIGN KEY (idreleve) REFERENCES releves(id)
);

CREATE TABLE prof_mat ( 
	`iduser` INT NOT NULL,
	`idmat` INT AUTO_INCREMENT,
	`nom` VARCHAR(10),
	PRIMARY KEY (id),
	FOREIGN KEY (iduser) REFERENCES utilisateurs(id)
);

CREATE TABLE notes (
	`id` INT AUTO_INCREMENT,
	`ideleve` INT NOT NULL,
	`idreleve` INT,
	`note` FLOAT(5,3),
	`obs_vscol` VARCHAR(30),
	`obs_prof` VARCHAR(30)
	PRIMARY KEY (id),
	FOREIGN KEY (ideleve) REFERENCES eleves2(id),
	FOREIGN KEY (idreleve) REFERENCES releves(id)
);


