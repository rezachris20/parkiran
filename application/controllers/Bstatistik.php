<?php
defined('BASEPATH')OR exit();
/**
 * 
 */
class Bstatistik extends CI_Controller
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
		$data['bulan'] = $this->db->query("SELECT count(*) AS count, date_format(masuk,'%Y-%m') AS date FROM tb_parkir GROUP BY date")->result();

		$data['kbulan'] = $this->db->query("SELECT count(*) AS count, date_format(masuk,'%Y-%m') AS date FROM tb_parkir WHERE keluar not like '0000-00-00 00:00:00' GROUP BY date")->result();

		$this->load->view('admin/v_header');
		$this->load->view('admin/statistik/v_statistik_bulan',$data);
		$this->load->view('admin/v_footer');
	}
}
?>