<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Create - Admin</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
        @include('layout.navbar')
        @include('layout.sidenavbar')

        <div id="layoutSidenav_content">
            <main class="container-fluid px-4">
                <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                    <h1>Tambah Pengiriman</h1>
                    
                </div>
                
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Tambah Pengiriman</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Error!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                       

                        <form action="{{ route('pengiriman.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_pengirim"><strong>Nama Pengirim:</strong></label>
                                <input type="text" name="nama_pengirim" class="form-control" placeholder="Nama Pengirim" id="nama_pengirim">
                            </div>
                            <div class="form-group">
                                <label for="tgl_pengiriman"><strong>Tanggal Pengiriman:</strong></label>
                                <input type="date" name="tgl_pengiriman" class="form-control" placeholder="Tanggal Pengiriman" id="tgl_pengiriman">
                            </div>
                            <div class="form-group">
                                <label for="driver"><strong>Driver:</strong></label>
                                <input type="text" name="driver" class="form-control" placeholder="Driver" id="driver">
                            </div>
                            <div class="form-group">
                                <label for="no_pesanan"><strong>No Pesanan:</strong></label>
                                <input type="text" name="no_pesanan" class="form-control" placeholder="No Pesanan" id="no_pesanan">
                            </div>
                            <div class="form-group">
                                <label for="nama_penerima"><strong>Nama Penerima:</strong></label>
                                <input type="text" name="nama_penerima" class="form-control" placeholder="Nama Penerima" id="nama_penerima">
                            </div>
                            <div class="form-group">
                                <label for="barang"><strong>Barang:</strong></label>
                                <input type="text" name="barang" class="form-control" placeholder="Barang" id="barang">
                            </div>

                           

                           
                            <button type="submit" class="btn btn-md btn-primary mr-2">
                               Submit
                            </button>
                            <a class="btn btn-secondary" href="{{ route('pengiriman') }}">Back</a>
                        </form>
                    </div>
                </div>
            </main>
            @include('layout.footer')
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
                crossorigin="anonymous"></script>
    </body>
</html>
