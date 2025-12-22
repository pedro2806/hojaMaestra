<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE = edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PLANEACION</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">    

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include 'menu.php';
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php
                    include 'encabezado.php';
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow">
                                <!-- Card Body -->
                                <div class="card-body   card-header">
                                    <div class="row">   
                                        <div class="col-xl-12 mb-0" style="text-align: center">
                                            <center>
                                                <h4>REGISTRO DE ACTIVIDADES</h4>
                                            </center>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MESS 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Estas seguro?</div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="logout">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    <script src = "vendor/jquery/jquery.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Cargar la información al iniciar la página
            //cargar ciudades
            cargarCiudades();
            //cargar empleados
            empleadoSolicita('#slcRespoonsable');
            empleadoSolicita('#slcRespoonsable2');
            empleadoSolicita('#slcRespoonsable3');
            //cargar automoviles
            cargarVehiculos();

            // Inicializa Select2 en el campo de responsable
            $('#slcRespoonsable').select2({            
                placeholder: "Seleccione...",
                width: '100%'
            });
            $('#slcRespoonsable2').select2({            
                placeholder: "Seleccione...",
                width: '100%'
            });
            $('#slcRespoonsable3').select2({            
                placeholder: "Seleccione...",
                width: '100%'
            });
            $('#slcAreas').select2({            
                placeholder: "Seleccione...",
                width: '100%'
            });
            $('#slcCiudad').select2({            
                placeholder: "Seleccione...",
                width: '100%'
            });
            $('#slcAutomovil').select2({            
                placeholder: "Seleccione...",
                width: '100%'
            });
            $('#slcEstatus').select2({            
                placeholder: "Seleccione...",
                width: '100%'
            });
            $('#txtCiudad').select2({            
                placeholder: "Seleccione...",
                width: '100%'
            });

            
        });

        function generarSolicitud() {            
            
            var formData = getFormData('formPlaneacion');
            var responsable = formData["slcRespoonsable"];
            var responsable2 = formData["slcRespoonsable2"];
            var responsable3 = formData["slcRespoonsable3"];
            
            //validacion de que no se repitan los responsables
            if (responsable !== "0" && (responsable === responsable2 || responsable === responsable3 || (responsable2 !== "0" && responsable2 === responsable3))) {
                Swal.fire({
                    title: "Los ingenieros seleccionados no pueden ser los mismos. Por favor, elige ingenieros diferentes.",
                    icon: "warning",
                    draggable: true
                });
                return; // Detiene la ejecución del código de envío/guardado.
            }

            var area = formData["slcAreas"];
            var ciudad = formData["txtCiudad"];
            var cliente = formData["txtCliente"];
            var ot = formData["txtOT"];
            var fechaPlaneada = formData["datefechaCierre"];
            var duracion = formData["txtDuracion"];
            var duracionViaje = formData["txtDuracionViaje"];
            var automovil = formData["slcAutomovil"];
            var estatus = formData["slcEstatus"];
            var comentarios = formData["txtComentarios"];
            
            if (!validarFormularioConsolidado(formData)) {
                // La función ya mostró la alerta con todos los errores.
                return; // Detiene la ejecución del código de envío/guardado.
            }
            
            $.ajax({
                url: 'acciones_solicitud.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    opcion: 'generarSolicitud',
                    responsable: responsable,
                    responsable2: responsable2,
                    responsable3: responsable3,
                    area: area,
                    ciudad: ciudad,
                    cliente: cliente,
                    ot: ot,
                    fechaPlaneada: fechaPlaneada,
                    duracion: duracion,
                    duracionViaje: duracionViaje,
                    automovil: automovil,
                    estatus: estatus,
                    comentarios: comentarios
                },
                success: function(data) {
                    if (data.status === 'success') {
                        Swal.fire({
                            title: "La actividad se registró con éxito!",
                            icon: "success",
                            draggable: true
                        });
                        // Redirigir
                        window.location.href = 'seguimiento_actividades.php';

                    } else {
                        Swal.fire({
                            title: "Error al registrar la actividad: " + data.message,
                            icon: "error",
                            draggable: true
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: "La actividad no se pudo registrar!",
                        icon: "error",      
                        draggable: true
                    });
                }
            });
            
        }

        // Validaciones consolidadas
