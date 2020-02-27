<?php
class Survey extends Controller{
    private $surveyId;
    private $surveyNombre;
    private $categorias=array();    
    private $db = NULL;
    private $categoryModel;
    private $autor;
    
    /**
     * @return mixed
     */
    public function getSurveyId()
    {
        return $this->surveyId;
    }

    /**
     * @return mixed
     */
    public function getSurveyNombre()
    {
        return $this->surveyNombre;
    }

    /**
     * @return multitype:
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $surveyId
     */
    public function setSurveyId($surveyId)
    {
        $this->surveyId = $surveyId;
    }

    /**
     * @param mixed $surveyNombre
     */
    public function setSurveyNombre($surveyNombre)
    {
        $this->surveyNombre = $surveyNombre;
    }

    /**
     * @param multitype: $categorias
     */
    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

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
                
                /* se manda el id de la pregunta a Survey,
                 * lo cual devuelve las categoria
                 */
                $this->db->query('SELECT categoria_id, categoria_nombre 
                                    FROM categoria 
                                    WHERE encuesta_id=:surveyId;');                
                $this->db->bind(':surveyId',$this->surveyId);
                $resultSet = $this->db->getRecords();
                
                for($i = 0; $i < $this->db->rowCount() ;$i++){
                    $id    = $resultSet[$i]->categoria_id;
                    $texto = $resultSet[$i]->categoria_nombre;
                    $this->categorias[$i] = $this->categoryModel->index($id,$texto);                    
                }
                
                #array con la encuesta y las categorias
                $response = [
                    "encuesta" => $this->surveyNombre,
                    "categorias" => $this->getCategorias()
                ];
                
                return $response;
    }
    
    /**
     * devuelve la cantidad de categorias que hay en la encuesta
     */
    public function getSize(){
        return count($this->preguntas);
    }
    /**
    * agrega categoria a la encuesta
    */
    public function add($categoria){
        $this->categorias[$this->getSize()]=$categoria;
    }
    /**
     * crea una nueva encuesta
     */
    public function insert(){
        if($this->db==NULL){
            $this->db=new DataBase;
        }
            
        $this->db->query('SELECT encuestador_dni
                            FROM encuestador
                            WHERE encuestador_nombre=:autor');
        $this->db->bind(':autor', $this->autor);
        $resultset=$this->db->getRecords();
        $encuestadorDni=$resultset[0]->encuestador_dni;
        
        $this->db->query('INSERT INTO `encuesta`(
                            `encuesta_id`, 
                            `encuesta_nombre`, 
                            `encuestador_dni`) 
                            VALUES (
                            NULL,
                            :surveyNombre,
                            :encuestadorDni)');
        $this->db->bind(':surveyNombre', $this->surveyNombre);
        $this->db->bind(':encuestadorDni', $encuestadorDni);
        $this->db->excute();
        
        $this->db->query('SELECT encuesta_id
                          FROM encuesta
                          WHERE encuestador_dni=:encuestadorDni
                          AND encuesta_nombre=:nombreEncuesta;');
        $this->db->bind(':nombreEncuesta', $this->surveyNombre);
        $this->db->bind(':encuestadorDni', $encuestadorDni);
        $resultset=$this->db->getRecords();
        $this->surveyId=$resultset[0]->encuesta_id;
        
        for($i=0;$i<$this->getSize();$i++){
            $this->categorias[$i]->insert($this->surveyId);
        }
    }
    
    /**
     * actualiza los datos de la categoria
     */
    
    public function update(){
        $this->db->query('UPDATE encuesta
                          SET encuesta_nombre= :nombreEncuesta
                          WHERE encuesta_id  = :surveyId;');
        $this->db->bind(':nombreEncuesta', $this->surveyNombre);
        $this->db->bind(':surveyId', $this->surveyId);
        $this->db->excute();
    }
}


?>