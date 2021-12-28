@extends('layouts.uikit')

@section('content')
<div class='uk-container'>
<div class='uk-card'>  
<div class="uk-card-header uk-card-title">
    <p>Daftar Usaha</p>
</div>
<div class="uk-card-body">
    @if (session('status'))
    <div class="" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <a class="uk-button uk-button-primary" href="/usaha/tambah">Isi record</a>
    <div class="uk-overflow-auto">
    <table class="uk-table uk-table-divider">
        <thead>
            <tr>
                <th>Nama Usaha</th>
                <th>Jenis Usaha</th>
                <th>Alamat</th>
                <th>telp</th>
                <th>Jam Buka</th>
                <th>Foto</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usaha as $p)
            <tr>
                <td>{{ $p->nama_usaha }}</td>
                <td>{{ $p->jenis_usaha }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->telp }}</td>
                <td>{{ $p->jam_operasional }}</td>
                <td><div uk-lightbox><a class="uk-button uk-button-default uk-button-small" href="/data_foto/{{ $p->foto }}">View</a></div></td>
                <td>
                    <a href="/usaha/edit/{{ $p->id }}" class="uk-button uk-button-default uk-button-small">Edit</a>
                    <a href="/usaha/delete/{{ $p->id }}" class="uk-button uk-button-danger uk-button-small">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
    </div>
</div>
</div>
</div>
@endsection