function validarFormularioConsolidado(formData) {

    // --- 1. Mapeo de Campos, Valores, IDs y Mensajes ---
    // Define todos los campos que requieren validación.
    const camposAValidar = [
        // Campos que no pueden ser cadena vacía ("") o "0"
        { valor: formData["slcAreas"],          mensaje: "Selecciona un área" },
        { valor: formData["txtCiudad"],         mensaje: "Selecciona una ciudad" },
        { valor: formData["slcAutomovil"],      mensaje: "Selecciona un automóvil" },
        { valor: formData["slcEstatus"],        mensaje: "Selecciona un estatus" },
        { valor: formData["datefechaCierre"],   mensaje: "Selecciona una fecha planeada" },
        
        // Campos de texto que deben validarse con .trim() para evitar solo espacios
        { valor: formData["txtCliente"],        mensaje: "Ingresa un cliente",      esTexto: true },
        // Los campos txtDuracion y txtDuracionViaje se validarán en el Paso 3
    ];

    const mensajesDeError = [];
    
    // --- 2. Validar Responsables (Lógica Especial) ---
    // Regla: Al menos uno de los tres campos de responsable debe tener un valor diferente de "0" o "".
    const resp1 = formData["slcRespoonsable"];
    const resp2 = formData["slcRespoonsable2"];
    const resp3 = formData["slcRespoonsable3"];
    
    const responsablesVacios = (resp1 === "0" || resp1 === "") && 
                                (resp2 === "0" || resp2 === "") && 
                                (resp3 === "0" || resp3 === "");

    if (responsablesVacios) {
        mensajesDeError.push("Debes seleccionar **al menos un ingeniero**");
    }

    // --- 3. Validar Campos de Duración (Nuevo Requisito: Mayor que Cero) ---
    const duracion = parseFloat(formData["txtDuracion"]);
    const duracionViaje = parseFloat(formData["txtDuracionViaje"]);

    // Validar Duración (Estimada)
    if (isNaN(duracion) || duracion <= 0) {
        mensajesDeError.push("La duración estimada debe ser **mayor que 0**");
    }

    // Validar Duración del Viaje
    if (isNaN(duracionViaje) || duracionViaje <= 0) { // Permitimos cero si no hay viaje, pero no negativo
        // Si el requisito estricto es > 0, usar duracionViaje <= 0.
        // Aquí usamos < 0 para permitir 0 si no hay viaje. Si debe ser > 0, cambie a <= 0.
        mensajesDeError.push("La duración del viaje debe ser **igual o mayor que 0**");
    }


    // --- 4. Validar Campos Generales ---
    for (const campo of camposAValidar) {
        let valor = campo.valor || ""; // Asegura que el valor sea una cadena para la comprobación
        
        if (campo.esTexto) {
            // Validar campos de texto con trim()
            if (valor.trim() === "") {
                mensajesDeError.push(campo.mensaje);
            }
        } else {
            // Validar selects y otros campos por cadena vacía o "0"
            if (valor === "" || valor === "0") {
                mensajesDeError.push(campo.mensaje);
            }
        }
    }

    // --- 5. Mostrar Alerta Única o Continuar ---
    if (mensajesDeError.length > 0) {
        Swal.fire({
            title: "Campos Incompletos",
            html: "Por favor, corrige lo siguiente:<br><br>• " + mensajesDeError.join('<br>• '),
            icon: "warning",
            draggable: true
        });
        return false; // Validación fallida
    }

    return true; // Validación exitosa
}

        function getFormData(formId) {
            var formArray = $('#' + formId).serializeArray();
            var formData = {};
            formArray.forEach(function(item) {
                formData[item.name] = item.value;
            });
            return formData;
        }        

        function empleadoSolicita(seleccionado) {
            opcion = "empleados";
            $.ajax({
                url: 'acciones_solicitud.php',
                method: 'POST',
                dataType: 'json',
                data: {opcion},
                success: function(data) {
                    var select = $(seleccionado);
                    i = 0;
                    data.forEach(function(usuarios) {
                        if (i = 0) {
                            var option = $('<option></option>').attr('value', '0').text('Selecciona...');
                            select.append(option);
                        }
                        var option = $('<option></option>').attr('value', usuarios.noEmpleado).text(usuarios.nombre);
                        select.append(option);
                    });

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: "La solicitúd no se pudo procesar!",
                        icon: "error",
                        draggable: true
                    });

                }
            });

        }

        function cargarCiudades() {
            //FUNCION PARA CARGAR INFORMACIÓN DE LAS CIUDADES        
            $.ajax({
                type: "POST",
                url: "acciones_solicitud.php",
                data: { opcion: "consultarCiudades" },
                dataType: "json",
                success: function (respuesta) {
                    var select = $("#txtCiudad");
                    
                    respuesta.forEach(function (ciudad) {
                        var option = `<option value="${ciudad.ciudad}"><b>${ciudad.estado}</b>  -  ${ciudad.ciudad}</option>`;
                        select.append(option);
                    });
                },
                error: function (xhr, status, error) {
                    
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Hubo un problema al cargar los datos.",
                        confirmButtonText: "Aceptar"
                    });
                }
            });
        }

        function convertirTexto(e) {
            // Convertir a mayúsculas y quitar acentos
            e.value = e.value
            .toUpperCase()
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "");
        }

        function getCookie(name) {
            let value = "; " + document.cookie;
            let parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

        function cargarVehiculos() {
        //FUNCION PARA CARGAR INFORMACIÓN DE LOS VEHÍCULOS        
            $.ajax({
                type: "POST",
                url: "acciones_solicitud.php",
                data: { opcion: "consultarInventarioGeneral" },
                dataType: "json",
                success: function (respuesta) {
                    var select = $("#slcAutomovil");
                    
                    var optionOtro = `<option value="Otro">Otro</option>`;
                    select.append(optionOtro);
                    var optionNa = `<option value="N/A">No Aplica</option>`;
                    select.append(optionNa);

                    respuesta.forEach(function (vehiculo) {
                        // Define el color según el valor de vehiculo.usuario
                        var option = `<option value="${vehiculo.placa}">${vehiculo.modelo} - ${vehiculo.placa} - Usr: ${vehiculo.usuario}</option>`;
                        select.append(option);
                    });
                },
                error: function (xhr, status, error) {
                    
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Hubo un problema al cargar los datos.",
                        confirmButtonText: "Aceptar"
                    });
                }
            });
        }
        //Funcion para mostrar mensaje segun estatus
        function mostrarMensajeEstatus() {
            var estatus = $('#slcEstatus').val();
            var mensajeEstatus = $('#mensajeInfoEstatus');
            var divMensaje = $('#DivMensajeInfoEstatus');

            if (estatus === 'Pendientedeinformacion') {
                mensajeEstatus.text('Le falta documentación a la orden de venta por parte del área comercial.');
                divMensaje.show();
            } else if (estatus === 'Programadasinconfirmar') {
                mensajeEstatus.text('Fecha tentativa, espera confirmación del cliente.');
                divMensaje.show();
            } else if (estatus === 'Servicioconfirmadoparasuejecucion') {
                mensajeEstatus.text('Servicio listo para ejecutar');
                divMensaje.show();
            } else if (estatus === 'Fechareservadasininformación') {
                mensajeEstatus.text('Fecha reservada, No hay información en el sistema formal de Mess.');
                divMensaje.show();
            } else {
                divMensaje.hide();
            }
        }

        function divsIng(accion) {
            if (accion === 'agrega') {
                if ($('#Divsolicita2').is(':hidden')) {
                    $('#Divsolicita2').show();
                } else if ($('#Divsolicita3').is(':hidden')) {
                    $('#Divsolicita3').show();
                } else {
                    Swal.fire({
                        title: "Solo puedes agregar hasta 3 ingenieros",
                        icon: "warning",
                        draggable: true
                    });
                }
            } else if (accion === 'elimina') {
                if ($('#Divsolicita3').is(':visible')) {
                    $('#Divsolicita3').hide();
                    $('#slcRespoonsable3').val('0');
                    $('#slcRespoonsable2').val('0');
                } else if ($('#Divsolicita2').is(':visible')) {
                    $('#Divsolicita2').hide();
                    $('#slcRespoonsable2').val('0');
                    $('#slcRespoonsable3').val('0');
                } else {
                    $('#slcRespoonsable2').val('0');
                    $('#slcRespoonsable3').val('0');
                    Swal.fire({
                        title: "No hay más ingenieros para eliminar",
                        icon: "warning",
                        draggable: true
                    });
                }
            }
        }
    </script>
</body>

</html>
