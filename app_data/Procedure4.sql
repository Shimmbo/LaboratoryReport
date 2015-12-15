USE Project;

DELIMITER //
CREATE PROCEDURE get_stuff_teacher_info()
BEGIN
	SELECT t.Name, t.LastName, t.SecondLastName,
		   s.Name as StuffName, ch.Name as Hour,
           t.Id_Teacher, ch.Id_Catalog_Hour, s.Id_Stuff,
           st.Id_Stuff_Teacher
    FROM stuff_teacher st
    INNER JOIN teacher t ON st.Id_Teacher = t.Id_Teacher
    INNER JOIN stuff s ON s.Id_Stuff = st.Id_Stuff
    INNER JOIN catalog_hour ch ON ch.Id_Catalog_Hour = st.Id_Catalog_Hour; 
END //
DELIMITER ;
