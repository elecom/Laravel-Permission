$.validator.setDefaults({
    errorElement: 'span',
     errorPlacement: function (error, element) {
         error.addClass('invalid-feedback');
         element.closest('.input-group').append(error);
     },
     highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
     },
     unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
     },
});

//alert('Hola Profile');
tblDataRoles = $('#tableRoles').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#domainHost').val()+'/'+'roles/datatable',
    language: {
        url: $('#domainHost').val()+'/'+'js/Spanish.json',
        pageLength: 5
    },
    columns: [
        {data: 'name', name: 'name', orderable: true, searchable: true},
        {data: 'status', name: 'status', orderable: true, searchable: true},
        {data: 'status', name: 'status'}
    ],
    columnDefs: [ 
        { 
            targets: 0, render: function ( data, type, row, meta ) {
                return row.name; 
            }
        },
        { 
            targets: 1, render: function ( data, type, row, meta ) {
                var status = "";
                
                switch (row.status) {
                    case 1: status = 'Activo'; break;
                    default: status = 'Inactivo'; break;
                }
                
                return `<center>`+status+`</center>`;
            }
        },
        { 
            targets: 2, render: function ( data, type, row, meta ) {
                return `<center>
                        <i class="fa fa-edit text-warning p-2 btnEdit"  data-index='${meta.row}' style="cursor: pointer;" title=""></i>
                        <i class="fa fa-trash text-danger btnDelete" data-index='${meta.row}' style="cursor: pointer;" title=""></i>
                    </center>`;
            }},
    ],
    //order:[, "desc"],
});

tblDataUsers = $('#tableUsers').DataTable({
    processing: true,
    serverSide: true,
    ajax: $('#domainHost').val()+'/'+'users/datatable',
    language: {
        url: $('#domainHost').val()+'/'+'js/Spanish.json',
        pageLength: 5
    },
    columns: [
        {data: 'name', name: 'name', orderable: true, searchable: true},
        {data: 'email', name: 'email', orderable: true, searchable: true},
        {data: 'role', name: 'role', orderable: true, searchable: true},
        {data: 'level', name: 'level', orderable: true, searchable: true},
        {data: 'status', name: 'status', orderable: true, searchable: true},
        {data: 'status', name: 'status'}
    ],
    columnDefs: [ 
        { 
            targets: 0, render: function ( data, type, row, meta ) {
                return row.name; 
            }
        },
        { 
            targets: 1, render: function ( data, type, row, meta ) {
                return row.email; 
            }
        },
        { 
            targets: 2, render: function ( data, type, row, meta ) {
                return row.role; 
            }
        },
        { 
            targets: 3, render: function ( data, type, row, meta ) {
                return row.level; 
            }
        },
        { 
            targets: 4, render: function ( data, type, row, meta ) {
                var status = "";
                
                switch (row.status) {
                    case 1: status = 'Activo'; break;
                    default: status = 'Inactivo'; break;
                }
                
                return `<center>`+status+`</center>`;
            }
        },
        { 
            targets: 5, render: function ( data, type, row, meta ) {
                return `<center>
                        <i class="fa fa-edit text-warning p-2 btnEdit"  data-index='${meta.row}' style="cursor: pointer;" title=""></i>
                        <i class="fa fa-trash text-danger btnDelete" data-index='${meta.row}' style="cursor: pointer;" title=""></i>
                    </center>`;
            }},
    ],
    //order:[, "desc"],
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()     
    }
});

$(document).ready(function(){
    $('#btnNewRole').on('click', function(e){
        e.preventDefault();

        // TRAER TODOS LOS PERMISOS
        $.ajax({
            url: '/roles/all-permissions',
            type: 'get',
            dataType: 'json'
        }).done(function(res){
            if(res){
                let $html = "";
                $('#view-permissions').empty();
                $.map(res, function(item){
                    $html += `<input class="mb-2 mr-2 ml-3" type="checkbox" name="checkbox_roles[]" value="`+item.id+`">`+item.name;
                });
                $('#view-permissions').append($html);
            }   
        });

        $('#modalNewRole').modal('show');
    });

    // ENVIAR FORMULARIO NUEVO ROL
    $('#formNewRole').validate({
        lang: 'es',
        rules:{
            input_NewNameRole:{
                required: true
            }
        },
        submitHandler: function(form){
            if($('#formNewRole').valid()){
                alert("Datos válidos");
            }
            else{
                alert('Datos no válidos');
            }
        }
    });

    $('#btnEditRole').on('click', function(e){
        e.preventDefault();
        $('#modalEditRole').modal('show');
    });

    $('#tableRoles').on('click', 'button.btnEdit', function(e){
        e.preventDefault();
        console.log($(this).data('index'));
    });

    $('#btnNewUser').on('click', function(e){
        e.preventDefault();
        $('#modalNewUser').modal('show');
    });


    // CIERRE DE MODALES
    $("#modalNewRole").on("hidden.bs.modal", function(e){
        $("form").validate().resetForm();
        $("input,textarea,select").removeClass('is-invalid');
    });
    
});