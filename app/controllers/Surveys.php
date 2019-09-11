<?php   
	class Surveys extends Controller{
        private $surveyModel;
        
		public function __construct() {
            $this->surveyModel = $this->model('Survey'); 
		}

		# Crea la vista index con menu para realizar encuesta
		public function index(){  
			$this->view('surveys/index');
		}
		
		# Crea la vista para realizar una encuesta
		public function create(){

			/**
			 * se pide la encuesta por categoria
			 * en este caso '1' es actividad fisica
			 */

			$params = $this->surveyModel->index(1);

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

			/**
			 * $params es un array asociativo que tiene lo siguiente:
			 * [categoria] 	= contiene el nombre de la categoria ex. 'Actividad Fisica'
			 * [preguntas] 	= contiene un array con todas las preguntas de la categoria
			 * [preguntas] es un array simple(indice enumerado con integers autoincrementables)
			 * en cada posicion del mismo se encuentran otros arrays asociativos con los siguientes campos
			 * [id] 		= el id de la pregunta
			 * [texto] 		= el texto de la pregunta
			 * [respuestas]	= un array con las respuestas de la pregunta
			 * al igual que preguntas [respuestas] es un array simple con arrays asoc. dentro, contiente:
			 * [id]				 = el id de la respuesta
			 * [imagen]			 = imagen de la respuesta (esto hay que ver como hacemos)
			 * [texto]			 = texto de la respuesta
			 * [tipo]			 = tipo de respuesta (radio, check, text, selct)
			 * [excluyente]		 = indica si esta respuesta es excluyente o no
			 * [pregunta anidada]= indica si esta respuesta abre otra pregunta
			 */

			#ejemplo para ver el array de una respuesta especifica de una pregunta especifica
			print_r($params['preguntas'][0]['respuestas'][0]);
			$this->view('surveys/create', $params);
		}

		# Permite guardar los datos de la encuesta que se realizo desde el create
		public function store(){
			
		}

		# Permite editar la encuesta seleccionada
		public function update(){

		}

		# Elimina una encuesta
		public function delete(){

		}

		# Exporta los datos de todas las encuesta en un archivo xlsx
		public function exports(){
			echo "esto exporta";
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