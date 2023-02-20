<?php
include 'database.php';
// Check connection

$query = "SELECT name, email, phone, city, language, sList, timeControl, dateControl FROM crud";

$result = $conn->query($query);

if ($result->rowCount() > 0) {
  // output data of each row
echo "<table> <style>table, td, th {
                border: 1px solid black;
            }</style>";
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["city"]. "</td><td>" . $row["language"].  "</td><td>" . $row["sList"] . "</td><td>" . $row["timeControl"] . "</td><td>" . date('m/d/y',$row["dateControl"]) . "</td></tr>";
}
echo "</table>";
} else {
  echo "0 results";
}
$title = "The title of my email";
$body = "This email will contain this";
$email = <<<heredocEmail
<div >
    <div >
        <h1>{$title}</h1>
        <p>{$body}</p>
    </div>
    <div id="right">What we offer</div>
</div>
heredocEmail;
echo $email;

?>