// Generated by CoffeeScript 1.10.0
(function() {
  jQuery(function($) {
    var initMapApi;
    $(function() {
      if (($('#map').length)) {
        return initMapApi();
      }
    });
    initMapApi = function() {
      var $head, $script;
      $head = $('head');
      $script = $('<script defer async></script>');
      $script.attr('src', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyApM4iQyAfb0hbmkeXc_zs58aA_Jy0SIac&callback=initMap');
      return $head.append($script);
    };
    return window.initMap = function() {
      var dark, light, location, map, mapStyle, mapStyleId, marker, medium;
      light = '#f8f2e1';
      medium = '#707377';
      dark = '#1a1e47';
      mapStyle = new google.maps.StyledMapType([
        {
          'featureType': 'all',
          'elementType': 'geometry.fill',
          'stylers': [
            {
              'color': light
            }
          ]
        }, {
          'featureType': 'all',
          'elementType': 'geometry.stroke',
          'stylers': [
            {
              'color': dark
            }
          ]
        }, {
          'featureType': 'all',
          'elementType': 'labels.text.fill',
          'stylers': [
            {
              'color': '#14233E'
            }
          ]
        }, {
          'featureType': 'all',
          'elementType': 'labels.text.stroke',
          'stylers': [
            {
              'color': light
            }
          ]
        }, {
          'featureType': 'road.arterial',
          'elementType': 'geometry.fill',
          'stylers': [
            {
              'color': dark
            }
          ]
        }, {
          'featureType': 'road.local',
          'elementType': 'geometry.fill',
          'stylers': [
            {
              'color': dark
            }
          ]
        }, {
          'featureType': 'road.highway.controlled_access',
          'elementType': 'geometry.fill',
          'stylers': [
            {
              'color': dark
            }
          ]
        }, {
          'featureType': 'transit.line',
          'elementType': 'geometry.fill',
          'stylers': [
            {
              'color': dark
            }
          ]
        }, {
          'featureType': 'transit.line',
          'elementType': 'geometry.stroke',
          'stylers': [
            {
              'color': medium
            }
          ]
        }, {
          'featureType': 'water',
          'elementType': 'geometry.fill',
          'stylers': [
            {
              'color': '#b3d1ff'
            }
          ]
        }
      ]);
      mapStyleId = 'green';
      map = void 0;
      location = new google.maps.LatLng(40.707776, -73.9663237);
      map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        zoom: 15,
        scrollwheel: false,
        navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
        mapTypeId: mapStyleId
      });
      map.mapTypes.set(mapStyleId, mapStyle);
      map.setMapTypeId(mapStyleId);
      marker = new google.maps.Marker({
        position: location,
        title: 'ISCP',
        map: map,
        icon: {
          url: '/wp-content/themes/la-casita-verde/images/marker.svg',
          size: new google.maps.Size(70, 70),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(45, 40)
        }
      });
      google.maps.event.addDomListener(window, 'resize', function() {
        google.maps.event.trigger(map, 'resize');
        map.setCenter(location);
      });
    };
  });

}).call(this);
