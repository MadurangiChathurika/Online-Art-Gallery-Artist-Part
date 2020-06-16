<?php
class Model_user extends CI_Model{

	function insertArtdata(){
		$data = array(
			'Name' => $this->input->post('Name',TRUE),
			'Art_Name' => $this->input->post('Art_Name',TRUE),
			'Size' => $this->input->post('Size',TRUE),
			'Category' => $this->input->post('Category',TRUE),
			'Date' => $this->input->post('Date',TRUE),
			'Directory' => $this->input->post('Directory',TRUE)
		);

			return $this->db->insert('arts_info',$data);
	}


		

}	

	

	
	
