DROP DATABASE IF EXIST BD_Prestamo;
Create DATABASE BD_Prestamo;

USE BD_Prestamo;
--CREAR TABLA 'CLIENTE'
CREATE TABLE CLIENTE
(
    COD_CLI INT AUTO_INCREMENT PRIMARY KEY,
    NOM_CLI VARCHAR(50),
    APE_CLI VARCHAR(50),
    DNI_CLI CHAR(8)
);
--INSERTAR DATA
INSERT INTO CLIENTE VALUES(NULL,'PEDRO','TIZNADO','12345678');
INSERT INTO CLIENTE VALUES(NULL,'JUAN','PEREZ','12345678');
INSERT INTO CLIENTE VALUES(NULL,'RAMIRO','ALVAREZ','12345678');

SELECT *FROM CLIENTE;

--CREAR PROCEDIMIENTO ALMACENADO
DROP PROCEDURE IF EXISTS SP_BUSDEL_CLIENTE;
DELIMITER $$
CREATE PROCEDURE SP_BUSDEL_CLIENTE
(BUS VARCHAR(20),TIPO VARCHAR(3))
BEGIN
    IF TIPO = 'B' THEN
        SELECT * FROM CLIENTE WHERE COD_CLI = BUS OR NOM_CLI LIKE CONCAT('%',BUS,'%');
    ELSEIF TIPO = 'D' THEN
        DELETE FROM CLIENTE WHERE COD_CLI = BUS;
    END IF;
END $$
DELIMITER $$