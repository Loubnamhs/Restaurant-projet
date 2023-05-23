create table users ( 
    userID INT not null auto_increment primary key, 
    nom varchar(50),
    prenom varchar(50),
    email varchar(100), 
    mot_de_passe varchar(20), 
    allergies varchar(100),
    convives INT
);
