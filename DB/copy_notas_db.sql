COPY estudiantes(cod_est,nomb_est)
FROM '/tmp/estudiantes.csv'
DELIMITER ','
CSV HEADER;

COPY cursos(cod_cur,nomb_cur)
FROM '/tmp/cursos.csv'
DELIMITER ','
CSV HEADER;

COPY inscripciones(cod_cur,cod_est,year,periodo)
FROM '/tmp/inscripciones.csv'
DELIMITER ','
CSV HEADER;
