<?php
public class Answer{
    private $id;
    private $texto;
    private $imagen;
    private $tipo;
    private $excluyente;
    private $preguntaAnidada;
    /**
     * construye la respuesta a partir de los parametros
     * param: $id es el id de la respuesta
     *        $texto es el texto de la respuesta
     *        $imagen es la url de la imagen de respuesta
     *        $tipo es el tipo de respuesta, puede ser (radio, check, text, selct)
     *        $excluyente indica si esta respuesta es excluyente o no
     *        $preguntaAnidada si esta respuesta abre otra pregunta
     */
    public function __construct()($id,$texto,$imagen,$tipo,$excluyente,$preguntaAnidada){
        $this->$id=$id;
        $this->$imagen=$imagen;
        $this->$texto=$texto;
        $this->$tipo=$tipo;
        $this->$excluyente=$excluyente;
        $this->$preguntaAnidada=$preguntaAnidada;
    }
    /**
     * devuelve el texto de la pregunta de la respusta
     */
    public function getTexto(){
        return $this->$texto;
    }
    /**
     * devuelve el url de la imagen de la respuesta
     */
    public function getImagen(){
        return $this->$imagen;
    }
    /**
     * devuelve el tipo de respuesta
     */
    public function getTipo(){
        return $this->$tipo;
    }
    /**
     * devuelve si la respuesta es excluyente o no
     */
    public function getExcluyente(){
        return $this->$excluyente;
    }
    /**
     * devulve el id de la siguiente pregunta en el caso de tenerlo
     */
    public function getPreguntaAnidada(){
        return $this->$preguntaAnidada;
    }
    /**
     * devuelve el id de la respuesta
     */
    public function getId(){
        return $this->$id;
    }
}
?>