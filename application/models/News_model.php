<?php
/**
* Model News
*/
class News_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	// GET Table 'news'
	public function get_news($slug = FALSE) {

		if ($slug === FALSE) {
			$query = $this->db->get('news');
			return $query->result_array();
		}

		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}

	public function seekerlist($limit,$offset) {
        $query = $this->db->select('*')
                ->from('news')
                ->limit($limit,$offset)
                ->get();

        return $query->result_array();
    }


    public function num_rows()
    {
        $query = $this->db->select('*')
                ->from('news')
                ->get();

        return $query->num_rows();
    }

		public function seekerlist_by_tags($nametags, $limit,$offset) {
	        $query = $this->db->select('*')
	                ->from('news')
									->like('tags', $nametags)
	                ->limit($limit,$offset)
	                ->get();

	        return $query->result_array();
	  }

		public function num_rows_by_tags($nametags)
    {
        $query = $this->db->select('*')
                ->from('news')
								->like('tags', $nametags)
								->get();

        return $query->num_rows();
    }
}
