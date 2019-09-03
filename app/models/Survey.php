<?php  
        class Survey extends Controller{
                private $db;
                private $preguntas=array();
                private $categoria;
                private $questionModel;
                        
                /**
                 * construye la encuesta apartir de la categoria
                 * param $category es el id de la categoria que se desea
                 */
                public function index($category){
                        $this->questionModel = $this->model("Question");
                        $this->db = new DataBase;
                        $this->db->query('SELECT c.categoria_nombre, p.pregunta_id,p.pregunta_texto
                                        FROM pregunta p
                                        INNER JOIN categoria c
                                        ON c.categoria_id    = p.categoria_id
                                        WHERE c.categoria_id = :categoriaId;');

                        $this->db->bind(':categoriaId', $category);
                        $resultSet       = $this->db->getRecords();
                        $this->categoria = $resultSet[0]->categoria_nombre;
                        
                        /**
                         * se manda el id de la pregunta a Question,
                         * lo cual devuelve las respuestas
                         */
                        for($i = 0; $i < $this->db->rowCount() ;$i++){
                                $id    = $resultSet[$i]->pregunta_id;
                                $texto = $resultSet[$i]->pregunta_texto;
                                $this->preguntas[$i] = $this->questionModel->index($id,$texto);

                        }

                        #array con la categoria y las preguntas
                        $response = [
                                "categoria" => $this->categoria,
                                "preguntas" => $this->getPreguntas()
                        ];

                        #se devuelve a Surveys
                        return $response;
                }
                
                /**
                 * devuelve todas las preguntas de la categoria
                 */
                public function getPreguntas(){
                        return $this->preguntas;
                }
                /**
                 * devuelve una sola pregunta 
                 */
                public function getPregunta($i){
                        if($i<$this->getSize()){
                                return $this->preguntas[$i];
                        }
                }

                /**
                 * devuelve una sola pregunta a partir del id de la pregunta
                 */
                public function getPreguntaId($id){
                        for($i=0;$i<$this->getSize();$i++){
                                if($this->preguntas[$i]->getId()==$id){
                                        return $this->preguntas[$i];
                                }
                        }
                }
                /**
                 * devuelve la cantidad de preguntas que hay
                */
                public function getSize(){
                        return count($this->preguntas);
                }
                /**
                 * devuelve el nombre de la categoria
                 */
                public function getCategoria(){
                        return $this->categoria;
                }
        }
 ?>
