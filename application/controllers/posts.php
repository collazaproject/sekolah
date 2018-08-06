<?php
  /**
  * Post module for home page blog, detail view, created, delete, update
  */
  
  class Posts extends CI_Controller{
  	// Halaman default post
    public function index($offset = 0){
      $config['base_url'] = base_url() . 'posts/index';
      $config['total_rows'] = $this->db->count_all('blog');
      $config['per_page'] = 2;
      $config['uri_segment'] = 3;
      $config['attributes'] = array('class' => 'page-links');

      $this->pagination->initialize($config);

	  $data['title'] = "Blog";
	  $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

	  $this->load->view('template/header');
	  $this->load->view('posts/index', $data);
	  $this->load->view('template/footer'); 
    }

  	// View post
    public function view($slug = NULL){
      // Get data post
	  $data['post'] = $this->post_model->get_posts($slug);
	  $post_id = $data['post']['id_blog'];

	  $data['comments'] = $this->comment_model->get_comment($post_id);

	  if(empty($data['post'])) { 
		  show_404();
	  }

	  $data['title'] = $data['post']['title'];

	  $this->load->view('template/header');
	  $this->load->view('posts/view', $data);
	  $this->load->view('template/footer');
    }
    
    // Create post/blog
    public function create(){
	  //Validasi Users Login
	  if(!$this->session->userdata('logged_in')){
	    redirect('users/login');
	  }

	  $data['title'] = "Create Blog";
      $data['categories'] = $this->post_model->get_categories();

	  $this->form_validation->set_rules('title', 'Title', 'required');
	  $this->form_validation->set_rules('body', 'Body', 'required');

	  if($this->form_validation->run() === FALSE) {
	    $this->load->view('template/header');
	    $this->load->view('posts/create', $data);
	    $this->load->view('template/footer');  
	  }else{
        //Upload image
	   $config['upload_path'] = "./assets/images/posts";
	   $config['allowed_types'] = 'gif|jpg|png';
	   $config['max_size'] = '2048';
	   $config['max_width'] = '1024';
	   $config['max_height'] = '1024';

	   $this->load->library("upload", $config);
       $this->upload->initialize($config);

         if(!$this->upload->do_upload("userfile")) {
           $errors = array('error' => $this->upload->display_errors());
           $post_image= "noname.jpg";
          }else{
            $data = array('upload_data' => $this->upload->data());
            $post_image = $_FILES['userfile']['name'];
          }

		$this->post_model->create_post($post_image);
				
		//set Flash Message
      	$this->session->set_flashdata('post_created', 'Your post has been created');
        redirect('posts');
	   }			
	}

    public function delete($id_post){
	  //Validasi Users Login
	  if(!$this->session->userdata('logged_in')){
	    redirect('users/login');
	  }
      
      $this->post_model->delete_post($id_post);
	  
	  //set Flash Message
	  $this->session->set_flashdata('post_deleted', 'Your post has been deleted');
	  redirect('posts');
    }

    public function edit($slug){
	  //Validasi Users Login
	  if(!$this->session->userdata('logged_in')){
	    redirect('users/login');
	  }
      
      $data['post'] = $this->post_model->get_posts($slug);
      $data['categories'] = $this->post_model->get_categories();
      
      if(empty($data['post'])) {
	    show_404();
	  }
      
      $data['title'] = $data['post']['title'];

      $this->load->view('template/header');
	  $this->load->view('posts/update', $data);
	  $this->load->view('template/footer');
	}

    public function update(){
	  //Validasi Users Login
	  if(!$this->session->userdata('logged_in')){
	    redirect('users/login');
	  }
	  
	  $this->post_model->update_post();
	   		
	  //set Flash Message
      $this->session->set_flashdata('post_updated', 'Your post has been updated');
      redirect('posts');	   		
	}
  }

