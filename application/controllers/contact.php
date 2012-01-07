<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index(){
            $data['active_menu'] = "contact";
            $data['content'] = "contact/index";
            $this->load->view("main_template",$data);
	}
}
