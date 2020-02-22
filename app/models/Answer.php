<?php
    class Answer{
        
        private $id;
        private $texto;
        private $imagen;
        private $tipo;
        private $excluyente;
        private $preguntaAnidada;
        private $preguntaId;
        /**
         * construye la respuesta a partir de los parametros
         * param: $id es el id de la respuesta
         *        $texto es el texto de la respuesta
         *        $imagen es la url de la imagen de respuesta
         *        $tipo es el tipo de respuesta, puede ser (radio, check, text, selct)
         *        $excluyente indica si esta respuesta es excluyente o no
         *        $preguntaAnidada si esta respuesta abre otra pregunta
         */
        public function index($id,$texto,$imagen,$tipo,$excluyente,$preguntaAnidada,$preguntaId){
            $this->id               = $id;
            $this->imagen           = $imagen;
            $this->texto            = $texto;
            $this->tipo             = $tipo;
            $this->excluyente       = $excluyente;
            $this->preguntaAnidada  = $preguntaAnidada;
            $this->preguntaId       = $preguntaId;

            $response = [
                    "id"             =>$this->id,
                    "imagen"         =>$this->imagen,
                    "texto"          =>$this->texto,
                    "tipo"           =>$this->tipo,
                    "excluyente"     =>$this->excluyente,
                    "preguntaAnidada"=>$this->preguntaAnidada,
            ];

            return $response;
        }
        /**
         * devuelve el texto de la pregunta de la respusta
         */
        public function getTexto(){
            return $this->texto;
        }
        /**
         * devuelve el url de la imagen de la respuesta
         */
        public function getImagen(){
            return $this->imagen;
        }
        /**
         * devuelve el tipo de respuesta
         */
        public function getTipo(){
            return $this->tipo;
        }
        /**
         * devuelve si la respuesta es excluyente o no
         */
        public function getExcluyente(){
            return $this->excluyente;
        }
        /**
         * devulve el id de la siguiente pregunta en el caso de tenerlo
         */
        public function getPreguntaAnidada(){
            return $this->preguntaAnidada;
        }
        /**
         * devuelve el id de la respuesta
         */
        public function getId(){
            return $this->id;
        }
        /**
         * modifica el texto de la respuesta
         */
        public function setTexto($texto) {
            $this->texto=$texto;
        }
        /**
         * modifica la url de la imagen
         */
        public function setImagen($imagen){
            $this->imagen=$imagen;
        }
        /**
         * modifica el tipo de respuesta
         */
        public function setTipo($tipo) {
            $this->tipo=$tipo;
        }
        /**
         * modifica si la respuesta es excluyente o no
         */
        public function setExcluyente($excluyente){
            $this->excluyente=$excluyente;
        }
        /**
         * modifica la pregunta anidada
         */
        public function setPreguntaAnidada($preguntaAnidada){
            $this->preguntaAnidada=$preguntaAnidada;
        }
        /**
         * crea una nueva respuesta
         */
        public function insert($preguntaId){
            $db=new DataBase;
            $db->query('INSERT INTO `respuesta_pregunta`(
                        `respuesta_pregunta_id`, 
                        `respuesta_pregunta_texto`, 
                        `respuesta_pregunta_imagen`, 
                        `respuesta_pregunta_excluyente`, 
                        `pregunta_id_anidada`, 
                        `pregunta_id`, 
                        `respuesta_pregunta_tipo`) VALUES (
                            NULL,
                            :texto,
                            :imagen,
                            :excluyente,
                            :anidada,
                            :preguntaId,
                            :tipo);');
            $db->bind(':texto', $this->texto);
            $db->bind(':imagen', $this->imagen);
            $db->bind(':excluyente', $this->excluyente);
            $db->bind(':anidada', $this->preguntaAnidada);
            $db->bind(':preguntaId', $preguntaId);
            $db->bind(':tipo', $this->tipo);
            $db->excute();
        }
        /**
         * actualiza la respuesta
         */
        public function update(){
            $db=new DataBase;
            $db->query(' UPDATE `respuesta_pregunta` 
                                SET `respuesta_pregunta_texto`  = :texto ,
                                `respuesta_pregunta_imagen`     = :imagen ,
                                `respuesta_pregunta_excluyente` = :excluyente ,
                                `pregunta_id_anidada`           = :anidada ,
                                `pregunta_id`                   = :preguntaId ,
                                `respuesta_pregunta_tipo`       = :tipo
                                WHERE `respuesta_pregunta_id`   = :respuestaId;');
             $db->bind(':texto', $this->texto);
             $db->bind(':imagen', $this->imagen);
             $db->bind(':excluyente', $this->excluyente);
             $db->bind(':anidada', $this->preguntaAnidada);
             $db->bind(':preguntaId', $this->preguntaId);
             $db->bind(':tipo', $this->tipo);
             $db->bind(':respuestaId', $this->id);
             $db->excute();
        }
    }
?>