<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	public function index(){
            $data['active_menu'] = "portfolio";
            $data['content'] = "portfolio/index";
            $this->load->view("main_template",$data);
	}
        
        public function effect(){
                $data['active_menu'] = "portfolio";
		//$this->load->view('portfolio/index',$data);
                $data['content'] = "portfolio/effect";
                $this->load->view("main_template",$data);
	}
}
