CREATE OR REPLACE FUNCTION checkAdmin (IN aName VARCHAR(20),IN aPassword VARCHAR(20))
RETURN number
IS
retval INT
BEGIN
	IF(aName=='admin')
	THEN
		retval=0;
		IF(aPassword=='admin')
		THEN
			retval=1;
		ENDIF
	ENDIF
RETURN (retval)
END;

DELIMITER $$
CREATE OR REPLACE FUNCTION checking(aName VARCHAR(20),aPassword VARCHAR(20))
RETURNS INT
AS
retval INT
BEGIN
	IF(aName=='admin')
	THEN
		retval=0;
		IF(aPassword=='admin')
		THEN
			retval=1;
		ENDIF
	ENDIF
RETURN (retval)
END$$
DELIMITER ;;



/* Return total order amount for a customer */
create function get_tot_ords(c_num in integer)
returning money(16,2)
/* Declare one local variable to hold the total */
define tot_ord money(16,2);
begin
/* Simple single-row query to get total */
select sum(amount) into tot_ord
return number(16,2)
as
/* Declare one local variable to hold the total */
declare tot_ord number(16,2);
begin
/* Simple single-row query to get total */
select sum(amount) into tot_ord
from orders
where cust = c_num;
/* return the retrieved value as fcn value */
return tot_ord;
end;


create function get_tot_ords(c_num in integer)
returning money(16,2)
/* Declare one local variable to hold the total */
define tot_ord money(16,2);
begin
/* Simple single-row query to get total */
select sum(amount) into tot_ord
- 508 -
from orders
where cust = c_num;
/* Return the retrieved value as fcn value */
return tot_ord;
end function;