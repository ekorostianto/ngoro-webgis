@extends('layouts.uikit')

@section('content')
<div class='uk-container uk-container-xsmall'>
<div class='uk-card'>
<a href="/usaha" class="uk-button uk-button-default uk-margin">Kembali</a>
<form class="uk-grid-small" method="post" action="/usaha/store" enctype="multipart/form-data" uk-grid>

    {{ csrf_field() }}

    <div class="uk-width-2-3@s">
        <label>Nama Usaha</label>
        <input type="text" name="nama_usaha" class="uk-input" placeholder="Nama usaha ..">

        @if($errors->has('nama_usaha'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('nama_usaha')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-3@s">
        <label>Jenis Usaha</label>
        <input type="text" name="jenis_usaha" class="uk-input" placeholder="Jenis usaha ..">

        @if($errors->has('jenis_usaha'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('jenis_usaha')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-1">
        <label>Alamat</label>
        <textarea name="alamat" class="uk-input" placeholder="Alamat usaha .."></textarea>

            @if($errors->has('alamat'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('alamat')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-2@s">
        <label>Latitude</label>
        <input type="text" name="ltg" class="uk-input" placeholder="latitude ..">

        @if($errors->has('ltg'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('ltg')}}
            </div>
        @endif

    </div>
    <div class="uk-width-1-2@s">
        <label>Longitude</label>
        <input type="text" name="bjr" class="uk-input" placeholder="longitude ..">

        @if($errors->has('bjr'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('bjr')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-2@s">
        <label>No telp</label>
        <input type="text" name="telp" class="uk-input" placeholder="No telp ..">

        @if($errors->has('telp'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('telp')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-2@s">
        <label>Jam Operasional</label>
        <input type="text" name="jam_operasional" class="uk-input" placeholder="Jam operasional ..">

        @if($errors->has('jam_operasional'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('jam_operasional')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-1">
        <label>Deskripsi</label>
        <textarea class="uk-textarea" name="deskripsi" rows="3" placeholder="Deskripsi usaha.."></textarea>

        @if($errors->has('deskripsi'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('deskripsi')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-1 uk-margin" uk-margin>
    <div uk-form-custom="target: true">
        <input type="file" name="foto">
        @if($errors->has('foto'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('foto')}}
            </div>
        @endif
        <input class="uk-input uk-form-width-medium" type="text" placeholder="Upload foto" disabled>
    </div>

    <div class="uk-margin">
        <input type="submit" class="uk-button uk-button-primary" value="Simpan">
    </div>

</form>

</div>
</div>
</div>
@endsection