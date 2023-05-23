CREATE TABLE horaire (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `debutA` VARCHAR(100) ,
  `finA` VARCHAR(100) ,
  `debutB` VARCHAR(100) ,
  `finB` VARCHAR(100) ,
  `statut` BOOLEAN,
  `jour` VARCHAR(100)
);