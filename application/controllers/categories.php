<?php
  /**
  * Class for manage categories
  */
  
  class Categories extends CI_Controller{
  	
    // Halaman default category
    public function index(){
      $data['title'] = 'Categories';

      // Get categories data
      $data['categories'] = $this->post_model->get_categories();

      // Load Template dan category data
      $this->load->view('template/header');
      $this->load->view('categories/index', $data);
      $this->load->view('template/footer');
    }

    // Fungsi Untuk create category
    public function create(){
      //Validasi session Login user
      if(!$this->session->userdata('logged_in')){
        redirect('users/login');
      }
      
  	  $data['title'] = 'Create Categories';
      
      // Validasi Form add categori
  	  $this->form_validation->set_rules('name', 'Name', 'required');
  	  if($this->form_validation->run() === FALSE) {
        // Jika validasi form gagal
  	    $this->load->view('template/header');
  	  	$this->load->view('categories/create', $data);
  	  	$this->load->view('template/footer');
  	  }else{
        // Jika validasi form berhasil
  	    $this->category_model->create_category();

        //set Flash Message and redirect to page view category
        $this->session->set_flashdata('category_created', 'Your category has been created');
  	  	redirect('categories');
  	  }
  	}

    // Function to get post/blog berdasarkan category tertentu
    public function posts($id){
      // Set title berdasarkan category terpilih
      $data['title'] = $this->category_model->get_category($id)->category_name;

      // Get post
      $data['posts'] = $this->post_model->get_post_by_category($id);

      $this->load->view('template/header');
      $this->load->view('posts/index', $data);
      $this->load->view('template/footer');
    }
  }
  