DELIMITER //
	CREATE TRIGGER before_insert_register
	BEFORE INSERT ON Register FOR EACH ROW
	BEGIN
		IF NEW.Id_RegisterCircustance IS NOT NULL THEN
			SET NEW.StudentsAssistanceNumber = 0;
		END IF;
	END; //
DELIMITER ;