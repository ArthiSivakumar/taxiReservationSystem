CREATE TABLE taxi (
	`taxi_no`		VARCHAR(10),
	`taxi_status`	CHAR(1) DEFAULT 'a',
	`taxi_capacity`	INT		NOT NULL,
	`taxi_ac`		CHAR(1)	NOT NULL,
	CONSTRAINT taxi_no_primarykey	PRIMARY KEY(`taxi_no`),
	CONSTRAINT taxi_status_check	CHECK(`taxi_status` in ('a','b')),
	CONSTRAINT taxi_ac_check		CHECK(`taxi_ac` in ('y','n'))
)
insert into taxi values('ABC1344','n',2,'d');
CREATE TABLE customer (
	`email_id`	VARCHAR(30),
	`password`	VARCHAR(20) NOT NULL,
	`cus_name`	VARCHAR(30) NOT NULL,
	CONSTRAINT email_id_primarykey	PRIMARY KEY(`email_id`)
);
CREATE TABLE customer_phone_no (
	`cus_phone_no`	BIGINT(10),
	`email_id`	VARCHAR(30),
	CONSTRAINT email_phone_primarykey PRIMARY KEY(`cus_phone_no`,`email_id`),
	CONSTRAINT email_id_foreignkey FOREIGN KEY(`email_id`) REFERENCES `DBMS`.`customer`(`email_id`)
);
insert into customer values('jayaachu21@gmail.com','subhashree','jayashree');
insert into customer_phone_no values('9789364587','jayaachu21@gmail.com');
CREATE TABLE IF NOT EXISTS driver(	
		`driver_name` 		VARCHAR(20) 	NOT NULL,
		`driver_address`	VARCHAR(70)		NOT NULL,
		`cug_no`			BIGINT(10),
		`driver_salary`		INT,
		`date_of_joining`	DATE,
		`driver_mobile_no`  BIGINT(10),
		CONSTRAINT cug_no_primarykey		PRIMARY KEY(`cug_no`),
		CONSTRAINT driver_name_initcap		CHECK(`driver_name` LIKE INITCAP(`driver_name`)),
		CONSTRAINT driver_salary_check		CHECK(`driver_salary` >1000),
		CONSTRAINT driver_mobile_no_check	CHECK(`driver_mobile_no` > 7000000000 and `driver_mobile_no` < 10000000000),
		CONSTRAINT cug_no_check				CHECK(`cug_no` > 7000000000 and `cug_no` < 10000000000)
	);
CREATE TABLE driver_phone_no(
	`phone_no`	BIGINT(10),
	`cug_no`	BIGINT(10),
	CONSTRAINT phone_cug_primarykey PRIMARY KEY(`phone_no`,`cug_no`),
	CONSTRAINT cug_no_foreignkey FOREIGN KEY(`cug_no`) REFERENCES `DBMS`.`driver`(`cug_no`)
);	
CREATE TABLE booking_details (
	`travel_id`			INT NULL AUTO_INCREMENT,
	`date_of _booking` 	TIMESTAMP,
	`date_of-journey`  	TIMESTAMP,
	`travel_status`		CHAR(1) DEFAULT 'b',
	`source`			VARCHAR(20),
	`destination`		VARCHAR(20),
	`distance`			INT,
	`email_id`			VARCHAR(30),
	`cug_no`			BIGINT(10),
	`taxi_no`			VARCHAR(10),
	CONSTRAINT travel_id_primarykey PRIMARY KEY(`travel_id`),
	CONSTRAINT doj_dob_check	CHECK(`doj`>`dob`),
	CONSTRAINT travel_status_check CHECK (`tavel_status` in ('b','c')),
	CONSTRAINT email_id_fkey FOREIGN KEY(`email_id`) REFERENCES `DBMS`.`customer`(`email_id`),
	CONSTRAINT cug_no_fkey FOREIGN KEY(`cug_no`) REFERENCES `DBMS`.`driver`(`cug_no`),
	CONSTRAINT taxi_no_fkey FOREIGN KEY(`taxi_no`) REFERENCES `DBMS`.`taxi`(`taxi_no`)
); 
http://www.mysqltutorial.org/mysql-timestamp.aspx //timestamp example





