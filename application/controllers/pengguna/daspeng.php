<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class daspeng extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status') != "login"){
      redirect(base_url("awal"));
  }

  function index()
  {
    $this->load->view('v_peng');
  }

}
}
