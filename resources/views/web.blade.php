<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Desa Ngoro</title>
  <link rel="stylesheet" href="{{ asset('/css/uikit.min.css') }}"/>
  <script src="{{ asset('/js/uikit.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/uikit-icons.min.js') }}" type="text/javascript"></script>   

  <link rel="stylesheet" href="{{ asset('/js/leaflet/leaflet.css') }}"/>
  <script src="{{ asset('/js/leaflet/leaflet.js') }}"></script>
  
  <script src="{{ asset('/js/leaflet/plugin/leaflet-ajax/dist/leaflet.ajax.js') }}"></script>
  <script src="{{ asset('/js/leaflet/plugin/leaflet-providers-master/leaflet-providers.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('/js/leaflet/plugin/leaflet.defaultextent-master/dist/leaflet.defaultextent.css') }}" />
  <script src="{{ asset('/js/leaflet/plugin/leaflet.defaultextent-master/dist/leaflet.defaultextent.js') }}"></script>              

  <link rel="stylesheet" href="{{ asset('/js/leaflet/plugin/leaflet-groupedlayercontrol/src/leaflet.groupedlayercontrol.css') }}"/>
  <script src="{{ asset('/js/leaflet/plugin/leaflet-groupedlayercontrol/src/leaflet.groupedlayercontrol.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('/js/leaflet/plugin/Leaflet.MousePosition-master/src/L.Control.MousePosition.css') }}" />
  <script src="{{ asset('/js/leaflet/plugin/Leaflet.MousePosition-master/src/L.Control.MousePosition.js') }}"></script>
  
  <link rel="stylesheet" href="{{ asset('/css/map.css') }}"/>
</head>
<body>
  <div id="nav" class="uk-background-primary">
  <nav class="uk-light" uk-navbar="mode: click">
      <div class="uk-navbar-left">              
          <a class="uk-navbar-item uk-logo" href="/"><img width="50" height="50" src="{{ asset('/img/its-putih.png') }}"/></a>
          <a href="/">WEB GIS Desa Ngoro</a>
      </div>
      <div class="uk-navbar-right">
          <ul class="uk-navbar-nav uk-visible@s">
              <li><a href="#" uk-toggle="mode: click; target: #inf0">Info</a></li>                            
              <li><a href="#" uk-toggle="mode: click; target: #inf2">Download</a></li>
          </ul>                    
          <a class="uk-navbar-toggle uk-hidden@s" href="#offcanvas-slide" uk-navbar-toggle-icon="" uk-toggle=""></a>
          <div id="offcanvas-slide" uk-offcanvas="mode: slide; overlay: true; flip: true;">
              <div class="uk-offcanvas-bar"><button class="uk-offcanvas-close" type="button" uk-close=""></button>
                  <ul class="uk-nav uk-nav-default">
                      <li><a href="#" uk-toggle="mode: click; target: #inf0">Info</a></li>
                      <li class="uk-nav-divider"></li>
                      <li class="uk-nav-divider"></li>
                      <li><a href="#" uk-toggle="mode: click; target: #inf2">Download</a></li> 
                  </ul>
              </div>
          </div>  
      </div>
  </nav>
  </div>

<div id="map">
<script>
// MENGATUR TITIK KOORDINAT TITIK TENGAN & LEVEL ZOOM PADA BASEMAP
var map = L.map('map', {
  center: [-7.663339,112.233516], zoom: 18})
// PILIHAN BASEMAP YANG AKAN DITAMPILKAN
var baseLayers = {  
  // add Stamen Watercolor to map.
  'MapBox' : L.tileLayer.provider('MapBox', {
      id: 'mapbox.satellite',
      accessToken: 'pk.eyJ1IjoiZWxhbmlsbGVvbmFuIiwiYSI6ImNreHE5dGl6ODRseHUydG1mYnpvazIwanoifQ.8bKOQl_dNLRfz0a1cxsvwA',
			minZoom: 15
  }),
  'Here SatteliteDay' : L.tileLayer.provider('HERE.satelliteDay', {
    app_id: 'devportal-demo-20180625',
    app_code: '9v2BkviRwi9Ot26kp2IysQ',
    minZoom: 15
  }).addTo(map),
  'Esri WorldImagery': L.tileLayer.provider('Esri.WorldImagery', {
		minZoom: 15
  }),
  'Esri.WorldTopoMap': L.tileLayer.provider('Esri.WorldTopoMap', {
		minZoom: 15
  })
};

