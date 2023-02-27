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
 echo "<tr><td>" . htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8'). "</td><td>" . htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8') . "</td><td>" . htmlspecialchars($row["phone"], ENT_QUOTES, 'UTF-8') . "</td><td>" . htmlspecialchars($row["city"], ENT_QUOTES, 'UTF-8') . "</td><td>" . htmlspecialchars($row["language"], ENT_QUOTES, 'UTF-8') .  "</td><td>" . htmlspecialchars($row["sList"], ENT_QUOTES, 'UTF-8') . "</td>";

        if ($row["dateControl"] =="0000-00-00") {

        $row["dateControl"] = "nothing";
        echo "<td>" . htmlspecialchars($row["dateControl"], ENT_QUOTES, 'UTF-8') . "</td>";

    }

    else {
    $date = new DateTime($row["dateControl"]);
echo "<td>" . htmlspecialchars($date->format('n/j/Y'), ENT_QUOTES, 'UTF-8') . "</td>";
}

if ($row['timeControl'] == NULL) {

    $row['timeControl'] = "nothing";
    echo "<td>" . htmlspecialchars($row["timeControl"], ENT_QUOTES, 'UTF-8') . "</td></tr>";

}
else {
$time = new DateTime($row["timeControl"]);
echo "<td>" . htmlspecialchars($time->format('g:i:s A'), ENT_QUOTES, 'UTF-8') . "</td></tr>";
}
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