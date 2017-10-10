function myRFC() {
    var x = document.getElementById("namerfc");
    x.value = x.value.toUpperCase();
}

$(document).ready(function(){
    verPerMorales();
    $("#msg-error").hide();
    $("#msg-yes").hide();

        $('#btnCerrar').click(function(){
            location.reload();
            });

    //AGREGAR UNA NUEVA PEROSNA MORAL
$('#form_pmorales').submit(function(event){
    event.preventDefault();

    var data = $('#form_pmorales').serialize();
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: 'http://localhost/colonos_monteverde/CpersonasMorales/create_personas_morales',
        data: data,
        async: false,
        success: function(result){
            if (result==="exito") {
                    // alert("Los datos han sido guardados");
                    $("#msg-yes").show().delay(3000).fadeOut('slow');

                    $("#msg-error").hide();
                    $("#form_pmorales")[0].reset();
                }
                else if (result==="error") {
                    alert("Los datos no se pudieron guardar");
                }
                else{
                    $("#msg-error").show().delay(5000).fadeOut('slow');
                    $(".list-errors").html(result);

                    $("#msg-yes").hide();
                }
            }
            
        });
});
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//Ver la tabla en Index
function verPerMorales(){
    $.ajax({
        type: 'ajax',
        url: 'http://localhost/colonos_monteverde/CpersonasMorales/verPerMorales',
        async: false,
        dataType: 'json',
        success: function(data){
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html += '<tr align="center">'+
                '<td>'+data[i].estados+'</td>'+
                '<td>'+data[i].razon_social+'</td>'+
                '<td>'+data[i].rfc+'</td>'+
                '<td>'+data[i].nombre+' '+data[i].apellido_paterno+' '+data[i].apellido_materno+'</td>'+
                '<td>'+
                '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id_persona_moral+'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>'+ 
                '</td>'+
                '</tr>';
            }
            $('#showdata').html(html);
        },
        error: function(){
            alert('no se encontro la BD');
        }
    });
}


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//Funcion Editar
$('#showdata').on('click', '.item-edit', function(){
    var x = $(this).attr('data');
    $('#myModal').modal('show');
    $('#myModal').find('.modal-title').text('Editar Persona Moral');
    $('#myForm').attr('action', 'http://localhost/colonos_monteverde/CpersonasMorales/updatePmorales');

    $.ajax({
        type: 'ajax',
        method: 'get',
        url: 'http://localhost/colonos_monteverde/CpersonasMorales/modificarPmorales',
        data: {id_persona_moral: x},
        async: false,
        dataType: 'json',
        success: function(data){
            $('select[name=estados]').val(data.estados);
            $('input[name=razon_social]').val(data.razon_social);
            $('input[name=rfc]').val(data.rfc);;
            $('select[name=id_persona_fisica]').val(data.id_persona_fisica);
            $('input[name=id_persona_moral]').val(data.id_persona_moral);
        },
        error: function(){
            alert('No se logro');
        }
    });
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    $('#btnSave').click(function(){
        var url = $('#myForm').attr('action');
        var data = $('#myForm').serialize();

        //validacion del formulario 
        var razon_social      = $('input[name=razon_social]');
        var rfc               = $('input[name=rfc]');
        var id_persona_fisica = $('select[name=id_persona_fisica]');
        var estados            = $('select[name=estados]');
        var result            = '';

        if(razon_social.val()==''){
            razon_social.parent().parent().addClass('has-error');
            }else{
                razon_social.parent().parent().removeClass('has-error');
                result +='1';
            }
        if(rfc.val()==''){
            rfc.parent().parent().addClass('has-error');
            }else{
                rfc.parent().parent().removeClass('has-error');
                result +='2';
            }
        if(id_persona_fisica.val()==''){
            id_persona_fisica.parent().parent().addClass('has-error');
            }else{   
                id_persona_fisica.parent().parent().removeClass('has-error');
                result +='3';
            }
        if(estados.val()==''){
            estados.parent().parent().addClass('has-error');
            }else{
                estados.parent().parent().removeClass('has-error');
                result +='4';
            } 
            
            if(result=='1234'){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                            if(response.success){
                                $('#myModal').modal('hide');
                                $('#myForm')[0].reset();

                                if(response.type=='add'){
                                var type = 'agregado'
                                    }else if(response.type=='update'){
                                        var type ="modificado"
                                }

                                $('.alert-success').html('Persona Moral '+type+' exitoso').fadeIn().delay(1000).fadeOut('slow');
                                verPerMorales();
                            }
                            else{
                                alert('No se realizó ninguna actualización');
                                location.reload();
                            }
                        },
                    error: function(){
                        alert('Numero De Empleado Existente');
                        location.reload();
                    }
                });
            }
        });


});