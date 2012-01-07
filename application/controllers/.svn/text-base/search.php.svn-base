<?php

class Search extends CI_Controller {
    
    private $total_rows;
    private $allowed_api = array('youtube','vimeo','blip.tv','livevideo');

	function Search(){
                $this->load->model('youtube_model');

	}

        function autocomplete(){
            $search_tag = $_REQUEST['q'];
            $limit      = $_REQUEST['limit'];
            $result     = $this->tags_model->search_tags($search_tag,$limit);

            if($result){
                foreach ($result as $value){
                    print $value['tag']."\n";
                }
            }
            exit;
        }



        private function search_vimeo($keyword,$current_index,$limit){
            if(isset($_COOKIE['vimeo-token'])) {
                VimeoBase::setToken($_COOKIE['vimeo-token']);
            }
            $oResponse = VimeoVideosRequest::search($keyword,false,false,$limit);
            
            $aoVideos = $oResponse->getVideos();

            $oVideo = new VimeoVideoEntity();
            $amount = 0;
            $result = false;
            foreach($aoVideos as $oVideo) {
                $video_id = $oVideo->getID();
                $details_data = get_vimeo_xml($video_id);

//thumbnail_medium
                $item->img = $details_data[0]['thumbnail_small'];
                $item->video_id = $details_data[0]['id'];
                $item->video_title = $details_data[0]['title'];
                $item->video_description = process_description($details_data[0]['description']);
                $item->video_tags = $details_data[0]['tags'];

//NO ratings in VIMEO
                $item->video_rating = "";

                $duration = $details_data[0]['duration'];
                $duration_text = get_mins_secs($duration);
                $item->video_duration = $duration_text.'m';

                $published = $this->process_date($details_data[0]['upload_date']);
                $item->video_published = $published;

                $result[] = $item;
                $item = '';
                $amount++;
            }
            $data['search_tag'] = $keyword;
            $data['cur_index'] = $current_index;
            $data['amount'] = $amount;
            $data['found_video'] = $result;
            $data['search_api']  = 'vimeo';
            return $data;
        }


        private function search_blip_tv($keyword,$current_index,$limit){
            $amount = 0;
            $blipTV = new BlipTV();
            $result = $blipTV->find_by_tag($keyword,$limit);
            
            if($result){
                $amount = count($result);
            }
//NOTE: blip.tv hasn't publish_date parameter;
            $data['search_tag'] = $keyword;
            $data['cur_index'] = $current_index;
            $data['amount'] = $amount;
            $data['found_video'] = $result;
            $data['search_api']  = 'bliptv';
            return $data;
        }

        private function check_video_pagination_index($limit,$current_index,$total_results){
            $current_video_set_positions = $current_index*$limit;
            if($current_video_set_positions>$total_results){
                return false;
            }
            return true;
        }

        private function get_max_pagination_index($total_results,$limit){
            $result = round($total_results/$limit);
            return $result;
        }

        private function process_date($upload_date){
            $upload_date = date('Y-m-d',strtotime($upload_date));
            return $upload_date;
        }

        private function search_youtube($keyword,$current_index,$limit){
            //$current_index = $current_index*$limit;
            $res_search = $this->youtube_model->searchVideos('all',$keyword,$current_index,$limit);
            
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

        private function search_all($keyword,$current_index,$limit){
            $data = array();

            $youtube_videos = $this->search_youtube($keyword,$current_index,$limit);
            $vimeo_videos   = $this->search_vimeo($keyword,$current_index,$limit);
            $bliptv_videos  = $this->search_blip_tv($keyword, $current_index, $limit);

            if($youtube_videos['found_video']){
                $data[] = $youtube_videos;
            }
            if($vimeo_videos['found_video']){
                $data[] = $vimeo_videos;
            }

            if($bliptv_videos['found_video']){
                $data[] = $bliptv_videos;
            }
            return $data;
        }

        private function search_live_video($keyword,$current_index,$limit){
            $live_video = new Live_video();
            $result = $live_video->find_by_tag($keyword, $limit);
            $amount = count($result);

            $data['search_tag'] = $keyword;
            $data['cur_index'] = $current_index;
            $data['amount'] = $amount;
            $data['found_video'] = $result;
            $data['search_api']  = 'livevideo';
            return $data;
        }

  

        private function redirect_to_main_page(){
             redirect(base_url());
             exit;
        }

        private function redireact_to_view_video_page($api,$video_id){
            $url = base_url()."converter/view/".$video_id."/".$api;
            redirect($url);
            exit;
        }

        

        function url(){
            $api = $this->input->post('api');
            $video_id = $this->input->post('video_id');
            if(!$api||!$video_id){
                $this->redirect_to_main_page();
            }
            if(in_array($api, $this->allowed_api)){
                 $this->redireact_to_view_video_page($api, $video_id);
            }else{
                 $this->redirect_to_main_page();
            }
        }

        function quick_seach(){
            $api = $this->input->post('quick_api');
            $keyword = $this->input->post('tags');
            $limit = 10;
            $current_index = 1;
            $data['videos'] = array();

            $data = $this->process_search($api,$keyword,$current_index,$limit);

            if(empty ($data['videos'])){
                $data['videos'] = false;
            }

            $pagination = $this->init_pagination($keyword, $api,1);
            $this->pagination->cur_page = $current_index;
            $data['search_tag'] = $keyword;
            $data['pagination'] = $pagination;
            //var_dump($data);die;
            $this->session->set_userdata('back_search_url',$_SERVER['REQUEST_URI']);
            
            $this->load->view('search/by_tag',$data);
        }

        private function check_youtube_url($url){
            $link = parse_url($url,PHP_URL_QUERY);

            /**split the query string into an array**/
            if($link == null) $arr['v'] = $url;
            else  parse_str($link, $arr);
            /** end split the query string into an array**/
            if(! isset($arr['v'])) return false; //fast fail for links with no v attrib - youtube only

            $checklink = YOUTUBE_CHECK . $arr['v'];

            //** curl the check link ***//
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$checklink);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            $result = curl_exec($ch);
            curl_close($ch);

            $return = $arr['v'];
            if(trim($result)=="Invalid id") $return = false; //you tube response

            return $return;
        }

