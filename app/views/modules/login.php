<?php require_once APP_ROUTE . '/views/modules/header.php';?>
<div class="row justify-content-around mt-5">
    <div class="col-4"> 
        <div class="card">
            <img src="<?php echo URL_ROUTE ?>media/images/loginheader.jpg" class="card-img-top">
            <div class="card-body">
                <form action="<?php echo URL_ROUTE ?>auth/login" method="post"> 
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text material-icons">person</div>
                        </div>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div> 
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text material-icons">lock</div>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                    </div> 
                    <button type="submit" class="btn btn-primary btn-block" name="login">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div> 
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php';?>