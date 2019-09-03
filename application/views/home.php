<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<?php $this->load->view('templates/head'); ?>
<style type="text/css">
.starter-template {
  padding: 3rem 1.5rem;
  text-align: center;
}
</style>
<body>
<?php $this->load->view('templates/nav-home'); ?>
<div class="container">
  <div class="starter-template">
    <h1>John Wainer Valencia</h1>
    <p class="lead">Prueba codeigniter para Freeport Store.</p>
  </div>
</div>

<?php $this->load->view('templates/footer'); ?>
</body>
</html>