DELIMITER $$
CREATE PROCEDURE InsTransLog(dateofbooking TIMESTAMP, dateofjourney TIMESTAMP, endofjourney TIMESTAMP, emailid VARCHAR(30), reason VARCHAR(30))
BEGIN
	insert into `dbms`.`transaction_error_log` values(NULL,DATE_FORMAT(dateofbooking,'%Y-%m-%d %H:%i:%s'),DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s'),DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'),emailid,reason);
END$$
DELIMITER ;;