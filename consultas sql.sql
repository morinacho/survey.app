/**
ingresando el id de la pregunta se obtiene la categoria, la pregunta y sus respuestas con sus imagenes (si tiene), 
el tipo de respuesta, si es excluyente y su anidada (si tiene)
*/

SELECT c.categoria_nombre, 
p.pregunta_texto, 
rp.respuesta_pregunta_texto, 
rp.respuesta_pregunta_imagen, 
rp.respuesta_pregunta_excluyente, 
rp.respuesta_pregunta_tipo, 
rp.pregunta_id_anidada
FROM categoria c
INNER JOIN pregunta p
ON p.categoria_id=c.categoria_id
INNER JOIN respuesta_pregunta rp
ON p.pregunta_id=rp.pregunta_id
WHERE c.categoria_id=:categoriaId;


SELECT c.categoria_nombre,p.pregunta_id,p.pregunta_texto
FROM pregunta p
INNER JOIN categoria c
ON c.categoria_id=p.categoria_id
WHERE c.categoria_id=:categoriaId;


SELECT respuesta_pregunta_id,
respuesta_pregunta_texto,
respuesta_pregunta_imagen,
respuesta_pregunta_excluyente,
pregunta_id_anidada,
respuesta_pregunta_tipo
FROM respuesta_pregunta
WHERE pregunta_id=:preguntaId;
-----------------------------------------------------------------------------------------------------------------------

/** 
consulta por encuestado ingresando las iniciales y el email o el telefono
en caso de ingresar solo el el telefono en el email no poner NULL, ya que es un campo que permite el NULL, para evitar errores poner un 0. 
*/

SELECT *
FROM encuestado
WHERE encuestado_iniciales=:iniciales AND encuestado_telefono=:telefono OR encuestado_email=:email;

-----------------------------------------------------------------------------------------------------------------------

/**
consulta para importar los datos de las respuestas al excel
*/

SELECT c.categoria_nombre, p.pregunta_texto, rp.respuesta_pregunta_texto, e.encuestado_id
FROM respuesta_encuesta re 
INNER JOIN respuesta_pregunta rp 
on re.respuesta_pregunta_id=rp.respuesta_pregunta_id 
INNER JOIN encuesta e 
on re.encuesta_id=e.encuesta_id
INNER JOIN pregunta p
on p.pregunta_id=rp.pregunta_id
INNER JOIN categoria c
ON c.categoria_id=p.categoria_id
ORDER BY e.encuestado_id, c.categoria_id, p.pregunta_id

-----------------------------------------------------------------------------------------------------------------------
/**
consulta para mostrar la lista de preguntas, asi se pueden editar o borrar
*/

SELECT c.categoria_nombre,p.pregunta_id, p.pregunta_texto
FROM pregunta p
INNER JOIN categoria c
on p.categoria_id=c.categoria_id
ORDER BY c.categoria_id, p.pregunta_id;

/**
editar pregunta
*/

UPDATE pregunta
SET pregunta_texto=:texto, categoria_id=:categoriaId
WHERE pregunta_id=:preguntaId;

/**
eliminar
*/

DELETE FROM pregunta
WHERE pregunta_id=:preguntaId;
-----------------------------------------------------------------------------------------------------------------------

/**
consulta para mostrar las respuesta de una pregunta y poder editarlas o borrarlas 
*/

SELECT *
FROM respuesta_pregunta
WHERE pregunta_id=:preguntaId;

/**
editar repuesta
*/

UPDATE respuesta_pregunta 
SET respuesta_pregunta_texto=:texto,
respuesta_pregunta_imagen=:imagen,
respuesta_pregunta_excluyente=:excluyente,
pregunta_id_anidada=:anidada,
respuesta_pregunta_tipo=:tipo
WHERE respuesta_pregunta_id=:respuestaId;

/**
eliminar
*/

DELETE FROM respuesta_pregunta
WHERE respuesta_pregunta_id=:respuestaId;

-----------------------------------------------------------------------------------------------------------------------

/** 
guarda los datos de un nuevo encuestado 
*/

INSERT INTO `encuestado` (
    `encuestado_id`, 
    `encuestado_iniciales`, 
    `encuestado_sexo`, 
    `encuestado_email`, 
    `encuestado_telefono`, 
    `encuestado_fecha_nacimiento`, 
    `encuestado_nivel_educativo`, 
    `encuestado_actividad_laboral`, 
    `encuestado_cargo`, 
    `encuestado_enfermedad`, 
    `encuestado_medicina`, 
    `encuestado_suplemento`, 
    `encuestado_fumador`, 
    `encuestado_embarazo`, 
    `encuestado_menopausia`, 
    `encuestado_estado_civil`) VALUES (
        NULL, 
        :iniciales, 
        :sexo, 
        :email, 
        :telefono, 
        :fechaNacimiento, 
        :educacion, 
        :actividadLaboral, 
        :cargo, 
        :enfermedad, 
        :medicina, 
        :suplemento, 
        :fumador, 
        :embarazo, 
        :menopausia, 
        :estadoCivil);

-----------------------------------------------------------------------------------------------------------------------

/**
guarda los datos del encuestador
*/

INSERT INTO `encuestador`(
    `encuestador_dni`, 
    `encuestador_nombre`, 
    `encuestador_contrasenia`) VALUES (
        :dni, 
        :nombre, 
        :contrasenia);

-----------------------------------------------------------------------------------------------------------------------

/**
Crea una nueva encuesta
*/

INSERT INTO `encuesta`(
    `encuesta_id`, 
    `encuestador_dni`, 
    `encuestado_id`) VALUES (
        :encuestaId, 
        :dni, 
        :encuestadoId);

-----------------------------------------------------------------------------------------------------------------------

/**
crea una nueva categoria
*/

INSERT INTO `categoria`(
    `categoria_id`, 
    `categoria_nombre`) VALUES (
        NULL, 
        :nombre);

-----------------------------------------------------------------------------------------------------------------------

/**
crea una nueva pregunta
*/

INSERT INTO `pregunta`(
    `pregunta_id`, 
    `pregunta_texto`, 
    `categoria_id`) VALUES (
        NULL, 
        :texto, 
        :categoriaId);

-----------------------------------------------------------------------------------------------------------------------

/**
crea una nueva respuesta
*/

INSERT INTO `respuesta_pregunta`(
    `respuesta_pregunta_id`, 
    `respuesta_pregunta_texto`, 
    `respuesta_pregunta_imagen`, 
    `respuesta_pregunta_excluyente`, 
    `pregunta_id_anidada`, 
    `pregunta_id`, 
    `respuesta_pregunta_tipo`) VALUES (
        NULL,
        :texto,
        :imagen,
        :excluyente,
        :preguntaAnidada,
        :preguntaId,
        :tipo);

-----------------------------------------------------------------------------------------------------------------------

/**
guarda las respuestas de la encuesta de la persona
*/

INSERT INTO `respuesta_encuesta`(
    `respuesta_encuesta_id`, 
    `respuesta_pregunta_id`, 
    `encuesta_id`) VALUES (
        NULL,
        :respuestaId,
        :encuestaId);

-----------------------------------------------------------------------------------------------------------------------