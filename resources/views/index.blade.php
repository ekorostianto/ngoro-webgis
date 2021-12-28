<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ngoro</title>

    <link href="{{ asset('/css/uikit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/uikit.min.js') }}" type="text/javascript"></script>
</head>
<body>
@include('layouts.components.navbar')    
    <header class="bg-header uk-light uk-position-relative">
        <div id="particles-js"></div>
        <div class='uk-section uk-section-xlarge uk-position-z-index'>
            <div class='uk-container uk-container-xsmall'>
                <div class="uk-card uk-height-medium">
                    <div class='aa_txt'>            
                        <span class='aa_title'>
                        Site</span><span class='aa_hh'>of</span><br/><span class='aa_title'>Ngoro
                        </span>
                        <br/>
                    <span class='aa_desc'>Memajukan desa dengan sistem informasi geografis yang terintegrasi dari berbagai kalangan.</span>
                    </div>
                    <div class="uk-flex uk-flex-center uk-margin">
                        <a class="uk-button uk-button-default" href="#c1" uk-scroll="">More</a>
                    </div>
                </div>  
            </div>                       
        </div>
        </div>
    </header>
    <section class="uk-section uk-section-secondary uk-dark">
    <div class="uk-container">
    <div class='uk-card uk-child-width-1-5@s uk-grid uk-grid-collapse uk-flex-middle' uk-grid=''>
        <div class='uk-card-body uk-width-3-5@s'>
            <div class="uk-grid-margin uk-grid uk-grid-stack">
                <div class="uk-width-1-1@m uk-first-column">                        
                <h2 class='uk-heading-bullet'>Tentang</h2>
                </div>
            </div>                
            <p>Ngoro adalah sebuah kecamatan di Kabupaten Jombang, Jawa Timur, Indonesia. Terletak di bagian selatan Kabupaten Jombang, berbatasan pula dengan wilayah Kabupaten Kediri. Ngoro merupakan persimpangan jalur dari Jombang menuju Malang dan Kediri.</p>
            <div class="uk-grid uk-flex uk-child-width-1-2@s">
            <div class="uk-margin">
                <p>Provinsi: Jawa Timur</p>
                <p>Desa/kelurahan: 13</p>
            </div>
            <div class="uk-flex-last@s">
                <p>Kepadatan: 1.315 jiwa/km²</span>
                <p>Luas: 49,86 km²</p>
            </div>
            </div>
        </div>
        <div class='uk-flex-last@s uk-card-media-left uk-cover-container uk-width-2-5@s'>
            <div class="uk-inline" uk-lightbox>
                <a href="https://www.youtube.com/watch?v=aCl35h3rbGg" class="uk-position-center uk-position-z-index" uk-icon="icon: play; ratio: 3;" data-caption="Trailer"></a>
                <img alt='' src="{{ asset('/img/terasering.jpg') }}" uk-cover='' class="a-video"></a>
                <canvas height='480' width='800'></canvas>
            </div>
        </div>               
    </div>
    </section>
    <section class="uk-section uk-section-muted uk-dark">
    <div class="uk-container">
    <h2 id="c1" class="uk-text-center">Informasi</h2>
    <hr class="uk-divider-small uk-text-center"/>
    <div uk-slider="">

            <div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1">
        
                <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-4@m uk-grid">
                @foreach ($usaha as $du)
                    <li>
                        <div class="uk-card uk-card-default">
                            <div tabindex="0" class="uk-card-media-top uk-background-muted uk-inline uk-transition-toggle">
                                <img src="/data_foto/{{ $du->foto }}" alt="">
                                <div class="uk-card-badge uk-label">{{ $du->jenis_usaha }}</div>
                                <div class="uk-overlay-default uk-transition-fade uk-position-cover" style="z-index: 2;">
                                    <div class="uk-position-center">
                                        <a class="uk-button uk-icon-link uk-icon uk-overlay-icon" uk-overlay-icon="ratio: 1;" href="#" uk-toggle="mode: click; target: #t{{ $du->id }}"></a>
                                    </div>
                                </div>
                                <div class="uk-overlay uk-overlay-default uk-position-bottom">
                                        <p>{{ $du->nama_usaha }}</p>
                                    </div>
                                    <div class='uk-modal-container uk-flex-top' id="t{{ $du->id }}" uk-modal=''>
                                    <div class='uk-modal-dialog uk-margin-auto-vertical uk-overflow-auto'>
                                    <div class='uk-modal-header'>
                                    <span class='uk-modal-title uk-flex uk-flex-center'>Info</span>
                                    <button class='uk-modal-close-default' type='button' uk-close=''></button>
                                    </div>
                                    <div class='uk-modal-body uk-flex uk-flex-center'>
                                            <div class='uk-card uk-child-width-1-5@s uk-grid uk-grid-collapse uk-flex-middle' uk-grid=''>
                                                    <div class='uk-card-media-left uk-cover-container uk-width-2-5@s'>
                                                        <img alt='' src="/data_foto/{{ $du->foto }}" uk-cover=''/>
                                                        <canvas height='300' width='300'></canvas>
                                                    </div>
                                                    <div class='uk-flex-last@s uk-card-body uk-width-3-5@s'>
                                                        <h2 class='uk-heading-bullet uk-text-uppercase'>{{ $du->nama_usaha }}</h2>
                                                        <ul>
                                                            <li>Jenis Usaha: {{ $du->jenis_usaha }}</li>
                                                            <li>Alamat: {{ $du->alamat }}</li>
                                                            <li>Kontak: {{ $du->telp }}</li>
                                                            <li>Jam Operasional: {{ $du->jam_operasional }}</li>
                                                        </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='uk-modal-footer uk-flex uk-flex-right'>
                                    <button class='uk-button uk-modal-close uk-dark uk-margin-auto-left'>Close</button>
                                    </div>
                                    </div>
                                    </div>
                            </div>


                        </div>
                    </li>
                @endforeach
                </ul>
        
                <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
        
            </div>
        
            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
        
        </div>
    </div>        
    </section>
    <section class="uk-section uk-section-muted uk-dark">
    <div class="uk-container uk-container-small">
    <h2 class="uk-text-center">Agenda</h2>
    <hr class="uk-divider-small uk-text-center"/>
    <ul class="uk-subnav uk-subnav-pill uk-flex-center" uk-switcher="connect: .switcher-container;">
            <li><a href="#">All</a></li>
            <li><a href="#">Budaya</a></li>
            <li><a href="#">Lomba</a></li>
    </ul>
    <ul class="uk-switcher switcher-container uk-margin">
            <li><table class="uk-table uk-table-middle uk-table-divider">
                    <thead>
                        <tr>
                            <th class="uk-width-small">Tanggal</th>
                            <th>Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $a)
                        <tr>                        
                            <td>{{ $a->jadwal }}</td>
                            <td>{{ $a->nama_kegiatan }}</td>                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </li>
            <li><table class="uk-table uk-table-middle uk-table-divider">
                    <thead class="uk-text-center">
                        <tr>
                            <th class="uk-width-small">Tanggal</th>
                            <th>Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($budaya as $b)
                        <tr>                        
                            <td>{{ $b->jadwal }}</td>
                            <td>{{ $b->nama_kegiatan }}</td>                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </li>
            <li><table class="uk-table uk-table-middle uk-table-divider">
                    <thead>
                        <tr>
                            <th class="uk-width-small">Tanggal</th>
                            <th>Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lomba as $l)
                        <tr>
                            <td>{{ $l->jadwal }}</td>
                            <td>{{ $l->nama_kegiatan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
    </section>
    <section class='uk-section uk-background-primary uk-light'>
    <div class='uk-container uk-container-xsmall'>
        <div class='uk-text-center'>
            <h2 class='uk-text-capitalize'>Kunjungi Kami</h2>
            <a href='/register' class='uk-margin uk-button uk-button-default'>Register</a>
    </div>
    </section>      
    <section class='uk-section-small uk-background-secondary uk-light'>
    <div class='uk-container uk-container-small'>
    <div class='uk-flex uk-flex-center uk-margin uk-grid-small'>
            <a class='uk-icon-button-default' uk-icon='icon: pagekit'></a>
            <a class='uk-icon-button-default' uk-icon='icon: uikit'></a>
            <a class='uk-icon-button-default' uk-icon='icon: facebook'></a>
            <a class='uk-icon-button-default' uk-icon='icon: twitter'></a>
        </div>
    <div class='uk-text-center'>
    <span>Ngoro &#169; Copyright 2019. All Rights Reserved.</span>
    </div>
    </div>
    </section>

    @include('layouts.components.offcanvas')

    <script src="{{ asset('/js/uikit-icons.js') }}" type="text/javascript"></script>        
    <script src="{{ asset('/js/particles.js') }}" type="text/javascript"></script>
</body>
</html>
