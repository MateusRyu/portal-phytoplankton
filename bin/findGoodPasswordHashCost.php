<?php
/**
 * This code will benchmark your server to determine how high of a cost you can
 * afford. You want to set the highest cost that you can without slowing down
 * you server too much. 8-10 is a good baseline, and more is good if your servers
 * are fast enough. The code below aims for ≤ X milliseconds stretching time,
 * which is a good baseline for systems handling interactive logins.
 */

$timeTargetInMiliseconds = 100; // 50 milliseconds
$timeTarget = $timeTargetInMiliseconds/1000;

$cost = 3;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_DEFAULT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Time target to be lower or equal to: ". $timeTargetInMiliseconds." ms or ".$timeTarget." sec\n";
echo "Appropriate Cost Found: " . $cost;
echo "\n";
?>
