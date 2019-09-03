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
							<h2>Agregar visita</h2>
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
				<form action="<?php echo base_url('visit/create') ?>" method="POST" name="create_visit">
					<input type="hidden" name="id">
					<div class="row">
                        <div class="col-md-6">
							<div class="form-group">
								<strong>Cliente</strong>
								<select name="clients_id" id="clients_id" class="form-control">
								<?php
									foreach($clients as $client)
									{
									echo '<option value="' . $client->id  . '">' . $client->name . ' </option>';
									}
									?>
								</select>
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
								<strong>Vendedor</strong>
								<select name="sellers_id" class="form-control">
								<?php
									foreach($sellers as $seller)
									{
									echo '<option value="' . $seller->id  . '">' . $seller->name . ' </option>';
									}
									?>
								</select>
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
								<strong>Fecha</strong>
								<input type="date" name="date" id="date" class="form-control" placeholder="Fecha">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<strong>Valor neto</strong>
								<input type="number" name="price" id="price" class="form-control" placeholder="Valor neto">
							</div>
						</div>
                        
						<div class="col-md-6">
							<div class="form-group">
								<strong>Valor visita</strong>
								<input type="text" name="visit_price" id="visit_price" class="form-control" placeholder="Valor visita" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<strong>Observaciones</strong>
                                <textarea class="form-control" name="observations" rows="3"></textarea>
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
        <script>
        $( document ).ready(function() {
            $('#price, #clients_id').change(function() {
                get_visits_percentage();
            });
        });
        function get_visits_percentage(){
            $.ajax( '../client/client_visits_percentage/' + $('#clients_id').val() )
            .done(function( data ) {
                if(data != 'false'){
                    $('#visit_price').val(parseFloat(data) * parseFloat($('#price').val()));
                }
            });
        }
        </script>
	</body>
</html>