<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>">Ciclomontaña</a>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">Escritorio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('client'); ?>">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('visit'); ?>">Visitas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('user/logout'); ?>">Salir</a>
      </li>
      <li class="nav-item">
        <span class="nav-link text-white">Hola, <?php echo $this->session->userdata('first_name'); ?></span>
      </li>
  </div>
</nav>