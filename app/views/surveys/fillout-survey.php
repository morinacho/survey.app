<?php require_once APP_ROUTE . '/views/modules/header.php';?> 

<form action="<?php echo URL_ROUTE ?>surveys/store">
  <div class="row justify-content-around">
    <div class="col-12">
      <div class="carousel slide" id="carouselExampleFade">
        <div class="carousel-inner">
          <div class="carousel-item active" data-interval="false">
          </div>
          <?php  
            foreach ($param as $key => $value) { 
              $id = $value["categoriaId"];
              foreach ($value["survey"]["preguntas"] as $pregunta){
                echo "
                  <div class='carousel-item' data-interval='false'>
                    <h2>
                      <span class='badge badge-primary   ww'>$id$pregunta[id]:</span> 
                      $pregunta[texto]
                    </h2>";
                $aux = true;
                foreach ($pregunta["respuestas"] as $respuesta){  
                  
                  switch ($respuesta["tipo"]) {
                    case 1:
                      echo "
                        <div class='form-check'>
                          <input class='form-check-input' type='checkbox' value='' name='$id$pregunta[id]$respuesta[id]' id='$id$pregunta[id]$respuesta[id]'>
                          <label class='form-check-label' for='$id$pregunta[id]$respuesta[id]'>$respuesta[texto]</label>
                        </div>";
                      break;
                    case 2:
                      echo "
                        <div class='form-group'> 
                          <input type='text' class='form-control' placeholder='$respuesta[texto]'>
                        </div>";
                      break;
                    case 3: 
                      echo "
                        <div class='form-check'>
                          <input class='form-check-input' type='radio' value='' name='$id$pregunta[id]' id='$id$pregunta[id]$respuesta[id]'>
                          <label class='form-check-label' for='$id$pregunta[id]$respuesta[id]'>$respuesta[texto]</label>
                        </div>";
                      break;
                    case 4:
                      if($aux){
                        echo "<div class='form-group'>
                                <select class='form-control'>
                                  <option selected disabled>Seleccionar respuesta</option>";
                      }
                      $aux = false;
                      echo "<option>$respuesta[texto]</option>";
                      break;
                    case 5:  
                      break;
                  } 
                  if($respuesta["tipo"] != 4 && !$aux){
                      $aux = true;
                      echo "</select></div>";
                  }
                }
                echo "</div>";
              }
            } 
          ?>
          <div class='form-check'>
            <input class='form-check-input' type='checkbox' value='' name='$id$pregunta[id]$respuesta[id]' id='$id$pregunta[id]$respuesta[id]'>
            <label class='form-check-label' for='$id$pregunta[id]$respuesta[id]'>$respuesta[texto]</label>
          </div>
        </div>
      </div>
    </div>
    <a class="btn btn-primary" href="#carouselExampleFade" role="button" data-slide="prev">Anterior</a>  
    <a class="btn btn-primary" href="#carouselExampleFade" role="button" data-slide="next">Siguiente</a>  
  </div> 
  

</form>  
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?> 