<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Create extends CI_Controller{

	public function CreateArt(){

			$this->form_validation->set_rules('Name','Artist Name','required');
			$this->form_validation->set_rules('Art_Name','Art Name','required');
			$this->form_validation->set_rules('Size','Size','required');
			$this->form_validation->set_rules('Date','Date','required');
			$this->form_validation->set_rules('Category','Category','required');
			$this->form_validation->set_rules('Directory','Directory','required');
			if($this->form_validation->run() == FALSE){

				$this->load->view('Create');
			}
			else{

				$this->load->model('Model_user');
				$response = $this->Model_user->insertArtdata();

				if($response){

					$this->session->set_flashdata('msg','Add art successfully');
					redirect('Home/Create');
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('Home/Create');

				}
				
			}
		}



		


	}
 