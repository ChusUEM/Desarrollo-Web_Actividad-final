<?php
// Create connection
$conn = mysqli_connect("credentials.php");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT ID, DESCRIPCION, PRECIO, DIMENSION, HABITACIONES, BAÑOS, EMAIL, RESERVADA FROM Inmuebles fantasticos";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo '<table>';
  echo "<tr><td>ID</td>
  <td>DESCRIPCION</td>
  <td>PRECIO</td>
  <td>DIMENSION</td>
  <td>HABITACIONES</td>
  <td>BAÑOS</td>
  <td>EMAIL</td>
  <td>RESERVADA</td></tr>";

  while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
    echo 
    "<td>" . $row["ID"]. "</td>
     <td>" . $row["DESCRIPCION"]. "</td>
     <td>" . $row["PRECIO"]. "</td>
     <td>" . $row["DIMENSION"]. "</td>
     <td>" . $row["HABITACIONES"]. "</td>
     <td>" . $row["BAÑOS"]. "</td>
     <td>" . $row["EMAIL"]. "</td>
     <td>" . $row["RESERVADA"]."</td>";
	echo "</tr>";
	}
  echo '</table>';
} else {
  echo "0 results";
}


echo "cerrando conexión";
mysqli_close($conn);