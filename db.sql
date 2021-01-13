use SCol;

CREATE TABLE IF NOT EXISTS releves(
	`id` INT NOT NULL AUTO_INCREMENT,
	`value` JSON,
	PRIMARY KEY (id)
);

INSERT INTO releves (value) VALUES ('{"promotion":"B3","titre":"projet de Web","prof_nom":"RUCHAUD","date_rendre":"01/09/2020","tag":"En attente","notes":[{"nom":"KREJCI","prenom":"Philippe","note":"16"},{"nom":"FATMI","prenom":"Yanis","note":"20"}]}');

