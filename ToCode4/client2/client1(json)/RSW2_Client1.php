<form action="" method="POST">
   <font color="blue"><i><h1>&nbsp;&nbsp; *** Avoir statut par pays *** </h1></i></font>
    <div>
    Country : <input name="country" id="counry" placeholder="Entry contry's ISOCode" required/>
    <input type="submit" value="Get Status">
    </div>
</form>
<?php
if (isset($_POST['country']) && $_POST['country']!="") {
 $country =$_POST['country'];
 $url = "https://covid19-api.org/api/status/".$country;
 
 $client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);
 
 $result = json_decode($response);

 echo "<table>";
 echo "<tr><td>Country:</td><td>$result->country</td></tr>";
 echo "<tr><td>Last_update:</td><td>$result->last_update</td></tr>";
 echo "<tr><td>Cases :</td><td>$result->cases</td></tr>";
 echo "<tr><td>Deaths :</td><td>$result->deaths</td></tr>";
 echo "<tr><td>Recovered:</td><td>$result->recovered</td></tr>";
 echo "</table>";

}
?>



