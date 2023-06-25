@extends('layouts.myLayout')
@section('title', 'bandejaEntrada')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Mi bandeja</h2>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Bandeja de entrada</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a></li>
                            <li><a href="#" class="dropdown-item">Config option 2</a></li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="float-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2018
    </div>
</div>

</div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Page-Level Scripts -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var tableBody = document.querySelector('.dataTables-example tbody');

        //var area = localStorage.getItem('area'); // Obtener el valor de área almacenado en el LocalStorage
        var area =var area = {"area": "test2"};


        fetch('http://localhost:3000/api/reclamos/reclamos?area=' + encodeURIComponent(area), {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                var reclamos = data.body;
                var tableBodyContent = '';

                for (var i = 0; i < reclamos.length; i++) {
                    var reclamo = reclamos[i];
                    var fecha = reclamo.fecha;
                    var descripcion = reclamo.descripcion;
                    var estado = reclamo.estado;
                    var categoria = reclamo.categoria;

                    tableBodyContent += '<tr>';
                    tableBodyContent += '<td>' + (i + 1) + '</td>';
                    tableBodyContent += '<td>' + fecha + '</td>';
                    tableBodyContent += '<td>' + descripcion + '</td>';
                    tableBodyContent += '<td>' + estado + '</td>';
                    tableBodyContent += '<td>' + categoria + '</td>';
                    tableBodyContent += '</tr>';
                }

                tableBody.innerHTML = tableBodyContent;
            })
            .catch(error => console.log(error));
    });
</script>
@endsection
