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
 echo "<tr><td>" . htmlentities($row["name"]). "</td><td>" . htmlentities($row["email"]) . "</td><td>" . htmlentities($row["phone"]) . "</td><td>" . htmlentities($row["city"]) . "</td><td>" . htmlentities($row["language"]) .  "</td><td>" . htmlentities($row["sList"]) . "</td>";

        if ($row["dateControl"] =="0000-00-00") {

        $row["dateControl"] = "Nothing";
        $dateReal = $row["dateControl"];
        echo "<td>" . htmlentities($dateReal) . "</td>";

    }

    else {
    $date = new DateTime($row["dateControl"]);
echo "<td>" . htmlentities($date->format('n/j/Y')) . "</td>";
}

echo "<td>" . htmlentities($row["timeControl"]) . "</td></tr>";
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