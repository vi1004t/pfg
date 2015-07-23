{{$mapa['ubicacio_centre']['y']}}
   @if($mapa['ubicacio_centre'] == 'no_valor')
     <script>
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
     google.maps.event.addDomListener(window, 'load', ubica);
     </script>
   @else
     <script>
     function ubica(){
       var latlng = new google.maps.LatLng({{ $mapa['ubicacio_centre']['y'] }}, {{ $mapa['ubicacio_centre']['x'] }});
       map.setCenter(latlng);
       map.setZoom(18);
       var marker = new google.maps.Marker({
           map: map,
           position: latlng
       });

     }
     google.maps.event.addDomListener(window, 'load', ubica);
     </script>
   @endif
   <script>
   function dibuixar(){
     @foreach ($mapa["coordenades"] as $item)
       var coords = [{!!$item["punts"]!!}]
       var p = new google.maps.Polygon({
           paths:  coords,
           strokeWeight: 3,
           fillColor: '{!!$item["color"]!!}',
           fillOpacity: 0.35,
           strokeColor: '{!!$item["color"]!!}',
           strokeOpacity: 0.8,

       });
       p.setMap(map);
       @if($item['info'] != 'no_valor')
       google.maps.event.addListener(p, 'click', function(event){
         infoWindow.setContent('{!!$item["info"]!!}');
         infoWindow.setPosition(event.latLng);
         infoWindow.open(map);

       });
       infoWindow = new google.maps.InfoWindow();
       @endif
     @endforeach
   }
   google.maps.event.addDomListener(window, 'load', dibuixar);
   </script>