// MENAMPILKAN SKALA
L.control.scale({imperial: false}).addTo(map);
L.control.mousePosition({
  position:"bottomleft"
}).addTo(map);

var layer_DAFTARUSAHA = new L.GeoJSON.AJAX("/featuresUsaha",{
      onEachFeature: function(feature, layer){
        layer.bindPopup(
        `<div class='uk-card uk-card-default'>
            <div class='uk-card-media-top'>
                <div class="uk-card-badge uk-label">` + feature.properties.nama_usaha + `</div>
                <img src='/data_foto/` + feature.properties.foto + `' alt=''>
            </div>
            <div class='uk-card-body'>                
                <p><b>Jenis Usaha</b></p>` + feature.properties.jenis_usaha + 
                `<p><b>Alamat</b></p>` + feature.properties.alamat +
                `<p><b>Telp</b></p>` + feature.properties.telp +
                `<p><b>Buka</b></p>` + feature.properties.jam_operasional +
            `</div>
        </div>`
        );
    }
    }).addTo(map);
var layer_BANGUNAN = new L.GeoJSON.AJAX("{{ asset('/layer/featuresBangunan.json') }}",{
    style: function(feature){
    var fillColor = "#fc9795";
        return { color: "#eaeaea", dashArray: '3', weight: .5, fillColor: fillColor, fillOpacity: .5 };
      },
      onEachFeature: function(feature, layer){
      layer.bindPopup("<center>No Bangunan: " + feature.properties.objectid  + "<br/>Luas= " + feature.properties.shape_area + " m2</center>"), // popup yang akan ditampilkan diambil dari filed kab_kot
      that = this;

            layer.on('mouseover', function (e) {
                this.setStyle({
                  weight: .5,
                  color: '#fff',
                  dashArray: '',
                  fillOpacity: 0.8
                });
                info.update(layer.feature.properties);
            });
            layer.on('mouseout', function (e) {
                layer_BANGUNAN.resetStyle(e.target);
                info.update();
            });
    }
    }).addTo(map);    
