<?php /*
    require_once APP_ROUTE . '/views/modules/header.php';
    
    $preguntas  = $param['preguntas'];
    $respuestas = $param['respuestas']; 

    echo "<h3>". $param['categoria'] ."</h3>"; 
    
    foreach ($preguntas as $pregunta) {
        echo "$pregunta <br>";
        foreach ($respuestas as $respuesta) {
            if($pregunta == $respuesta->pregunta_texto){ 
                # 0 = text | 1 = radio | 2 = select single | 3 = Select multiple | 4 = checks
                switch($respuesta->respuesta_pregunta_tipo){ 
                    case 0:
                        echo "<div class='form-group'> 
                                <input type='text' class='form-control' placeholder=''>
                              </div>";
                        break;
                    case 1:
                        echo "<div class='form-check'> 
                                <input type='radio' class='form-check-input' placeholder=''>
                                <label class='form-check-label'>$respuesta->respuesta_pregunta_texto</label>
                              </div>";
                        break; 
                    case 2:
                        echo "<div class='form-group'>
                                <label for='exampleFormControlSelect1'>Example select</label>
                                <select class='form-control' id='exampleFormControlSelect1'>
                                    <option>$respuesta->respuesta_pregunta_texto</option>
                                </select>
                             </div>";
                        break;
                    case 3:
                        break;
                }
            }
        }
    }
 /*
    foreach ($param['surveys'] as $survey) {      
        $categoryId =  explode(" ", $survey->categoria_nombre);
        
        $id           = ""; # Identificador de preguntas. Ejepmlo DP1 
        $categoryName = "";
        for($i=0; $i<count($categoryId); $i++){
            if(strlen($categoryId[$i]) > 3){
                $id .= substr($categoryId[$i], 0, 1);
                $categoryName .= strtolower($categoryId[$i]);
            }
        } 
        echo "<div class='$categoryName'>
                <h3>$survey->categoria_nombre</h3>
                <div class='$id$survey->pregunta_id'>
                    <label>$id$survey->pregunta_id: $survey->pregunta_texto</label>
                </div>
             </div>";

        if(!$survey->respuesta_pregunta_excluyente){  # 0 = respuesta excluyente | 1 = respuesta incluyente
            switch($survey->respuesta_pregunta_tipo){ # 0 = text | 1 = radio | 2 = select single
                case 0:
                    echo "<div class='form-group'>
                            <label>Domicilio</label>
                            <input type='text' class='form-control' placeholder=''>
                          </div>";
                    break;
                case 1:
                    echo "<div class='form-check form-check-inline'> 
                            <input type='radio' class='form-check-input' placeholder=''>
                            <label class='form-check-label'>$survey->respuesta_pregunta_texto</label>
                          </div>";
                    break; 
                case 2:
                    echo "<div class='form-group'>
                            <label for='exampleFormControlSelect1'>Example select</label>
                            <select class='form-control' id='exampleFormControlSelect1'>
                                <option>$survey->respuesta_pregunta_texto</option>
                            </select>
                         </div>";
                    break;
                case 3:
                    break;
            }
        } 
        else{
            echo "b";
        }
    }*/
    require_once APP_ROUTE . '/views/modules/footer.php'; 

?> 