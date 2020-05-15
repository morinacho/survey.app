<?php
    class Question{
        private $db;

        public function __construct(){
			$this->db = new DataBase;
        }

        public function addQuestion($param){
            $this->db->query('INSERT INTO question (question_content, category_id, survey_id) 
                              VALUES (:question_content, :category_id, :survey_id)');
            # Link values 
            $this->db->bind(':question_content', $param['question']);
            $this->db->bind(':category_id', $param['category']);
            $this->db->bind(':survey_id', $param['survey']);
             # Run
             if ($this->db->execute()){
                return $this->getQuestionId($param['question']);
            }
            else{ return null; }
        }

        public function getQuestionId($questionText){
            $this->db->query('SELECT question_id FROM question WHERE question_content = :question_content');
			$this->db->bind(':question_content', $questionText);
			$response = $this->db-> getRecord();
			return $response->question_id;
        }

        public function getQuestionText($questionId){
            $this->db->query('SELECT question_content FROM question WHERE question_id = :question_id');
			$this->db->bind(':question_id', $questionId);
			$response = $this->db-> getRecord();
			return $response->question_content;
        }

        public function getQuestions($surveyId){
            $this->db->query('SELECT q.question_id, q.question_content, q.category_id, c.category_name
                              FROM question q
                              INNER JOIN category c
                              ON q.category_id = c.category_id
                              WHERE survey_id = :survey_id
                              ORDER BY c.category_id'
                            );
            $this->db->bind(':survey_id', $surveyId);
            $result = $this->db->getRecords();

            if($this->db->rowCount() > 0){ 
                foreach ($result as $key => $value) {
                    $response[$value->question_id] = [ 
                        "question_content" => $value->question_content, 
                        "category_name"    => $value->category_name,
                        "category_id"      => $value->category_id
                    ];  
                } 
                return $response;
            }
            else {return 0;}
        }
         
        public function update(){
            $this->db->query('UPDATE pregunta 
                            SET pregunta_texto = :texto,
                            categoria_id  = :categoriaId
                            WHERE pregunta_id=:preguntaId;');
            $this->db->bind(':texto', $this->texto);
            $this->db->bind(':preguntaId', $this->id);
            $this->db->bind(':categoriaId', $this->categoriaId);
            $this->db->excute();
        }
    }
?>