<?php

if($_SESSION['type'] != 'Administrador'){

    echo '
        <script>
            window.location = "404";
        </script>
    ';

}
