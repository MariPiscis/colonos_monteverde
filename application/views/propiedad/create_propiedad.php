<div class="alert alert-danger" id="msg-error" style="text-align:left;">
    <strong> ¡importante! </strong>Corregir los siguientes errores.
    <div class="list-errors"></div>
</div>

<div class="alert alert-success" id="msg-success" style="text-align:center;">
</div>

<?php echo form_open('', array('id'=>'myform-propiedad')); ?>
<div class="row">
  <div class="col-md-5 col-md-offset-4">
    <h1 class="text-center"><?php echo $title; ?></h1>
    
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
                <option value="0">-- Seleccionar --</option>
                    <?php foreach ($id_coto as $coto): ?>
                        <option value="<?php echo $coto->id_coto; ?>">
                        <?php echo $coto->numero . " " . $coto->nombre; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="name" class="label-control col-md-4">Tipo Propiedad:</label>
            <select name="id_tipo_propiedad" class="form-control" autofocus>
                <option value="0">-- Seleccionar --</option>
                    <?php foreach ($id_tipo_propiedad as $tpropiedad): ?>
                        <option value="<?php echo $tpropiedad->id_tipo_propiedad; ?>"><?php echo $tpropiedad->tipo_propiedad; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="name" class="label-control col-md-4">Persona Fisica:</label>
            <select name="id_persona_fisica" class="form-control" autofocus>
                <option value="0">-- Seleccionar --</option>
                    <?php foreach ($id_persona_fisica as $personaf): ?>
                        <option value="<?php echo $personaf->id_persona_fisica; ?>">
                        <?php echo $personaf->nombre . " " . $personaf->apellido_paterno . " " . $personaf->apellido_materno; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>

        <div align="center">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>c_propiedad/verPropiedad"><span class="glyphicon glyphicon-th-list"></span>Listar Propiedades </a>
        </div>
        
  </div>
 </div>
<?php echo form_close(); ?>
