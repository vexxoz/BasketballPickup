var ismobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
if (ismobile){

}else{

    (function(){

      var parallax = document.querySelectorAll(".parallax"),
          speed = 0.8;

      window.onscroll = function(){
        [].slice.call(parallax).forEach(function(el,i){

          var windowYOffset = window.pageYOffset,
              elBackgrounPos = "50% " + (windowYOffset * speed) + "px";

          el.style.backgroundPosition = elBackgrounPos;

        });
      };

    })();
 
}
function learn_more() {
    $('html, body').animate({
        scrollTop: $(".info").offset().top
    }, 1000);
}

function back(){
    window.location = ("index.php");
}

$( "#find" ).click(function() {
    $( ".find" ).animate({
        height: 900
    }, 1000);
    $("#map-canvas").show();
    initialize();
    codeAddress();
});    



//locations for pins
var lagunaalturacourt = new google.maps.LatLng(33.643859, -117.760362);
var lagunaname = "Laguna Altura Basketball Court";
var danacourt = new google.maps.LatLng(33.646878, -117.753025); 
var dananame = "Dana st Basketball Court";
var quailcommunitypark = new google.maps.LatLng(33.653280, -117.781667);
var quailcommunityparkname = "Quail Hill Community Park Basketball Court";
var orangetreepark = new google.maps.LatLng(33.671207, -117.772891);
var orangetreename = "Orange Tree Park Basketball Court";
var ravencreekpark = new google.maps.LatLng(33.662590, -117.779702);
var ravencreekname = "Ravencreek Park Basketball Court";

function initialize() {
  geocoder = new google.maps.Geocoder();
  var Latlng = new google.maps.LatLng(33.643859, -117.760362);
  var mapOptions = {
    zoom: 12,
    center: Latlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

// start of pins //
    
  var marker = new google.maps.Marker({
      position: lagunaalturacourt,
      map: map,
      title: lagunaname,
  });
    
    google.maps.event.addListener(marker, 'mousedown', function(){
        window.location = "court.php?Court_id=1"   
    });
    
  var marker = new google.maps.Marker({
      position: danacourt,
      map: map,
      title: dananame
  });
    
    google.maps.event.addListener(marker, 'mousedown', function(){
        window.location = "court.php?Court_id=2"   
    });    
  
  var marker = new google.maps.Marker({
      position: quailcommunitypark,
      map: map,
      title: quailcommunityparkname
  });
    
    google.maps.event.addListener(marker, 'mousedown', function(){
        window.location = "court.php?Court_id=3"   
    });    
    
  var marker = new google.maps.Marker({
      position: orangetreepark,
      map: map,
      title: orangetreename
  });
    
    google.maps.event.addListener(marker, 'mousedown', function(){
        window.location = "court.php?Court_id=4"   
    });
    
  var marker = new google.maps.Marker({
      position: ravencreekpark,
      map: map,
      title: ravencreekname
  });    
    
    google.maps.event.addListener(marker, 'mousedown', function(){
        window.location = "court.php?Court_id=5"   
    });    
    
// end of pins //
}

function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      //alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}


google.maps.event.addDomListener(window, 'load', initialize);