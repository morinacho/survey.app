<form method="post" action="<?php echo URL_ROUTE?>categories/store">
    <div class="modal fade" id="add-category" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-category-modal">Agregar categoria</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="category">Nombre de categoria</label>
                        <input type="text" name="category-name" class="form-control" id="category" placeholder="Ingresar nombre de la categoria" required>
                        <input type="hidden" name="survey-id" value="<?php echo $param['survey_id'];?>">
                    </div> 
                </div>
                <div class="modal-footer"> 
                    <button type="submit" name="save-category" class="btn btn-outline-info btn-block">Guardar categoria</button>
                </div>
            </div>
        </div>
    </div>
</form>