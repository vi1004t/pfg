<script>
var geocoder;
var map;
var i = 0;
  @if($mapa['ubicacio_centre'] == 'no_valor')
  function ubica(){
    geocoder = new google.maps.Geocoder();
    if (typeof("{{ $mapa['ubicacio'] }}") != '[object Array]'){
      geocoder.geocode( { 'address': "{{ $mapa['ubicacio'] }}" }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert('Configura correctament el nom de la teva població: ' + status);
      }
      });
    }

  }

@else

  function ubica(){
    var latlng = new google.maps.LatLng({{ $mapa['ubicacio_centre']['y'] }}, {{ $mapa['ubicacio_centre']['x'] }});
    map.setCenter(latlng);
    map.setZoom(18);
    var marker = new google.maps.Marker({
        map: map,
        position: latlng
    });

  }

@endif

function dibuixar(){
  @foreach ($mapa["coordenades"] as $item)
    var coords = [{!!$item["punts"]!!}]
        p[i] = new google.maps.Polygon({
        paths:  coords,
        strokeWeight: 3,
        fillColor: '{!!$item["color"]!!}',
        fillOpacity: 0.35,
        strokeColor: '{!!$item["color"]!!}',
        strokeOpacity: 0.8,

    });
    p[i].setMap(map);
    @if($item['info'] != 'no_valor')
    google.maps.event.addListener(p[i], 'click', function(event){
      infoWindow.setContent('{!!$item["info"]!!}');
      infoWindow.setPosition(event.latLng);
      infoWindow.open(map);

    });

    infoWindow = new google.maps.InfoWindow();
    @endif
    i++
  @endforeach
}
function redibuixa(){
  for (var j = 0; j < p.length; j++ ) {
      p[i].setMap(null);
    }
    p.length = 0;
  dibuixar();
}
function initialize() {
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var mapOptions = {
    center: latlng,
    zoom: 14,
    disableDefaultUI: true,
    zoomControl: true,
    mapTypeId: google.maps.MapTypeId.SATELLITE
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  ubica();
  dibuixar();
}
</script>
