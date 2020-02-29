<?php require_once APP_ROUTE . '/views/modules/header.php';?> 
<div class="row justify-content-around mt-4">
    <div class="col-8">
        <form>
            <div class="row mb-3">
                <div class="col-9">
                    <h3>Agregar nueva encuesta</h3>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-outline-info btn-block">Guardar encuesta</button>
                </div>
            </div>
            <div class="form-group">
                <label for="survey-title">Título de encuesta</label>
                <input type="email" class="form-control" id="survey-title" name="surveyTitle">
            </div> 
        </form>
        <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#add-question">Agregar pregunta</button>
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Preguntas agregadas</th> 
                    <th scope="col">Respuesta</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Pregunta agregada 1</td> 
                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#add-answer" class="material-icons">playlist_add</a></td> 
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once APP_ROUTE . '/views/surveys/add-question-modal.php'; ?> 
<?php require_once APP_ROUTE . '/views/surveys/add-answer-modal.php'; ?> 
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?> 