<?php require_once APP_ROUTE . '/views/modules/header.php';?> 
<div class="row justify-content-around mt-4">
    <div class="col-10"> 
        <div class="row mb-3">
            <div class="col-9">
                <h3><?php echo $param['survey_name']?></h3>
            </div>
            <div class="col-3">
                <a  href="<?php echo URL_ROUTE?>home" class="btn btn-outline-info btn-block">Guardar encuesta</a>
            </div>
        </div>  
        <div class="row">
            <div class="col-3">
                <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#add-question">Agregar pregunta</button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#add-category">Agregar categoria</button>
            </div>
        </div>
         
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" rowcol="3">id</th>
                    <th scope="col">Preguntas agregadas</th> 
                    <th scope="col" class='text-center'>Respuesta</th> 
                </tr>
            </thead>
            <tbody id="question-list">
                <?php
                    if($param['questions'] != 0){
                        $temp = "";  
                        foreach ($param['questions'] as $key => $value) {  
                            if($temp != $value["category_name"]){ 
                                echo "<tr><th colspan='3' scope='col' class='bg-info text-center' rowcol='3'>$value[category_name]</th></tr>";
                                $temp = $value["category_name"];
                            }
                            echo" <tr><th scope='row'>$key</th><td>$value[question_content]</td><td class='text-center'><a href='".  URL_ROUTE ."answers/create/$key' class='material-icons'>playlist_add</a></td></tr>";
                        } 
                    }
                    else{
                        echo "<tr id='noquestions'><th colspan='3' class='text-center' scope='row'> No se han agregado preguntas</th></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php  
    require_once APP_ROUTE . '/views/questions/add-question-modal.php'; 
    require_once APP_ROUTE . '/views/categories/create.php'; 
    require_once APP_ROUTE . '/views/modules/footer.php'; 
?> 