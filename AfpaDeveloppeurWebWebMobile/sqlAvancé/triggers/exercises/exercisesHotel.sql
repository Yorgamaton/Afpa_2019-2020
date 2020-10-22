/*Phase 1 - Bien débuter avec les déclencheurs

Reproduisez les exemples à partir de la base hotel.
*/
DELIMITER |

    CREATE TRIGGER insert_station AFTER INSERT ON station
        FOR EACH ROW
        BEGIN
            DECLARE altitude INT;
            SET altitude = NEW.sta_altitude;
            IF altitude<1000 THEN
                -- Here the message error is generate
                SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Un problème est survenu. Règle de gestion altitude !';
            END IF;
    END|

DELIMITER ;

-- This query will doesn't work because of the trigger with limit the altitude
insert into station (sta_nom, sta_altitude) values ('station du bas', 666);

/*A partir de l'exemple ci-dessus, créez les déclencheurs suivants :

1 modif_reservation : interdire la modification des réservations (on autorise l'ajout et la suppression).
*/
    DELIMITER |

        CREATE TRIGGER modif_reservation BEFORE UPDATE ON reservation
            FOR EACH ROW
            BEGIN
                SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = "La modification des réservations n\'est pas autorisée";
            END |

    DELIMITER ;

    -- Try this query to see if it's work
        UPDATE reservation 
        SET `res_prix`= 290.99
        WHERE `res_id` = 1

-- 2 insert_reservation : interdire l'ajout de réservation pour les hôtels possédant déjà 10 réservations.

    DELIMITER |

        CREATE TRIGGER insert_reservation  BEFORE INSERT ON reservation
            FOR EACH ROW
            BEGIN
                DECLARE nbr_res TINYINT;
                SET nbr_res = (
                    SELECT COUNT(reservation.res_id)
                    FROM reservation
                    JOIN chambre ON chambre.cha_id = reservation.res_cha_id
                    JOIN hotel ON hotel.hot_id = chambre.cha_hot_id
                    GROUP BY hotel.hot_id
                );
                IF nbr_res >= 10 THEN
                    SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = "L'hôtel ne peux pas posséder plus de 10 réservations";
                END IF;
            END|

    DELIMITER ;

-- 3 insert_reservation2 : interdire les réservations si le client possède déjà 3 réservations.

DELIMITER |

    CREATE TRIGGER insert_reservation2 AFTER INSERT ON station
        FOR EACH ROW
        BEGIN
            DECLARE res_cli INT;
            SET res_cli = (
                SELECT COUNT(res_cli_id)
                FROM reservation
                GROUP BY res_cli_id
            );
            IF res_cli > 3 THEN
                -- Here the message error is generate
                SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Vous ne pouvez pas effectuer plus de trois réservations.';
            END IF;
    END|

DELIMITER ;

-- 4 insert_chambre : lors d'une insertion, on calcule le total des capacités des chambres pour l'hôtel, si ce total est supérieur à 50, on interdit l'insertion de la chambre.

DELIMITER |

    CREATE TRIGGER insert_station AFTER INSERT ON station
        FOR EACH ROW
        BEGIN
            DECLARE altitude INT;
            SET altitude = NEW.sta_altitude;
            IF altitude<1000 THEN
                -- Here the message error is generate
                SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Un problème est survenu. Règle de gestion altitude !';
            END IF;
    END|

DELIMITER ;

/*Phase 2

Travailler avec des déclencheurs DML Prenez en compte le support Les déclencheurs DML , et réalisez les trois exercices du support Papyrus les déclencheurs