var layer_BIDANGSAWAH = new L.GeoJSON.AJAX("{{ asset('/layer/featuresBidangSawah.json') }}",{
  style: function(feature){
  var fillColor = "#c1faa1";
    return { color: "#eaeaea", dashArray: '3', weight: .5, fillColor: fillColor, fillOpacity: .5 };
  },
  onEachFeature: function(feature, layer){
  that = this;
      layer.on('mouseover', function (e) {
          this.setStyle({
            weight: .5,
            color: '#fff',
            dashArray: '',
            fillOpacity: 0.8
          });
          info.update(layer.feature.properties);
      });
      layer.on('mouseout', function (e) {
          layer_BIDANGSAWAH.resetStyle(e.target);
          info.update();
      });
  }
});
var layer_JALANAREA = new L.GeoJSON.AJAX("{{ asset('/layer/featuresJalanArea.json') }}",{
  style: function(feature){
    var fillColor = "#858585";
      return { color: "#eaeaea", dashArray: '3', weight: .5, fillColor: fillColor, fillOpacity: .5 };
    },
    onEachFeature: function(feature, layer){
      that = this;
        layer.on('mouseover', function (e) {
            this.setStyle({
              weight: .5,
              color: '#fff',
              dashArray: '',
              fillOpacity: 0.8
            });
            info.update(layer.feature.properties);
        });
        layer.on('mouseout', function (e) {
            layer_JALANAREA.resetStyle(e.target);
            info.update();
        });
  }
}); 
var layer_KEBUN = new L.GeoJSON.AJAX("{{ asset('/layer/featuresKebun.json') }}",{
  style: function(feature){
    var fillColor = "#fdedc7";
      return { color: "#eaeaea", dashArray: '3', weight: .5, fillColor: fillColor, fillOpacity: .5 };
  },
  onEachFeature: function(feature, layer){
    that = this;
      layer.on('mouseover', function (e) {
          this.setStyle({
            weight: .5,
            color: '#fff',
            dashArray: '',
            fillOpacity: 0.8
          });
          info.update(layer.feature.properties);
      });
      layer.on('mouseout', function (e) {
          layer_KEBUN.resetStyle(e.target);
          info.update();
      });
  }
}); 
var layer_LAHANKOSONG = new L.GeoJSON.AJAX("{{ asset('/layer/featuresLahanKosong.json') }}",{
  style: function(feature){
  var fillColor = "#dcdcda";
    return { color: "#eaeaea", dashArray: '3', weight: .5, fillColor: fillColor, fillOpacity: .5 };
  },
  onEachFeature: function(feature, layer){      
  that = this;
  layer.on('mouseover', function (e) {
      this.setStyle({
        weight: .5,
        color: '#fff',
        dashArray: '',
        fillOpacity: 0.8
      });
      info.update(layer.feature.properties);
  });
  layer.on('mouseout', function (e) {
      layer_LAHANKOSONG.resetStyle(e.target);
      info.update();
  });
  }
}); 
var layer_TEGALANLADANG = new L.GeoJSON.AJAX("{{ asset('/layer/featuresTegalanLadang.json') }}",{
  style: function(feature){
  var fillColor = "#ffffbe";
      return { color: "#eaeaea", dashArray: '3', weight: .5, fillColor: fillColor, fillOpacity: .5 };
    },
    onEachFeature: function(feature, layer){
    that = this;
          layer.on('mouseover', function (e) {
              this.setStyle({
                weight: .5,
                color: '#fff',
                dashArray: '',
                fillOpacity: 0.8
              });
              info.update(layer.feature.properties);
          });
          layer.on('mouseout', function (e) {
              layer_TEGALANLADANG.resetStyle(e.target);
              info.update();
          });
  }
});
var layer_SUNGAIAREA = new L.GeoJSON.AJAX("{{ asset('/layer/featuresSungaiArea.json') }}",{
  style: function(feature){
    var fillColor = "#73dfff";
      return { color: "#eaeaea", dashArray: '3', weight: .5, fillColor: fillColor, fillOpacity: .5 };
    },
    onEachFeature: function(feature, layer){
    that = this;

          layer.on('mouseover', function (e) {
              this.setStyle({
                weight: .5,
                color: '#fff',
                dashArray: '',
                fillOpacity: 0.8
              });
              info.update(layer.feature.properties);
          });
          layer.on('mouseout', function (e) {
              layer_SUNGAIAREA.resetStyle(e.target);
              info.update();
          });
  }
}); 
var layer_SUNGAI = new L.GeoJSON.AJAX("{{ asset('/layer/featuresSungai.json') }}",{
  style: function(feature){
    var fillColor = "#333";
      return { color: "#333", dashArray: '3', weight: 7, fillColor: fillColor, fillOpacity: .5 };
    },
    onEachFeature: function(feature, layer){
    that = this;

          layer.on('mouseover', function (e) {
              this.setStyle({
              weight: .5,
              color: '#888',
              dashArray: '',
              fillOpacity: 0.8
              });

          if (!L.Browser.ie && !L.Browser.opera) {
              layer.bringToFront();
          }

              info.update(layer.feature.properties);
          });
          layer.on('mouseout', function (e) {
              layer_SUNGAI.resetStyle(e.target);
              info.update();
          });
  }
})  
var layer_JALAN = new L.GeoJSON.AJAX("{{ asset('/layer/featuresJalan.json') }}",{
  style: function(feature){
    var fillColor = "#333";
      return { color: "#333", dashArray: '3', weight: 7, fillColor: fillColor, fillOpacity: .5 };
    },
    onEachFeature: function(feature, layer){
    that = this;

          layer.on('mouseover', function (e) {
              this.setStyle({
              weight: .5,
              color: '#888',
              dashArray: '',
              fillOpacity: 0.8
              });

          if (!L.Browser.ie && !L.Browser.opera) {
              layer.bringToFront();
          }

              info.update(layer.feature.properties);
          });
          layer.on('mouseout', function (e) {
              layer_JALAN.resetStyle(e.target);
              info.update();
          });
  }
})         
// membuat pilihan untuk menampilkan layer
var overlays = {
      "Area": {
        "Bangunan": layer_BANGUNAN,
        "Bidang Sawah": layer_BIDANGSAWAH,
        "Jalan Area": layer_JALANAREA,
        "Kebun": layer_KEBUN,
        "Lahan Kosong": layer_LAHANKOSONG,
        "Tegalan Ladang": layer_TEGALANLADANG,
        "Sungai Area": layer_SUNGAIAREA,
      },
      "Line": {
        "Sungai": layer_SUNGAI,
        "Jalan": layer_JALAN,
      },
      "Point": {
        "Usaha": layer_DAFTARUSAHA,
      }
      };
  var options2 = {
  groupCheckboxes: true
}; 
var layerControl = L.control.groupedLayers(baseLayers, overlays, options2).addTo(map);
map.addControl(layerControl);
var featureGroup = L.featureGroup().addTo(map);
var drawControl = new L.Control.Draw({
edit: {
  featureGroup: featureGroup
}
}).addTo(map);

