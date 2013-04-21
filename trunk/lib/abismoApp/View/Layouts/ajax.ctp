<?php
    header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
    header('Content-Type: application/json');
    echo $this->fetch('content'); 
?>