        private function check_vimeo_url(){
            if (preg_match ("/\b(?:vimeo|youtube|dailymotion)\.com\b/i", $url)) {
               return true;
               //echo "It's a video";
            }
            return false;
        }

        private function is_url($keyword,$api){
//            SWITCH ($api){
//                case 'youtube':{
//                        return $this->check_youtube_url($keyword);
//                }
//                break;
//                case 'vimeo':{
//                        return $this->check_vimeo_url($keyword);
//                }
//                break;
//            }
//            return false;
              if (preg_match ("/\b(?:vimeo|youtube)\.com\b/i", $url)) {
                   return true;
                   //echo "It's a video";
                }
                return false;
        }

	function tags($keyword='php',$search_api='',$current_index='')
	{
            if($current_index==''){
                $current_index = 1;
            }
            $limit = 10;
            $data['videos'] = array();
      //      if($this->is_url($keyword,$search_api)){

        //    }else{
                $this->tags_model->process_tag($keyword);
                $data = $this->process_search($search_api,$keyword,$current_index,$limit);
                if(empty ($data['videos'])){
                    $data['videos'] = false;
                }
//            }
//            var_dump($data['videos']);die;
//
            if($current_index!=1){
                $cur_page = $current_index/10;
            }else{
                $cur_page = 1;
            }
            $pagination = $this->init_pagination($keyword, $search_api,$cur_page);

            $this->pagination->cur_page = $cur_page;
            $data['search_tag'] = $keyword;
            $data['pagination'] = $pagination;
            $data['search_api'] = $search_api;
            $this->session->set_userdata('back_search_url',$_SERVER['REQUEST_URI']);
            $this->load->view('search/by_tag',$data);
	}

        private function process_search($search_api,$keyword,$current_index,$limit){
            switch ($search_api) {
                CASE 'youtube':{
                    $data['videos'][] = $this->search_youtube($keyword,$current_index,$limit);
                }
                break;
                CASE 'vimeo':{
                    $data['videos'][] = $this->search_vimeo($keyword,$current_index,$limit);
                }
                break;
                CASE 'bliptv':{
                    $data['videos'][] = $this->search_blip_tv($keyword, $current_index, $limit);
                }
                break;
                CASE 'livevideo':{
                    $data['videos'][] = $this->search_live_video($keyword,$current_index,$limit);
                }
                break;
                CASE 'all':{
                    $data['videos'] = $this->search_all($keyword,$current_index,$limit);
                }
                break;

                default:{
                    $data['videos'] = $this->search_all($keyword,$current_index,$limit);
                }
                break;
            }
            return $data;
        }

        private function init_pagination($keyword,$api,$cur_page){
            $config_pagination['base_url'] = base_url()."search/tags/".$keyword."/".$api."/";
            $config_pagination['total_rows'] = $this->total_rows;
            $config_pagination['per_page'] = 10;
            $config_pagination['uri_segment'] = 5;
            $config_pagination['cur_page'] = $cur_page;
            $config_pagination['num_links'] = 5;
            $config_pagination['first_link'] = '';
            $config_pagination['last_link'] = '';
            $config_pagination['next_link'] = "Next";
            $config_pagination['prev_link'] = "Previous";
            $config_pagination['page_query_string'] = false;;
            $this->pagination->initialize($config_pagination);
        }

        public function test($tag){
            
        }
}
