<?php
    class Question extends Controller{
        private $id;
        private $texto;
        private $categoriaId;
        private $respuestas = array();
        private $db         = NULL;
        private $answerModel;
        /**
         * construye la pregunta apartir del id y el texto
         */
        public function index($id,$texto){ 
            $this->answerModel = $this->model("Answer");
            $this->id    = $id;
            $this->texto = $texto;
            $this->db    = new DataBase;
            $this->db->query('SELECT respuesta_id,
                                     respuesta_texto,
                                     respuesta_imagen,
                                     respuesta_excluyente,
                                     pregunta_id_anidada,
                                     respuesta_tipo
                            FROM respuesta
                            WHERE pregunta_id=:preguntaId;');

            $this->db->bind(':preguntaId',$this->id);
            $resultSet = $this->db->getRecords();        
            
            for($i = 0; $i<$this->db->rowCount(); $i++){
                $id              = $resultSet[$i]->respuesta_id;
                $texto           = $resultSet[$i]->respuesta_texto;
                $imagen          = $resultSet[$i]->respuesta_imagen;
                $tipo            = $resultSet[$i]->respuesta_tipo;
                $excluyente      = $resultSet[$i]->respuesta_excluyente;
                $preguntaAnidada = $resultSet[$i]->pregunta_id_anidada;
                /**
                 * aca vuelve a hacer lo mismo pero es un Answer()
                 * con los datos de la respuesta en $answerModel
                 */
                $this->respuestas[$i] = $this->answerModel->index($id,$texto,$imagen,$tipo,$excluyente,$preguntaAnidada,$this->id);
            }

            $response = [
                    "id"        => $this->id,
                    "texto"     => $this->texto,
                    "respuestas"=> $this->getRespuestas()
            ];

            return $response;
        }
        /**
         * devuelve todas las respustas posibles a la pregunta
         */
        public function getRespuestas(){
            return $this->respuestas;
        }
        /**
         * devuelve una respuesta de la pregunta
         */
        public function getRespuesta($i){
            if($i<$this->getSize()){
                return $this->respuestas[$i];
            }
        }
        /**
         * devuelve la cantidad de respuestas que tiene la pregunta
         */
        public function getSize(){
            return count($this->respuestas);
        }
        /**
         * devuelve el texto de la pregunta
         */
        public function getTexto(){
            return $this->texto;
        }
        /**
         * devuelve el id de la pregunta
         */
        public function getId(){
            return $this->id;
        }
        public function setTexto($texto){
            $this->texto=$texto;
        }
        /**
         * agrega respuestas a la pregunta
         */
        public function add($respuesta){
            $this->respuestas[$this->getSize()]=$respuesta;
        }
        /**
         * crea una nueva pregunta
         */
        public function insert($categoriaId){
            if($this->db==NULL){
                $this->db=new DataBase;
            }
            
            $this->db->query('INSERT INTO `pregunta`(
                    `pregunta_id`,
                    `pregunta_texto`,
                    `categoria_id`) 
                    VALUES (NULL, 
                    `:texto`, 
                    :categoriaId);');
            $this->db->bind(':texto', $this->texto);
            $this->db->bind(':categoriaId', $categoriaId);
            $this->db->excute();
            
            $this->db->query('SELECT pregunta_id
                            FROM pregunta
                            WHERE catergoria_id=:categoriaId 
                            AND pregunta_texto=:texto;');
            $this->db->bind(':texto', $this->texto);
            $this->db->bind(':categoriaId', $categoriaId);
            $resultset=$this->db->getRescords();
            $this->id=$resultset[0]->pregunta_id;

            for($i=0;$i<$this->getSize();$i++){
                    $this->respuestas[$i]->insert($this->id);
            }
        }
        /**
         * actualiza los datos de la pregunta
         */
        public function update(){
            $this->db->query('UPDATE `pregunta` 
                            SET `pregunta_texto`= :texto,
                            categoria_id  = :categoriaId
                            WHERE pregunta_id=:preguntaId;');
            $this->db->bind(':texto', $this->texto);
            $this->db->bind(':preguntaId', $this->id);
            $this->db->bind(':categoriaId', $this->categoriaId);
            $this->db->excute();
        }
    }
?>