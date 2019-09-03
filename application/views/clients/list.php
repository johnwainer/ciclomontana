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
							<h2>Clientes</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<a href="<?php echo base_url('client/create') ?>" class="btn btn-danger">Agregar cliente</a>
					</div>
					<br><br>
					<table class="col-lg-12 table table-bordered">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Dirección</th>
								<th>Teléfono</th>
								<th>Ciudad</th>
                                <th>Cupo</th>
                                <th>Saldo cupo</th>
                                <th>Porcentaje de visitas</th>
								<td colspan="2">Acciones</td>
							</tr>
						</thead>
						<tbody>
							<?php if($clients): ?>
							<?php foreach($clients as $client): ?>
							<tr>
								<td><?php echo $client->name; ?></td>
                                <td><?php echo $client->address; ?></td>
                                <td><?php echo $client->phone; ?></td>
                                <td><?php echo $client->city_name; ?></td>
                                <td><?php echo $client->quota; ?></td>
                                <td><?php echo $client->quota_balance; ?></td>
                                <td><?php echo $client->visits_percentage; ?></td>					
								<td><a href="<?php echo base_url('client/edit/'.$client->id) ?>" class="btn btn-primary">Editar</a></td>
								<td>
									<form action="<?php echo base_url('client/delete/'.$client->id) ?>" method="post">
										<button class="btn btn-danger" type="submit">Eliminar</button>
									</form>
								</td>
							</tr>
							<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php $this->load->view('templates/footer'); ?>
	</body>
</html>