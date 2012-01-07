<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
            $data['active_menu'] = "home";
            $data['content'] = "index";
            $this->load->view("main_template",$data);
	}
}
