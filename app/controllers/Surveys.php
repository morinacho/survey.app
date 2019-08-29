<?php   
	class Surveys extends Controller{
        private $surveyModel;
        
		public function __construct() {
            $this->surveyModel = $this->model('Survey'); 
		}

		public function index(){ 
			/*
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
			}
			$param   = ['respuestas' => $surveys,
						'preguntas'  => $preguntas,
						'categoria'  => $categoriaNombre];*/
			$this->view('surveys/index');
		}

		public function createquestion(){
			$this->view('surveys/createquestion');
		}
	}

?>