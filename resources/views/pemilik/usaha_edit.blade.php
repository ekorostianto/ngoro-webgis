@extends('layouts.uikit')

@section('content')
<div class='uk-container uk-container-xsmall'>
<div class='uk-card'>
<a href="/usaha" class="uk-button uk-button-default uk-margin">Kembali</a>

<form class="uk-grid-small" method="post" action="/usaha/update/{{ $daftar_usaha->id }}" uk-grid>

    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="uk-width-2-3@s">
        <label>Nama Usaha</label>
        <input type="text" name="nama_usaha" class="uk-input" placeholder="Nama usaha .." value=" {{ $daftar_usaha->nama_usaha }}">

        @if($errors->has('nama_usaha'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('nama_usaha')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-3@s">
        <label>Jenis Usaha</label>
        <input type="text" name="jenis_usaha" class="uk-input" placeholder="Jenis usaha .." value=" {{ $daftar_usaha->jenis_usaha }}">

        @if($errors->has('jenis_usaha'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('jenis_usaha')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-1">
        <label>Alamat</label>
        <textarea name="alamat" class="uk-input" rows="3" placeholder="Alamat usaha ..">{{ $daftar_usaha->alamat }}</textarea>

            @if($errors->has('alamat'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('alamat')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-2@s">
        <label>Latitude</label>
        <input type="text" name="ltg" class="uk-input" placeholder="latitude .." value=" {{ $daftar_usaha->ltg }}">

        @if($errors->has('ltg'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('ltg')}}
            </div>
        @endif

    </div>
    <div class="uk-width-1-2@s">
        <label>Longitude</label>
        <input type="text" name="bjr" class="uk-input" placeholder="longitude .." value=" {{ $daftar_usaha->bjr }}">

        @if($errors->has('bjr'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('bjr')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-2@s">
        <label>No telp</label>
        <input type="text" name="telp" class="uk-input" placeholder="No telp .." value=" {{ $daftar_usaha->telp }}">

        @if($errors->has('telp'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('telp')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-2@s">
        <label>Jam Operasional</label>
        <input type="text" name="jam_operasional" class="uk-input" placeholder="Jam operasional .." value=" {{ $daftar_usaha->jam_operasional }}">

        @if($errors->has('jam_operasional'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('jam_operasional')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-1@s">
        <label>Deskripsi</label>
        <textarea class="uk-textarea" name="deskripsi" rows="3" placeholder="Deskripsi ..">{{ $daftar_usaha->deskripsi }}</textarea>

        @if($errors->has('deskripsi'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('deskripsi')}}
            </div>
        @endif

    </div>
    
    <div class="uk-width-1-1 uk-margin" uk-margin>
    <label class="uk-margin">Foto</label>
    <div uk-lightbox>
    <a class="uk-button uk-button-default" href="/data_foto/{{ $daftar_usaha->foto }}">View</a>
    </div>
    </div>            
    <div class="uk-margin">
        <input type="submit" class="uk-button uk-button-primary" value="Simpan">
    </div>

</form>

</div>
</div>
</div>
@endsection