<?php require_once APP_ROUTE . '/views/modules/header.php';?> 
<div class="row justify-content-around mt-5">
    <div class="mb-4">
        <h3 class="mx-auto">Seleccionar encuesta a completar</h3>  
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo de encuesta</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach ($param as $key => $value) {
                echo "<tr>".
                        "<th scope='row'>$value->survey_id</th>".
                        "<td><a href='".URL_ROUTE."surveys/filloutsurvey/$value->survey_id'>$value->survey_name</a></td>". 
                     "</tr>"; 
            }
        ?> 
        </tbody>
    </table>
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?> 