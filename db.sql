use SCol;

CREATE TABLE IF NOT EXISTS releves(
	`id` INT NOT NULL AUTO_INCREMENT,
	`value` JSON,
	PRIMARY KEY (id)
);

INSERT INTO releves (value) VALUES ('{"promotion":"B3","titre":"Web","type":"Projet","prof_nom":"wruchaud","date_rendre":"01/09/2020","tag_prof":"En attente","notes":[{"nom":"KREJCI","prenom":"Philippe","note":"16"},{"nom":"FATMI","prenom":"Yanis","note":"20"}]}');

INSERT INTO releves (value) VALUES ('{"promotion":"B3","titre":"UI","type":"EI","prof_nom":"wruchaud","date_rendre":"01/09/2020","tag_prof":"Nouveau"}');
