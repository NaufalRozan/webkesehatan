@extends('layouts.app')
@include('layouts.sidebar')
@section('content')
<html>

<head>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    {{-- pemberitahuan jika data tidak ditemukan --}}

    @if ($data_anak->count() > 0)
    @else
    <center>
        <div class="alert alert-warning" role="alert">
            <h5>Tidak ditemukan data yang sesuai dengan kata kunci!!</h5>

    </center>
    @endif
    </div>
    <div class="container mt-3">
        @if (session('Sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('Sukses') }}
        </div>
        @endif
        <div class="row">
            <div class="col-4 my-3">
                <h1>Data Anak</h1>
            </div>
            {{-- form search data --}}
            <div class="col-5 my-4">
                @csrf
                <form class="d-flex" action="/anak/cari" method="GET">
                    <input class="form-control me-2" type="text" name="cari" placeholder="Cari data anak" value="{{ old('cari') }}">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
            </div>
            <!-- buat filter -->
            <!-- <form action="/" method="get">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="" class="form-label">
                            Kelurahan
                        </label>
                        <select name="kelurahan" class="form-label">
                            @foreach($data_anak as $anak)
                            <option value="{{$anak->id}}">{{$anak->kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form> -->
            <!-- <div class="row">
                <div class="col-md-4">
                    <label>Kelurahan</label>
                    <select name="" id="filter-kelurahan" class="form-control">
                        <option value="">Pilih Kelurahan</option>
                        @foreach($data_anak as $anak)
                        <option value="{{$anak->id}}">{{$anak->kelurahan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Kecamatan</label>
                    <select name="" id="filter-kecamatan" class="form-control">
                        <option value="">Pilih Kecamatan</option>
                        @foreach($data_anak as $anak)
                        <option value="{{$anak->id}}">{{$anak->kecamatan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Pedusunan</label>
                    <select name="" id="filter-kecamatan" class="form-control">
                        <option value="">Pilih Kecamatan</option>
                        @foreach($data_anak as $anak)
                        <option value="{{$anak->id}}">{{$anak->kecamatan}}</option>
                        @endforeach
                    </select>
                </div>
            </div> -->
            <div class="col-3 my-4" allign="right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm
float-right" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </button>
            </div>



            <div class="table-responsive">
                <table class="table table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>NIK</th>
                            <th>Usia</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Kelurahan</th>
                            <th>Kecamatan</th>
                            <th>Pedusunan</th>
                            <th>Tinggi (cm)</th>
                            <th>Berat Badan (kg)</th>
                            <th>Lingkar Kepala (cm)</th>
                            <th>Tgl Pemeriksaan</th>
                            <th>Ket Lingkar Kepala</th>
                            <th>Ket Tinggi Badan</th>
                            <th>Ket Berat Badan</th>
                        </tr>
                    </thead>
                    @foreach ($data_anak as $anak)
                    <tbody>
                        <tr>
                            <td>{{ $anak->nama }}</td>
                            <td>{{ $anak->jenis_kelamin }}</td>
                            <td>{{ $anak->nik }}</td>
                            <td>{{ $anak->usia }}</td>
                            <td>{{ $anak->tgl_lahir }}</td>
                            <td>{{ $anak->alamat }}</td>
                            <td>{{ $anak->kelurahan }}</td>
                            <td>{{ $anak->kecamatan }}</td>
                            <td>{{ $anak->pedusunan }}</td>
                            <td>{{ $anak->tinggi }}</td>
                            <td>{{ $anak->berat }}</td>
                            <td>{{ $anak->lingkar_kepala }}</td>
                            <td>{{ $anak->tanggal }}</td>
                            <td>{{ $anak->ket }}</td>
                            <td>{{ $anak->ket_tb }}</td>
                            <td>{{ $anak->ket_bb }}</td>
                            <td><a href="/anak/{{$anak->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                            <td><a href="/anak/delete/{{$anak->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Delete</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col-3 my-4" allign="right">
                Current Page: {{ $data_anak->currentPage() }}<br>
                Jumlah Data: {{ $data_anak->total() }}<br>
                Data perhalaman: {{ $data_anak->perPage() }}<br>
                <br>
                {{ $data_anak->links() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" arialabelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Anak</h5>
                    <button type="button" class="close" datadismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.anak') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nama</label>
                            <input name="nama" class="form-control" id="exampleFormControlTextarea1" rows="1"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Jenis Kelamin (L/P)</label>
                            <input name="jenis_kelamin" class="form-control" id="jenis_kelamin" rows="2"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">NIK</label>
                            <input name="nik" class="form-control" id="exampleFormControlTextarea1" rows="3"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Usia</label>
                            <input name="usia" class="form-control" id="exampleFormControlTextarea1" rows="4"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" id="exampleFormControlTextarea1" rows="5"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Kelurahan</label>
                            <input name="kelurahan" class="form-control" id="exampleFormControlTextarea1" rows="7"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Kecamatan</label>
                            <input name="kecamatan" class="form-control" id="exampleFormControlTextarea1" rows="8"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Pedusunan</label>
                            <input name="pedusunan" class="form-control" id="exampleFormControlTextarea1" rows="9"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tinggi</label>
                            <input name="tinggi" class="form-control" id="exampleFormControlTextarea1" rows="10"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Berat Badan</label>
                            <input name="berat" class="form-control" id="exampleFormControlTextarea1" rows="11"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Lingkar Kepala</label>
                            <input name="lingkar_kepala" class="form-control" id="exampleFormControlTextarea1" rows="12"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tgl Pemeriksaan</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleFormControlTextarea1" rows="13"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ket Lingkar Kepala</label>
                            <input name="ket" class="form-control" id="exampleFormControlTextarea1" rows="14"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ket Tinggi Badan</label>
                            <input name="ket_tb" class="form-control" id="exampleFormControlTextarea1" rows="15"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ket Berat Badan</label>
                            <input name="ket_bb" class="form-control" id="exampleFormControlTextarea1" rows="16"></input>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btnprimary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>