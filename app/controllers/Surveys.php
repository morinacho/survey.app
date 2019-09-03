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
			$response 	= $this->surveyModel->index(1);
			print_r($response);
			$params 	= [//cambiar a getPreguntas() y demas, pero primero tienen que llegar los datos
					'categoria' => $response['categoria'],
					'preguntas'	=> $response['preguntas'],
					'respuestas'=> $response['respuestas']
				];
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