DELIMITER //
	CREATE TRIGGER delete_register_teacher
	BEFORE DELETE ON Register FOR EACH ROW
	BEGIN
		DELETE FROM register_teacher WHERE Id_Register = OLD.Id_Register;
	END; //
DELIMITER ;