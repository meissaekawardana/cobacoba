<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class awal extends CI_Controller{

public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('m_login');
  }

function index(){
    $this->load->view('v_login');
  }

function aksi_login(){
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$where = array(
		'username' => $username,
		'password' => md5($password)
		);
	$cek = $this->m_login->cek_login("user",$where);

	if($cek->num_rows() > 0){
      $hak = $cek->row()->status;
      if ($hak == 1) {
        $data_session = array(
          'nama' => $username,
          'status' => "login"
        );
        $this->session->set_userdata($data_session);
        if($data_session['nama']=="admin"){
          redirect(base_url("admin/admin"));
        }else{
          redirect(base_url("v_login"));
        }
      }else {
        $this->load->view('v_peng');
      }
  }else{
    echo "username & pass salah!!!";
  }

}
function logout(){
  		$this->session->sess_destroy();
  		redirect(base_url('awal/index'));
  	}

}
