<?php 

	class Categories extends Controller{
        private $categoryModel;
        private $surveyModel;

		public function __construct(){
            $this->categoryModel = $this->model('Category'); 
            $this->surveyModel   = $this->model('Survey'); 
		}

		public function index(){}

		public function create(){}

		public function store(){
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save-category'])){
				if(!empty($_POST['category-name'])){
					$categoryName = trim($_POST['category-name']);

                    $categoryId = $this->categoryModel->addCategory($categoryName);
                    
					if($categoryId != null){
                        $surveyId   = $_POST['survey-id'];
                        $surveyName = $this->surveyModel->getSurveyName($surveyId);
                        redirect("questions/create/?survey_id=$surveyId&survey_name=$surveyName");
                    }	
				}
			    else{
					echo 'Survey empty';
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