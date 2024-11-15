<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit - Pengiriman</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      
        @include('layout.navbar')
        @include('layout.sidenavbar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Pengiriman</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Pengiriman</li>
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
            
                            <form action="{{ route('pengiriman.update', $pengiriman->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="nama_pengirim"><strong>Nama Pengirim:</strong></label>
                                    <input type="text" name="nama_pengirim" class="form-control @error('nama_pengirim') is-invalid @enderror" value="{{old('nama_pengirim',$pengiriman->nama_pengirim)}}"  required>
                                    <!-- pesan error untuk nama pengirim -->
                                    @error('nama_pengirim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
            
                                <div class="form-group mb-3">
                                    <label for="tgl_pengiriman"><strong>Tanggal Pengiriman:</strong></label>
                                    <input type="date" name="tgl_pengiriman" class="form-control @error('tgl_pengirim') is-invalid @enderror" value="{{old('tgl_pengiriman',$pengiriman->tgl_pengiriman)}}"  required>
                                    <!-- pesan error untuk nama tanggal pengiriman -->
                                    @error('tgl_pengiriman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="driver"><strong>Driver:</strong></label>
                                    <input type="text" name="driver" class="form-control @error('driver') is-invalid @enderror" value="{{old('driver',$pengiriman->driver)}}"  required>
                                    <!-- pesan error untuk nama driver -->
                                    @error('driver')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_pesanan"><strong>No Pesanan:</strong></label>
                                    <input type="text" name="no_pesanan" class="form-control @error('no_pesanan') is-invalid @enderror" value="{{old('no_pesanan',$pengiriman->no_pesanan)}}"  required>
                                    <!-- pesan error untuk no pengiriman -->
                                    @error('no_pesanan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nama_penerima"><strong>Nama Penerima:</strong></label>
                                    <input type="text" name="nama_penerima" class="form-control @error('nama_penerima') is-invalid @enderror" value="{{old('nama_penerima',$pengiriman->nama_penerima)}}"  required>
                                    <!-- pesan error untuk nama penerima -->
                                    @error('nama_penerima')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="barang"><strong>Barang:</strong></label>
                                    <input type="text" name="barang" class="form-control @error('barang') is-invalid @enderror" value="{{old('barang',$pengiriman->barang)}}"  required>
                                    <!-- pesan error untuk barang -->
                                    @error('barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-md btn-primary mr-2">
                                    <i class="fa-solid fa-floppy-disk"></i> Simpan
                                </button>
                                <a href="{{ route('pengiriman') }}" class="btn btn-md btn-secondary">
                                    Back</a>
                            </form>
                            </div>


                        </div>
                        
                    </div>
                </main>
               @include('layout.footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url("js/scripts.js")}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
