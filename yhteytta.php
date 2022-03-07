<?php include('db.php'); 

// never use unencrypted cookies in real production
if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $osoite = $_POST['address'];
        $postinumero = $_POST['pnumber'];
        $postitoimipaikka = $_POST['ptmp'];
        $puh = $_POST['puh'];
        $email = $_POST['email'];
        $kysymys = $_POST['kysymys'];
        $viesti = $_POST['viesti'];
        $hyvaksy = $_POST['hyvaksy'];

        
        $sql = "INSERT INTO tietoa (nimi, osoite, postinro, postitoimipaikka, puh, email, kysymys, viesti, hyvaksy) 
        VALUES ('$name', '$osoite', '$postinumero', '$postitoimipaikka', '$puh', '$email', '$kysymys', '$viesti', '$hyvaksy')";
        $result = mysqli_query($connection, $sql);
        
        if(!$result){
            die("MySQL query failed!" . mysqli_error($connection));
        } 
}
?>

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
        <style>.input label { display: inline-block; width: 150px; text-align: right;  }</style>
    </head>
    <body>
<?php include('header.php');?>

</div>
        <div class="div">
            <h1>Ota Yhteyttä</h1>
            <br>
            Voit ottaa meihin yhteyttä
            <br>
            * Puhelimitse yksittäisiin myymälöihin
            <br>
            * Sähköpostitse: asiakaspalvelu@puutarhaliikeneilikka.fi
            <br>
            * Alla olevalla lomakkeella
        </div>

        <form method="post"><fieldset><legend>Yhteystiedot</legend>
            <div class="input">
            <br>
            <label for="name" class="form-label">Nimi</label>
            <input type="text" id="name" name="name" size="10" maxlength="30" required>
            <br>
            <label for="address">Katuosoite</label>
            <input type="text" id="address" name="address" maxlength="50">
            <br>
            <label for="pnumber">Postinumero</label>
            <input type="text" id="pnumber" name="pnumber" size="10" maxlength="10">
            <br>
            <label for="ptmp">Postitoimipaikka</label>
            <input type="text" id="ptmp" name="ptmp" maxlength="15">
            <br>
            <label for="puh">Puhelinnumero</label>
            <input type="text" id="puh" name="puh" maxlength="15" >
            <br>
            <label for="email">Sähköpostiosoite</label>
            <input type="text" id="email" name="email" maxlength="50">
            <br>
            </div>
            Aihe:
            <br>
            <select name="kysymys">
                <option>Kysymys tuotteista</option>
                <option>Tilaus</option>
                <option>Yhteydenottopyyntö</option>
                <option>Muu</option>
            </select>
            <br>
            Viesti:
            <br>
            <textarea name="viesti" rows="4" ></textarea>
            <br>
            <itallic>Haluan tilata Puutarhaliike Neilikan uutiskirjeen</itallic>
            <br> 
            <input type="radio" name="hyvaksy" value="kylla">Kyllä
            <input type="radio" name="hyvaksy" value="ei">Ei
            <br>
            
            <br>
            
            <input type="submit" name="submit" value="Lähetä" class="btn btn-success" >
        
            
            </fieldset></form>
            <br>
     
</html>
<?php include('footer.php');?>