$(document).ready(function(){

    getPropiedad()
    $("#msg-error").hide();
    $("#msg-success").hide();

    $('#myform-propiedad').submit(function(event){
        event.preventDefault();
        var data = $('#myform-propiedad').serialize();
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: 'http://localhost/colonos_monteverde/c_propiedad/add_propiedad',
            data: data,
            async: false,
            success: function(response){ 
                if(response=='exito')
                {
                    $("#msg-error").hide(); 
                    $("#msg-success").html('<strong> ¡Registro Guardado Exitosamente! </strong>').fadeIn().delay(4000).fadeOut('slow');
                    $("#myform-propiedad")[0].reset();
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

    function getPropiedad(){
        $.ajax({
            type: 'ajax',
            url: 'http://localhost/colonos_monteverde/c_propiedad/getPropiedad',
            async: false,
            dataType: 'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html +='<tr>'+
                                '<td>'+data[i].numero_escritura+'</td>'+
                                '<td>'+data[i].domicilio+'</td>'+
                                '<td>'+data[i].numero+ " "+ data[i].nombre+'</td>'+
                                '<td>'+data[i].tipo_propiedad+'</td>'+
                                '<td>'+data[i].apellido_paterno+" "+data[i].apellido_materno+'</td>'+
                                '<td>'+
                            '<a href="javascript:;" class="btn btn-success item-edit" data="'+data[i].id_propiedad+'" ><span class="glyphicon glyphicon-pencil"></span>Editar datos</a>'+
                            '<td>'+    
                        '</tr>';
                }
                $('#mostrar_datos_propiedad').html(html);
            },
            error: function(){
                alert('Error no se puede mostrar el Cont. de la BD');
            }
        });
    }

    $('#mostrar_datos_propiedad').on('click', '.item-edit', function(event){
        event.preventDefault();
        var id = $(this).attr('data');
        $('#modomodal_propiedad').modal('show');
        $('#modomodal_propiedad').find('.modal-title').text('Editar Datos de Propiedades');

        $.ajax({
            type: 'ajax',
            method: 'get',
            url: 'http://localhost:/colonos_monteverde/c_propiedad/editPropiedad',
            data: {id_propiedad: id},
            async: false,
            dataType: 'json',
            success: function(data){  
                $('input[name=numero_escritura]').val(data.numero_escritura);
                $('input[name=domicilio]').val(data.domicilio);
                $('select[name=id_coto]').val(data.id_coto);
                $('select[name=id_tipo_propiedad]').val(data.id_tipo_propiedad);
                $('select[name=id_persona_fisica]').val(data.id_persona_fisica);
                $('input[name=id_propiedad]').val(data.id_propiedad);
            },
            error: function(){
                alert('Error al Editar Datos de Propiedades');
            }
        });
    });

    $('#myform_propiedad_2').submit(function(event){
        event.preventDefault();
        var data = $('#myform_propiedad_2').serialize();
        
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: 'http://localhost:/colonos_monteverde/c_propiedad/updatePropiedad',
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

});