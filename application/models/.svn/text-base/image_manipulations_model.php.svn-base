<?php
    
class Image_manipulations_model extends CI_Model {

    public function filter_light($image,$new_image,$percent){
        if(file_exists($new_image)){
            unlink($new_image);
        }
        $percent = 100-$percent;
        $command = "convert ".$image." -level 0x".$percent."% ".$new_image;
        exec($command);
        return file_exists($new_image);
    }
    
    public function filter_blur($image,$new_image,$radius,$sigma){
        if(file_exists($new_image)){
            unlink($new_image);
        }
        $command = "convert ".$image." -blur ".$radius."x".$sigma." ".$new_image;
        exec($command);
        return file_exists($new_image);
    }
    
    public function filter_sharpen($image,$new_image,$radius){
        if(file_exists($new_image)){
            unlink($new_image);
        }
        $command = "convert ".$image." -sharpen 0x".$radius." ".$new_image;
        exec($command);
        return file_exists($new_image);
    }
   
    public function scale_image($image,$new_image,$scale_percent){
        if(file_exists($new_image)){
            unlink($new_image);
        }
        $scale_percent = 100+$scale_percent;
        $command = "convert ".$image." -resize ".$scale_percent."%x ".$new_image;
        exec($command);
        return file_exists($new_image);
    }
}
?>
