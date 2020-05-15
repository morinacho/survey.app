<?php   
	class Surveys extends Controller{
		private $surveyModel;
		private $categoryModel;
		private $answerModel;
        
		public function __construct() {
			$this->surveyModel   = $this->model('Survey'); 
			$this->categoryModel = $this->model('Category'); 
			$this->answerModel   = $this->model('Answer');
		}

		# Redirect Home
		public function index(){  
			redirect('home');
		}

		# Create new survey form
		public function create(){
			$this->view('surveys/create');
		}

		# Save a survey
		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new-survey'])){
				if(!empty($_POST['survey-name'])){
					$surveyName = trim($_POST['survey-name']);

					$surveyId = $this->surveyModel->addSurvey($surveyName);
					if($surveyId != null){						
						redirect("questions/create/?survey_id=$surveyId&survey_name=$surveyName");
					} 	
				}
			    else{ echo 'Survey empty';} 
			} 
		} 

		# Views list survey
		public function viewSurveys(){
			$param = $this->surveyModel->getSurveys();
			$this->view('surveys/view-surveys', $param);
		}

		# Views to fill out survey
		public function fillOutSurvey($surveyId){ 
			$this->view('surveys/fillout-survey');
		}
		
		# Save a fill out survey
		public function saveResult(){}


		# Views to list result
		public function viewResults(){
			$param = $this->surveyModel->getSurveys();
			$this->view('surveys/view-results', $param);
		}

		# Show result of a survey
		public function viewSurveyResult($surveyId){
			$this->view('surveys/view-survey-result');
		}

		# Export a survey to xls
		public function export($surveyId){ 
			/*$db=new DataBase();
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

		# Permite editar la encuesta seleccionada
		public function update(){}

		# Elimina una encuesta
		public function delete(){}

		# Crea la vista para realizar una encuesta
		public function newSurvey(){
			
			/*# Se comprueban los criterios de exclusion
			if (isset($_GET['edad'])||isset($_GET['residencia'])||isset($_GET['hospital'])||isset($_GET['corticoides'])||!isset($_GET['acepta'])) {
				print "<script>alert(\"No se puede realizar la encuesta.\");window.location='create';</script>";
			}

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

			$this->view('surveys/add-survey');
		}		
	}

?>