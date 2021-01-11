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

CREATE TABLE releves ( ---foreign key
	`id` INT AUTO_INCREMENT,
	`cursus` VARCHAR(10),
	`matieres` INT,
	`promotion` VARCHAR(10),
	`date_epreuve` DATE,
	`type_epreuve` INT ,
	`date_retour` DATE,
	`tag` INT,
	PRIMARY KEY (id);
);

CREATE TABLE prof_rel ( ---foreign key
	`iduser` INT NOT NULL,
	`idreleve` INT
);

CREATE TABLE prof_mat ( --foreign  key
	`iduser` INT NOT NULL,
	`idmat` INT AUTO_INCREMENT,
	`nom` VARCHAR(10),
);

CREATE TABLE notes (
	`id` INT AUTO_INCREMENT,
	`ideleve` INT NOT NULL,
	`idreleve` INT,
	`note` FLOAT(5,3),
	`obs_vscol` VARCHAR(30),
	`obs_prof` VARCHAR(30)
);


