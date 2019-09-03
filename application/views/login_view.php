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

.form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
}
</style>
<body>
<?php $this->load->view('templates/nav-home'); ?>
 <div class="container">
    <div class="starter-template">
    <?php echo form_open('user/login', array('class' => 'form-signin')); ?>

    <div class="form-group">
        <label class="h4" for="email">Email</label>
        <input type="email" class="form-control" value="<?php echo set_value('email'); ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
        <?php echo form_error('email'); ?>
    </div>
    <div class="form-group">
        <label class="h4" for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Contraseña">
        <?php echo form_error('password'); ?>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
    <br>
    <?php echo $this->session->flashdata('login_error'); ?>
    
    <?php form_close(); ?>
</div>
</div>
<?php $this->load->view('templates/footer'); ?>
</body>
</html>


