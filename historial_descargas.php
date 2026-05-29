<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE = edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <title>Historial de Descargas</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">    
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include 'menu.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include 'encabezado.php'; ?>

                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-history mr-2"></i>LOG DE ACCESO A DOCUMENTOS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="tablaHistorial" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fecha y Hora</th>
                                            <th>Documento / Hoja Maestra</th>
                                            <th>Usuario Responsable</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyHistorial">
                                        </tbody>
                                </table>
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
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            cargarHistorial();
        });

        function cargarHistorial() {
            $.ajax({
                url: 'acciones_documentos.php',
                method: 'POST',
                dataType: 'json',
                data: { opcion: "verHistorialDescargas" },
                success: function(data) {
                    var html = '';
                    $.each(data, function(i, item) {
                        html += `<tr>
                                    <td>${item.fecha}</td>
                                    <td><strong>${item.documento}</strong></td>
                                    <td><i class="fas fa-user-check mr-2 text-secondary"></i>${item.usuario}</td>
                                 </tr>`;
                    });
                    
                    $('#bodyHistorial').html(html);
                    
                    $('#tablaHistorial').DataTable({
                        "order": [[0, "desc"]], // Mostrar lo más reciente primero
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>