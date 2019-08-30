<?php   
	class Surveys extends Controller{
        private $surveyModel;
        
		public function __construct() {
            $this->surveyModel = $this->model('Survey'); 
		}

		public function index(){  
			$response = $this->surveyModel->index(1);

			/* codigo antiguo Eliminar 
			$surveys = $this->surveyModel->getSurvey(1);
			$count = count($surveys);
			
			$categoriaNombre = $surveys[0]->categoria_nombre;
			
			$categoryId =  explode(" ", $categoriaNombre); 
			$id           = ""; # Identificador de preguntas. Ejepmlo DP1 
			for($i = 0; $i < count($categoryId); $i++){
				if(strlen($categoryId[$i]) > 3){
					$id .= substr($categoryId[$i], 0, 1);
				}
			} 
			$preguntas  = array();
			array_push($preguntas, $surveys[0]->pregunta_texto); 	
			
			for($i = 1; $i < $count; $i++){
				if(!($preguntas[count($preguntas)-1] == $surveys[$i]->pregunta_texto)){
					array_push($preguntas, $surveys[$i]->pregunta_texto); 			
				}
				else{continue;}
			}*/ 
			
			$this->view('surveys/index', $response);
		}

		public function createquestion(){
			$this->view('surveys/createquestion');
		}

		public function export(){
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
			print_r($res[0]);

			/* esto es el ejemplo para escribir el excel, tengo que organizar lo que devuelve $res
			$rows = array(
					    array('2003','1','-50.5','2010-01-01 23:00:00','2012-12-31 23:00:00'),
					    array('2003','=B1', '23.5','2010-01-01 00:00:00','2012-12-31 00:00:00'),
					);
			$writer = new XLSXWriter();
			$writer->setAuthor('Survey.app'); 
			foreach($rows as $row){
				$writer->writeSheetRow('Sheet1', $row);
			}
			$writer->writeToFile('resultados_encuesta.xlsx');*/
		}
	}

?>