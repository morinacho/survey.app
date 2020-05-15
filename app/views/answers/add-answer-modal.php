<form method="post" action="<?php URL_ROUTE?>answers/store">
    <div class="modal fade" id="add-answer" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-answer-modal">Agregar respuesta</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category-type">Tipo de respuesta</label>
                        <select class="form-control" id="category-type">
                            <option disabled selected>Seleccionar tipo de respuesta</option>
                                <?php 
                                    foreach ($param["type"] as $key => $value) {
                                        echo "<option value='$value->answer_type_id'>$value->answer_type_content</option>";
                                    }                          
                                ?>
                        </select>
                        <small id="categoryHelp" class="form-text text-muted">Seleccionar el mismo tipo de categoria para todas las respuestas</small>
                    </div>
                    <div class="form-group">
                       
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="submit" name="save-answer" class="btn btn-outline-info btn-block">Guardar respuesta</button>
                </div>
            </div>
        </div>
    </div>
</form>