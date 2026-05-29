<?php
// Se asume que la sesión ya está iniciada en encabezado.php o menu.php
// Si no, descomentar la siguiente línea:
// session_start(); 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Control de Documentos - Hojas Maestras</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <?php include 'menu.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include 'encabezado.php'; ?>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Hojas Maestras</h1>
                        <a href="carga_documentos.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-upload fa-sm text-white-50"></i> Nueva Carga
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">LISTADO DE DOCUMENTOS VIGENTES</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="tablaMaestra" width="100%" cellspacing="0">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre del Documento</th>
                                                    <th>Fecha Creación</th>
                                                    <th>Última Descarga</th>
                                                    <th>Usuario</th>
                                                    <th class="text-center">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaDocumentosBody">
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MESS <?php echo date("Y"); ?> </span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            listarDocumentos();
        });

        function listarDocumentos() {
            var opcion = "listarHojasMaestras";
            $.ajax({
                url: 'acciones_documentos.php',
                method: 'POST',
                dataType: 'json',
                data: { opcion: opcion },
                success: function(data) {
                    var html = '';
                    $.each(data, function(i, item) {
                        html += `
                        <tr>
                            <td>${item.codigo}</td>
                            <td><strong>${item.nombre}</strong></td>
                            <td>${item.fecha_creacion}</td>
                            <td>${item.ultima_descarga}</td>
                            <td><span class="badge badge-secondary">${item.usuario_descarga}</span></td>
                            <td class="text-center">
                                <button class="btn btn-circle btn-primary btn-sm" onclick="pedirPassword(${item.id}, '${item.nombre}')" title="Descargar">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>`;
                    });
                    
                    // Destruir tabla si ya existe para reinicializar
                    if ($.fn.DataTable.isDataTable('#tablaMaestra')) {
                        $('#tablaMaestra').DataTable().destroy();
                    }
                    
                    $('#tablaDocumentosBody').html(html);
                    
                    // Inicializar DataTable en español
                    $('#tablaMaestra').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                        }
                    });
                },
                error: function() {
                    Swal.fire("Error", "No se pudieron cargar los documentos", "error");
                }
            });
        }

        function pedirPassword(id, nombre) {
            Swal.fire({
                title: 'Confirmar Descarga',
                text: 'Ingrese la clave para: ' + nombre,
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off',
                    autocorrect: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Validar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#4e73df',
                showLoaderOnConfirm: true,
                preConfirm: (pass) => {
                    var opcion = "validarPassword";
                    // Obtener ID de usuario desde cookie o sesión si es necesario
                    var id_usuario = "<?php echo $_SESSION['user_id'] ?? 1; ?>"; 
                    
                    return $.ajax({
                        url: 'acciones_documentos.php',
                        method: 'POST',
                        dataType: 'json',
                        data: { 
                            opcion: opcion, 
                            id_doc: id, 
                            pass: pass, 
                            id_usuario: id_usuario 
                        }
                    }).then(response => {
                        if (response.status === 'error') {
                            throw new Error(response.message);
                        }
                        return response;
                    }).catch(error => {
                        Swal.showValidationMessage(`Error: ${error.message}`);
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Autorizado',
                        text: 'La descarga comenzará en breve.',
                        icon: 'success'
                    });
                    listarDocumentos(); // Actualizar tabla para ver quién descargó
                    
                    // Aquí rediriges a un script que entrega el archivo físico
                    window.location.href = 'descargar_archivo.php?file=' + result.value.archivo;
                }
            });
        }
    </script>
</body>
</html>