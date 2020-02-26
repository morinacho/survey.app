<form>
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
                        <input type="text" class="form-control" id="question" placeholder="Ingresar pregunta">
                    </div>
                    <div class="form-group">
                        <label for="category-type">Categoria de pregunta</label>
                        <select class="form-control" id="category-type">
                            <option>1</option>
                            <option>2</option> 
                        </select>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="submit" class="btn btn-outline-info btn-block">Guardar pregunta</button>
                </div>
            </div>
        </div>
    </div>
</form>