<?php 
$mysqli = new mysqli("localhost", "root", "", "dbms");
$sql="DELIMITER $$
CREATE TRIGGER `test_before_insert` BEFORE INSERT ON `Test`
FOR EACH ROW
BEGIN
    IF CHAR_LENGTH( NEW.ID ) < 4 THEN
    SIGNAL SQLSTATE '12345'
        SET MESSAGE_TEXT := 'check constraint on Test.ID failed';
    END IF;
END$$   
DELIMITER ;";

?>
--------------------------------------WRKING--------------------------------
DELIMITER $$
CREATE TRIGGER `test_before_insert` BEFORE INSERT ON `test2`
FOR EACH ROW
BEGIN
   IF new.num < 70 THEN
       SIGNAL SQLSTATE '01000'
      SET MESSAGE_TEXT = 'A warning occurred', MYSQL_ERRNO = 1000;
   END IF;
END$$
DELIMITER $$;

delimiter $$
CREATE TRIGGER chk_gender BEFORE INSERT ON `user`
FOR EACH ROW
BEGIN
DECLARE msg varchar(255)
IF (NEW.gender&lt;&gt;'m' AND NEW.gender&lt;&gt;'f')
THEN
SET msg = concat('Constraint chk_gender violated: gender must not contain invalid value ', cast(new.gender as char));
SIGNAL sqlstate '45000' SET message_text = msg;
END IF;
END$$
delimiter ;
------------------------------------------------------------------------------------------

Arthi
DELIMITER $$
CREATE TRIGGER `test_after_insert` AFTER INSERT ON `test2`
FOR EACH ROW
BEGIN
   IF new.num < 70 or new.num > 100 THEN
           delete from `test2` where `num`=new.num;
   END IF;
END$$
DELIMITER ;;




<?php
	$taxino=$_POST['TaxiNo'];
	$taxicapacity=$_POST['TaxiCapacity'];
	$taxiac=$_POST['TaxiAC'];
	$query = "DELIMITER $$
            CREATE PROCEDURE `DBMS`.`updateTaxiProcedure`(IN TaxiNo VARCHAR(10),IN TaxiCapacity INT,IN TaxiAC CHAR(1))
            BEGIN
                            UPDATE `DBMS`.`taxi` SET `taxi_capacity` = TaxiCapacity,`taxi_ac` = TaxiAC WHERE `taxi_no` = TaxiNo;
            END$$
            DELIMITER ;";
	$result=mysql_query($query)or die(mysql_error());
	$query1="call updateTaxiProcedure($taxino,$taxicapacity,$taxiac);";
	$result1=mysql_query($query1)or die(mysql_error());;
?>