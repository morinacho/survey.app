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
                <th scope="col" style="width: 10px;">Editar</th>
                <th scope="col" style="width: 10px;">Exportar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Titulo encuesta numero 1</td>
                <td><a href="#" class="material-icons">remove_red_eye</a></td>
                <td><a href="#" class="material-icons">edit</a></td>
                <td><a href="#" class="material-icons">save_alt</a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Titulo encuesta numero 2</td>
                <td><a href="#" class="material-icons">remove_red_eye</a></td>
                <td><a href="#" class="material-icons">edit</a></td>
                <td><a href="#" class="material-icons">save_alt</a></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Titulo encuesta numero 3</td>
                <td><a href="#" class="material-icons">remove_red_eye</a></td>
                <td><a href="#" class="material-icons">edit</a></td>
                <td><a href="#" class="material-icons">save_alt</a></td>
            </tr>
        </tbody>
    </table>
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?> 