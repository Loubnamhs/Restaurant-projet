# Manuel processus d'installation

- Mise en place de la base de données

```bash
mysql -u root -p
```

```bash
create database restaurant;
```

```bash
use restaurant;
```

- Création des tables nécessaires

Sur votre terminal dans la console mysql, il faudra jouer les requetes suivantes:

```
Create table articles (
            ArticleID INT AUTO_INCREMENT NOT NULL primary key,
            Nom_article varchar(100),
            Categorie varchar(50),
            Prix FLOAT,
            Descriptions varchar(200) );
```

```
Create table image (
            id INT AUTO_INCREMENT NOT NULL primary key,
            name varchar(100),
            url varchar(100),
            description VARCHAR(200)
);
```

```
Create table Reservations(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    UserID int not null,
    date VARCHAR(100),
    heure int,
    allergies varchar(100),
    nombre_couverts int,
    min int
);

```



```
CREATE TABLE horaire (
  `id` int NOT NULL AUTO_INCREMENT,
  `debut_a` VARCHAR(100),
  `fin_a` VARCHAR(100),
  `debut_b` VARCHAR(100),
  `fin_b` VARCHAR(100),
  `statut` BOOLEAN,
  PRIMARY KEY (`id`)
);
```

```
create table users ( 
    userID INT not null auto_increment primary key, 
    nom varchar(50),
    prenom varchar(50),
    email varchar(100), 
    mot_de_passe varchar(20), 
    allergies varchar(100),
    convives INT
);
```

Dans le dossier sql situé à la racine du projet veuillez jouez les requêtes fournies une à une.(Attention il faut utiliser tous les fichier sql)


- Cloner le repository git

```
git clone https://github.com/Loubnamhs/Restaurant-projet.git
```

- Installer Composer

- Installer Altorouter

- Installer Whoops

- Installer pdo-mysql

- Configurer le fichier php.ini


