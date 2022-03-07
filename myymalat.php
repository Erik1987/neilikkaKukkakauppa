<?php include('header.php');?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="style.css">
    </head>
    <body>

</div>
        <div class="div">
            <h1>Myymälät</h1>
<p>
            Puutarhaliike Neilikka, Helsinki
            <br>
            Fabianinkatu 42
            <br>
            00100 Helsinki
            <br>
            Puh. xx-xxxxxxx
            <br>
            Sähköposti: helsinki@puutarhaliikeneilikka.fi
            <br>
            <div id="googleMap" style="width:300px;height:300px;"></div>

            <script>
                function myMap() {
                    var mapProp= {
                        center:new google.maps.LatLng(60.17266017351718, 24.948568082476417), 
                        zoom:15,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                    // The marker, positioned
                    var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(60.17266017351718, 24.948568082476417),
                    map: map,
                    }); 
                    google.maps.event.addListener(marker, "rightclick", function() {
                    marker.setIcon('https://pics.freeicons.io/uploads/icons/png/4482957981557740362-512.png'); // set image path here...
}); 
                }
            </script>
            

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDevqqjMpmwzbWXFmDys-QqKp_dMP9dM4k&callback=myMap"></script>
            <br>
            Avoinna
            <br>
            ma-ke 9-17
            <br>
            la 12-18
            <br>
            <br>
            Puutarhaliike Neilikka, Espoo
            <br>
            Kivenlahdentie 10
            <br>
            01234 Espoo
            <br>
            Puh. xx-xxxxxxx
            <br>
            Sähköposti: espoo@puutarhaliikeneilikka.fi
            <br>
            <br>
            Avoinna
            <br>
            ma-ke 9-17
            <br>
            la 12-18

            <script>
                function myMap2() {
                    var mapProp= {
                        center:new google.maps.LatLng(60.152898292987544, 24.655017440146075), 
                        zoom:15,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                    // The marker, positioned
                    var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(60.152898292987544, 24.655017440146075),
                    map: map,
                    }); 
                    google.maps.event.addListener(marker, "rightclick", function() {
                    marker.setIcon('https://pics.freeicons.io/uploads/icons/png/4482957981557740362-512.png'); // set image path here...
}); 
                }
            </script>
        </p>
        </div>


    </div>
    </body>
  


</html>

<?php include('footer.php');?>