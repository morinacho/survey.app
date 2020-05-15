<?php 

	class Answers extends Controller{
        private $answerModel;
        private $questionModel; 
		
		public function __construct(){
            $this->answerModel     = $this->model('Answer'); 
			$this->questionModel   = $this->model('Question');  
		}

		public function index(){}

		public function create($questionId){    
			$param   = [ 
                "question_id"      => $questionId,
                "question_content" => $this->questionModel->getQuestionText($questionId),
				"answers"          => $this->answerModel->getAnswers($questionId),
				"type"			   => $this->answerModel->getTypesAnswer()
			]; 

			return $this->view('answers/create', $param);
		}

		public function store(){ 
			 
        }

		public function show(){

		}

		public function edit(){}

		public function update(){}

		public function delete(){}
	}

?>