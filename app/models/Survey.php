<?php  
        class Survey extends Controller{
                private $db;
                private $preguntas=array();
                private $categoria;
                private $categoriaId;
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
                        $this->categoriaId=$category;
                        for($i = 0; $i < $this->db->rowCount() ;$i++){
                                $id    = $resultSet[$i]->pregunta_id;
                                $texto = $resultSet[$i]->pregunta_texto;
                                $this->preguntas[$i] = $this->questionModel->index($id,$texto);
                        }
                        
                        $response = [
                                "preguntas" => $this->preguntas,
                                "categoria" => $this->categoria
                        ];

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
                public function insert($nombreCategoria){
                        $this->db->query('INSERT INTO `categoria`(
                                `categoria_id`, 
                                `categoria_nombre`) VALUES (
                                    NULL, 
                                    :categoriaNombre);');
                        $this->db->bind(':categoriaNombre', $nombreCategoria);
                        $this->db->excute();
                        
                        $this->db->query('SELECT categoria_id 
                                        FROM categoria
                                        WHERE categoria_nombre=:categoriaNombre;');
                        $this->db->bind(':categoriaNombre', $nombreCategoria);
                        $resultset=$this->db->getRecords();
                        $this->categoriaId=$resultset[0]->categoria_id;

                        for($i=0;$i<$this->getSize();$i++){
                                $this->preguntas[$i]->insert($this->categoriaId);
                        }
                }
                /**
                 * actualiza los datos de la categoria
                 */
                public function update($nombreCategoria){
                        $this->db->query('UPDATE `categoria` 
                                        SET `categoria_nombre`= :categoriaNombre 
                                        WHERE c.categoria_id  = :categoriaId;');
                        $this->db->bind(':categoriaNombre', $nombreCategoria);
                        $this->db->bind(':categoriaId', $this->categoriaId);
                        $this->db->excute();
                }
                
        }
 ?>