map.on('draw:created', function(e) {
  featureGroup.addLayer(e.layer);
});
</script>
<footer id="footer">
<div class='uk-modal-container uk-flex-top' id='inf0' uk-modal=''>
<div class='uk-modal-dialog uk-margin-auto-vertical uk-overflow-auto'>
<div class='uk-modal-header'>
<span class='uk-modal-title uk-flex uk-flex-center'>WEB GIS Persebaran Usaha Desa Ngoro</span>
<button class='uk-modal-close-default' type='button' uk-close=''></button>
</div>
<div class='uk-modal-body uk-flex uk-flex-center'>
  <div class='uk-card uk-child-width-1-5@s uk-grid uk-grid-collapse uk-flex-middle' uk-grid=''>
          <div class='uk-card-media-left uk-cover-container uk-width-2-5@s'>
              <img alt='' src="{{ asset('/img/emote.jpg') }}" uk-cover=''/>
              <canvas height='300' width='300'></canvas>
          </div>
          <div class='uk-flex-last@s uk-card-body uk-width-3-5@s'>
              <h2 class='uk-heading-bullet uk-text-uppercase'>Info</h2>            
              <p>Data diambil dari citra satelit imagery milik esri pada bulan november 2019, menggunakan sistem datum WGS 84 dan sistem proyeksi DGN95 Zona 49S</p>
              <p>### Data layer dibuat statis di production ###</p>
              <div class='uk-flex uk-flex-center uk-flex-left@s'>
                  <a href='#' class='uk-button uk-button-danger uk-margin-right'>More</a>
                  <a class='uk-button uk-button-default'>u2136n</a>
              </div>
          </div>
  </div>
</div>
<div class='uk-modal-footer uk-flex uk-flex-right'>
<button class='uk-button uk-modal-close uk-dark uk-margin-auto-left'>Close</button>
</div>
</div>
</div>
<div class='uk-flex-top' id='inf2' uk-modal=''>
<div class='uk-modal-dialog uk-margin-auto-vertical uk-overflow-auto'>
<div class='uk-modal-header'>
<span class='uk-modal-title uk-flex uk-flex-center'>Download Data</span>
<button class='uk-modal-close-default' type='button' uk-close=''></button>
</div>
<div class='uk-modal-body'>        
<table class="uk-table uk-table-striped uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>Nama Layer</th>
            <th>Tipe File</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Usaha</th>
            <th><a href="/featuresUsaha">GeoJSON</a></th>
        </tr>
        <tr>
            <th>Bangunan</th>
            <th><a href="/layer/featuresBangunan.json">GeoJSON</a></th>
        </tr>
        <tr>
            <th>Bidang Sawah</th>
            <th><a href="/layer/featuresBidangSawah.json">GeoJSON</a></th>
        </tr>
        <tr>
            <th>Kebun</th>
            <th><a href="/layer/featuresKebun.json">GeoJSON</a></th>
        </tr>
        <tr>
            <th>Lahan Kosong</th>
            <th><a href="/layer/featuresLahanKosong.json">GeoJSON</a></th>
        </tr>
        <tr>
            <th>Sungai Line</th>
            <th><a href="/layer/featuresSungai.json">GeoJSON</a></th>
        </tr>
        
        <tr>
            <th>Jalan Line</th>
            <th><a href="/layer/featuresJalan.json">GeoJSON</a></th>
        </tr>
    </tbody>
</table>
</div>
<div class='uk-modal-footer uk-flex uk-flex-right'>
<button class='uk-button uk-modal-close uk-dark uk-margin-auto-left'>Close</button>
</div>
</div>
</div>
</footer>
</body>
</html>