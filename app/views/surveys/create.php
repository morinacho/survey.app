<?php require_once APP_ROUTE . '/views/modules/header.php';?> 

<form action="<?php echo URL_ROUTE ?>surveys/newSurvey">
  <div class="row justify-content-around align-content-center">
    <div class="col-12">
        <p class="title-survey text-center">EVALUACIÓN DE LOS NIVELES DE ZINC EN ALIMENTOS DE CONSUMO HABITUAL. 
            <br>PREVALENCIA DE DEFICIT DEL MICRONUTRIENTE EN ADULTOS A PARTIR DE LOS 40 AÑOS
            <br><b>CUESTIONARIO INDIVIDUAL</b>
        </p>
    </div>
    <div class="row col-8 mt-5">
        <h4 class="col-12"><span class="badge badge-primary">Datos del encuestado</span></h4>
        <div class="form-group col-6">
            <label for="idencuestado">Número de identificación:</label>
            <input type="text" class="form-control" id="idencuestado" name="idencuestado" placeholder="ID" required>
        </div>
        <div class="form-group col-6">
            <label for="iniciales">Nombre y Apellido:</label>
            <input type="text" class="form-control" id="iniciales" name="iniciales" placeholder="Iniciales" required>
        </div>
    </div>

    <div class="row col-8">
        <h4 class="col-12"><span class="badge badge-primary">Datos del encuestador</span></h4>
        <div class="form-group col-8">
            <label for="encuestador">Encuestador/a</label>
            <select class="form-control" id="encuestador">
                <option selected disabled>Seleccione encuestador</option>    
                <option>Encuestador 1</option>
                <option>Encuestador 2</option>
                <option>Encuestador 3</option> 
            </select>
        </div>
    </div>

    <div class="row col-8">
        <h4 class="col-12"><span class="badge badge-primary">Criterios de exclusion</span></h4>
        <div class="col-10"> 
            <div class='row'>
                <div class='col-6'>
                    <span>1. Edad en años cumplidos</span>
                </div>
                <div class='form-check col-6'>
                    <input class='form-check-input' type='checkbox'  name='edad' id='edad'>
                    <label class='form-check-label' for='edad'>Menor de 40 años</label>
                </div>
                <div class='col-6'>
                    <span>2. Tiempo de residencia en el lugar</span>
                </div>
                <div class='form-check col-6'>
                    <input class='form-check-input' type='checkbox'  name='residencia' id='residencia'>
                    <label class='form-check-label' for='residencia'>Menor de 6 meses</label>
                </div>
                <div class='col-6'>
                    <span>3. Hospitalización</span>
                </div>
                <div class='form-check col-6'>
                    <input class='form-check-input' type='checkbox'  name='hospital' id='hospital'>
                    <label class='form-check-label' for='hospital'>Se encuentra en dicha condición</label>
                </div>
                <div class='col-6'>
                    <span>4. Consumo de corticoides sistémicos de forma crónica</span>
                </div>
                <div class='form-check col-6'>
                    <input class='form-check-input' type='checkbox'  name='corticoides' id='corticoides'>
                    <label class='form-check-label' for='corticoides'>Consume</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group form-check row col-7 mt-3">
        <input type="checkbox" class="form-check-input" id="acepta" name="acepta">
        <label class="form-check-label" for="acepta">¿Acepta realizar la encuesta?</label>
    </div>

    <div class="row justify-content-center col-8">  
        <input class="btn btn-primary btn-sm col-6" type="submit" value="Enviar" name="enviar">
    </div>
  </div>
</form>  
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?> 