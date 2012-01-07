<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demos extends CI_Controller {
    private $ffmpeg_path = "/usr/bin/";
    private $active_menu = "demos";
    
    public function index(){
        $this->html_to_image();
    }
    
    public function html_to_pdf(){
        
        $data['pdf'] = false;
        if($handler = $this->input->post('handler')){
            SWITCH ($handler){
                case "create_pdf":{
                    $html = $this->input->post("html_edit");
                    try{
                        $destination = real_path()."tmp/";
                        $file_name = "123".".pdf";
                        
                        if(file_exists($destination.$file_name)){
                            unlink($destination.$file_name);
                        }else{

                        }
                        $html2pdf = new HTML2PDF('P', 'A6', 'en');
                        $html2pdf->writeHTML($html);
                        $err = $html2pdf->Output($destination.$file_name,"F");
                        if(file_exists($destination.$file_name)){
                            $data['pdf'] = "tmp/".$file_name;
                        }else{
                            die("error");
                        }
                    }

                    catch(HTML2PDF_exception $e) {
                        echo $e;
                        exit;
                    }
                }
                break;
            }
        }
        
        $data['active_submenu'] = "html_to_pdf";
        $data['active_menu'] = $this->active_menu;
        $data['content'] = "demos/category_placement";
        $data['page_content'] = "demos/html_to_pdf/index";
        $this->load->view("main_template",$data);
        
    }
    
    public function html_to_image(){
        $data['active_menu'] = "demos";
        $data['thumbnail'] = false;
        if($handler = $this->input->post('handler')){
            SWITCH ($handler){
                case "create_html_image":{
                    $html = $this->input->post("html_edit");
                    try{
                        $destination = real_path()."tmp/";
                        $file_name = "123".".pdf";
                        
                        if(file_exists($destination.$file_name)){
                            unlink($destination.$file_name);
                        }else{

                        }
                        $html2pdf = new HTML2PDF('P', 'A6', 'en');
                        $html2pdf->writeHTML($html);
                        $err = $html2pdf->Output($destination.$file_name,"F");
                        if(file_exists($destination.$file_name)){
                            $image_name = "hey.jpg";
                            if(file_exists($destination.$image_name)){
                                unlink($destination.$image_name);
                            }
                            exec("convert -density 150 -quality 100 ".$destination.$file_name."[0] ".$destination.$image_name);
                            exec("convert ".$destination.$image_name." -trim ".$destination.$image_name);
                            if(file_exists($destination.$image_name)){
                                $data['thumbnail'] = "tmp/".$image_name;
                            }
                        }else{
                            die("error");
                        }
                    }

                    catch(HTML2PDF_exception $e) {
                        echo $e;
                        exit;
                    }
                }
                break;
            }
        }
        $data['active_submenu'] = "html_to_image";
        $data['active_menu'] = $this->active_menu;
        $data['content'] = "demos/category_placement";
        $data['page_content'] = "demos/html_to_image/index";
        $this->load->view("main_template",$data);
        
    }
    
    public function pdf_to_image(){
    
        $data['preview'] = false;
        if($handler = $this->input->post('handler')){
            SWITCH ($handler){
                case "upload_pdf":{
                    $config['upload_path'] = real_path()."tmp/";
                    $config['allowed_types'] = 'pdf';
                    $config['max_size']	= '10000';
                    $config['file_name'] = 'pdf_preview';
                    $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload("pdf_file")){
                            $data['error'] = $this->upload->display_errors();
                    }else{
                            $preview = false;
                            $upload_data = $this->upload->data();
                            $file_full_name = $upload_data['full_path'];
                            for($i=0;$i<3;$i++){
                                $img_name = "pdf_preview-".$i.".jpg";
                                $img_file = real_path()."tmp/".$img_name;
                                $th_img_file = real_path()."tmp/th_".$img_name;
                                if(file_exists($img_file)){
                                    unlink($img_file);
                                }
                                $command = "convert -density 150 -quality 100 -resize 400x ".$file_full_name."[".$i."] ".$img_file;
                                exec($command);
                                if(file_exists($img_file)){
                                    $command = "convert -density 150 -quality 100 -resize 100x ".$file_full_name."[".$i."] ".$th_img_file;
                                    exec($command);
                                    $preview[] = $img_name;
                                }
                            }
                            $data['preview'] = $preview;
                    }
                }
            }
        }
        $data['active_submenu'] = "pdf_to_image";
        $data['active_menu'] = $this->active_menu;
        $data['content'] = "demos/category_placement";
        $data['page_content'] = "demos/pdf_to_image/index";
        $this->load->view("main_template",$data);
        
        
    }    
    
    private function send_responce($status, $data=false){
        if($status){
            $responce->status = true;
            $responce->data = $data;
        }else{
            $responce->status = false;
        }
        echo json_encode($responce);
        exit;
    }
    
    public function image_manipulations(){
        
        if($this->input->post('handler')){
            $handler = $this->input->post('handler');
            $image = real_path()."stuff/rav4.jpeg";
//TODO result img should be equal to session_id            
            $new_image_name = rand(1,9999)."rav4_result.jpeg";
            
            $new_image = real_path()."tmp/".$new_image_name;
            
            switch ($handler){
                case 'filter_light':{
                    $value = $this->input->post("value");
                    $filter_status = $this->image_manipulations_model->filter_light($image,$new_image,$value);
                    $this->send_responce($filter_status, $new_image_name);
                    exit;
                }
                break;
                
                case 'filter_blur':{
                    $radius = $this->input->post("radius");
                    $sigma = $this->input->post("sigma");
                    $filter_status = $this->image_manipulations_model->filter_blur($image,$new_image,$radius,$sigma);
                    $this->send_responce($filter_status, $new_image_name);
                    exit;
                }
                break;
            
                case 'filter_sharpen':{
                    $radius = $this->input->post("radius");
                    $filter_status = $this->image_manipulations_model->filter_sharpen($image,$new_image,$radius);
                    $this->send_responce($filter_status, $new_image_name);
                    exit;
                }
                break;
            
                case 'scale_image':{
                    $value = $this->input->post("scale_image_value");
                    $filter_status = $this->image_manipulations_model->scale_image($image,$new_image,$value);
                    
                    $this->send_responce($new_image, $new_image_name);
                    exit;
                }
                break;
            
                default :{
                    $this->send_responce(false);
                }
                break;
            }
        }    
        $data['image_preview'] = false;
        $data['active_submenu'] = "image_manipulations";
        $data['active_menu'] = $this->active_menu;
        $data['content'] = "demos/category_placement";
        $data['page_content'] = "demos/image_manipulations/index";
        $this->load->view("main_template",$data);
    }
    
    function audio_processing(){
        if($this->input->post('handler')){
            
           if($this->input->post('handler')=="upload_audio"){
                $config['upload_path'] = real_path()."tmp/";
                $config['allowed_types'] = 'mp3';
                $config['max_size']	= '10000';
                $config['file_name'] = rand(0,99999).'demo_audio_file';
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload("audio_file")){
                        $data['error'] = $this->upload->display_errors();
                }else{
                    $upload_data = $this->upload->data();
                    $file_full_name = $upload_data['full_path'];
                    $movie = new ffmpeg_movie($file_full_name);
                    
                    $data['tmp_filename'] = $upload_data['file_name'];
                    
                    $ID3['duration']      = ($movie->getDuration())?round($movie->getDuration(),0):"unknown";
//                    $ID3['width']      = ($movie->getDuration()!="")?round($movie->getWidth(),0):"unknown";
//                    $ID3['height']      = ($movie->getDuration()!="")?round($movie->getHeight(),0):"unknown";
//                    $ID3['artist']        = ($movie->getArtist())?$movie->getArtist():"unknown";
//                    $ID3['genre']         = ($movie->getGenre())?$movie->getGenre():"unknown";
//                    $ID3['track_number']  = ($movie->getTrackNumber())?$movie->getTrackNumber():"unknown";
//                    $ID3['year']          = ($movie->getYear())?$movie->getYear():"unknown";
                    $ID3['bit_rate']      = ($movie->getAudioBitRate())?$movie->getAudioBitRate():"unknown";
//                    $ID3['audio_codec']   = ($movie->getAudioCodec())?$movie->getAudioCodec():"unknown";
                    $ID3['audio_channels'] = ($movie->getAudioChannels())?$movie->getAudioChannels():"unknown";
                    
                    $data['ID3'] = $ID3;
                }
                
           }
           
           if($this->input->post('handler')=="crop_audio"){
                $filename = $this->input->post('tmp_filename');
                $timeframe_start = $this->input->post('timeframe_start');
                $timeframe_end   = $this->input->post('timeframe_end');
                
                $duration = $timeframe_end-$timeframe_start;
                
                $full_file_name = real_path()."tmp/".$filename;
                $output_filename = real_path()."tmp/cropped".$filename;
                $command = $this->ffmpeg_path."ffmpeg -i ".$full_file_name." -ss ".$timeframe_start." -t ".$duration." -acodec copy -ab 256k -y ".$output_filename."  2>&1";
                
                exec($command);
//                $output = ob_get_contents();
//                ob_end_clean();
                if(file_exists($output_filename)&&filesize($output_filename)>0){
                    $data['cropped_mp3'] = "tmp/cropped".$filename;
                }else{
   
                }
           }
        }else{
            $data['default_handler'] = true;
        }
        
        $data['onload'] = "check_flash_player";
        $data['active_submenu'] = "audio_processing";
        $data['active_menu'] = $this->active_menu;
        $data['content'] = "demos/category_placement";
        $data['page_content'] = "demos/audio_processing/index";
        $this->load->view("main_template",$data);
      }
    
    public function youtube_videos($video_id=false,$html5=false){

//          $url = "http://www.google.com/search?q=php&hl=en&start=0&sa=N";
//          $this->curl->create($url);
//
//            $this->curl->option(CURLOPT_VERBOSE, 1);
//            $this->curl->option(CURLOPT_FOLLOWLOCATION, 1);
//
//            $this->curl->option(CURLOPT_URL, $url); 
//            $this->curl->option(CURLOPT_HEADER, false); 
//            $this->curl->option(CURLOPT_NOBODY, FALSE); 
//            $this->curl->option(CURLOPT_RETURNTRANSFER, TRUE); 
//            $this->curl->option(CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8"); 
//            $this->curl->option(CURLOPT_TIMEOUT, 30); 
//          
//          $data = $this->curl->execute();
//          preg_match_all('/(?<=<div\sclass=\'vsc\s\'>)[\s\S](?=<\/div>)/i',$data,$mch);
//          var_dump($mch);die;
        $this->load->model('youtube_model');
        $this->load->helper('youtube_helper');
        $data['default_handler'] = true;
        if($this->input->post('handler')){
           if($this->input->post('handler')=="search_keyword"){
               $keyword = $this->input->post("keyword");
               $data = $this->search_youtube($keyword,false,1);
               $data['default_handler'] = false;
           }
        }
        
        $data['active_submenu'] = "youtube_videos";
        $data['active_menu'] = $this->active_menu;
        $data['content'] = "demos/category_placement";
        $data['page_content'] = "demos/youtube_videos/index";
        
        
        if($video_id){
            $data['video_id'] = $video_id;
            if($html5){
                $this->load->view("demos/youtube_videos/video_popup_html5",$data);
            }else{
                $this->load->view("demos/youtube_videos/video_popup",$data);
            }
        }else{
             $data['page_content'] = "demos/youtube_videos/index";
             $this->load->view("main_template",$data);
        }
    }
    
    private function search_youtube($keyword){
            $res_search = $this->youtube_model->searchVideos('all',$keyword,$current_index=0,$limit=10);
            if($res_search->total_results>=100){
                $this->total_rows = 100;
            }else{
                $this->total_rows = $res_search->total_results;
            }
            $res = $res_search->feed;
            $result = false;
            $amount = 0;

                $result = false;
                
                foreach($res as $entry){
                    $item->img = $this->youtube_model->_getVideoThumbnail($entry);
                    $item->video_id = $this->youtube_model->_getVideoId($entry);
                    $item->video_title = $this->youtube_model->_getVideoTitle($entry);
                    $item->video_description = process_description($this->youtube_model->_getVideoDescription($entry));
                    $item->video_tags = $this->youtube_model->_getVideoTags($entry);
                    $item->video_tags = array_slice($item->video_tags, 0, 5);

                    $rating = $this->youtube_model->_getVideoRatings($entry);

                    $rating_text = round((float)$rating['average'],1);
                    $item->video_rating = $rating_text." of 5";

                    $duration = $this->youtube_model->_getVideoDuration($entry);
                    $duration_text = get_mins_secs($duration);
                    $item->video_duration = $duration_text.'m';

                    $published = $this->youtube_model->_getPublished($entry);
                    $published = $this->process_date($published);
                    $item->video_published = $published;
                    $result[] = $item;
                    $item = '';
                    $amount++;
                }

            if($amount==0){
                $amount = 1;
            }
            
            //$data['max_pagination'] = $this->get_max_pagination_index($total_results, $limit);
            $data['search_tag'] = $keyword;
            $data['cur_index'] = $current_index;
            $data['amount'] = $amount;
            $data['found_video'] = $result;
            $data['search_api']  = 'youtube';
            
            return $data;
        }
        
        private function process_date($upload_date){
            $upload_date = date('Y-m-d',strtotime($upload_date));
            return $upload_date;
        }
     
        public function design_image(){
            $data = array();
            
            if($this->input->post('handler')){
                $html_content = $this->input->post('tmp-div');
                $html_content = 
                '<link rel="stylesheet" type="text/css" href="'.base_url().'css/style2.css" media="all" />'.$html_content;
                //echo $html_content;die;
                
                
                //echo $html_content;die; 
                try{
                        $destination = real_path()."tmp/";
                        $file_name = "huy".".pdf";
                        
                        if(file_exists($destination.$file_name)){
                            unlink($destination.$file_name);
                        }else{

                        }
                        
                        $html2pdf = new HTML2PDF($orientation = 'P', $format = 'A6', $langue='en', $unicode=true, $encoding='UTF-8', $marges = array(0, 0, 0, 0));
                        

                        $html2pdf->writeHTML($html_content);
                        $err = $html2pdf->Output($destination.$file_name,"F");
                        //die;
                        if(file_exists($destination.$file_name)){
                            $image_name = "hey.jpg";
                            if(file_exists($destination.$image_name)){
                                unlink($destination.$image_name);
                            }
                            exec("convert -density 100 -quality 150 ".$destination.$file_name."[0] ".$destination.$image_name);
                            exec("convert ".$destination.$image_name." -trim ".$destination.$image_name);
                            if(file_exists($destination.$image_name)){
                                $data['thumbnail'] = "tmp/".$image_name;
                            }
                        }else{
                            die("error");
                        }
                    }

                    catch(HTML2PDF_exception $e) {
                        echo $e;
                        exit;
                    }
            }
            $data['active_submenu'] = "design_image";
            $data['active_menu'] = $this->active_menu;
            $data['content'] = "demos/category_placement";
            $data['page_content'] = "demos/design_image/index";
            $this->load->view("main_template",$data);
        
        }
        
        public function rss_weather(){
            $rss_url = "http://rp5.ru/rss/6290/ru";
            $this->load->library("RSSparser",array('url' => $rss_url, 'life' => 2));
            $data['weather'] = $this->rssparser->getFeed(6);
            foreach($data['weather'] as $key=>&$value){
                $details = explode(",", $value['description']);
                $stuff->temperature = trim((int)$details[0]);
                $stuff->wind = trim((int)$details[3]);
                $overcast = explode("(",$details[4]);
                $stuff->overcast = trim(str_replace("%)", "",$overcast[1]));
                $pressure = explode(" ",$details[5]);
                $stuff->pressure = trim($pressure[2]);
                $humidity = explode(" ",$details[6]);
                $stuff->humidity = trim((int)$humidity[2]);
                $value['details'] = $stuff;
            
                $day = date("d")+$key;
                $charts[] = "[".$day.",".$stuff->temperature."]";
                //[0, 12], [7, 7], [10, 12.5], [12, 14.5]
                $stuff = false;
            }
            $data['chart'] = implode(",", $charts);
            
            $data['active_submenu'] = "rss_weather";
            $data['active_menu'] = $this->active_menu;
            $data['content'] = "demos/category_placement";
            $data['page_content'] = "demos/rss_weather/index";
            $this->load->view("main_template",$data);
        
        }
        
        public function g_map(){
            $data['default_handler'] = true;
            if($this->input->post('handler')){
               if($this->input->post('handler')=="find_place"){
                   $data['find_address'] = $this->input->post("address");
                   //$data['find_zip'] = $this->input->post("zip");
                   $data['default_handler'] = false;
               }
            }
            $data['active_submenu'] = "g_map";
            $data['active_menu'] = $this->active_menu;
            $data['content'] = "demos/category_placement";
            $data['page_content'] = "demos/g_map/index";
            $this->load->view("main_template",$data);
        }
        
        public function photo_gallery(){
            $data['active_submenu'] = "photo_gallery";
            $data['active_menu'] = $this->active_menu;
            $data['content'] = "demos/category_placement";
            $data['page_content'] = "demos/photo_gallery/index";
            $this->load->view("main_template",$data);
        }
        
        public function video($action=false){
            $data['default_handler'] = true;
            $data['active_menu'] = "demos";
            $data['active_submenu'] = "video";
            if($action){
                switch($action){
                    
//                    case 'render':{
//                            
//                        //set default background audio
//                        $audio_location = real_path()."/stuff/slideshow_demo_content/";
//                        $background_audio = $audio_location."background.mp3";
//                            
//                        $tmp_folder_name = "tmp/".$this->session->userdata('session_id')."/";
//                        $tmp_folder = real_path().$tmp_folder_name;
//                        
//                        if(!file_exists($tmp_folder)){
//                            mkdir($tmp_folder);
//                        }
//                        chmod($tmp_folder, 0777);
//                        
//                        
//                        if($this->input->post('demo_audio')){
//                            
//                        }else{
//                           
//                            if(!is_dir($tmp_folder)){
//                                mkdir($tmp_folder);
//                                chmod($tmp_folder, 0777);
//                            }
//                            $config['upload_path'] = $tmp_folder;
//                            $config['allowed_types'] = 'mp3';
//                            $config['max_size']	= '11000';
//                            $config['file_name'] = "custom_background";
//                            $this->load->library('upload', $config);
//                            
//                            if(file_exists($tmp_folder."/".$config['file_name'].".mp3")){
//                                unlink($tmp_folder."/".$config['file_name'].".mp3");
//                            }
//                            
//                            if (!$this->upload->do_upload("background_audio_file")){
//                                    $data['error'] = $this->upload->display_errors();
//                                    echo $data['error'];die;
//                            }else{
//                                $upload_data = $this->upload->data();
//                                $background_audio = $upload_data['full_path'];
//                            }
//                        }
//                        //echo $background_audio;die;
//                        $settings['background_audio'] = $background_audio;
//                        $settings['images'] = $this->input->post('image');
//                        ////$this->session->userdata('uploaded_images');
//                        $settings['images_location'] = $this->session->userdata('photos_location');
//                        $settings['effects'] = array('fadein','fadeout','crossfade','wipe');
//                        $settings['effects_wipe'] = array("up","down","left","right");
//                        
//                        $header_image = real_path()."stuff/logo_blue.jpg";
//                        
//                        $slideshow_config = false;
//                        $slideshow_config[] = 
//$settings['background_audio'].":1"."\n".
//trim($header_image).":1 \n".
//"fadein:2"."\n";
//                        if(!$settings['images']){
//                            echo "no Image found";exit;
//                        }
//                        foreach($settings['images'] as $item){
//                            $effect_id = array_rand($settings['effects'],1);
//                            $effect = $settings['effects'][$effect_id];
//                            if($effect=="wipe"){
//                                $wipe_effect_id = array_rand($settings['effects_wipe'],1);
//                                $wipe_effect = ":".$settings['effects_wipe'][$wipe_effect_id];
//                                
//                            }else{
//                                $wipe_effect = "";
//                            }
//                            $slideshow_config[] = 
//"\n".real_path().$settings['images_location']."/".trim($item).":1"."\n".
//$effect.":1".$wipe_effect;
//                        }
//                        $slideshow_config[] = "\n".trim($header_image).":1 \n";
//                        
//                        $command_text = implode(" ", $slideshow_config);
//                        $command_file = real_path()."tmp/".$this->session->userdata('session_id').".conf";
//                        
//                        $output_dir = real_path().$tmp_folder_name;
//                        $output_file_name = "slideshow";
//                        file_put_contents($command_file, $command_text);
//                                
//                        $command = "/usr/bin/dvd-slideshow -n ".$output_file_name." -o ".$output_dir." -f ".$command_file." 2>&1";
//                        echo $command."<br>";
//                        
//                        if(file_exists($output_dir."/".$output_file_name.".vob")){
//                            chmod($output_dir."/".$output_file_name.".vob", 0777);
//                            unlink($output_dir."/".$output_file_name.".vob");
//                        }
//
//                        $output = shell_exec($command);
//                        var_dump($output);die;
//                        if(file_exists($output_dir."/".$output_file_name.".vob")){
//                            $output_file_name_flv = "slideshow.flv";
//                            if(file_exists($output_dir."/".$output_file_name_flv)){
//                                chmod($output_dir."/".$output_file_name_flv, 0777);
//                                unlink($output_dir."/".$output_file_name_flv);
//                            }
//                            
//                            //$cmd = '/usr/bin/mencoder '.$output_dir."/".$output_file_name.".vob".' -ovc lavc -lavcopts vcodec=mpeg4:vbitrate=1000:vhq:keyint=250:threads=2:vpass=1 -oac mp3lame -lameopts cbr:br=128 -ffourcc XVID -vf scale=320:-2,crop=320:240,expand=320:240 -af resample=44100:0:0 -o '.$output_dir."/".$output_file_name_flv;
//                            $cmd = '/usr/bin/mencoder '.$output_dir."/".$output_file_name.".vob".' -ovc lavc -lavcopts  vcodec=mpeg4:vbitrate=1000:vhq:keyint=250:threads=2:vpass=1 -oac mp3lame -lameopts cbr:br=128 -ffourcc XVID   -vf scale=320:-2,crop=320:240,expand=320:240 -af resample=44100:0:0  -o '.$output_dir.$output_file_name_flv;
//                            echo $cmd."<br>";
//                            //$cmd = $this->ffmpeg_path.'ffmpeg -i '.$output_dir.$output_file_name.".vob".' -r 20 -g 40 -acodec libfaac -ar 44100 -ab 96k -vcodec libx264 -sameq '.$output_dir.$output_file_name_flv;
//                            
//                            //$convert_video = "ffmpeg  -i ".$output_dir."/".$output_file_name.".vob -s 320x240 ".$output_dir."/".$output_file_name_flv;
//                            $output_flv = exec($cmd);
//                            if(file_exists($output_dir.$output_file_name_flv)){
//                                chmod($output_dir.$output_file_name_flv, 0777);
//                                $data['flash_file'] = base_url().$tmp_folder_name.$output_file_name_flv;
//                            }else{
//                                echo "error occured: convert VOB to flv";
//                            }
//                        }else{
//                            echo $command;
//                            echo "<br>";
//                            echo "error occured: create VOB file";
//                        }
//                        $data['page_content'] = "demos/video/slideshow_step_3";
//                        //$this->load->view("demos/video/slideshow_step_3",$data);
//                    }
//                    break;
//                    
//                    case 'upload_zip':{
//                        $uploaded_images = false;
//                        if($this->input->post('demo_zip')){
//                            $path_ = real_path()."stuff/slideshow_demo_content";
//                            if ($handle = opendir($path_)) {
//                                $limit = 3;
//                                $limit_position = 0;
//                                while (false !== ($file = readdir($handle))) {
//                                    if ($file != "." && $file != "..") {
//                                         $size = @getimagesize($path_."/".$file);
//                                         if($size && $size['0'] && $size['1']){
//                                             if($limit_position<$limit){
//                                                 $limit_position++;
//                                                $uploaded_images[] = $file;
//                                             }
//                                         }
//                                    }
//                                }
//                                closedir($handle);
//                                $data['photos_location'] = "stuff/slideshow_demo_content";
//                            }
//                            
//                        }else{
//                            $tmp_folder = real_path()."tmp/".$this->session->userdata('session_id');
//                            if(!is_dir($tmp_folder)){
//                                mkdir($tmp_folder);
//                                chmod($tmp_folder, 0777);
//                            }
//                            $config['upload_path'] = real_path()."tmp/";
//                            $config['allowed_types'] = 'zip';
//                            $config['max_size']	= '11000';
//                            $config['file_name'] = $this->session->userdata('session_id').'_demo_zip_file';
//                            $this->load->library('upload', $config);
//                            
//                            $uploaded_images = false;
//                            if ( ! $this->upload->do_upload("zip_file")){
//                                    $data['error'] = $this->upload->display_errors();
//                            }else{
//                                $upload_data = $this->upload->data();
//                                $full_path = $upload_data['full_path'];
//                                $zip = new ZipArchive;
//                                if ($zip->open($full_path) === true) {
//                                      for($i = 0; $i < $zip->numFiles; $i++) {
//                                             $entry = $zip->getNameIndex($i);
//                                             copy('zip://'.$full_path.'#'.$entry, $tmp_folder."/".$entry);
//                                             $size = getimagesize($tmp_folder."/".$entry);
//                                             
//                                             if($size && $size['0'] && $size['1']){
//                                                 $resize = "convert ".$tmp_folder."/".$entry." -density 150 -quality 100 -resize 640x ".$tmp_folder."/".$entry;
//                                                 exec($resize);
//                                                 $uploaded_images[] = $entry;
//                                             }else{
//                                                 unlink($tmp_folder."/".$entry);
//                                             }
//                                      }
//                                }
//                                $zip->close();    
//                                $data['photos_location'] = "tmp/".$this->session->userdata('session_id');
//                            }
//                        }
//                        $this->session->set_userdata('uploaded_images',$uploaded_images);
//                        $this->session->set_userdata('photos_location',$data['photos_location']);
//                        
//                        $data['uploaded_images'] = $uploaded_images;
//                        //$this->load->view("demos/video/slideshow_step_2",$data);
//                        $data['page_content'] = "demos/video/slideshow_step_2";
//                    }
//                    break;
//                    
//                    case 'render_output':{
//                        $data['page_content'] = "demos/video/render_output";
//                        //$this->load->view("demos/video/render_output",$data);
//                    }
//                    break;
                }
                
            }else{
                $data['page_content'] = "demos/video/index";
            }
            
            $data['active_menu'] = $this->active_menu;
            $data['content'] = "demos/category_placement";
            //$data['page_content'] = "demos/video/index";
            $this->load->view("main_template",$data);
        }
}