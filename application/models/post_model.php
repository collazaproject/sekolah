<?php
  /**
   * Model to manage post
   */
  
  class Post_model extends CI_Model{
    // to get database connection
    public function __construct(){
	  $this->load->database();
	}

	// Get Post from database
    public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){
      if($limit) {
        $this->db->limit($limit, $offset);
      }
	  if($slug === FALSE) {
	    $this->db->order_by('blog.id_blog', 'DESC');
		$this->db->join('categori_blog', 'categori_blog.id_category = blog.id_category');
		
		$query = $this->db->get('blog');
        return $query->result_array();
	  }

	  $query = $this->db->get_where('blog', array('slug' => $slug));
	  return $query->row_array();
    }

    public function create_post($post_image){
	  $slug = url_title($this->input->post('title'));
      $data = array(
	    'title' => $this->input->post('title'),
		'slug' => $slug,
		'body' => $this->input->post('body'),
		'id_category' => $this->input->post('category_id'),
		'create_usr' => $this->session->userdata('id_user'),
		'post_image' => $post_image
	   );

	  return $this->db->insert('blog', $data);
    }

    public function delete_post($id_post){
	  $this->db->where('id_blog', $id_post);
	  $this->db->delete('blog');
	  
	  return true;
    }

    public function update_post(){
	  $slug = url_title($this->input->post('title'));
	  $data = array(
	    'title' => $this->input->post('title'),
		'slug' => $slug,
		'body' => $this->input->post('body'),
		'create_usr' => $this->session->userdata('id_user'),
		'id_category' => $this->input->post('category_id')
	   );

	  $this->db->where('id_blog', $this->input->post('id_post'));
	  return $this->db->update('blog', $data);
    }

    public function get_categories(){
	  $this->db->order_by('category_name');

	  $query = $this->db->get('categori_blog');
	  return $query->result_array( );
    }

	public function get_post_by_category($category_id){
      $this->db->order_by('blog.id_blog', 'DESC');
	  $this->db->join('categori_blog', 'categori_blog.id_category = blog.id_category');
	  
	  $query = $this->db->get_where('blog', array('blog.id_category' => $category_id ));
      return $query->result_array();
    }
  }

	