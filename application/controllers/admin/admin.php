<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller{

  function __construct(){
		parent::__construct();

    if($this->session->userdata('status') != "login"){
			redirect(base_url("awal"));
		}
	}

	function index(){
    $this->load->view('admin/header');
		$this->load->view('admin/dass');
		$this->load->view('admin/footer');
	}
}
