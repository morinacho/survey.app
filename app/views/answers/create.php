<?php require_once APP_ROUTE . '/views/modules/header.php';?> 
<div class="row justify-content-around mt-4">
    <div class="col-10"> 
        <div class="row mb-3">
            <div class="col-9">
                <h3><?php echo $param['question_content'];?></h3>
            </div>
            <div class="col-3">
                <button class="btn btn-outline-info btn-block" onclick="window.history.back();">Guardar respuestas</button>
            </div>
        </div>  
        <button type="button" class="btn btn-outline-dark btn-block col-3" data-toggle="modal" data-target="#add-answer">Agregar respuesta</button>
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Respuestas agregadas</th> 
                    <th scope="col">Imagen</th> 
                </tr>
            </thead>
            <tbody id="question-list">
                <?php
                    if($param['answers'] !=0){ 
                        foreach ($param['answers'] as $key => $value) {   
                            echo "<tr>" .
                                    "<th scope='row'>$key</th>".
                                    "<td>$value[answer_content]</td>".
                                    "<td><img src='".URL_ROUTE."/media/images/$value[answer_image]'></td>".
                                 "</tr>";
                        } 
                    }
                    else{
                        echo "<tr id='noquestions'><th colspan='3' class='text-center' scope='row'> No se han agregado respuestas</th></tr>";
                    }
                ?> 
            </tbody>
        </table>
    </div>
</div>
<?php  
    require_once APP_ROUTE . '/views/answers/add-answer-modal.php';
    require_once APP_ROUTE . '/views/modules/footer.php'; 
?> 