<?php
$connection = new PDO('mysql:host=db;dbname=GW2;charset=utf8', 'username', 'password');
$query      = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'GW2'");
$tables     = $query->fetchAll(PDO::FETCH_COLUMN);

if (empty($tables)) {
    echo '<p class="center">There are no tables in database <code>GW2</code>.</p>';
} else {
    echo '<p class="center">Database <code>GW2</code> contains the following tables:</p>';
    echo '<ul class="center">';
    foreach ($tables as $table) {
        echo "<li>{$table}</li>";
    }
    echo '</ul>';
}
