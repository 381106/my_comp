<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_mins_secs'))
{
	function get_mins_secs($duration = '')
	{
		$duration_sec = (int)$duration%60;
                $duration_min = ($duration-$duration_sec)/60;
                if(strlen($duration_min)<2){
                    $duration_min = '0'.$duration_min;
                }
                if(strlen($duration_sec)<2){
                    $duration_sec = '0'.$duration_sec;
                }
                $result = $duration_min.':'.$duration_sec;
                return $result;
	}
}

if ( ! function_exists('get_secs_from_time'))
{
	function get_secs_from_time($time)
	{
            $time_arr = explode(':', $time);
            if(is_array($time_arr)&&count($time_arr>1)){
                $secs = (int)$time_arr[0]*60 + (int)$time_arr[1];
                return $secs;
            }else{
                return 0;
            }
        }
}

if ( ! function_exists('get_approximated_mp3_size'))
{
	function get_approximated_mp3_size($duration = '',$bitrate='')
	{
		//TODO add checker for file sizes < 1 mb
                $bitrate = $bitrate*1024;
                $result = round(($duration*$bitrate/8)/1000,1);
                $result = round($result/1024, 3);
                return $result;
	}
}

if ( ! function_exists('clean_watch_url'))
{
	function clean_watch_url($url = '')
	{
		$url_array = explode("&amp;feature", $url);
                //var_dump($url_array);die;
                $result = $url_array[0];
                return $result;
	}
}


if ( ! function_exists('get_vimeo_xml'))
{
	function get_vimeo_xml($video_id = '')
	{
		$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
                return $hash;
	}
}

if ( ! function_exists('process_description'))
{
	function process_description($description = '')
	{
            if(strlen($description)>100){
                $description = substr($description, 0,100)."...";
            }
            $description = html_entity_decode($description);
            return $description;
	}
}

if ( ! function_exists('process_title_to_capital'))
{
	function process_title_to_capital($title = '')
	{
            $exceptions = array('a','and','or','the');
            $title_words = explode(' ', $title);
            if(is_array($title_words)){
                foreach ($title_words as $value){
                    if(in_array($value, $exceptions)){
                        if(trim($value)){
                            $result[] = $value;
                        }
                    }else{
                        $value = ucfirst($value);
                        if(trim($value)){
                            $result[] = $value;
                        }
                    }
                }
            }
            if(is_array($result)){
                $title = implode(' ', $result);
            }
            return $title;
	}
}
?>
