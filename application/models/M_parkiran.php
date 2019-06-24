<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_parkiran extends CI_Model
{
	function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	function ambildata($table)
	{
		return $this->db->get($table);
	}
	
	function tambahdata($data,$table)
	{
		$this->db->insert($table,$data);
	}

	function ambilid($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	function updatedata($where,$data,$table)
	{
		$this->db->where ($where);
		$this->db->update($table,$data);
	}

	function hapusdata($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function simpan_pelanggan($nama,$alamat,$hp,$brandmobil,$merkmobil,$plat,$image_name,$koderandom)
	{
		$data = array(
			'nama_pelanggan' => $nama,
			'alamat_pelanggan' => $alamat,
			'hp_pelanggan' => $hp,
			'brand_mobil' => $brandmobil,
			'merk_mobil' => $merkmobil,
			'plat_mobil' => $plat,
			'qr_code' => $image_name,
			'kode' => $koderandom
		);

		$this->db->insert('tb_pelanggan',$data);
	}

	function simpan_parkir($koderandom,$tgl)
	{
		$data = array(
			'kode_pelanggan' => $koderandom,
			'masuk' => $tgl
		);

		$this->db->insert('tb_parkir',$data);
	}

	function get_data_masuk_bykode($kode){
        $hsl=$this->db->query("SELECT * FROM tb_pelanggan WHERE kode=$kode");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    
                    'nama_pelanggan' => $data->nama_pelanggan,
                    'merk_mobil' => $data->merk_mobil,
                 
                    'plat_mobil' => $data->plat_mobil, 

                    );
            }
        }
        return $hasil;
    }

    function get_data_keluar_bykode($kode){
        $hsl=$this->db->query("SELECT * FROM tb_pelanggan,tb_parkir WHERE tb_pelanggan.kode=tb_parkir.kode_pelanggan AND kode='$kode' AND keluar='0000-00-00 00:00:00'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
            	date_default_timezone_set('Asia/Jakarta');
            	$date = date('Y-m-d H:i:s');
            	$awal = strtotime($data->masuk);
            	$akhir = strtotime($date);
            	$lamaparkir = $akhir-$awal;
            	$jam = floor($lamaparkir/(60*60));

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
		            $bayar = 30000;
		        }

                $hasil=array(
                    'qr_code' => $data->qr_code,
                    'nama_pelanggan' => $data->nama_pelanggan,
                    'merk_mobil' => $data->merk_mobil,
                    'plat_mobil' => $data->plat_mobil,
                    'masuk' => $data->masuk,
                    'keluar' => $date,
                    'lama_parkir' => $jam,
                    'bayar' => $bayar,
                           
                    );
            }
        }
        return $hasil;
    }
    
}
?>