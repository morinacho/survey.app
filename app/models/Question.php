<?php
    class Question extends Controller{
        private $id;
        private $texto;
        private $respuestas = array();
        private $db;
        public $answerModel;
        /**
         * construye la pregunta apartir del id y el texto
         */
        public function index($id,$texto){ 
            $this->answerModel = $this->model("Answer");
            $this->id    = $id;
            $this->texto = $texto;
            $this->db    = new DataBase;
            $this->db->query('SELECT respuesta_pregunta_id,
                                     respuesta_pregunta_texto,
                                     respuesta_pregunta_imagen,
                                     respuesta_pregunta_excluyente,
                                     pregunta_id_anidada,
                                     respuesta_pregunta_tipo
                            FROM respuesta_pregunta
                            WHERE pregunta_id=:preguntaId;');

            $this->db->bind(':preguntaId',$this->id);
            $resultSet = $this->db->getRecords();
            
            for($i = 0; $i<$this->db->rowCount(); $i++){
                $id              = $resultSet[$i]->respuesta_pregunta_id;
                $texto           = $resultSet[$i]->respuesta_pregunta_texto;
                $imagen          = $resultSet[$i]->respuesta_pregunta_imagen;
                $tipo            = $resultSet[$i]->respuesta_pregunta_tipo;
                $excluyente      = $resultSet[$i]->respuesta_pregunta_excluyente;
                $preguntaAnidada = $resultSet[$i]->pregunta_id_anidada;
                /**
                 * aca vuelve a hacer lo mismo pero es un Answer()
                 * con los datos de la respuesta en $answerModel
                 */
                $this->respuestas[$i] =  $this->answerModel->index($id,$texto,$imagen,$tipo,$excluyente,$preguntaAnidada);
            } 
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
    }
?>