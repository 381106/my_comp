<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedbacks extends CI_Controller {
    
        private $active_menu = "feedbacks";
    
	public function index(){
            
            $data['active_submenu'] = "html_to_pdf";
            $data['active_menu'] = $this->active_menu;
            $data['content'] = "feedbacks/index";
            $this->load->view("main_template",$data);
	}
}
