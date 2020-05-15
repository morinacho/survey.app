<?php
    class Answer{
        private $db;

        public function __construct(){
			$this->db = new DataBase;
        }

        public function addAnwser(){

        }
        
        public function getAnswers($questionId){
            $this->db->query('SELECT answer_type_id, answer_content, answer_image, exclusive_answer, answer_type_id, nested_question_id 
                              FROM answer 
                              WHERE question_id = :question_id');

            $this->db->bind(':question_id', $questionId);
            $result = $this->db->getRecords();
            
            if($this->db->rowCount() > 0){
               foreach ($result as $key => $value) {
                    $response[$value->answer_type_id] = [
                        "answer_content"     => $value->answer_content, 
                        "answer_image"       => $value->answer_image,
                        "exclusive_answer"   => $value->exclusive_answer, 
                        "answer_type_id"     => $value->answer_type_id, 
                        "nested_question_id" => $value->nested_question_id
                    ]; 
                } 
                return $response;  
            }
            else {return 0;}
        }

        public function getTypesAnswer(){
            $this->db->query('SELECT * FROM answer_type');
            return $this->db->getRecords();
        }
    }
?>