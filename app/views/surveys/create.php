<?php require_once APP_ROUTE . '/views/modules/header.php';?> 
<form action="">
    <div class="form-group">
        <label>Pregunta</label>
        <input type="text" class="form-control" id="" placeholder="Ingresar pregunta">
    </div>
    <div class="form-group">
        <label for="">Tipo de pregunta</label>
        <select class="form-control" id="  ">
            <option selected disabled>Seleccionar tipo</option>
            <option>Excluyente</option>
            <option>Incluyente</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tipo de respuesta</label>
        <select class="form-control" id="  ">
            <option selected disabled>Seleccionar tipo</option>
            <option value="">Select simple</option>
            <option value="">Select multiple</option>
            <option value="">Input text</option>
            <option value="">Input text</option>
            <option value="">Check radio</option>
        </select>
    </div>
    <div class="row align-items-center" id="respuestas">
        <div class="form-group col-11">
            <label>Respuesta</label>
            <input type="text" class="form-control" id="" placeholder="Ingresar respuesta">
        </div>
        <div class="col-1 mt-3"> 
            <button id="agregarRespuesta" class="material-icons" onclick="agregarRespuesta()">add</button>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Agregar Pregunta</button>
        </div>
  </div>

</form> 

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?> 