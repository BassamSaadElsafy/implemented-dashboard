<?php

if ($errors->all()) {
    // dd($errors->all());
    echo "<div class='alert alert-danger'>";
        foreach ($errors->all() as  $error) {
           echo "<li> $error </li>";
        }
    echo "</div>";

    
    
}

if ( session()->has('error')) {
    echo '<div class="alert alert-danger">';
    echo session('error');
    echo '</div>';

}
