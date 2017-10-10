
<?php echo form_open('CpersonasMorales/create_personas_morales', array('id'=>'form_pmorales')); ?>
<div class="row">
  <div class="col-md-5 col-md-offset-4">
    <h1 class="text-center"><?php echo $title; ?></h1>

    <div class="alert alert-danger" id="msg-error" style="text-align:left;"> 
      <div class="list-errors"></div>
    </div>

    <div class="alert alert-success" id="msg-yes" style="text-align:left;">                 
      <strong>Registro Exitoso !</strong>
      <div class="list-yes"></div>
    </div>

    <div class="form-group">
      <label>Razón Social:</label>
      <input type="text"  name="razon_social" class="form-control" placeholder="Razón Social" autofocus>
    </div>
    <div class="form-group">
      <label>RFC - Persona Moral:</label>
      <input type="text" name="rfc" id="namerfc" class="form-control" placeholder="R F C" autofocus onkeyup="myRFC()">
    </div>
    <div class="form-group">
      <label>Persona Física:</label>
      <select  name="id_persona_fisica" class="form-control">
        <option ></option>
        <?php foreach ($persona_fisica as $pz): ?>                              
          <option value="<?php echo $pz->id_persona_fisica; ?>">
            <?php echo ($pz->nombre)." ".($pz->apellido_paterno)." ".($pz->apellido_materno); ?>
          </option>

        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group" >
      <label>Estado:</label>
      <select  name="estados" class="form-control">
        <option ></option>
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
      </select>
    </div>

    <div align="center">
      <button type="submit" class="btn btn-primary">Guardar</button><br><br>
      <a href="<?php echo base_url();?>CpersonasMorales/registros_pm">Ver Registros de Personas Morales</a>
    </div>  
  </div>
</div>
<?php echo form_close(); ?>
