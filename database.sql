CREATE DATABASE campusv2;

CREATE TABLE campers(
    id int primary key AUTO_INCREMENT,
    nombres VARCHAR (50) NOT NULL,
    direccion VARCHAR (50),
    logros VARCHAR (60),
    ingles VARCHAR (60),
    ser VARCHAR (60),
    review VARCHAR (60),
    skills VARCHAR (60)
);