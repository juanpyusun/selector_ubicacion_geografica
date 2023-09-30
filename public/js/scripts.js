$(document).ready(function(){
    $('#pais').change(function(){
        $('#departamento option[value!="0"]').remove();
        $('#ciudad option[value!="0"]').remove();
        $('#resultado').val('');
        let id_pais = $('#pais').val();

        $.ajax({
            type: "POST",
            url: "/api_departamento/"+id_pais,
            data: {
                "_token" : "{{ csrf_token() }}",
            },
            datatype:"JSON",
            success: function(data){
                $('#departamento').prop('disabled',false);
                $.each(data, function(index, departamento) {
                    $('#departamento').append($('<option>', {
                        value: departamento.id,
                        text: departamento.name
                    }));
                });
                $('#departamento').val('0');
                $('#ciudad').val('0');
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });

    $('#departamento').change(function(){
        $('#ciudad option[value!="0"]').remove();
        let id_departamento = $('#departamento').val();
        //$('#departamento').prop('enabled',true);

        $.ajax({
            type: "POST",
            url: "/api_ciudad/"+id_departamento,
            data: {
                "_token" : "{{ csrf_token() }}",
            },
            datatype:"JSON",
            success: function(data){
                $('#ciudad').prop('disabled',false);
                $.each(data, function(index, ciudad) {
                    $('#ciudad').append($('<option>', {
                        value: ciudad.id,
                        text: ciudad.name
                    }));
                });
                $('#ciudad').val('0');
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
    $('#ciudad').change(function(){
        let pais = $('#pais option:selected').text();
        let departamento = $('#departamento option:selected').text();
        let ciudad = $('#ciudad option:selected').text();
        let id_ciudad = $('#ciudad').val();
        let respuesta = pais + "/" + departamento + "/" + ciudad;
        $('#resultado').val(respuesta);
        $.ajax({
            type: "POST",
            url: "/api_mapa/"+id_ciudad,
            data: {
                "_token" : "{{ csrf_token() }}",
            },
            datatype:"JSON",
            success: function(data){
                let map = L.map('map').setView([data.latitude, data.longitude], 10);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map); 
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
        Swal.fire({
            title: 'Seleccion Realizada',
            text: respuesta,
            icon: 'info',
            confirmButtonText: 'Next'
        });
    });
    $('#reset').click(function(){
        $('#departamento option[value!="0"]').remove();
        $('#ciudad option[value!="0"]').remove();
        $('#pais').val('0');
        $('#departamento').val('0');
        $('#ciudad').val('0');
        $('#resultado').val('');
        $('#departamento').prop('disabled',true);
        $('#ciudad').prop('disabled',true);
        //location.reload(); solucion momentanea
    });
    $('#map').click(function(){
        //Agregar esta seccion, de mostrar la ciudad mas cercana segun la escogida en el mapa
    });
});