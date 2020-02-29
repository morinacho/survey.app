<?php  
        class Category extends Controller{
                private $db        = NULL;
                private $preguntas = array();
                private $categoriaNombre;
                private $categoriaId;
                private $questionModel;
                        
                /**
                 * @return mixed devuelve el nombre de la categoria
                 */
                public function getCategoriaNombre()
                {
                    return $this->categoriaNombre;
                }
            
                /**
                 * @param mixed $categoriaNombre agrega el nombre de la categoria
                 */
                public function setCategoriaNombre($categoriaNombre)
                {
                    $this->categoriaNombre = $categoriaNombre;
                }
            
                /**
                 * construye la encuesta apartir de la categoria
                 * param $category es el id de la categoria que se desea
                 * param $categoriaNombre es el nombre de la categoria
                 */
                public function index($surveyId,$category,$categoriaNombre){
                        $this->questionModel = $this->model("Question");
                        $this->db = new DataBase;
                        
                        $this->db->query('SELECT encuesta_categoria_id 
                                            FROM encuesta_categoria 
                                            WHERE encuesta_id=:surveyId 
                                            AND categoria_id=:categoriaId');
                        $this->db->bind(':surveyId', $surveyId);
                        $this->db->bind(':categoriaId', $category);
                        $resultSet          = $this->db->getRecords();
                        $encustaCategoriaId = $resultSet[0]->encuesta_categoria_id;
                        
                        $this->db->query('SELECT pregunta_id, pregunta_texto
                                        FROM pregunta 
                                        WHERE encuesta_categoria_id = :encustaCategoriaId;');

                        $this->db->bind(':encustaCategoriaId', $encustaCategoriaId);
                        $resultSet       = $this->db->getRecords();
                        $this->categoriaNombre = $categoriaNombre;
                        $this->categoriaId=$category;
                        
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
                                "categoria" => $this->categoriaNombre,
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
                        return $this->categoriaNombre;
                }
                /**
                 * devuelve el id de la categoria
                 */
                public  function getCategoriaId() {
                    return $this->categoriaId;
                }
                /**
                 * agrega preguntas a la categoria
                 */
                public function add($pregunta){
                        $this->preguntas[$this->getSize()]=$pregunta;
                }
                /**
                 * crea una nueva categoria
                 */
                public function insert($surveyId){
                        if($this->db==NULL){
                            $this->db=new DataBase;
                        }
                        $this->db->query('SELECT categoria_id 
                                            FROM categoria WHERE categoria_nombre=:categoriaNombre;');
                        $this->db->bind(':categoriaNombre', $this->categoriaNombre);
                        $this->db->excute();
                        $resultset=$this->db->getRecords();
                        if($this->db->rowCount()==0){
                            $this->db->query('INSERT INTO `categoria`(
                                    `categoria_id`, 
                                    `categoria_nombre`) VALUES (
                                        NULL, 
                                        :categoriaNombre,
                                        :surveyId);');
                            $this->db->bind(':categoriaNombre', $this->categoriaNombre);
                            $this->db->bind(':surveyId', $surveyId);
                            $this->db->excute();
                            
                            $this->db->query('SELECT categoria_id 
                                            FROM categoria
                                            WHERE encuesta_id=:surverId 
                                            AND categoria_nombre=:categoriaNombre;');
                            $this->db->bind(':surveyId', $surveyId);
                            $this->db->bind(':categoriaNombre', $this->categoriaNombre);
                            $resultset=$this->db->getRecords();
                            $this->categoriaId=$resultset[0]->categoria_id;
                            
                            $this->db->query('SELECT encuesta_categoria_id
                                            FROM encuesta_categoria
                                            WHERE encuesta_id=:surverId
                                            AND categoria_id=:categoriaId;');
                            $this->db->bind(':surveyId', $surveyId);
                            $this->db->bind(':categoriaId', $this->categoriaId);
                            $resultset=$this->db->getRecords();
                        } else {
                            $this->categoriaId=$resultset[0]->categoria_id;
                            
                            $this->db->query('SELECT encuesta_categoria_id
                                            FROM encuesta_categoria
                                            WHERE encuesta_id=:surverId
                                            AND categoria_id=:categoriaId;');
                            $this->db->bind(':surveyId', $surveyId);
                            $this->db->bind(':categoriaId', $this->categoriaId);
                            $resultset=$this->db->getRecords();
                        }
                        $id=$resultset[0]->encuesta_categoria_id;
                        for($i=0;$i<$this->getSize();$i++){
                            $this->preguntas[$i]->insert($id);
                        }
                }
                /**
                 * actualiza los datos de la categoria
                 */
                public function update(){
                        $this->db->query('UPDATE `categoria` 
                                        SET `categoria_nombre`= :categoriaNombre 
                                        WHERE c.categoria_id  = :categoriaId;');
                        $this->db->bind(':categoriaNombre', $this->categoriaNombre);
                        $this->db->bind(':categoriaId', $this->categoriaId);
                        $this->db->excute();
                }
        }
 ?>
