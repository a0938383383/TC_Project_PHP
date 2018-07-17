<?php          
function unzip($location,$new_location){
    if(exec("unzip $location",$arr)){
        mkdir($new_location);
        for($i = 1;$i< count($arr);$i++){
            $file = trim(preg_replace("~inflating: ~","",$arr[$i]));
                    copy($location."/".$file,$new_location."/".$file);
                    unlink($location."/".$file);
            }
        return true;
    }
    return false;      
}
 
// usage of this code
/*
if(unzip('ziped_files/test.zip','unziped_files/newfile')){
    echo 'Successfully unzipped!';
}else{
    echo 'Error while processing your file!';
}
*/
?>