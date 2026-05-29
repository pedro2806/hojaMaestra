<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE = edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <title>Control de documentos - Carga</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">    
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .drop-zone { border: 2px dashed #4e73df; border-radius: 10px; padding: 30px; text-align: center; color: #4e73df; cursor: pointer; background: #f8f9fc; transition: 0.3s; }
        .drop-zone:hover { background: #eaecf4; }
        .section-title { font-size: 0.8rem; font-weight: bold; color: #4e73df; text-transform: uppercase; }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include 'menu.php'; ?>
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include 'encabezado.php'; ?>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">NUEVA CARGA DE HOJA MAESTRA</h6>
                                </div>
                                
                                <div class="card-body">
                                    <form action="procesar_carga.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-5 border-right">
                                                <label class="section-title">1. Selección de Archivo</label>
                                                <div class="drop-zone mt-2" onclick="document.getElementById('fileInput').click()">
                                                    <i class="fas fa-cloud-upload-alt fa-3x mb-3"></i>
                                                    <p>Arrastra o haz clic para seleccionar</p>
                                                    <input type="file" name="archivo" id="fileInput" class="d-none" required>
                                                </div>
                                                <div id="fileInfo" class="mt-2 text-success small font-weight-bold text-center"></div>
                                            </div>

                                            <div class="col-lg-7">
                                                <label class="section-title">2. Detalles y Seguridad</label>
                                                <div class="row mt-2">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="small font-weight-bold">Nombre Visual</label>
                                                        <input type="text" name="nombre_visual" class="form-control form-control-sm" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="small font-weight-bold">Código Maestro</label>
                                                        <input type="text" name="codigo_maestro" class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="small font-weight-bold">Departamento</label>
                                                        <select name="id_departamento" class="form-control form-control-sm select2" required>
                                                            <option value="">Seleccionar...</option>
                                                            <option value="1">Sistemas</option>
                                                            <option value="2">Recursos Humanos</option>
                                                            <option value="3">Calidad</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="small font-weight-bold text-danger">Contraseña de Descarga</label>
                                                        <input type="password" name="password_descarga" class="form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="text-right mt-3">
                                                    <button type="submit" class="btn btn-primary btn-sm px-4">
                                                        <i class="fas fa-save mr-1"></i> Guardar Documento
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Inicializar Select2
            $('.select2').select2({ width: '100%' });

            // Mostrar nombre de archivo
            $('#fileInput').change(function() {
                if (this.files.length > 0) {
                    $('#fileInfo').html('<i class="fas fa-file-check"></i> Listo: ' + this.files[0].name);
                }
            });
        });
    </script>
</body>
</html>