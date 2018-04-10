<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// This is the backup of the SQL db tables.
include '../includes/mydb.php';
$db = new DB();

// This isthe Category Table.
$sql[0] = "CREATE TABLE dbms_category  (
            `c_name`        varchar(35),
            `c_id`          int NULL AUTO_INCREMENT,
            PRIMARY KEY (`c_id`)
    );";
// This is the Sub Category Table.
$sql[1] = "CREATE TABLE dbms_sub_category  (
            `sc_name`         varchar(35) UNIQUE,
            `sc_id`           int NULL AUTO_INCREMENT,
            `sc_belongs_to`   int,
            PRIMARY KEY(`sc_id`),
            FOREIGN KEY(`sc_belongs_to`) REFERENCES `dbms_package`.`dbms_category`(`c_id`)
    );";

// This is the User Table.
$sql[2] = "CREATE TABLE dbms_user  (
            `user_name`         varchar(30),
            `user_name_clean`   varchar(30) UNIQUE,
            `user_pass`         text,
            `user_id`           int NULL AUTO_INCREMENT,
            `user_dob`          DATE,
            `user_email`        text NOT NULL,
            PRIMARY KEY (`user_id`)
    );";

// This is the Basket Table
$sql[3] = "CREATE TABLE dbms_basket    (
            `basket_id`         int NULL AUTO_INCREMENT,
            `basket_user_id`    int,
            `basket_clear`      int DEFAULT 1,
            PRIMARY KEY (`basket_id`),
            FOREIGN KEY (`basket_user_id`) REFERENCES `dbms_package`.`dbms_user`(`user_id`),
            CONSTRAINT `basket_clear_check` CHECK (`basket_clear` IN (0, 1))
    );";

// This is the session Table.
$sql[4] = "CREATE TABLE dbms_session   (
            `session_id`            VARCHAR(60),
            `session_user_id`       int,
            `session_create_time`   int,
            `session_last_active`   int,
            `session_user_type`     int,
            `session_create_ip`     text,
            `session_browser`       text,
            `session_login_stat`    int DEFAULT 0,
            `session_basket_id`     int,
            PRIMARY KEY (`session_id`),
            FOREIGN KEY (`session_user_id`) REFERENCES `dbms_package`.`dbms_user`(`user_id`),
            FOREIGN KEY (`session_basket_id`) REFERENCES `dbms_package`.`dbms_basket`(`basket_id`)
    );";

// This is the seller Table.
$sql[5] = "CREATE TABLE dbms_seller_info    (

`seller_user_id`    int,
            `seller_approved`   int DEFAULT 0,
            `seller_avg_rating` real DEFAULT 0,
            PRIMARY KEY (`seller_user_id`),
            FOREIGN KEY (`seller_user_id`) REFERENCES `dbms_package`.`dbms_user`(`user_id`),
            CONSTRAINT `seller_avg_rating` CHECK (`seller_avg_rating` BETWEEN 0 AND 5)
    );";

// This is the image Table.
$sql[6] = "CREATE TABLE dbms_image (
            `image_id`          int NOT NULL,
            `image_name`        varchar(40),
            `image_type`        varchar(5),
            PRIMARY KEY (`image_id`)
    );";

// This is the Item table.
$sql[7] = "CREATE TABLE dbms_item  (
            `item_name`         varchar(40),
            `item_id`           int NULL AUTO_INCREMENT,
            `item_sub_category` int,
            `item_seller_id`    int,
            `item_price`        double,
            `item_stock`        int,
            `item_avg_rating`   real DEFAULT 0,
            `item_image_id`     int NOT NULL,
            PRIMARY KEY (`item_id`),
            FOREIGN KEY (`item_sub_category`) REFERENCES `dbms_package`.`dbms_sub_category`(`sc_id`),
            FOREIGN KEY (`item_seller_id`) REFERENCES `dbms_package`.`dbms_seller_info`(`seller_user_id`),
            FOREIGN KEY (`item_image_id`) REFERENCES `dbms_package`.`dbms_image`(`image_id`),
            CONSTRAINT `item_ratings_check` CHECK (`item_avg_rating` BETWEEN 0 AND 5)
    );";

