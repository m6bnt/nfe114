<html><body>
  <div id="mapdiv"></div>
  <script src="https://openlayers.org/api/OpenLayers.js"></script>
  <?php
  $long= $_GET['long'];
  $lat= $_GET['lat'];
  ?>
  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());
    var url = "./POI.php?long="+"<?php echo $long?>"+"&lat="+"<?php echo $lat?>";
    var pois = new OpenLayers.Layer.Text( "My Points",
                    { location:url,
                      projection: map.displayProjection
                    });
    map.addLayer(pois);
 
    //Set start centrepoint and zoom hhh   
    var lonLat = new OpenLayers.LonLat("<?php echo $long?>","<?php echo $lat?>")
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );
    var zoom=15;
    map.setCenter (lonLat, zoom);  
    
  </script>
</body></html>