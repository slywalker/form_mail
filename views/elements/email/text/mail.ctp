<?php
foreach ($body as $row) {
	echo "[" . $row['label'] . "]\n";
	echo $row['data'] . "\n\n";
}
?>