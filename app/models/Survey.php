<?php
    class Survey{ 
        private $db;

        public function __construct(){
			$this->db = new DataBase;
        }

        public function addSurvey($surveyName){ 
            $this->db->query('INSERT INTO survey (survey_name) VALUES (:survey_name)');
            # Link values 
            $this->db->bind(':survey_name', $surveyName);
            
            # Run
            if ($this->db->execute()){
                return $this->getSurveyId($surveyName);
            }
            else{ return null; }
        }

        public function getSurveyId($surveyName){
            $this->db->query('SELECT survey_id FROM survey WHERE survey_name = :survey_name');
			$this->db->bind(':survey_name', $surveyName);
			$response = $this->db-> getRecord();
			return $response->survey_id;
        }
        
        public function getSurveyName($surveyId){
            $this->db->query('SELECT survey_name FROM survey WHERE survey_id = :survey_id');
			$this->db->bind(':survey_id', $surveyId);
			$response = $this->db-> getRecord();
			return $response->survey_name;
        }

        public function getSurveys(){
            $this->db->query('SELECT * FROM survey');
            return $this->db->getRecords();
        } 

        public function setSurveyResult(){
            
        }
        /*
        public function index($survey){
            $this->categoryModel=$this->model("Category");
            $this->db = new DataBase;
            $this->db->query('SELECT  e.encuesta_id, en.encuestador_nombre
                                FROM encuesta e
                                INNER JOIN encuestador en
                                ON e.encuestador_dni=en.encuestador_dni
                                WHERE e.encuesta_nombre=:survey');
            
            $this->db->bind(':survey', $survey);
            $resultSet          = $this->db->getRecords();
            $this->surveyNombre = $survey;
            $this->surveyId     = $resultSet[0]->encuesta_id;
            $this->autor        = $resultSet[0]->encuestador_nombre;
            
            // devuelve todas las categorias de la encuesta
                
            $this->db->query('SELECT c.categoria_id, c.categoria_nombre 
                                FROM categoria c
                                INNER JOIN encuesta_categoria ec
                                ON ec.categoria_id=c.categoria_id
                                WHERE encuesta_id=:surveyId;');                
            $this->db->bind(':surveyId',$this->surveyId);
            $resultSet = $this->db->getRecords();
            
            for($i = 0; $i < $this->db->rowCount() ;$i++){
                $id    = $resultSet[$i]->categoria_id;
                $texto = $resultSet[$i]->categoria_nombre;
                $this->categorias[$i] = $this->categoryModel->index($this->surveyId,$id,$texto);                    
            }
            
            #array con la encuesta y las categorias
            $response = [
                "encuesta" => $this->surveyNombre,
                "categorias" => $this->getCategorias()
            ];
            
            return $response;
        } 
        /*
        actualiza los datos de la categoria
         
        
        public function update(){
            $this->db->query('UPDATE encuesta
                            SET encuesta_nombre= :nombreEncuesta
                            WHERE encuesta_id  = :surveyId;');
            $this->db->bind(':nombreEncuesta', $this->surveyNombre);
            $this->db->bind(':surveyId', $this->surveyId);
            $this->db->excute();
        }*/  
    }
?>