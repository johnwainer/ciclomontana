<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?><!DOCTYPE html>
<html lang="es">
	<?php $this->load->view('templates/head'); ?>
	<style type="text/css">
		.starter-template {
		padding: 3rem 1.5rem;
		}
	</style>
	<body>
		<?php $this->load->view('templates/nav'); ?>
		<div class="container">
			<div class="starter-template">
				<div class="row">
					<div class="col-lg-12 mt40">
						<div class="pull-left">
							<h2>Editar cliente</h2>
						</div>
					</div>
				</div>
				<?php if($message !== ''){ ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<?php echo $message; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php } ?>
				<form action="<?php echo base_url('client/edit/') . $client->id;?>" method="POST" name="edit_client" >
					<input type="hidden" name="id" value="<?php echo $client->id ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<strong>NIT (encriptado)</strong>
								<input type="text" class="form-control" placeholder="" value="<?php echo $client->nit ?>" disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<strong>Nombre completo</strong>
								<input type="text" name="name" class="form-control" placeholder="Nombre completo*" value="<?php echo $client->name ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<strong>Dirección</strong>
								<input type="text" name="address" class="form-control" placeholder="Dirección" value="<?php echo $client->address ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<strong>Ciudad</strong>
								<select name="cities_id" class="form-control">
								<?php
									foreach($cities as $city){
                                        $selected = ($client->cities_id == $city->id ? 'selected' : '');
									    echo '<option value="' . $city->id  . '" ' . $selected . '>' . $city->name . ' </option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<strong>Teléfono</strong>
								<input type="number" name="phone" class="form-control" placeholder="Teléfono" value="<?php echo $client->phone ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<strong>Cupo</strong>
								<input type="number" name="quota" class="form-control" placeholder="Cupo*" value="<?php echo $client->quota ?>" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<strong>Porcentaje visitas</strong>
								<input type="text" name="visits_percentage" class="form-control" placeholder="Porcentaje visitas*" value="<?php echo $client->visits_percentage ?>" readonly>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php $this->load->view('templates/footer'); ?>
	</body>
</html>