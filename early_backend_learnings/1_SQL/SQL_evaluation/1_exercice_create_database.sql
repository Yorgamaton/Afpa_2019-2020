DROP DATABASE IF EXISTS eval_sql; --It will delete the database if it exist

CREATE DATABASE IF NOT EXISTS eval_sql; -- To create the database

USE eval_sql; 
/*to applay the following directly in this database
Can have error if a table exist in an other database
*/

CREATE TABLE IF NOT EXISTS clients(
    cli_num int NOT NULL,
    cli_nom varchar(50),
    cli_adress varchar(50),
    clit_tel varchar(30),
    PRIMARY KEY (cli_num)
);

CREATE TABLE IF NOT EXISTS produit(
	pro_num int NOT NULL,
    pro_libelle varchar(50),
    pro_description varchar(50),
    PRIMARY KEY (pro_num)
);

CREATE TABLE IF NOT EXISTS commande(
    com_num int NOT NULL,
    cli_num int NOT NULL,
    com_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    com_obs varchar(50),
    PRIMARY KEY (com_num),
    FOREIGN KEY (cli_num) REFERENCES clients (cli_num)
);

CREATE TABLE IF NOT EXISTS est_compose (
	com_num int NOT NULL,
    pro_num int NOT NULL,
    est_qte int,
    FOREIGN KEY (com_num) REFERENCES commande (com_num),
    FOREIGN KEY (pro_num) REFERENCES produit (pro_num)
);

CREATE INDEX index_clients
ON clients (cli_nom)