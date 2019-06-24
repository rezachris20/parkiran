<?php
defined('BASEPATH') OR exit();
/**
 * 
 */
class Pelanggan extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();

		if ($this->session->userdata('status')!="login")
		{
			redirect(base_url().'login?pesan=belumlogin');
		}

		$this->load->model('m_parkiran','m');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	function index()
	{
		$data['pelanggan'] = $this->db->query("SELECT * FROM tb_pelanggan,tb_brandmobil WHERE tb_pelanggan.brand_mobil = tb_brandmobil.id")->result();
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/pelanggan/v_pelanggan',$data);
		$this->load->view('admin/v_footer');
	}

	function hapusdata()
	{
		$id = $this->input->post('id');
		$where = array(
			'id_pelanggan' => $id
		);
		$this->m->hapusdata($where,'tb_pelanggan');
	}
}
?>