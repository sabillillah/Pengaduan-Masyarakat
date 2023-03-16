@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        background: #6a70fc;
    }

    .btn-purple {
        background: #6a70fc;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-purple:hover {
        background: #6a70fc;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-facebook {
        background: #3b66c4;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-facebook:hover {
        background: #3b66c4;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-google {
        background: #cf4332;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-google:hover {
        background: #cf4332;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

</style>
@endsection

@section('title', 'Halaman Daftar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <P class="text-center text-white mb-5">Pengaduan Masyarakat</P>
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center mb-4">FORM DAFTAR</h2>
                    <form action="{{ route('pekat.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="number" value="{{ old('nik') }}" name="nik" placeholder="NIK" class="form-control @error('nik') is-invalid @enderror">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ old('nama') }}" name="nama" placeholder="Nama Lengkap" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" value="{{ old('email') }}" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="provinsi">Provinsi Sesuai Tempat Tinggal</label>
                           <select class="form-control" name="province" placeholder="Provinsi" id="province">
                           <option>Pilih Provinsi</option>
                               @foreach($dataProvince as $item)
                            <option value="{{$item->id}}">{{ $item->name }}</option>
                            @endforeach
                           </select>
                            
                        </div>
                        <div class="form-group">
                        <label for="regencies">Kota/Kabupaten Sesuai Tempat Tinggal</label>
                           <select class="form-control" name="Regency" placeholder="Kota/Kabupaten" id="Regency">
                           <!-- <option value="">Pilih Kota/Kabupaten</option> -->
                           </select>
                        </div>

                        <div class="form-group">
                        <label for="districts">Kecamatan Sesuai Tempat Tinggal</label>
                           <select class="form-control" name="District" placeholder="Kecamatan" id="kecamatan">
                           <!-- <option>Pilih Kecamatan</option> -->
                           </select>
                            
                        </div>

                        <div class="form-group">
                        <label for="villages">Desa/Kelurahan Sesuai Tempat Tinggal</label>
                           <select class="form-control" name="Village" placeholder="Desa/Kelurahan" id="kelurahan">
                           <!-- <option>Pilih Desa/Kelurahan</option> -->
                           </select>
                            
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ old('username') }}" name="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" value="{{ old('telp') }}" name="telp" placeholder="No. Telp" class="form-control @error('telp') is-invalid @enderror">
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-purple">DAFTAR</button>
                    </form>
                    <div class="text-center">
                        <!-- <p class="my-3 text-secondary">Gunakan Akun Media Sosial Anda</p> -->
                    </div>
                    <!-- <a href="{{ route('pekat.auth', 'facebook') }}" class="btn btn-facebook mb-2"><i class="fa fa-facebook" style="font-size:14px"></i> FACEBOOK</a>
                    <a href="{{ route('pekat.auth', 'google') }}" class="btn btn-google"><i class="fa fa-google" style="font-size:14px"></i> GOOGLE</a> -->
                </div>
            </div>
            @if (Session::has('pesan'))
                <div class="alert alert-danger my-2">
                    {{ Session::get('pesan') }}
                </div>
            @endif
            <a href="{{ route('pekat.index') }}" class="btn btn-warning text-white mt-3" style="width: 100%; font-weight: 600">Kembali ke Halaman Utama</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous">
    </script>
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#province').on('click', function() {
            let id_provinsi = $(this).val();
            // console.log(id_provinsi);

                $.ajax({
                    type : 'POST',
                    url : "{{ route('pekat.countryGet') }}",
                    data : {id_provinsi:id_provinsi, _token: $('meta[name="csrf-token"]').attr('content')  },
                    cache : false,

                    success: function(message){
                        // console.log(message);
                        $.each(message, function (id_regency, name) {
                            // console.log(name.id);
                            $('#Regency').append(new Option(name.name, name.id))
                            // $('#Regency').html(name);
                        })
                        // console.log($('#Regency').html(message.name));
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data){
                        console.log('error:',data);
                    }
                });
            })

            $('#Regency').on('click', function() {
                let id_regency = $(this).val();

                console.log(id_regency);
                
                $.ajax({
                    type : 'POST',
                    url : "{{ route('pekat.Getkecamatan') }}",
                    data : {id_regency:id_regency, _token: $('meta[name="csrf-token"]').attr('content')  },
                    cache : false,

                    success: function(message){
                        console.log(message);
                        $.each(message, function (id, name) {
                            console.log(name.id);
                            $('#kecamatan').append(new Option(name.name, name.id))
                        })
                        // $('#kecamatan').html(message);
                        // $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data){
                        console.log('error:',data);
                    },
                })
            })

            $('#kecamatan').on('click', function() {
                let id_kecamatan = $(this).val();

                
                $.ajax({
                    type : 'POST',
                    url : "{{ route('pekat.Getkelurahan') }}",
                    data : {id_kecamatan:id_kecamatan, _token: $('meta[name="csrf-token"]').attr('content')},
                    cache : false,

                    success: function(message){
                        console.log(message);
                        $.each(message, function (id, name) {
                            console.log(name);
                            $('#kelurahan').append(new Option(name.name))
                        })
                        // $('#kecamatan').html(message);
                        // $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data){
                        console.log('error:',data);
                    },
                })
            })
</script>


@endsection
