 <?php
  /**
  * Model to manage category
  */

  class Category_model extends CI_Model{
    public function __construct(){
  	  $this->load->database();
  	}

    public function get_categories(){
      $this->db->order_by('category_name');
      $query = $this->db->get('categori_blog');

      return $query->result_array( );
    }

  	public function create_category(){
      $data = array(
        'category_name' => $this->input->post('name')
      );

      return $this->db->insert('categori_blog', $data);
  	}

    public function get_category($id){
      $query = $this->db->get_where('categori_blog', array('id_category' => $id));
      return $query->row();
    }
  }