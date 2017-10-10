
<div class="container" align="center">
<h2>Personas Morales</h2><br>

<table class="table table-striped table-hover">
<!-- <table class="table table-striped"> -->
	<thead>
		<tr align="center">
			<td><b>Estado</b></td>
			<td><b>Razón Social</b></td>
			<td><b>R F C </b></td>
			<td><b>Persona Física</b></td>
			<td><span class="glyphicon glyphicon-wrench"></span><b>Editar</b></td>

		</tr>
	</thead>
	<tbody id="showdata">
	
	</tbody>
</table>
</div>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		ESTE ES EL MODAL PARA EDITAR -->


<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Personas Morales</h4>
      </div>
      
      <div class="modal-body">
	      <form id="myForm" action="" method="post" class="form-horizontal">

	      		<input type="hidden" name="id_persona_moral" value="0">
	      		<div class="form-group">
		      		<label for="name" class="label-control col-md-4">Razon Social: </label>
		      		<div class="col-md-8">
		      			<input type="text" name="razon_social" class="form-control" ><!-- readonly="readonly" -->
		      		</div>
	      		</div>

	      		<div class="form-group">
		      		<label for="name" class="label-control col-md-4">RFC: </label>
		      		<div class="col-md-8">
		      			<input type="text" name="rfc" id="namerfc" class="form-control" onkeyup="myRFC()">
		      		</div>
	      		</div>

        <div class="form-group">
              <label for="name" class="label-control col-md-4">Persona Fisica:</label>
              <div class="col-md-8">
              <select  name="id_persona_fisica" class="form-control">
                <?php foreach ($persona_fisica as $pz): ?>                              
                  <option value="<?php echo $pz->id_persona_fisica; ?>">
                    <?php echo ($pz->nombre)." ".($pz->apellido_paterno)." ".($pz->apellido_materno); ?>
                  </option>

                <?php endforeach; ?>
              </select>
            </div>
          </div>

				
				<div class="form-group">
		      		<label for="name" class="label-control col-md-4">Status: </label>
		      		<div class="col-md-8">
		      			<select  name="estados" class="form-control">
					        <option value="Activo">Activo</option>
					        <option value="Inactivo">Inactivo</option>
		      			</select>			      						      				
		      		</div>
	      		</div>

	      </form>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-default" id="btnCerrar">Cancelar</button>
        <button type="button" id="btnSave" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>