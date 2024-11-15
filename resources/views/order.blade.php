<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Order</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <link href="{{url("css/new.css")}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       @include('layout.navbar')
        @include('layout.sidenavbar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Order</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Order
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
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $sukses }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif

							
									<div class="d-flex align-items-center my-3">
                                        <button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#importExcel">
                                            <i class="fa-solid fa-file-import"></i> Import Excel
                                        </button>
                                    
                                        <form action="{{ route('delete.all') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-3"><i class="fa fa-trash" title="Delete"></i> Hapus Semua Data</button>
                                        </form>
                                    </div>

                                 
							
									<!-- Import Excel -->
									<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<form method="post" action="/order/import_excel" enctype="multipart/form-data">
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
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
														<button type="submit" class="btn btn-primary">Import</button>
													</div>
												</div>
											</form>
										</div>
									</div>
                                {{-- <a href="/order/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> --}}
                               

                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No POP Hotline</th>
                                            <th>Tgl Order</th>
											<th>No PO MD</th>
                                            <th>Tgl Proses MD</th>
                                            <th>CM</th>
                                            <th>Nama Dealer</th>
                                            <th>Nama Konsumen</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Type Motor</th>
                                            <th>Tahun</th>
                                            <th>No Rangka</th>
                                            <th>No Mesin</th>
                                            <th>No PO AHM</th>
                                            <th>Tgl Order ke AHM</th>
                                            <th>Part No</th>
                                            <th>Description</th>
                                            <th>QTY</th>
                                            <th>ETD AHM</th>
                                            <th>PS AHM</th>
                                            <th>TGL Supply AHM</th>
                                            <th> TGL GI / supply MD</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach($order as $o)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$o->no_pop_hotline}}</td>
                                            <td>{{$o->tgl_order}}</td>
											<td>{{$o->no_po_md}}</td>
                                            <td>{{$o->tgl_proses_md}}</td>
                                            <td>{{$o->cm}}</td>
                                            <td>{{$o->nama_dealer}}</td>
                                            <td>{{$o->nama_konsumen}}</td>
                                            <td>{{$o->alamat}}</td>
                                            <td>{{$o->no_hp}}</td>
                                            <td>{{$o->type_motor}}</td>
                                            <td>{{$o->tahun}}</td>
                                            <td>{{$o->no_rangka}}</td>
                                            <td>{{$o->no_mesin}}</td>
                                            <td>{{$o->no_po_ahm}}</td>
                                            <td>{{$o->tgl_order_ke_ahm}}</td>
                                            <td>{{$o->part_no}}</td>
                                            <td>{{$o->description}}</td>
                                            <td>{{$o->qty}}</td>
                                            <td>{{$o->etd_ahm}}</td>
                                            <td>{{$o->ps_ahm}}</td>
                                            <td>{{$o->tgl_supply_ahm}}</td>
                                            <td>{{$o->tgl_gi_supply_md}}</td> 
                                            <td>
                                                   <!-- Aksi Edit -->
                                                    <a href="{{route('order.edit',$o->id)}}">
                                                        <i class="fa fa-pen-to-square" title="Edit"></i>
                                                    </a>
                    
                                                    <!-- Aksi Delete -->
                                                    <form action="{{ route('order.destroy', $o->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="border:none; background:none;" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                                            <i class="fa fa-trash" title="Delete" style="color:red;"></i>
                                                        </button>
                                                      
                                                    </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $order->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
               @include('layout.footer')
            </div>
        </div>
        
        <script>
            $(document).ready(function() {
                $('#datatablesSimple').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('orders.data') }}',
                    columns: [
                        { data: 'no_pop_hotline', name: 'no_pop_hotline' },
                        { data: 'tgl_order', name: 'tgl_order' },
                        { data: 'no_po_md', name: 'no_po_md' },
                        { data: 'tgl_proses_md', name: 'tgl_proses_md' },
                        { data: 'nama_dealer', name: 'nama_dealer' },
                        { data: 'nama_konsemen', name: 'nama_konsemen' },
                        { data: 'alamat', name: 'alamat' },
                        { data: 'no_hp', name: 'no_hp' },
                        { data: 'type_motor', name: 'type_motor' },
                        { data: 'tahun', name: 'tahun' },
                        { data: 'no_rangka', name: 'no_rangka' },
                        { data: 'no_mesin', name: 'no_mesin' },
                        { data: 'no_po_ahm', name: 'no_po_ahm' },
                        { data: 'tgl_order_ke_ahm', name: 'tgl_order_ke_ahm' },
                        { data: 'part_no', name: 'part_no' },
                        { data: 'description', name: 'description' },
                    ]
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url("js/scripts.js")}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
