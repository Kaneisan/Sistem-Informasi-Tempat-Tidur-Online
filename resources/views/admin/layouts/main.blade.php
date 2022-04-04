<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{$tittle}}</title>
    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('js/loader.js')}}"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-purple sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">HANSTECH <br><sup>computer service</sup></div>
            </a>
            <!-- Divider -->
            @can('manage-all')
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            @endcan
            @can('manage-keuangan')
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MANAGE KEUANGAN
            </div>

            <li class="nav-item {{Request::is('penjualan') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('penjualan') }}">
                    <i class="fas fa-cash-register"></i>
                    <span>Penjualan</span></a>
            </li>
            @endcan
            @can('barang')
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MANAGE KEUANGAN
            </div>
            @endcan
            @can('manage-barang')
            <li class="nav-item {{Request::is('pembelian') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('pembelian') }}">
                    <i class="fas fa-dolly-flatbed"></i>
                    <span>Pembelian</span></a>
            </li>
            @endcan
            @can('manage-keuangan')
            <li class="nav-item {{Request::is('pelayanan') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('pelayanan') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Pelayanan</span></a>
            </li>


            <li class="nav-item {{Request::is('laporan') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-money-bill-wave-alt"></i>
                    <span>Laporan Keuangan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item text-light" href="{{ route('laporan') }}">Jual Beli</a>
                        <a class="collapse-item text-light" href="{{route('laporanService')}}">Pelayanan Service</a>
                    </div>
                </div>
            </li>
            @endcan
            @can('manage-barang')
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Manage Barang
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item {{Request::is('barang') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('barang') }}">
                    <i class="fas fa-box-open"></i>
                    <span>Data Barang</span></a>
            </li>
            <li class="nav-item {{Request::is('datarequest') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('datarequest') }}">
                    <i class="fas fa-boxes"></i>
                    <span>Request Teknisi</span></a>
            </li>
            @endcan
            @can('teknisi')
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Pelayanan
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item {{Request::is('request') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('request') }}">
                    <i class="fas fa-file-alt"></i>
                    <span>Form Request</span></a>
            </li>
            <li class="nav-item {{Request::is('request_view') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('request_view') }}">
                    <i class="fas fa-file-alt"></i>
                    <span>Table Request</span></a>
            </li>
            <li class="nav-item {{Request::is('notifikasi') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('notifikasi') }}">
                    <i class="fas fa-comment"></i>
                    <span>Hubungi Pelanggan</span></a>
            </li>
            @endcan
            @can('manage-all')
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Manage User
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item {{Request::is('user') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('user') }}">
                    <i class="fas fa-user"></i>
                    <span>Data User</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            @endcan
            @can('manage-all')
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Manage Kamar
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item {{Request::is('kamar') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('kamar') }}">
                    <i class="fas fa-user"></i>
                    <span>Data Kamar</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            @endcan


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('konten')

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Hanstech Computer Service 2022</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar dari Sistem ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda yakin untuk keluar dari sistem.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/simple-datatables@latest' type="text/javascript"></script>
    <script>
        $(document).on('click', '#btn-edit-user', function() {
            let id_user = $(this).data('id_user');
            let name = $(this).data('name');
            let email = $(this).data('email');
            let password = $(this).data('password');
            let roles = $(this).data('roles');

            $('#edit-id_user').val(id_user);
            $('#edit-name').val(name);
            $('#edit-email').val(email);
            $('#edit-password').val(password);
            $('#edit-roles').val(roles);
        });

        $(document).on('click', '#btn-edit-barang', function() {
            let id_barang = $(this).data('id_barang');
            let name = $(this).data('name');
            let merk = $(this).data('merk');
            let stock = $(this).data('stock');
            let harga_jual = $(this).data('harga_jual');
            let harga_beli = $(this).data('harga_beli');
            let laba = $(this).data('laba');
            let status = $(this).data('status');
            let code = $(this).data('code');

            $('#edit-id_barang').val(id_barang);
            $('#edit-name').val(name);
            $('#edit-merk').val(merk);
            $('#edit-harga_jual').val(harga_jual);
            $('#edit-harga_beli').val(harga_beli);
            $('#edit-laba').val(laba);
            $('#edit-stock').val(stock);
            $('#edit-status').val(stock);
            $('#edit-code').val(code);
        });

        $(document).on('click', '#btn-edit-ongkos', function() {
            let id_pelayanan = $(this).data('id_pelayanan');
            let biaya = $(this).data('biaya');

            $('#edit-id_pelayanan').val(id_pelayanan);
            $('#edit-biaya').val(biaya);
        });
    </script>
    <script>
        let harga = document.getElementById('bayar').value;
        $('#terima').keyup(
            function() {
                let bayar = $('#terima').val();
                let total = parseFloat(bayar) - parseFloat(harga);
                $('#kembali').val(total);
            }
        );
    </script>
    <script>
        const dataTable1 = new simpleDatatables.DataTable("#keuangan");
        $('#detail-laporan').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var tanggal = button.data('tanggal') // Extract info from data-* attributes\
            console.log(tanggal);
            var modal = $(this)
            dataTable1.init({
                searchable: false,
                fixedHeight: false,
            });
            modal.find('.modal-titles').text('Detail Laporan Tanggal ' + tanggal)
            $.ajax({
                url: '/api/laporan/' + tanggal,
                type: 'get',
                success: function(data) {
                    // console.log(data);
                    dataTable1.rows().add(data);
                }
            });
        })
        $('#detail-laporan').on('hidden.bs.modal', function(e) {
            dataTable1.destroy();
        })
    </script>
    <script>
        $(document).ready(function() {

            $('#type').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('pelayanan.fetch') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#typelist').fadeIn();
                            $('#typelist').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function() {
                $('#type').val($(this).text());
                $('#typelist').fadeOut();
            });


        });
    </script>
    <script src="js/custom.js"></script>
    @yield('footer')
</body>

</html>