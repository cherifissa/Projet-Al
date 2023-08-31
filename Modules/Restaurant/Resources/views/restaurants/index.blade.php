@extends('restaurant::layouts.app')
@section('titre')
    Restaurant
@endsection
@section('content')

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @if (session('success'))
                <script type="text/javascript">
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Ajout fait avec succès'
                    })
                </script>
            @endif
            @if (session('successUpdate'))
                <script type="text/javascript">
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Mise à jour faite avec succès'
                    })
                </script>
            @endif
            @if (session('successDelete'))
                <script type="text/javascript">
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Suppression faite avec succès'
                    })
                </script>
            @endif
            @php
                $cart = Session::get('cart', []);
            @endphp
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                    <p>Bounce Rate</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Liste des Produits</h3>
                                </div><!-- /.card-header -->
                            </div>
                            <table class="table table-bordered ">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Ajouter</th>
                                        <th scope="col">Retirer</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produits as $produit)
                                        <tr class="">

                                            <td><img src="/images/{{ $produit->image }}" alt="img" width="120px">
                                            </td>
                                            <td>{{ $produit->nom }}</td>
                                            <td>{{ $produit->prix }}</td>
                                            <td style="width: auto;">

                                                <form action="{{ route('cartadd') }}" method="post">
                                                    @csrf
                                                    <div class="row" style="width: auto;">
                                                        <div class="col-md-4">
                                                            <input type="number" min="0" name="quantite"
                                                                class="form-control form-control-sm">
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $produit->id }}">
                                                            <input type="hidden" name="product_price"
                                                                value="{{ $produit->prix }}">
                                                        </div>
                                                        <div class="col">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center ">
                                                    <div class="row">
                                                        <div class="col-md-4 ml-2">
                                                            <form action="{{ route('cartremove') }}" method="post">
                                                                @csrf <!-- Include this CSRF token for security -->
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $produit->id }}">
                                                                <button type="submit" class="btn btn-warning  cancel">
                                                                    <i class="fas fa-times-circle"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Liste des produits en commande</h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>id produit</th>
                                                <th>Quantitér</th>
                                                <th>Prix</th>
                                                <th>Prix total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($cart as $product_id => $item)
                                                <tr>
                                                    <td>{{ $product_id }}</td>
                                                    <td>{{ $item['quantity'] }}</td>
                                                    <td>{{ $item['price'] }}</td>
                                                    <td>{{ $item['quantity'] * $item['price'] }}</td>
                                                    <!-- Display the calculated total price -->
                                                    @php
                                                        $total += $item['quantity'] * $item['price'];
                                                    @endphp
                                                </tr>
                                            @endforeach

                                            <form action="{{ route('removeAllCart') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger mb-2">
                                                    <i class="fas fa-times-circle">Vider</i>
                                                </button>
                                            </form>

                                            <form action="{{ route('servicesresto.create') }}" method="post">
                                                @csrf
                                                @method('GET')
                                                <input type="hidden" name="cart" value="{{ $total }}">
                                                <button type="submit" class="btn btn-warning ml-3 mb-2">
                                                    <i class="fas fa-times-pay">Proceder au payement</i>
                                                </button>
                                            </form>

                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="../../plugins/jszip/jszip.min.js"></script>
        <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
        <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
        <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <!-- Page specific script -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": true,
                    "buttons": ["excel", "pdf", "print", ]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "lengthChange": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                });
            });
        </script>
    </body>
@endsection
