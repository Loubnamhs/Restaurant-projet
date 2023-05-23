Create table Reservations(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    UserID int not null,
    date VARCHAR(100),
    heure int,
    allergies varchar(100),
    nombre_couverts int,
    min int
);