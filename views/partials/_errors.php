<?php
if (isset($errors) && count($errors) != 0)//des erreurs qui existent
{
    echo '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    foreach($errors as $error){
        echo $error.'<br/>';
    }
    echo '</div';
}