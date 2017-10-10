<br>
<br>

<div class="panel panel-default"> 
    <div class="panel-heading" align="center"><b>LISTA DE PERSONAS FISICAS </b></div>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
			<tr>
				<th>Numero Escritura</th>
				<th>Domicilio</th>
                <th>Coto</th>
                <th>Tipo Propiedad</th>
                <th>Persona Fisica</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody id="mostrar_datos_propiedad">

		</tbody>
	</table>
</div>

<div id="modomodal_propiedad" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
		<?php echo form_open('', array('id'=>'myform_propiedad_2')); ?>		
			
			<input type="hidden" name="id_propiedad" value="0">
			<div class="form-group">
            <label for="name" class="label-control col-md-4">Numero Escritura:</label>
                <input type="text" name="numero_escritura" class="form-control" placeholder="Ingrese el nombre de la P.F." autofocus>
        </div>

        <div class="form-group">
            <label for="name" class="label-control col-md-4">Domicilio:</label>
                <input type="text" name="domicilio" class="form-control" placeholder="Ingrese el 1er. apellido" autofocus>
        </div>
    
        <div class="form-group">
            <label for="name" class="label-control col-md-4">Coto:</label>
            <select name="id_coto" class="form-control" autofocus>
                    <?php foreach ($id_coto as $coto): ?>
                        <option value="<?php echo $coto->id_coto; ?>">
                        <?php echo $coto->numero . " " . $coto->nombre; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="name" class="label-control col-md-4">Tipo Propiedad:</label>
            <select name="id_tipo_propiedad" class="form-control" autofocus>
                    <?php foreach ($id_tipo_propiedad as $tpropiedad): ?>
                        <option value="<?php echo $tpropiedad->id_tipo_propiedad; ?>"><?php echo $tpropiedad->tipo_propiedad; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="name" class="label-control col-md-4">Persona Fisica:</label>
            <select name="id_persona_fisica" class="form-control" autofocus>
                    <?php foreach ($id_persona_fisica as $personaf): ?>
                        <option value="<?php echo $personaf->id_persona_fisica; ?>">
                        <?php echo $personaf->nombre . " " . $personaf->apellido_paterno . " " . $personaf->apellido_materno; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>

        <div align="center">
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
		<?php echo form_close(); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
