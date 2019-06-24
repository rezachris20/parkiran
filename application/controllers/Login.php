<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_parkiran','m');
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	function admin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if ($this->form_validation->run() != false)
		{
			$where = array (
				'username' => $username,
				'password' => md5($password)
			);

			$data = $this->m->edit_data($where,'tb_user');
			$d = $this->m->edit_data($where,'tb_user')->row();
			$cek = $data->num_rows();

			if ($cek > 0)
			{
				$session = array(
					'id' => $d->id,
					'nama' => $d->nama,
					'username' => $d->username,
					'id_karyawan' => $d->id_karyawan,
					'foto' => $d->foto,
					'status' => 'login'
				);

				$this->session->set_userdata($session);
				redirect(base_url().'parkir');
			}
			else
			{
				redirect(base_url().'login?pesan=gagal');
			}
		}
		else
		{
			$this->load->view('v_login');
		}
	}
}
