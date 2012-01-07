<?php

class converter_model extends CI_Model {

    private $log_path   = 'service/logs/';
    private $vimeo_dl   = 'service/vimeo_downloader.sh';
    private $bliptv_dl  = 'service/bliptv_grabber.sh';
    private $dl_path   =  'service/videos/';

    //private $python_path = "/usr/local/bin/python ";
    private $youtube_dl = 'service/youtube-dl.py';



    function converter_model(){
        //parent::__construct();
        //parent::Model();

        parent::__construct();
        $this->_ci = get_instance();
        $this->_ci->load->library("Zend");
    }

    function get_video_time($path){
        ob_start();
        passthru("ffmpeg -i ".$path." 2>&1");
        $duration = ob_get_contents();
        ob_end_clean();
        preg_match('/Duration: (.*?),/', $duration, $matches);
        return $matches[1];
    }

    private function process_meta_text(&$text){
        $replace = '`';
        $text = str_replace("'", $replace, $text);
        $text = str_replace('"', $replace, $text);
    }

    private function suggest_new_audio_name($file_name,$file_extension){
        $unique = false;
        $extension = ".".$file_extension;
        $file = explode($extension, $file_name);
        $file_name = $file[0];
        while(!$unique){
            $file_name = $file_name."_".rand(1, 100);
            if(!file_exists($file_name.$extension)){
                $unique = true;
            }
        }
        return $file_name.$extension;
    }

    private function init_convert(&$output_filename,&$meta,$file_extension){
        if(file_exists($output_filename)){
            unlink($output_filename);
            //$output_filename = $this->suggest_new_audio_name($output_filename,$file_extension);
        }

        $meta_value = '';
        ob_start();
        if($meta){
            if(is_array($meta)) {
                foreach($meta as $key=>$value){
                    if(trim($value)){
                        $this->process_meta_text($value);
                        $meta_text[] = "-metadata ".$key."='".$value."'";
                    }
                }
            }
        }
        if(is_array($meta_text)){
            $meta_value = implode(' ', $meta_text);
        }
        $meta = $meta_value;
    }

    function process_mp4($file_name, $bitrate,$meta, $start, $end, $output_filename){
        $this->init_convert($output_filename, $meta,'mp4');
        $command = "ffmpeg -i ".$file_name." -ss 00:".$start." -t 00:".$end." ".$meta." -ar 22050 -acodec libmp3lame  -ab ".$bitrate."k ".$output_filename."  2>&1";
        passthru($command);
        $output = ob_get_contents();
        ob_end_clean();
        //echo $command;die;
        if(file_exists($output_filename)){
            return $output_filename;
        }else{
            return false;
        }
    }

    function process_avi($file_name, $bitrate,$meta, $start, $end, $output_filename){
        $this->init_convert($output_filename, $meta,'avi');
        $command = "ffmpeg -i ".$file_name." -ss 00:".$start." -t 00:".$end." ".$meta." -acodec libmp3lame  -ab ".$bitrate."k ".$output_filename."  2>&1";
        passthru($command);
        $output = ob_get_contents();
        ob_end_clean();
        //echo $command;die;
        if(file_exists($output_filename)){
            return $output_filename;
        }else{
            return false;
        }
    }

    function process_flv($file_name, $bitrate,$meta, $start, $end, $output_filename){
        $this->init_convert($output_filename, $meta,'flv');
        $command = "ffmpeg -i ".$file_name." -ss 00:".$start." -t 00:".$end." ".$meta." -acodec libmp3lame  -ab ".$bitrate."k ".$output_filename."  2>&1";
        passthru($command);
        $output = ob_get_contents();
        ob_end_clean();
        //echo $command;die;
        if(file_exists($output_filename)){
            return $output_filename;
        }else{
            return false;
        }
    }

    function process_wmv($file_name, $bitrate,$meta, $start, $end, $output_filename){
        $this->init_convert($output_filename, $meta,'wmv');
        $command = "ffmpeg -i ".$file_name." -ss 00:".$start." -t 00:".$end." ".$meta." -vcodec wmv1 -acodec adpcm_ima_wav  -ab ".$bitrate."k ".$output_filename."  2>&1";
        passthru($command);
        $output = ob_get_contents();
        ob_end_clean();
        //echo $command;die;
        if(file_exists($output_filename)){
            return $output_filename;
        }else{
            return false;
        }
    }


    function process_3gp($file_name, $bitrate,$meta, $start, $end, $output_filename){
        $this->init_convert($output_filename, $meta,'3gp');
        $bitrate = '12.2';
        //$command = "ffmpeg -i ".$file_name." -ss 00:".$start." -t 00:".$end." ".$meta." -s 176x144 -vcodec h263 -r 25 -b 200 -sameq -acodec libamr_nb -ac 1 -ar 8000  -ab ".$bitrate."k ".$output_filename."  2>&1";
        $command   = "ffmpeg -i ".$file_name." -ss 00:".$start." -t 00:".$end." ".$meta." -s 176x144  -ac 1 -ar 8000  -ab ".$bitrate."k ".$output_filename."  2>&1";
        passthru($command);
        $output = ob_get_contents();
        ob_end_clean();
        //echo $command;die;
        if(file_exists($output_filename)){
            return $output_filename;
        }else{
            return false;
        }
    }

