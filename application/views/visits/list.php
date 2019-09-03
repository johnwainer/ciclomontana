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
							<h2>Visitas</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<a href="<?php echo base_url('visit/create') ?>" class="btn btn-danger">Agregar visita</a>
					</div>
					<br><br>
					<table class="col-lg-12 table table-bordered">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Cliente</th>
								<th>Vendedor</th>
								<th>Valor neto</th>
                                <th>Valor visita</th>
                                <th>Observaciones</th>
								<td colspan="2">Acciones</td>
							</tr>
						</thead>
						<tbody>
							<?php if($visits): ?>
							<?php foreach($visits as $visit): ?>
							<tr>
								<td><?php echo $visit->date; ?></td>
                                <td><?php echo $visit->client_name; ?></td>
                                <td><?php echo $visit->seller_name; ?></td>
                                <td><?php echo $visit->price; ?></td>
                                <td><?php echo $visit->visit_price; ?></td>
                                <td><?php echo $visit->observations; ?></td>				
								<td><a href="<?php echo base_url('visit/edit/'.$visit->id) ?>" class="btn btn-primary">Editar</a></td>
								<td>
									<form action="<?php echo base_url('visit/delete/'.$visit->id) ?>" method="post">
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