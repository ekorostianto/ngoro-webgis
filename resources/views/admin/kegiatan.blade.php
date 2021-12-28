@extends('layouts.uikit')

@section('content')
<div class='uk-container'>
<div class='uk-card'>  
<div class="uk-card-header uk-card-title">
    <p>Daftar Kegiatan</p>
</div>
<div class="uk-card-body">
    @if (session('status'))
    <div class="" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <a class="uk-button uk-button-primary" href="/kegiatan/tambah">Isi kegiatan</a>
    <div class="uk-overflow-auto">
    <table class="uk-table uk-table-divider">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Tema</th>
                <th>Tanggal Pelaksanaan</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kegiatan as $p)
            <tr>
                <td>{{ $p->nama_kegiatan }}</td>                
                <td>{{ $p->tema }}</td>
                <td>{{ $p->jadwal }}</td>                
                <td>
                    <a href="/kegiatan/edit/{{ $p->id }}" class="uk-button uk-button-default uk-button-small">Edit</a>
                    <a href="/kegiatan/delete/{{ $p->id }}" class="uk-button uk-button-danger uk-button-small">Delete</a>
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
