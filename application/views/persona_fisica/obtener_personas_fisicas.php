<br>
<br>

<div class="panel panel-default"> 
    <div class="panel-heading" align="center"><b>LISTA DE PERSONAS FISICAS </b></div>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
			<tr>
				<th>Nombre Completo</th>
				<th>CURP</th>
                <th>Tipo Dueño</th>
                <th>Telefono</th>
                <th>Correo Electronico</th>
								<th>Estado</th>
			</tr>
		</thead>
		<tbody id="mostrar_datos">

		</tbody>
	</table>
</div>

<div id="modomodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
		<?php echo form_open('', array('id'=>'myform-editar')); ?>		
		<!-- <form id="myform-editar" action="" method="post" class="form-horizontal">		 -->
			
			<input type="hidden" name="id_persona_fisica" value="0">

				<div class="form-group">
					<label for="name" class="label-control col-md-4">Nombre:</label>
						<input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre de la P.F." autofocus>
				</div>

				<div class="form-group">
					<label for="name" class="label-control col-md-4">Primer Apellido:</label>
						<input type="text" name="apellido_paterno" class="form-control" placeholder="Ingrese el 1er. apellido" autofocus>
				</div>
			
				<div class="form-group">
					<label for="name" class="label-control col-md-10">Segundo Apellido:</label>
						<input type="text" name="apellido_materno" MAXLENGTH="20" class="form-control" placeholder="Ingrese el 2do. apellido" autofocus>
				</div>

				<div class="form-group">
					<label for="name" class="label-control col-md-4">CURP:</label>
						<input type="text" id="mcurp" name="curp" class="form-control" placeholder="Ingrese la CURP" onkeyup="mycurp()" autofocus>
				</div>

				<div class="form-group">
					<label for="name" class="label-control col-md-4">Tipo de Dueño:</label>
					<select name="tipo_dueno" class="form-control" autofocus>
							<?php foreach ($tipo_dueno as $dueno): ?>
								<option value="<?php echo $dueno->id_tipo_dueno; ?>"><?php echo $dueno->tipo_dueno; ?></option>
							<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="name" class="label-control col-md-4">N° Telefono:</label>
						<input type="tel" name="telefono" class="form-control" placeholder="Ingrese el N° Telefono" autofocus>
				</div>

				<div class="form-group">
					<label for="name" class="label-control col-md-10">Correo Electronico:</label>
						<input type="email" name="correo_electronico" class="form-control" placeholder="Ingrese el Correo Electronico" autofocus>
				</div>
				<div class="form-group">
        	<label for="name" class="label-control col-md-4">Estado:</label>
                <select name="estado" class="form-control" >
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
 				</div>
				<div align="center">
				<button type="submit" class="btn btn-primary">Guardar</button>
				</div>		
		<?php echo form_close(); ?>
		<!-- </form> -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



