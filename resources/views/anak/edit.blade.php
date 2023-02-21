@extends('layouts.app')
@section('content')
{{-- <link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> --}}

<body>
    <div class="container">
        @if (session('Sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('Sukses') }}
        </div>
        @endif
        <h1 class="py-3">Edit Data Anak</h1>
        <div class="row">
            <form method="post" action="/anak/{{ $anak->id }}/update">
                @csrf
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Nama" value="{{ $anak->nama }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Jenis Kelamin (L/P)</label>
                    <input name="jenis_kelamin" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="L/P" value="{{ $anak->jenis_kelamin }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">NIK</label>
                    <input name="nik" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Nomor Induk Keluarga" value="{{ $anak->nik }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Usia</label>
                    <input name="usia" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Usia" value="{{ $anak->usia }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input name="tgl_lahir" type="date" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Tanggal Lahir" value="{{ $anak->tgl_lahir }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <input name="alamat" type="text" class="form-control mt-2" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat" value= "{{ $anak->alamat }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Kelurahan</label>
                    <input name="kelurahan" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Kelurahan" value="{{ $anak->kelurahan }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Kecamatan</label>
                    <input name="kecamatan" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Kecamatan" value="{{ $anak->kecamatan }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Pedusunan</label>
                    <input name="pedusunan" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Pedusunan" value="{{ $anak->pedusunan }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Tinggi (cm)</label>
                    <input name="tinggi" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Tinggi" value="{{ $anak->tinggi }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Berat Badan (kg)</label>
                    <input name="berat" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Berat Badan" value="{{ $anak->berat }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Lingkar Kepala (cm)</label>
                    <input name="lingkar_kepala" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Lingkar Kepala" value="{{ $anak->lingkar_kepala }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Tgl Pemeriksaan</label>
                    <input name="tanggal" type="date" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Tanggal Pemeriksaan" value="{{ $anak->tanggal }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Ket Lingkar Kepala</label>
                    <input name="ket" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="ket" value="{{ $anak->ket }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Ket Tinggi Badan</label>
                    <input name="ket_tb" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="ket_tb" value="{{ $anak->ket_tb }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Ket Berat Badan</label>
                    <input name="ket_bb" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="ket_bb" value="{{ $anak->ket_bb }}">
                </div>
                <div class="form-group mt-5">
                    <button type="submit" class="btn btnprimary">Update</button>
                    <a href="/anak" class="btn btn-danger mx3">Cancel</a>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-
q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-
ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-
beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" cross origin="anonymous">
        </script>
</body>
@endsection