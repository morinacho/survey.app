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
		
		public function create(){
			$this->view('surveys/create');
		}
		# Crea la vista para realizar una encuesta
		public function newSurvey(){
			# Se pide la encuesta por categoria 
			$countCategorias = $this->surveyModel->getNumRowCategoria();
			$param = array();
			for($i = 1; $i <= $countCategorias; $i++){
				$response   = $this->surveyModel->index($i);
				$categoryId =  explode(" ", $response["categoria"]); 
				$id         = ""; # Identificador de preguntas. Ejepmlo DP1 
				for($j = 0; $j < count($categoryId); $j++){
					if(strlen($categoryId[$j]) > 3){
						$id .= substr($categoryId[$j], 0, 1);
					}
				} 
				$survey = ["categoriaId" => $id,
							"survey" => $response ]; 
				array_push($param, $survey);
			}
			/**
			 * $param es un array asociativo que tiene lo siguiente:
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
			$this->view('surveys/survey', $param);
		}

		# Muestra las encuestas realizadas
		public function show(){
					
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
		public function export(){
			echo "esto exporta";
		}
	}

?>