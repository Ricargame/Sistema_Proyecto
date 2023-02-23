<!-- Para empezar, optimice las lineas de codigo, y le di identacion al codigo para que se va mas ordenao y legible, como veras varias secciones de la pagina ya no estan.
	A estas secciones las estoy trabajando como componentes reutilizable, para no tener el mismo codigo repetido en todas las paginas -->
<!doctype html>
<html lang="en">
<?php $this->Component("header"); ?>

<body>
	<?php $this->Component("menu"); ?>
	<!------------>
	<!-----Contenido----------->
	<div id="content">
		<!------PANEL SUPERIOR----------->
		<?php $this->Component("navbar"); ?>
		<!------Tabla----------->
		<div class="main-content">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrapper">
						<div class="table-title">
							<div class="row">
								<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
									<h2 class="ml-lg-2 text-light">Color de vehiculos</h2>
								</div>
								<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
									<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"
										onclick="crear_color()">
										<i class="material-icons">&#xE147;</i>
										<span></span>
									</a>

								</div>
							</div>
						</div>
						<!-- Tabla -->
						<table class="table table-striped table-hover" id="tabla">
							<thead>
								<th>ID</th>
								<th>Nombre</th>
								<th>Opciones</th>
							</thead>
							<tbody>
							</tbody>
						</table>
						<!-- fIN de la tabla -->
					</div>
				</div>
				<!----Formulario emergente Registro--------->
				<form action="" method="post">
					<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">color del vehiculo</h5>
									<div class="negra">
										<div class="hora">
											<h8 aria-label="Close" data-dismiss="modal" id="form_time">00:00:00</h8>
										</div>
										<div class="fecha">
											<h8 class="modal-title" id="form_date">date</h8>
										</div>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label>Nombre del color</label>
										<input type="hidden" name="ID" id="id">
										<input type="text" name="Nombre" id="Nombre" class="form-control"
											pattern="[A-Za-z ]+" title="Solo puedes ingresar caracteres alfabeticos"
											minlength="3" maxlength="12" required>
									</div>
								</div>
								<div class="modal-footer">
									<input type="hidden" name="operacion" id="operacion" value="Registro">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Cancelar</button>
									<button type="submit" name="Registro" id="Registro"
										class="btn btn-success">Enviar</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- Fomulario Emergente Editar -->
				<form action="" method="post">
					<div class="modal fade" tabindex="-1" id="addEmployeeModal2" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">color del vehiculo</h5>
									<div class="negra">
										<div class="hora">
											<h8 aria-label="Close" data-dismiss="modal" id="form_time">00:00:00</h8>
										</div>
										<div class="fecha">
											<h8 class="modal-title" id="form_date">date</h8>
										</div>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label>Nombre del color</label>
										<input type="hidden" name="ID" id="id">
										<input type="text" name="Nombre" id="Nombre2" class="form-control"
											pattern="[A-Za-z ]+" title="Solo puedes ingresar caracteres alfabeticos"
											minlength="3" maxlength="12" required>
									</div>
								</div>
								<div class="modal-footer">
									<input type="hidden" name="operacion" id="operacion" value="Editar">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Cancelar</button>
									<button type="submit" name="Registro" id="Editar"
										class="btn btn-success">Enviar</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!----Eliminar Datos--------->
				<form action="" method="post">
					<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Eliminar Registro</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>¿Está seguro de que desea eliminar este registro?</p>
									<p class="text-warning"><small>Esta acción no se puede deshacer</small></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Cancelar</button>
									<input type="hidden" name="ID" id="ID_eliminar" class="ID">
									<input type="hidden" name="operacion" value="Eliminar">
									<button type="submit" name="Eliminar" id="Eliminar"
										class="btn btn-success">Eliminar</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!----Panel inferior------------->
		<footer class="footer">
			<div class="container-fluid">
				<div class="footer-in">
					<p class="mb-0">&copy 2021 Vishweb Design . All Rights Reserved.</p>
				</div>
			</div>
		</footer>

		<?php $this->Component("scripts"); ?>
		<script>
			$(document).ready(function () {
				$("#tabla").DataTable({
					"ajax": {
						"url": "Controlador/Color_c.php?operacion=ConsultarTodos",
						"dataSrc": "data"
					},
					"columns": [{
						data: "Color_id"
					},
					{
						data: "Color_nombre"
					},
					{
						defaultContent: "",
						render(data, type, row) {
							let btn = `
									<a href="#addEmployeeModal2" class="edit" data-toggle="modal" onclick="consultarUno('${row.ID}')">
										<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
									</a>
									<a href="#deleteEmployeeModal" class="delete" id="delete" data-toggle="modal" onclick="Eliminar('${row.ID}')">
										<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
									</a>`;

							return btn;
						}
					}
					],
					language: {
						url: `Vista/js/DataTable.config.json`
					}
				})

				$("#Registro").click(function () {
					var nombre = $("#Nombre").val();
					$.ajax({
						type: "POST",
						url: "Controlador/Color_c.php",
						data: { operacion: "Registro", Nombre: nombre },
						dataType: "text",
					})

				})

				$("#Editar").click(function () {
					var nombre = $("#Nombre2").val();
					var id = $("#id").val();
					$.ajax({
						type: "POST",
						url: "Controlador/Color_c.php",
						data: { operacion: "Editar", ID: id , Nombre: nombre},
						dataType: "text",
					})

				})

				$("#Eliminar").click(function () {
					var id = $("#ID_eliminar").val();
					$.ajax({
						type: "POST",
						url: "Controlador/Color_c.php",
						data: { operacion: "Eliminar", ID: id},
						dataType: "text",
					})

				})



			})
		</script>

</body>

</html>