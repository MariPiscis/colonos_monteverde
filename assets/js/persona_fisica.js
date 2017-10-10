function mycurp(){
    var x=document.getElementById("mcurp");
    x.value=x.value.toUpperCase();
}

$(document).ready(function(){  
    getPersonasFisicas();

    $("#msg-error").hide();
    $("#msg-success").hide();

    $('#myform').submit(function(event){
        event.preventDefault();
        var data = $('#myform').serialize();
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: 'http://localhost/colonos_monteverde/persona_fisica/add_personas_fisicas',
            data: data,
            async: false,
            success: function(response){ 
                if(response=='exito')
                {
                    $("#msg-error").hide(); 
                    $("#msg-success").html('<strong> ¡Registro Guardado Exitosamente! </strong>').fadeIn().delay(4000).fadeOut('slow');
                    $("#myform")[0].reset();
                }
                    else if(response=="error")
                        {
                        alert("Los datos no se han guardado");
                        }
                else
                    {
                        $("#msg-error").show().delay(6000).fadeOut('slow');
                        $(".list-errors").html(response);
                    }
              },
              error: function(){
                alert('Se ha producido un error al intentar guardar datos');
              }
        });
    });

    $('#myform-editar').submit(function(event){
        event.preventDefault();
        var data = $('#myform-editar').serialize();
        
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: 'http://localhost:/colonos_monteverde/persona_fisica/updatePersonasFisicas',
            data: data,
            dataType:'json',
            async: false,
            success: function(response){ 
                alert('actualizado');
                location.reload();
              },
              error: function(){
                alert('Se ha producido un error al intentar guardar datos');
              }
        });
    });

    
    $('#mostrar_datos').on('click', '.item-edit', function(event){
        event.preventDefault();
        var id = $(this).attr('data');
        $('#modomodal').modal('show');
        $('#modomodal').find('.modal-title').text('Editar Datos de Personas Fisicas');

        $.ajax({
            type: 'ajax',
            method: 'get',
            url: 'http://localhost:/colonos_monteverde/persona_fisica/editPersonasFisicas',
            data: {id_persona_fisica: id},
            async: false,
            dataType: 'json',
            success: function(data){  
                $('input[name=nombre]').val(data.nombre);
                $('input[name=apellido_paterno]').val(data.apellido_paterno);
                $('input[name=apellido_materno]').val(data.apellido_materno);
                $('input[name=curp]').val(data.curp);
                $('select[name=tipo_dueno]').val(data.tipo_dueno);
                $('input[name=telefono]').val(data.telefono);
                $('input[name=correo_electronico]').val(data.correo_electronico);
                $('select[name=estado]').val(data.estado);
                $('input[name=id_persona_fisica]').val(data.id_persona_fisica);
            },
            error: function(){
                alert('Error al Editar Datos de Personas Fisicas');
            }
        });
    });

    function getPersonasFisicas(){
        $.ajax({
            type: 'ajax',
            url: 'http://localhost/colonos_monteverde/persona_fisica/getPersonasFisicas',
            async: false,
            dataType: 'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html +='<tr>'+
                                '<td>'+data[i].nombre+" "+data[i].apellido_paterno+" "+data[i].apellido_materno+'</td>'+
                                '<td>'+data[i].curp+'</td>'+
                                '<td>'+data[i].tipo_dueno+'</td>'+
                                '<td>'+data[i].telefono+'</td>'+
                                '<td>'+data[i].correo_electronico+'</td>'+
                                '<td>'+data[i].estado+'</td>'+
                                '<td>'+
                            '<a href="javascript:;" class="btn btn-success item-edit" data="'+data[i].id_persona_fisica+'" ><span class="glyphicon glyphicon-pencil"></span>Editar datos</a>'+
                            '<td>'+    
                        '</tr>';
                }
                $('#mostrar_datos').html(html);
            },
            error: function(){
                alert('Error no se puede mostrar el Cont. de la BD');
            }
        });
    }

});

