<?php

function adminLogin()
{
    session_start();
    if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true))
    {
        echo"<script>window.location.href='index.php';
    </script>";
    }
}

function redirect($url)
{ echo"
    <script>window.location.href='$url';
    </script>";
    
    
}

function alert($type, $msg)
{
   $bs_class= ($type== "success") ? "alert-success" : "alert-danger";
    echo <<<ALERT
    <div class="alert $bs_class alert-dismissible fade show m-0 rounded-0 border-0 text-center" role="alert">
        <strong>$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ALERT;
}
?>
