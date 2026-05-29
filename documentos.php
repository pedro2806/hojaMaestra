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
    <style>
        body { background-color: #f4f7f9; }
        .card { border: none; border-radius: 12px; }
        .table thead { background-color: #212529; color: white; }
        .badge-user { background-color: #e9ecef; color: #495057; border: 1px solid #dee2e6; }
    </style>
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="fw-bold"><i class="bi bi-file-earmark-lock2 text-primary"></i> Hojas Maestras</h2>
                            <p class="text-muted mb-0">Listado de documentos oficiales con descarga protegida.</p>
                        </div>
                        <a href="#" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
                    </div>

                    <div class="card shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-4">Documento</th>
                                        <th>Fecha de Creación</th>
                                        <th>Última Descarga</th>
                                        <th>Responsable Descarga</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-pdf text-danger fs-4 me-2"></i>
                                                <div>
                                                    <span class="d-block fw-bold">Manual_Procedimientos_Calidad.pdf</span>
                                                    <small class="text-muted">ID: HM-001</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>15 Oct 2023</td>
                                        <td>30 Oct 2023, 09:15 AM</td>
                                        <td><span class="badge badge-user"><i class="bi bi-person"></i> juan.perez</span></td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm px-3" onclick="mostrarModal('Manual_Procedimientos_Calidad.pdf')">
                                                <i class="bi bi-download"></i> Descargar
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-excel text-success fs-4 me-2"></i>
                                                <div>
                                                    <span class="d-block fw-bold">Matriz_Riesgos_2024.xlsx</span>
                                                    <small class="text-muted">ID: HM-042</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>02 Nov 2023</td>
                                        <td><span class="text-muted italic">Sin descargas</span></td>
                                        <td><span class="text-muted">-</span></td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm px-3" onclick="mostrarModal('Matriz_Riesgos_2024.xlsx')">
                                                <i class="bi bi-download"></i> Descargar
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-word text-primary fs-4 me-2"></i>
                                                <div>
                                                    <span class="d-block fw-bold">Politica_Privacidad_v3.docx</span>
                                                    <small class="text-muted">ID: HM-089</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>20 Sep 2023</td>
                                        <td>28 Oct 2023, 14:30 PM</td>
                                        <td><span class="badge badge-user"><i class="bi bi-person"></i> marta.admin</span></td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm px-3" onclick="mostrarModal('Politica_Privacidad_v3.docx')">
                                                <i class="bi bi-download"></i> Descargar
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalSeguridad" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 shadow">
                            <div class="modal-header bg-light">
                                <h5 class="modal-title fw-bold"><i class="bi bi-shield-lock-fill text-warning me-2"></i>Validación de Seguridad</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4 text-center">
                                <p class="mb-1">Está intentando descargar:</p>
                                <h6 id="nombreArchivoModal" class="fw-bold text-primary mb-4"></h6>
                                
                                <div class="text-start">
                                    <label class="form-label small fw-bold">Contraseña del Documento</label>
                                    <input type="password" class="form-control form-control-lg" placeholder="••••••••">
                                    <div class="form-text mt-2 text-danger">
                                        <i class="bi bi-exclamation-circle"></i> Esta acción quedará registrada en su historial.
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0 p-4 pt-0">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success w-100" onclick="simularDescarga()">Confirmar y Descargar</button>
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
                        <span>Copyright &copy; --- <?php echo date("Y"); ?> </span>
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
        
        });

        let modalControl = new bootstrap.Modal(document.getElementById('modalSeguridad'));

        function mostrarModal(nombre) {
            document.getElementById('nombreArchivoModal').innerText = nombre;
            modalControl.show();
        }

        function simularDescarga() {
            alert("Simulación: Contraseña correcta. Iniciando descarga...");
            modalControl.hide();
        }
        
        function getCookie(name) {
            let value = "; " + document.cookie;
            let parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }        
    </script>
</body>

</html>
