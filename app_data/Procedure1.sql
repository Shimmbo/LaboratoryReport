USE Project;


DELIMITER //
CREATE PROCEDURE sp_get_register_info
(IN id INT)
BEGIN
  SELECT rt.Id_Register_Teacher as id,
		CASE ch.Id_Catalog_Hour
			WHEN  1 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T08:00:00')
            WHEN  2 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T10:00:00')
            WHEN  3 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T12:00:00')
            WHEN  4 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T16:00:00')
            WHEN  5 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T18:00:00')
            WHEN  6 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T20:00:00')
        END as start,
		CASE ch.Id_Catalog_Hour
			WHEN  1 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T08:00:00')
            WHEN  2 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T10:00:00')
            WHEN  3 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T12:00:00')
            WHEN  4 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T16:00:00')
            WHEN  5 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T18:00:00')
            WHEN  6 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T20:00:00')
        END as end,
        r.Comments,
        CONCAT(t.Name, ' ',t.LastName, ' ', IFNULL(t.SecondLastName, ''), ' - ',
        l.Name, ' - ', s.Name, ' - ', s.Semester, ' - ', c.Name, ' - ' ,r.StudentsAssistanceNumber
        ,' - ',IFNULL(cc.Description, ''))as title,
        c.Color as color
  FROM register_teacher rt LEFT JOIN register r ON r.Id_Register = rt.Id_Register
						  LEFT JOIN stuff_teacher st ON st.Id_Stuff_Teacher = rt.Id_Stuff_Teacher
						  LEFT JOIN teacher t ON t.Id_Teacher = st.Id_Teacher
						  LEFT JOIN laboratory l ON l.Id_Laboratory = r.Id_Laboratory
						  LEFT JOIN catalog_circustance cc ON cc.Id_Catalog_Circustance = r.Id_RegisterCircustance
						  LEFT JOIN catalog_hour ch ON ch.Id_Catalog_Hour = r.Id_Catalog_Hour
						  LEFT JOIN stuff s ON s.Id_Stuff = st.Id_Stuff
                          LEFT JOIN career c ON c.Id_Career = s.Id_Career
	WHERE ISNULL(id) OR rt.Id_Register_Teacher = id;
END //
DELIMITER ;
