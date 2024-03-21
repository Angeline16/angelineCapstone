<?php
$link = mysqli_connect("localhost", "root", "") or die ('Unable to connect');
mysqli_select_db($link, "tradesystem") or die ('Unable to select database');

return $link;
