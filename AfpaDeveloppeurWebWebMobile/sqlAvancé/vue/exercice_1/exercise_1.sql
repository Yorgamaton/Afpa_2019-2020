/*A partir de la base hôtel, créez les vues suivantes : 

1. Afficher la liste des hôtels avec leur station */

    -- initial query
    SELECT hotel.hot_nom, station.sta_nom 
    FROM hotel 
    JOIN station ON sta_id = hot_sta_id;

    -- Query's view
    CREATE VIEW v_station_by_hotel 
    AS 
    SELECT hotel.hot_nom, station.sta_nom 
    FROM hotel 
    JOIN station ON sta_id = hot_sta_id;

    --Query to display the view
    select * FROM v_station_by_hotel


--2. Afficher la liste des chambres et leur hôtel 

    -- Initial query
    SELECT  hotel.hot_nom, chambre.cha_numero, chambre.cha_capacite, chambre.cha_type
    FROM chambre 
    JOIN hotel ON chambre.cha_hot_id = hotel.hot_id ;

    -- Query's view
    CREATE VIEW v_room_by_hotel
    AS
    SELECT  hotel.hot_nom, chambre.cha_numero, chambre.cha_capacite, chambre.cha_type
    FROM chambre 
    JOIN hotel ON chambre.cha_hot_id = hotel.hot_id ;

    -- Query to display the view
    SELECT * FROM v_room_by_hotel ;

--3. Afficher la liste des réservations avec le nom des clients 

    --Initial query
    SELECT client.cli_nom, client.cli_prenom, reservation.res_id, reservation.res_date, reservation.res_date_debut, reservation.res_date_fin, reservation.res_prix, reservation.res_arrhes 
    FROM client 
    JOIN reservation ON reservation.res_cli_id = client.cli_id ;

    -- Query's view

    CREATE VIEW v_booking_by_customer
    AS
    SELECT client.cli_nom, client.cli_prenom, reservation.res_id, reservation.res_date, reservation.res_date_debut, reservation.res_date_fin, reservation.res_prix, reservation.res_arrhes 
    FROM client 
    JOIN reservation ON reservation.res_cli_id = client.cli_id ;

    -- Query to display the view

    SELECT * From v_booking_by_customer ;

--4. Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station 

    -- Initial query

    SELECT hotel.hot_nom, station.sta_nom, chambre.cha_numero 
    FROM chambre 
    JOIN hotel ON hotel.hot_id = chambre.cha_hot_id 
    JOIN station ON station.sta_id = hotel.hot_sta_id ;

    -- Query's view

    CREATE VIEW v_room_by_hotel_and_station
    AS
    SELECT hotel.hot_nom, station.sta_nom, chambre.cha_numero 
    FROM chambre 
    JOIN hotel ON hotel.hot_id = chambre.cha_hot_id 
    JOIN station ON station.sta_id = hotel.hot_sta_id ;

    -- Query to display the view

    SELECT * FROM v_room_by_hotel_and_station ;

--5. Afficher les réservations avec le nom du client et le nom de l’hôtel 

    --Initial query
    SELECT client.cli_nom, hotel.hot_nom, reservation.res_id 
    FROM reservation 
    JOIN client ON client.cli_id = reservation.res_cli_id 
    JOIN chambre ON chambre.cha_id = reservation.res_cha_id 
    JOIN hotel ON hotel.hot_id = chambre.cha_hot_id ;

    -- Query's view
    CREATE VIEW v_booking_by_customer_and_hotel
    AS
    SELECT client.cli_nom, hotel.hot_nom, reservation.res_id 
    FROM reservation 
    JOIN client ON client.cli_id = reservation.res_cli_id 
    JOIN chambre ON chambre.cha_id = reservation.res_cha_id 
    JOIN hotel ON hotel.hot_id = chambre.cha_hot_id ;

    -- Query to display the view
    SELECT * From v_booking_by_customer_and_hotel ;

