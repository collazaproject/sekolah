<?php
  /**
   * Class for manage profile 
   */
   
  class Profile extends CI_Controller{
    public function index(){
	  $data['title'] = "Profile";

	  $this->load->view('template/header');
	  $this->load->view('profile/index', $data);
	  $this->load->view('template/footer'); 
	}
  }