    function process_mp3($file_name, $bitrate,$meta, $start, $end, $output_filename){
        $this->init_convert($output_filename, $meta,'mp3');
        $command = "ffmpeg -i ".$file_name." -ss 00:".$start." -t 00:".$end." ".$meta." -acodec libmp3lame -ab ".$bitrate."k ".$output_filename."  2>&1";
        passthru($command);
        $output = ob_get_contents();
        ob_end_clean();
        
        if(file_exists($output_filename)&&filesize($output_filename)>0){
            return $output_filename;
        }else{
            var_dump($output);die; 
            return false;
        }
    }

    private function process_bliptv_video_name(&$video_name){
        $temp_1 = explode('/', $video_name);
        $temp_2 = array_reverse($temp_1);
        $video_name = $temp_2[0];
    }

    private function fetch_extension($filename){
        $str = strrev($filename);
        $temp_1 = explode('.', $str);
        $temp_2 = $temp_1[0];
        $result = ".".strrev($temp_2);
        return $result;
    }

    private function get_percent($progress){
        if(substr_count($progress, '%')>0){
            $values = explode('%', $progress);
            $value = $values[0];
            $value = str_replace('.', '', $value);
            $value = str_replace('..', '', $value);
            $res = trim($value);
            return $res;
        }
        return false;
    }

    function fetch_bliptv_video($video_name,$file_name){

        $this->process_bliptv_video_name($video_name);
        $extension = $this->fetch_extension($video_name);
        //$extension = "";
        $log_file = root_url().$this->log_path.$file_name;

        $log = fopen($log_file, 'w') or die('wtf');;

        $video_file_name = $file_name.".flv";
        //

        $command = "sh ".root_url().$this->bliptv_dl." ".$video_name.' '.$video_file_name.' 2>&1';
        echo $command;die;
        $handle = popen($command, 'rb');
        while(!feof($handle))
        {
            $progress = fread($handle, 8192);
            $res = $this->get_percent($progress);
            if($res){
                fwrite($log, $res."\r\n");
            }
        }
        fclose($log);
        pclose($handle);
//        die($command);
        if(file_exists(root_url().$this->dl_path.$video_file_name)){
            return root_url().$this->dl_path.$video_file_name;
        }else{
            return false;
        }
    }

    public function fetch_youtube_video($watch_url,$file_name){
        $log_file = root_url().$this->log_path.$file_name;

        $log = fopen($log_file, 'w') or die('wtf');;

        $video_file_name = $file_name.".flv";
        $handle = popen(python_path().root_url().$this->youtube_dl.' '.$watch_url.' -o '.root_url().$this->dl_path.$video_file_name.' 2>&1', 'rb');
       // echo python_path().root_url().$this->youtube_dl.' '.$watch_url.' -o '.root_url().$this->dl_path.$video_file_name.' 2>&1';die;
      while(!feof($handle))
        {
            $progress = fread($handle, 8192);
            if(substr_count($progress, '%')){
                $values = explode(' ', $progress);
                foreach($values as $is_percent){
                    if(substr_count($is_percent, '%')){
                        fwrite($log, $is_percent."\r\n");
                    }
                }
            }
        }
        fclose($log);
        pclose($handle);

        if(file_exists(root_url().$this->dl_path.$video_file_name)){
            return root_url().$this->dl_path.$video_file_name;
        }else{
            echo python_path().root_url().$this->youtube_dl.' '.$watch_url.' -o '.root_url().$this->dl_path.$video_file_name.' ';
            return false;
        }
    }

    function fetch_vimeo_flv($video_id,$file_name){
        $extension = ".flv";
        $log_file = root_url().$this->log_path.$file_name;

        $log = fopen($log_file, 'w') or die('wtf');;

        $file_name = str_replace('.flv', '', $file_name);
        $video_file_name = $file_name.$extension;


        $command = "sh ".root_url().$this->vimeo_dl." ".$video_id.' '.$file_name.' 2>&1';
        $handle = popen($command, 'rb');
        while(!feof($handle))
        {
            $progress = fread($handle, 8192);
            if(substr_count($progress, '%')){
                $values = explode(' ', $progress);
                foreach($values as $is_percent){
                    if(substr_count($is_percent, '%')){
                        fwrite($log, $is_percent."\r\n");
                    }
                }
            }
        }
        fclose($log);
        pclose($handle);
        //echo root_url().$this->dl_path.$video_file_name;die;
        if(file_exists(root_url().$this->dl_path.$video_file_name)&&filesize(root_url().$this->dl_path.$video_file_name)>0){
            return root_url().$this->dl_path.$video_file_name;
        }else{
            return false;
        }
    }


}
