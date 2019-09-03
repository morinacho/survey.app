<?php require_once APP_ROUTE . '/views/modules/header.php'; ?>

<div class="row mt-5 justify-content-around">
	<div class="col-7 text-center mt-5">
		<form action="" method="get"> 
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="dni" placeholder="Buscar encuesta">
				<div class="input-group-append">
					<button class="btn btn-outline-primary material-icons" type="submit">search</button>
				</div>
			</div>	
		</form>	
    </div> 
</div>
<div class="row mt-5 justify-content-around">
	<div class="col-7 text-center mt-5">
		<a href="<?php echo URL_ROUTE ?>/surveys/create" class="btn btn-outline-primary" role="button">Realizar encuesta</a>
    </div> 
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?>
	
