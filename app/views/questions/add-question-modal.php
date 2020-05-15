<form method="post" action="<?php echo URL_ROUTE?>questions/store"  >
    <div class="modal fade" id="add-question" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-question-modal">Agregar nueva pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="question">Pregunta</label>
                        <input type="text" name="question-content" class="form-control" id="question" placeholder="Ingresar texto de la pregunta" required>
                        <input type="hidden" name="survey-id" value="<?php echo $param['survey_id'];?>">
                    </div>
                    <div class="form-group">
                        <label for="category-type">Categoria de pregunta</label>
                        <select class="form-control" name="category-id" id="category-type" required>
                            <option disabled selected>Seleccionar la categoria de la pregunta</option>
                            <?php 
                                foreach ($param["categories"] as $key => $value) {
                                    echo "<option value='$key'>$value</option>";
                                }                          
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="submit"   data-url="<?php echo URL_ROUTE?>questions/store" class="btn btn-outline-info btn-block">Guardar pregunta</button>
                </div>
            </div>
        </div>
    </div>
</form>