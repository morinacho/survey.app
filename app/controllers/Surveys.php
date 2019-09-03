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
	}

?>