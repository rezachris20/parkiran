<?php
defined('BASEPATH')OR exit();
/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		
		if($this->session->userdata('status') != "login")
		{
			redirect(base_url().'login?pesan=belumlogin');
		}

		$this->load->model('m_parkiran','m');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	function index()
	{
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_index');
		$this->load->view('admin/v_footer');
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login?pesan=logout');
	}
}
?>