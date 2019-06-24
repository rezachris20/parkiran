<?php
defined('BASEPATH')OR exit();
/**
 * 
 */
class Parkir extends CI_Controller
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
        $date = date('Y-m-d');
		$data['pelanggan'] = $this->db->query("SELECT * FROM tb_pelanggan")->result();
        $data['brandmobil'] = $this->db->query("SELECT * FROM tb_brandmobil")->result();
		$data['parkir'] = $this->db->query("SELECT * FROM tb_parkir,tb_pelanggan,tb_brandmobil WHERE tb_parkir.kode_pelanggan = tb_pelanggan.kode AND tb_pelanggan.brand_mobil = tb_brandmobil.id AND bayar='' ORDER BY masuk DESC  ")->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/parkir/v_parkir',$data);
		$this->load->view('admin/v_footer');
	}

    function get_merkmobil()
    {
        $id = $this->input->post('id');
        $data= $this->db->query("SELECT * FROM tb_merkmobil WHERE id_brandmobil ='$id' ")->result();
        echo json_encode($data);
    }

    function simpan()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $hp = $this->input->post('hp');
        $brandmobil = $this->input->post('brandmobil');
        $merkmobil = $this->input->post('merkmobil');
        $plat = $this->input->post('plat');
        $koderandom = $this->input->post('koderandom');
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('Y-m-d H:i:s');

        if ($nama == '')
        {
            $result['pesan1'] = "Nama Harus di isi";
        }
        elseif ($alamat == '')
        {
            $result['pesan1'] = "Alamat Harus di isi";
        }
        elseif ($hp == '')
        {
            $result['pesan1'] = "No HP Harus di isi";
        }
        elseif ($brandmobil == '')
        {
            $result['pesan1'] = "Brand Harus di isi";
        }
        elseif ($merkmobil == '')
        {
            $result['pesan1'] = "Merk Harus di isi";
        }
        elseif ($plat == '')
        {
            $result['pesan1'] = "Plat Harus di isi";
        }
        else
        {
            $result['pesan1'] = "";
        
        
        $this->load->library('ciqrcode');

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name=$koderandom.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $koderandom; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
        $this->m->simpan_pelanggan($nama,$alamat,$hp,$brandmobil,$merkmobil,$plat,$image_name,$koderandom); //simpan ke database
        
        $this->m->simpan_parkir($koderandom,$tgl); //simpan ke database
        }
        echo json_encode($result); //redirect ke parkir usai simpan data

    }

    function cetak_qrcode()
    {   
        $this->load->view('admin/parkir/v_cetak_qrcode');    
    }

	function get_data_masuk(){
        $kodee=$this->input->post('kode');
        $data=$this->m->get_data_masuk_bykode($kodee);
        echo json_encode($data);
    }

    function get_data_keluar(){
        $kodee=$this->input->post('kkode');
        $data=$this->m->get_data_keluar_bykode($kodee);
        echo json_encode($data);
    }

    function masukparkir()
    {
    	$kode = $this->input->post('mkode');
    	date_default_timezone_set('Asia/Jakarta');


    	if ($kode == '')
    	{
    		$result['pesan'] = "Kode harus di isi";
    	}
    	else
    	{
    		$result['pesan'] = "";

	    	$data = array(
	    		'kode_pelanggan' => $kode,
	    		'masuk' => date('Y-m-d H:i:s')
	    	);

    		$this->m->tambahdata($data,'tb_parkir');
    	}

    	echo json_encode($result);

    }

    function keluarparkir()
    {
        date_default_timezone_set('Asia/Jakarta');

    	$kode = $this->input->post('kode');
        $keluar = $this->input->post('ktgljamkeluar');
        $lama = $this->input->post('klamaparkir');
        $bayar = $this->input->post('kbayar');
        $ubayar = $this->input->post('kuangbayar');
        $kembali = $this->input->post('kuangkembali');


        /*$ktgljam = $this->input->post('ktgljam');
        
        $date = date('Y-m-d H:i:s');

        $awal  = strtotime($ktgljam);
        $akhir = strtotime($date);
        $diff  = $akhir - $awal;
        $jam   = floor($diff / (60 * 60));

        
    	
        if ($jam <=1)
        {
            $bayar = 2000;
        }
        else if ($jam <=5)
        {
            $bayar = 5000;
        }
        else if ($jam <=10)
        {
            $bayar = 10000;
        }
        else if ($jam <=12)
        {
            $bayar = 15000;
        }
        else if ($jam <=24)
        {
            $bayar = 20000;
        }
        else
        {
            $bayar = 0000;
        } */

         

    	if ($kode == '')
    	{
    		$result['pesan'] = "Kode harus di isi";
    	}
        else if ($keluar == '')
        {
            $result['pesan'] = "Mobil sudah keluar/ Kode tidak terdaftar";
        }
    	else
    	{
    		$result['pesan'] = "";

    		$where = array (
    			'kode_pelanggan' => $kode,
                'keluar' => '0000-00-00 00:00:00'
    		);

    		$data = array(
    			'keluar' => $keluar,
                'lama_parkir' => $lama,
                'bayar' => $bayar,
                'uang_bayar' => $ubayar,
                'kembali' => $kembali
    			
    		);

    		$this->m->updatedata($where,$data,'tb_parkir');
    	}
    	echo json_encode($result);
    }

    function struk()
    {
        $id = $this->input->get('id');

        $data['parkir'] = $this->db->query("SELECT * FROM tb_parkir,tb_pelanggan WHERE tb_parkir.kode_pelanggan=tb_pelanggan.kode AND id_parkir=$id")->result();
        $this->load->view('admin/parkir/v_cetak_struk',$data);
    }
    

}
?>