<?php require_once APP_ROUTE . '/views/modules/header.php';?> 
<div class="row justify-content-around mt-5">
    <div class="col-8">
        <form method="post" action="<?php echo URL_ROUTE ?>surveys/store">
            <div class="row mt-5 mb-4">
                <h3 class="mx-auto">Agregar nueva encuesta</h3>  
            </div>
            <div class="form-group">
                <label for="survey-title">Título de encuesta</label>
                <input type="text" class="form-control" id="survey-title" name="survey-name" placeholder="Ingresar titulo de encuesta">
            </div> 
            <hr>
            <div class="form-group">
                <button type="submit" name="new-survey" class="btn btn-outline-info btn-block">Continuar</button>
            </div> 
        </form>
    </div>  

</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?> 