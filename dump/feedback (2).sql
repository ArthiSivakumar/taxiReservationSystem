CREATE TABLE IF NOT EXISTS feedback(	
	`travel_id` 			INT,
	`drivers_punctuality`	INT,
	`taxi_comfortable`		INT,
	`journey_comfortable`	INT,		
	`customer_care`			INT,
	`booking_user_friendly`	INT,
	`nominal_rates`			INT,
	CONSTRAINT FEEDBACK_PK	PRIMARY KEY(`travel_id`),
	CONSTRAINT FEEDBACK_FK	FOREIGN KEY(`travel_id`) REFERENCES booking_details(`travel_id`)
	);

