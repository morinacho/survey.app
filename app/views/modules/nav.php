<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <a class="navbar-brand" href="<?php echo URL_ROUTE ?>home">
    <img src="<?php echo URL_ROUTE ?>media/icons/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> 
    Survey app
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php if (Controller::authenticated()) : ?>
          <a class="nav-link" data-toggle="modal" data-target=".login-modal" href="javascript:void(0);">Login</a>
        <?php else :?>
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php #echo $_SESSION['user'] ?></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle material-icons" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
            settings
            </a>
            <div class="dropdown-menu dropdown-menu-right"> 
            <a class="dropdown-item" href="<?php echo URL_ROUTE ?>surveys/config">Configuración</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Salir</a>
            </div>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</nav>
<?php require_once APP_ROUTE . '/views/modules/register.php'; ?>