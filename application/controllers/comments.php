<?php
  /**
  *  Class for manage Comment
  */

  class Comments extends CI_Controller{

    // Create comment
    public function create($post_id){
      // Get seo url post
    	$slug = $this->input->post('slug');

      // Get data post berdasarkan seo url post 
    	$data['post'] = $this->post_model->get_posts($slug);

      // Validasi form comment
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'valid_email');
      $this->form_validation->set_rules('body', 'Body', 'required');

      if($this->form_validation->run() === FALSE){
        // Jika validasi gagal
    	  $this->load->view('template/header');
    	  $this->load->view('posts/view', $data);
    	  $this->load->view('template/footer');
      }else{
        // Jika berhasil
    	  $this->comment_model->create_comment($post_id);
    	  redirect('posts/' .$slug);
      }
    }
  }