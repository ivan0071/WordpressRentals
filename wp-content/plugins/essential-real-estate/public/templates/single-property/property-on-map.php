<?php
/**
 * @var $propertyID
 * @var $propertyLat
 * @var $propertyLong
 */

$mapDefaultZoom = 10;
?>

<div id="map-prop" style="width: 100%; height: 300px;"></div>

<script>
    /* OSM & OL example code provided by https://mediarealm.com.au/ */
    var map;
    var mapDefaultZoom = <?php echo $mapDefaultZoom; ?>;
    var mapLat = <?php echo $propertyLat; ?>;
	var mapLng = <?php echo $propertyLong; ?>;

    function initialize_map() {
      map = new ol.Map({
        target: "map-prop",
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
          })
        })
      });
      map.addLayer(vectorLayer); 
    }
</script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#map-link-' + <?php echo $propertyID ?>).click(function() {
            $('#map-prop').empty();
            setTimeout(() => {
                initialize_map(); 
                add_map_point(<?php echo $propertyLat ?>, <?php echo $propertyLong ?>, '');
            }, 1000);
        });
    });
</script>