// This is the relation that connects Basket and Items
$sql[8] = "CREATE TABLE dbms_basket_contains   (
            `basket_id`             int NOT NULL,
            `basket_item_id`        int NOT NULL,
            `basket_item_qty`       int NOT NULL,
            `basket_item_shipped`   BOOLEAN NOT NULL DEFAULT 0,
            PRIMARY KEY (`basket_id`, `basket_item_id`),
            FOREIGN KEY (`basket_id`) REFERENCES `dbms_package`.`dbms_basket`(`basket_id`),
            FOREIGN KEY (`basket_item_id`) REFERENCES `dbms_package`.`dbms_item`(`item_id`)
    );";

//This is the Ratings Table
$sql[9] = "CREATE TABLE dbms_ratings   (
            `rating_user_id`    int NOT NULL,
            `rating_item_id`    int NOT NULL,
            `rating_value`      REAL,
            `rating_text`       text,
            PRIMARY KEY (`rating_user_id`, `rating_item_id`),
            FOREIGN KEY (`rating_user_id`) REFERENCES `dbms_package`.`dbms_user`(`user_id`),
            FOREIGN KEY (`rating_item_id`) REFERENCES `dbms_package`.`dbms_item`(`item_id`),
            CONSTRAINT `ratings_value_check` CHECK (`rating_value` BETWEEN 0 AND 5)
    );";

// This is the Payments table
$sql[10] = "CREATE TABLE dbms_payments (
            `payment_basket_id`     int NULL AUTO_INCREMENT,
            `payment_time`          int NOT NULL,
            PRIMARY KEY (`payment_basket_id`),
            FOREIGN KEY (`payment_basket_id`) REFERENCES `dbms_package`.`dbms_basket`(`basket_id`)
    );";

$sql[11] = "DELIMITER //
            CREATE PROCEDURE `dbms_package`.`display_basket_items`(IN basketId INT)
            BEGIN
                SELECT `item_name` , `item_price`, `basket_item_qty`, `image_name`, `image_type`, `basket_item_ship_id`
                    FROM `dbms_package`.`dbms_item`,
                        `dbms_package`.`dbms_basket_contains`,
                        `dbms_package`.`dbms_image`
                    WHERE `dbms_basket_contains`.`basket_item_id` = `dbms_item`.`item_id` AND
                        `dbms_image`.`image_id` = `dbms_item`.`item_image_id` AND
                        `dbms_basket_contains`.`basket_id` = basketId;
            END//";

$sql[12] = "DELIMITER //
            CREATE PROCEDURE `dbms_package`.`get_total_basket_price`	(
                    IN basket_id INT)
            BEGIN
                SELECT SUM(total_cost) as resultTable.total_basket_cost
                    FROM (SELECT basket_item_qty * item_price AS total_cost
                            FROM `dbms_package`.`dbms_basket_contains` , `dbms_package`.`dbms_item`
                            WHERE `dbms_basket_contains`.`basket_item_id` = `dbms_item`.`item_id` AND

`dbms_basket_contains`.`basket_id` = basket_id) as resultTable;
            END//";

$sql[13] = "DELIMITER $$
            CREATE PROCEDURE `dbms_package`.`updateStockProcedure`(IN basketId INT)
            BEGIN
                    DECLARE itemId INT;
                    DECLARE itemQty INT;
                    DECLARE finished INTEGER DEFAULT 0;
                    DECLARE itemCursor CURSOR FOR SELECT `basket_item_id`, `basket_item_qty` FROM `dbms_package`.`dbms_basket_contains` WHERE `basket_id` = basketId;
                    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

                    OPEN itemCursor;

                    read_loop: LOOP
                            FETCH itemCursor INTO itemId, itemQty;
                            IF finished = 1 THEN
                                    LEAVE read_loop;
                            END IF;
                            /* Now we have to subtract the quantity of item from the stock. Stock is check before apporval so no need to check again. */
                            UPDATE `dbms_package`.`dbms_item` SET `item_stock` = `item_stock` - itemQty WHERE `item_id` = itemId;
                    END LOOP;
            END$$
            DELIMITER ;";

$sql[14] = "DELIMITER $$
            CREATE TRIGGER `dbms_package`.`updateStockOnOrder`
                    AFTER UPDATE ON `dbms_package`.`dbms_basket`
                    FOR EACH ROW
                    BEGIN
                            /*This trigger is used to subtract the qty of items in the baskets from the ones in the item table.
                             *First we declare the cursors to get all the items from the baskets. */

                            IF NEW.`basket_clear` != OLD.`basket_clear` THEN
                                    IF NEW.`basket_clear` = -1 THEN
                                            CALL updateStockProcedure(NEW.`basket_id`);
                                    END IF;
                            END IF;
                    END$$
            DELIMITER ;";

