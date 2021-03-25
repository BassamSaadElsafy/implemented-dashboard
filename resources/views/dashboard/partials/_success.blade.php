<?php 

if (session()->has('success')) {

    echo "<div class='alert alert-success'>";
    echo session('success');
    echo "</div>";
    
}