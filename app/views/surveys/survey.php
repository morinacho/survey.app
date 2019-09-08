<?php require_once APP_ROUTE . '/views/modules/header.php';?> 

<form action="<?php echo URL_ROUTE ?>surveys/store">
  <div class="row justify-content-around">
    <div class="col-12">
      <div class="carousel slide" id="carouselExampleFade">
        <div class="carousel-inner">
          <div class="carousel-item active" data-interval="false">
           
          </div>

          <?php  
            $id = $param["categoriaId"];
            foreach ($param["survey"]["preguntas"] as $pregunta){
              echo "
                <div class='carousel-item'  data-interval='false'>
                  <h2>
                    <span class='badge badge-primary'>$id$pregunta[id]:</span> 
                    $pregunta[texto]
                  </h2>";
                  
              foreach ($pregunta["respuestas"] as $respuesta){ 
                switch ($respuesta["tipo"]) {
                  case 1:
                  case 2:
                  case 3:
                      echo "
                        <div class='row'>
                          <div class='form-check col-6'>
                            <input class='form-check-input' type='checkbox' value='' name='$id$pregunta[id]$respuesta[id]' id='$id$pregunta[id]$respuesta[id]'>
                            <label class='form-check-label' for='$id$pregunta[id]$respuesta[id]'>$respuesta[texto]</label>
                          </div>";
                      if($respuesta["tipo"] == 2){
                        echo "
                          <div class='form-group col-6'> 
                            <input type='text' class='form-control' placeholder='Ingresar respuesta'>
                          </div>";
                      }
                      elseif($respuesta["tipo"] == 3){
                        echo "
                          <div class='form-group col-3'> 
                            <input type='text' class='form-control' placeholder='Ingresar respuesta'>
                          </div>
                          <div class='form-group col-3'> 
                            <input type='text' class='form-control' placeholder='Ingresar respuesta'>
                          </div>";
                      }
                      echo "</div>";
                    break;
                  case 4:
                    echo "
                      <div class='form-check'>
                        <input class='form-check-input' type='radio' value='' name='$id$pregunta[id]' id='$id$pregunta[id]$respuesta[id]'>
                        <label class='form-check-label' for='$id$pregunta[id]$respuesta[id]'>$respuesta[texto]</label>
                      </div>";
                    break;
                  case 5:
                  case 6:

                    break;
                  case 7:
                    echo "
                      <div class='form-group'> 
                        <input type='text' class='form-control' placeholder='Ingresar respuesta'>
                      </div>";
                }
              }
              echo "</div>";
            }
          ?>
        </div>
      </div>
    </div>
    <a class="btn btn-primary" href="#carouselExampleFade" role="button" data-slide="prev">Anterior</a>  
    <a class="btn btn-primary" href="#carouselExampleFade" role="button" data-slide="next">Siguiente</a>  
  </div> 
  
  <input type="submit" value="enviar">
</form>  
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?> 