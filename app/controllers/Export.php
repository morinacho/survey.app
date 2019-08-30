<?php
	class Exportar extends Controller{
	
		public function exportar(){
			require_once("../assets/xlsxwriter.class.php");
			$db=new DataBase();
			$db->query('SELECT c.categoria_nombre, p.pregunta_texto, rp.respuesta_pregunta_texto, e.encuestado_id
					FROM respuesta_encuesta re 
					INNER JOIN respuesta_pregunta rp 
					on re.respuesta_pregunta_id=rp.respuesta_pregunta_id 
					INNER JOIN encuesta e 
					on re.encuesta_id=e.encuesta_id
					INNER JOIN pregunta p
					on p.pregunta_id=rp.pregunta_id
					INNER JOIN categoria c
					ON c.categoria_id=p.categoria_id
					ORDER BY e.encuestado_id, c.categoria_id, p.pregunta_id');
			$res=$db->getRecords();

			/* esto es el ejemplo para escribir el excel, tengo que organizar lo que devuelve $res
			$rows = array(
					    array('2003','1','-50.5','2010-01-01 23:00:00','2012-12-31 23:00:00'),
					    array('2003','=B1', '23.5','2010-01-01 00:00:00','2012-12-31 00:00:00'),
					);
			$writer = new XLSXWriter();
			$writer->setAuthor('Survey.app'); 
			foreach($rows as $row){
				$writer->writeSheetRow('Sheet1', $row);
			}*/
			$writer->writeToFile('resultados_encuesta.xlsx');
		}
	}
	
	
?>