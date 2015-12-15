USE Project;

DELIMITER //
CREATE PROCEDURE update_register_teacher
(IN Id INT, IN IdLab INT, IN IdStu INT, IN IdRegCirc INT, IN NumberStudents INT, IN reason VARCHAR(100))
BEGIN
	UPDATE register r
    INNER JOIN register_teacher rt ON r.Id_Register = rt.Id_Register
    SET r.Id_Laboratory = IdLab, r.Id_Student = IdStu,
		r.Id_RegisterCircustance = IdRegCirc, r.StudentsAssistanceNumber = NumberStudents, r.Comments = reason
	WHERE rt.Id_Register_Teacher = Id;
END //
DELIMITER ;
