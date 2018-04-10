BEGIN
	DECLARE msg VARCHAR(255);
	IF (New.reason='Not enough taxi and driver')
		THEN
			SET msg = 'Not enough taxi and driver';
			SIGNAL sqlstate '45000' SET message_text = msg;
	END IF;
	IF (New.reason='Not enough driver')
	THEN
		SET msg = 'Not enough driver';
		SIGNAL sqlstate '45000' SET message_text = msg;
	END IF;
	IF (New.reason='Not enough taxi')
		THEN
			SET msg = 'Not enough taxi';
			SIGNAL sqlstate '45000' SET message_text = msg;
	END IF;
END