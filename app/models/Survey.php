<?php  
	class Survey{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
        }

        public function getSurvey($category){ 
           $this->db->query('SELECT c.categoria_nombre,
                                    p.pregunta_id,
                                    p.pregunta_texto, 
                                    rp.respuesta_pregunta_texto, 
                                    rp.respuesta_pregunta_imagen, 
                                    rp.respuesta_pregunta_excluyente, 
                                    rp.respuesta_pregunta_tipo, 
                                    rp.pregunta_id_anidada
                            FROM categoria c
                            INNER JOIN pregunta p
                            ON p.categoria_id = c.categoria_id
                            INNER JOIN respuesta_pregunta rp
                            ON p.pregunta_id     = rp.pregunta_id
                            WHERE c.categoria_id = :categoriaId;');
            $this->db->bind(':categoriaId', $category);
            $response = $this->db->getRecords(); 
            return $response;
        }
	}
 ?>
