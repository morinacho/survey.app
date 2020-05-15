<?php require_once APP_ROUTE . '/views/modules/header.php';?> 
<div class="row justify-content-around mt-5">
    <div class="mb-4">
        <h3 class="mx-auto">Resultados de encuesta</h3>  
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo de encuesta</th>
                <th scope="col" style="width: 10px;">Ver</th> 
                <th scope="col" style="width: 10px;">Exportar</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach ($param as $key => $value) {
                echo "<tr>".
                        "<th scope='row'>$value->survey_id</th>".
                        "<td>$value->survey_name</td>".
                        "<td class='text-center'><a href='".URL_ROUTE."surveys/viewsurveyresult/$value->survey_id' class='material-icons'>remove_red_eye</a></td>".
                        "<td class='text-center'><a href='".URL_ROUTE."surveys/export/$value->survey_id' class='material-icons'>save_alt</a></td>".
                     "</tr>"; 
            }
        ?> 
        </tbody>
    </table>
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?> 