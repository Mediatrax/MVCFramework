<footer>
    <hr>
    <p>Ich bin ein Footer!</p>
</footer>
<?php
foreach($data['scripts'] as $item) {
    echo "<script rel='script' src='". $_SERVER['PHP_SELF'] ."/../js/$item.js'></script>";
}
?>
</body>
</html>
