<?php 

	class Questions extends Controller{
		private $questionModel;
		private $categoryModel;
		private $surveyModel;

		public function __construct(){
			$this->questionModel = $this->model('Question'); 
			$this->categoryModel = $this->model('Category'); 
			$this->surveyModel   = $this->model('Survey');
		}

		public function index(){}

		public function create(){ 
			$questions  = $this->questionModel->getQuestions($_GET["survey_id"]);
			$categories = $this->categoryModel->getCategories();  
			$param      = [
				'survey_id'   => $_GET["survey_id"],
				'survey_name' => $_GET["survey_name"],
				'questions'   => $questions,
				'categories'  => $categories
			]; 

			return $this->view('questions/create', $param);
		}

		public function store(){ 
			if(!empty($_POST['question-content']) && !empty($_POST['category-id']) && !empty($_POST['survey-id'])){
				$param = [
					'question' => $_POST['question-content'],
					'category' => $_POST['category-id'],
					'survey'   => $_POST['survey-id']
				];
				if($this->questionModel->addQuestion($param) != null){
					$surveyId   = $_POST['survey-id'];
					$surveyName = $this->surveyModel->getSurveyName($surveyId);
					redirect("questions/create/?survey_id=$surveyId&survey_name=$surveyName");
				}
			}
        }

		public function show(){

		}

		public function edit(){}

		public function update(){}

		public function delete(){}
	}

?>