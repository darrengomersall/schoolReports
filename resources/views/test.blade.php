<?php
echo "<pre>";
//var_dump($pupils);
foreach($pupils->toArray() as $pupil) {
    var_dump($pupil['current_class']['grade']) ;
    echo "<br>";
}
?>
