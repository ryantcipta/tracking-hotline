<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengiriman</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    @include('layout.navbar')
    @include('layout.sidenavbar')

    <div id="layoutSidenav_content">
        <main>
              <div class="container-fluid px-4">
                  <h1 class="mt-4">Halaman Pengiriman</h1>
                       <ol class="breadcrumb mb-4">
                              <li class="breadcrumb-item active">Halaman Pengiriman</li>
                      </ol>
                      
              <div class="card mb-4">
                  <div class="card-header">
                      <i class="fas fa-table me-1"></i>
                      Data Pengiriman
                  </div>
                  <div class="card-body">
                      {{-- notifikasi form validasi --}}
                          @if ($errors->has('file'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('file') }}</strong>
                          </span>
                          @endif
                  
                          {{-- notifikasi sukses --}}
                          @if ($sukses = Session::get('sukses'))
                          <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{{ $sukses }}</strong>
                          </div>
                          @endif

                          {{-- notifikasi sukses form create pengriman --}}
                          @if (session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                              <button type="button" class="close" data-dismiss="alert">×</button>
                          </div>
                        @endif

                         {{-- notifikasi sukses form delete pengriman --}}
                         @if (session('message'))
                         <div class="alert alert-success">
                             {{ session('message') }}
                             <button type="button" class="close" data-dismiss="alert">×</button>
                         </div>
                       @endif
                  
                          <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#importExcel">
                             <i class="fa-solid fa-plus"></i> Import Excel
                          </button>
                  
                          <!-- Import Excel -->
                          <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <form method="post" action="/pengiriman/import_excel" enctype="multipart/form-data">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                          </div>
                                          <div class="modal-body">
                  
                                              {{ csrf_field() }}
                  
                                              <label>Pilih file excel</label>
                                              <div class="form-group">
                                                  <input type="file" name="file" required="required">
                                              </div>
                  
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Import</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                            </div>
                            {{-- <a href="/order/export_excel" class="btn btn-success mr-2" target="_blank">EXPORT EXCEL</a> --}}
                            <a href="{{route('pengiriman.create')}}" class="btn btn-success my-3">Tambah</a>
                      
                      
                      <table id="datatablesSimple">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Pesanan</th>
                                  <th>Driver</th>
                                  <th>Tanggal Pengiriman</th>
                                  <th>Nama Pengirim</th>
                                  <th>Nama Penerima</th>
                                  <th>Barang</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php $i=1 @endphp
                              @foreach($pengiriman as $p)
                              <tr>
                                  <td> {{$i++}}</td>
                                  <td>{{$p->no_pesanan}}</td>
                                  <td>{{$p->driver}}</td>
                                  <td>{{$p->tgl_pengiriman}}</td>
                                  <td>{{$p->nama_pengirim}}</td>
                                  <td>{{$p->nama_penerima}}</td>
                                  <td>{{$p->barang}}</td>
                                  <td>{{$p->status}}</td>
                                  <td>
                                    <!-- Aksi Edit -->
                                    <a href="{{ route('pengiriman.edit', $p->id) }}">
                                        <i class="fa fa-pen-to-square" title="Edit"></i>
                                    </a>
                    
                                    <!-- Aksi Delete -->
                                    <form action="{{ route('pengiriman.destroy', $p->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border:none; background:none;">
                                            <i class="fa fa-trash" title="Delete" style="color:red;"></i>
                                        </button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </main>
              @include('layout.footer')
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>