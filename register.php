<?php
    session_start();
    print_r($_SESSION['Array']);

    array_push($_SESSION['Array'],Array("399786750ec8ac94a1a3952bf858569a","098f6bcd4621d373cade4e832627b4f6","Test"));
    print_r($_SESSION['Array']);

?>