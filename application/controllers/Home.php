<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home');
	}
	public function go()
	{
		$this->load->view('go');
	}
	public function read_more()
	{
		$this->load->view('read_more');
	}
	public function Create()
	{
		$this->load->view('create');
	}
	public function error()
	{
		$this->load->view('error');
	}
	public function delete()
	{
		$this->load->view('delete');
	}
	public function view()
	{
		$this->load->view('view');
	}
	public function update()
	{
		$this->load->view('update');
	}

	// images 
	public function art1()
	{
		$this->load->view('img/art1.jpg');
	}
	public function art2()
	{
	    $this->load->view('img/art2.jpg');
	}
	public function art3()
	{
		$this->load->view('img/art3.jpg');
	}
	public function art4(){
		$this->load->view('img/art4.jpg');
	}
	public function art5(){
		$this->load->view('img/art5.jpg');
	}
	public function art6(){
		$this->load->view('img/art6.jpg');
	}
	public function art7(){
		$this->load->view('img/art7.jpg');
	}
	public function art8(){
		$this->load->view('img/art8.jpg');
	}
	public function art9(){
		$this->load->view('img/art9.jpg');
	}
	public function art10(){
		$this->load->view('img/art10.jpg');
	}
	public function img_forest(){
		$this->load->view('img/img_forest.jpg');
	}
	public function img_mountains(){
		$this->load->view('img/img_mountains.jpg');
	}
	public function img_snow(){
		$this->load->view('img/img_snow.jpg');
	}
	
}	
	
	
	
	
	
	

