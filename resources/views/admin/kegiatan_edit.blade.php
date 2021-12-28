@extends('layouts.uikit')

@section('content')
<div class='uk-container uk-container-xsmall'>
<div class='uk-card'>
<a href="/kegiatan" class="uk-button uk-button-default uk-margin">Kembali</a>

<form class="uk-grid-small" method="post" action="/kegiatan/update/{{ $kegiatan->id }}" uk-grid>

    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="uk-width-1-1@s">
        <label>Nama Kegiatan</label>
        <input type="text" name="nama_kegiatan" class="uk-input" placeholder="Nama Kegiatan .." value=" {{ $kegiatan->nama_kegiatan }}">

        @if($errors->has('nama_kegiatan'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('nama_kegiatan')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-2@s">
        <label>Tema</label>
        <input type="text" name="tema" class="uk-input" placeholder="Tema .." value=" {{ $kegiatan->tema }}">

        @if($errors->has('tema'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('tema')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-2@s">
        <label>Tanggal Pelaksanaan</label>
        <input type="date" name="jadwal" class="uk-input" placeholder="Tanggal Pelaksanaan .." value="{{ $kegiatan->jadwal }}">

        @if($errors->has('jadwal'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('jadwal')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-1@s">
        <label>Deskripsi</label>
        <textarea class="uk-textarea" name="deskripsi" rows="3" placeholder="Deskripsi ..">{{ $kegiatan->deskripsi }}</textarea>

        @if($errors->has('deskripsi'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('deskripsi')}}
            </div>
        @endif

    </div>

    <div class="uk-margin">
        <input type="submit" class="uk-button uk-button-primary" value="Simpan">
    </div>

</form>

</div>
</div>
</div>
@endsection