$sql[15] = "DELIMITER $$
            CREATE TRIGGER `dbms_package`.`updateBaskedStatusToShipped`
                    AFTER UPDATE ON `dbms_package`.`dbms_basket_contains`
                    FOR EACH ROW
                    BEGIN
                            DECLARE totalItems INT DEFAULT 0;
                            DECLARE shippedItems INT DEFAULT 0;

                            SELECT COUNT(`basket_item_id`) INTO totalItems
                                    FROM `dbms_package`.`dbms_basket_contains`
                                    WHERE `basket_id` = NEW.basket_id;
                            SELECT COUNT(`basket_item_id`) INTO shippedItems
                                    FROM `dbms_package`.`dbms_basket_contains`
                                    WHERE `basket_id` = NEW.basket_id AND
                                            `basket_item_ship_id` != 0;

                            IF totalItems = shippedItems THEN
                                    UPDATE `dbms_package`.`dbms_basket` SET `basket_clear` = 1 WHERE `basket_id` = NEW.basket_id;
                            END IF;
                    END$$
            DELIMITER ;";

$sql[16] = "DELIMITER $$
            CREATE PROCEDURE `dbms_package`.`updateRatingProcedure` ( IN itemID INT)
            BEGIN
                    DECLARE avg_ratings DOUBLE;
                    DECLARE sellerId INT;

                    SELECT AVG(`rating_value`) INTO avg_ratings FROM `dbms_package`.`dbms_ratings` WHERE `rating_item_id` = itemID;
                    UPDATE `dbms_package`.`dbms_item` SET `item_avg_rating` = avg_ratings WHERE `item_id` = itemID;

                    SELECT `item_seller_id` INTO sellerId FROM `dbms_package`.`dbms_item` WHERE `item_id` = itemID;
                    SELECT AVG(`rating_value`) INTO avg_ratings
                            FROM `dbms_package`.`dbms_ratings` , 
                                    `dbms_package`.`dbms_item`
                            WHERE `dbms_ratings`.`rating_item_id` = `dbms_item`.`item_id` AND
                                    `dbms_item`.`item_seller_id` = sellerId;
                    UPDATE `dbms_package`.`dbms_seller_info` SET `seller_avg_rating` = avg_ratings WHERE `seller_user_id` = sellerId;
            END$$
            DELIMITER ;";

$sql[17] = "DELIMITER $$
            CREATE TRIGGER `dbms_package`.`updateRatingStatItemUp`
                    AFTER UPDATE ON `dbms_package`.`dbms_ratings`
                    FOR EACH ROW
                    BEGIN
                            IF OLD.`rating_value` != NEW.`rating_value` THEN
                                    CALL updateRatingProcedure(NEW.`rating_item_id`);
                            END IF;
                    END$$
            DELIMITER ;";

$sql[18] = "DELIMITER $$
            CREATE TRIGGER `dbms_package`.`updateRatingStatItemDel`
                    AFTER DELETE ON `dbms_package`.`dbms_ratings`
                    FOR EACH ROW
                    BEGIN
                            CALL updateRatingProcedure(OLD.`rating_item_id`);
                    END$$
            DELIMITER ;";

$sql[19] = "DELIMITER $$
            CREATE TRIGGER `dbms_package`.`updateRatingStatItemIns`
                    AFTER INSERT ON `dbms_package`.`dbms_ratings`
                    FOR EACH ROW
                    BEGIN
                            CALL updateRatingProcedure(NEW.`rating_item_id`);
                    END$$
            DELIMITER ;";

$sql[20] = "DELIMITER $$
            CREATE TRIGGER `dbms_package`.`updatePaymentOnShip`
                    AFTER INSERT ON `dbms_package`.`dbms_payments`
                    FOR EACH ROW
                    BEGIN
                            UPDATE `dbms_package`.`dbms_basket` SET `basket_clear` = -1 WHERE `basket_id` = NEW.`payment_basket_id`;
                    END$$
            DELIMITER ;";

for ( $i = 0 ; $i <= 19 ; $i++)   {
    $query = $db->query($sql[$i]);
    echo $query;
}
?>
