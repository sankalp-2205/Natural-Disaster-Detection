<?php

    $link = new mysqli("localhost","root","","prediction");
           if($link -> connect_errno > 0)
    {
        die ("Unable to connect to database : " . $link ->connect_error);
    }

?>