<?php

$salamander_name = $_POST['salamander_name'] ?? '';
$id = $_POST['id'] ?? '';
$visible = $_POST['visible'] ?? '';

echo "Form parameters<br />";
echo "Salamander name: " . $salamander_name . "<br />";
echo "ID: " . $id . "<br />";
echo "Visible: " . $visible . "<br />";

?>