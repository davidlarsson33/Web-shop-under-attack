<?php 

init_CSRF_token();

require base_path("src/views/account.view.php");


function init_CSRF_token()
{
    if (!($_SESSION['token'] ?? false)) {
        $_SESSION['token'] = bin2hex(random_bytes(16));
        
    }
}

?>