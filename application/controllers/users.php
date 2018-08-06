<?php
  /**
  * Controller for users
  */

  class Users extends CI_Controller{
    
    //Register Page  	
    Public function register(){
      $data['title'] = 'Sign Up';

      //Validasi Register
  		$this->form_validation->set_rules('name', 'Name', 'required');
  		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
  		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
  		$this->form_validation->set_rules('password', 'Password', 'required');
  		$this->form_validation->set_rules('repassword', 'Confirm Password', 'matches[password]');
      
      if($this->form_validation->run() === FALSE){
        //Jika Gagal Load register Page
        $this->load->view('template/header');
	      $this->load->view('users/register', $data);
	      $this->load->view('template/footer'); 
      }else{ 
        //Jika berhasil set encrypt Password
      	$enc_password = md5($this->input->post('password'));
      	
        $this->user_model->register($enc_password);
        
        //set Flash Message
      	$this->session->set_flashdata('user_registered', 'You are now registered and can log in');
      	redirect('users/register');
      }
  	}

    // Function untuk Login
    Public function login(){
      $data['title'] = 'Login';

      // validasi Login
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      
      if($this->form_validation->run() === FALSE){
        // Jika validasi gagal load login page
        $this->load->view('template/header');
        $this->load->view('users/login', $data);
        $this->load->view('template/footer'); 
      }else{
        // Jika berhasil -> get username dan password
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        // cek Username dan password
        $user_id = $this->user_model->login($username, $password);

        if($user_id){
          // Jika user ditemukan create session user
          $user_data = array(
            'id_user' => $user_id,
            'username' => $username,
            'logged_in' =>  true
          );
          
          $this->session->set_userdata($user_data);

          //set Flash Message dan redirect ke page post
          $this->session->set_flashdata('user_loggedin', 'You are now log in');
          redirect('posts');
        }else{
          // jika user tidak ditemukan set Flash Message dan kembali ke page login
           $this->session->set_flashdata('user_failed', 'Login Is invalid');
           redirect('users/login');
        }
      }
    }
    
    // Function Logout
    public function logout(){
      // Clear session User
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('id_user');
      $this->session->unset_userdata('username');

      // Set Flash message and redirect to login form
      $this->session->set_flashdata('user_loggedout', 'You are now log out');

      redirect('users/login');
    }

    // Function untuk cek username exist
    Public function check_username_exists($username){
      $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
      
      if($this->user_model->check_username_exists($username)){
        return true;
      }else{
        return false;
      }
    }

    // Function untuk cek email exist
    Public function check_email_exists($email){
      $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');

      if($this->user_model->check_email_exists($email)){
        return true;
      }else{
        return false;
      }
    }
  }

