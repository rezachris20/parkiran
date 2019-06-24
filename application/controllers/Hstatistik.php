<?php
defined('BASEPATH')OR exit();
/**
 * 
 */
class Hstatistik extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('status') != "login")
		{
			redirect(base_url().'login?pesan=belumlogin');
		}

		$this->load->model('m_parkiran','m');
	}

	function index()
	{
		$data['tanggal'] = $this->db->query("SELECT date(masuk) AS masuk, count(bayar) AS jml FROM tb_parkir GROUP BY date(masuk)")->result();

		$data['keluar'] = $this->db->query("SELECT date(masuk) AS masuk,date(keluar) AS keluar, count(bayar) AS bayar FROM tb_parkir WHERE keluar NOT LIKE '0000-00-00%' GROUP BY date(masuk)")->result();
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/statistik/v_statistik_hari',$data);
		$this->load->view('admin/v_footer');
	}
}
?>