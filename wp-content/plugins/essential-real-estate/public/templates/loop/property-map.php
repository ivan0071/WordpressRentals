<?php
/**
 * @var $dataMap
 * @var $latLongData ( 'titleArr', 'latArr', 'longArr', 'latArrSum', 'longArrSum', 'arrayCountLatLong', 'latAverageView', 'longAverageView' )
 * @var $custom_property_image_size
 * @var $property_item_class
 */

global $post;
$mapDefaultZoom = 10;

//var_dump($latLongData);
?>

<div id="map" style="width: 100%; height: 500px;"></div>

<script>
    jQuery(document).ready(function ($) {
      $('#markerMapBtn').on('click', function () {        
        $('#map').empty();
        setTimeout(() => {
          checkDivLoaded();
        }, 1000);
      });
    });

    /* OSM & OL example code provided by https://mediarealm.com.au/ */
    var map;
    var mapDefaultZoom = <?php echo $mapDefaultZoom; ?>;
    var titleArr = <?php echo json_encode($latLongData['titleArr']); ?>;
    var latArr = <?php echo json_encode($latLongData['latArr']); ?>;
    var longArr = <?php echo json_encode($latLongData['longArr']); ?>;
    var arrayCountLatLong = <?php echo $latLongData['arrayCountLatLong']; ?>;
    var mapLat = <?php echo $latLongData['latAverageView']; ?>;
	  var mapLng = <?php echo $latLongData['longAverageView']; ?>;

    function initialize_map() {
      map = new ol.Map({
        target: "map",
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM({
                      url: "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png"
                })
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([mapLng, mapLat]),
            zoom: mapDefaultZoom
        })
      });
    }

    function add_map_point(lat, lng, title) {
      var vectorLayer = new ol.layer.Vector({
        source:new ol.source.Vector({
          features: [new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
            })]
        }),
        style: new ol.style.Style({
          image: new ol.style.Icon({
            anchor: [0.5, 0.5],
            anchorXUnits: "fraction",
            anchorYUnits: "fraction",
            src: "https://upload.wikimedia.org/wikipedia/commons/e/ec/RedDot.svg"
          }),
          text: new ol.style.Text({
              text: title
          }),
        })
      });
      map.addLayer(vectorLayer); 
    }	
	
	var int=setInterval('checkDivLoaded()', 500);
	function checkDivLoaded()
	{
	   if (chkObject('map')==true)
	   {
			initialize_map(); 

            for (i = 0; i < arrayCountLatLong; i++) {
                add_map_point(latArr[i], longArr[i], titleArr[i]);
            }            

			//add_map_point(<?php //echo $mapLat; ?>, <?php //echo $mapLng; ?>);
			//add_map_point(41.91, 22.40);            
			
			int=window.clearInterval(int)
	   }
	   else
	   {
		   console.log("if (chkObject('map')==false)");
	   }
	}

	function chkObject(elemId)
	{
	   return (document.getElementById(elemId))? true : false;
	}	
</script>