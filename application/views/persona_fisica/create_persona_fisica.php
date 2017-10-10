
<div class="alert alert-danger" id="msg-error" style="text-align:left;">
    <strong> ¡importante! </strong>Corregir los siguientes errores.
    <div class="list-errors"></div>
</div>

<div class="alert alert-success" id="msg-success" style="text-align:center;">
</div>

<?php echo form_open('', array('id'=>'myform')); ?>
<div class="row">
  <div class="col-md-5 col-md-offset-4">
    <h1 class="text-center"><?php echo $title; ?></h1>
    
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
                <option value="0">-- Seleccionar --</option>
                    <?php foreach ($tipo_dueno as $dueno): ?>
                        <option value="<?php echo $dueno->id_tipo_dueno; ?>"><?php echo $dueno->tipo_dueno; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="name" class="label-control col-md-4">N° Telefono:</label>
                <!-- <input type="tel" name="telefono" class="form-control" placeholder="Ingrese el N° Telefono" pattern="[0-9]{10}"> -->
                <input type="tel" name="telefono" class="form-control" placeholder="Ingrese el N° Telefono" autofocus>
        </div>

        <div class="form-group">
            <label for="name" class="label-control col-md-10">Correo Electronico:</label>
                <input type="email" name="correo_electronico" class="form-control" placeholder="Ingrese el Correo Electronico" autofocus>
        </div>

        <div class="form-group">
        	<label for="name" class="label-control col-md-4">Estado:</label>
                <select name="estado" class="form-control" >
                    <option value="0">-- Seleccionar Una Opcion--</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
 		</div>

        <div align="center">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>persona_fisica/verPersonasFisicas"><span class="glyphicon glyphicon-th-list"></span>Listar Personas </a>
        </div>
        
  </div>
 </div>
<?php echo form_close(); ?>





