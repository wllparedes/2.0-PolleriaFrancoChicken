
<?php 


function verifySizeImage($image){
    $sizeImage = $image / 1024 / 1024;
    $sizeImage = round($sizeImage, 2);

    if($sizeImage > 1){
        return false;
    }else{
        return true;
    }
}
