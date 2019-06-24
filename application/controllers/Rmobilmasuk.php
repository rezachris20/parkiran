<?php
defined('BASEPATH')OR exit();
/**
 * 
 */
class Rmobilmasuk extends CI_Controller
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
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$this->form_validation->set_rules('dari','Dari','required');
		$this->form_validation->set_rules('sampai','Sampai','required');

		if ($this->form_validation->run()!= false)
		{
			$data['laporan'] = $this->db->query("SELECT p.nama_pelanggan, p.alamat_pelanggan, p.hp_pelanggan,b.nama_brandmobil, p.merk_mobil, p.plat_mobil, pa.masuk, pa.keluar, pa.lama_parkir, pa.bayar FROM tb_pelanggan p INNER JOIN tb_parkir pa ON p.kode = pa.kode_pelanggan INNER JOIN tb_brandmobil b ON p.brand_mobil = b.id WHERE date(pa.masuk) BETWEEN '$dari' AND '$sampai' ORDER BY pa.masuk DESC ")->result();

			$this->load->view('admin/v_header');
			$this->load->view('admin/report/v_mobil_masuk_filter',$data);
			$this->load->view('admin/v_footer');
		}
		else
		{
			$this->load->view('admin/v_header');
			$this->load->view('admin/report/v_mobil_masuk');
			$this->load->view('admin/v_footer');
		}
	}

	function laporan_pdf()
	{
		$this->load->library('dompdf_gen');
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');
        

		$data['laporan'] = $this->db->query("SELECT p.nama_pelanggan, p.alamat_pelanggan, p.hp_pelanggan,b.nama_brandmobil, p.merk_mobil, p.plat_mobil, pa.masuk, pa.keluar, pa.lama_parkir, pa.bayar FROM tb_pelanggan p INNER JOIN tb_parkir pa ON p.kode = pa.kode_pelanggan INNER JOIN tb_brandmobil b ON p.brand_mobil = b.id WHERE date(pa.masuk) BETWEEN '$dari' AND '$sampai' ORDER BY pa.masuk DESC ")->result();

		$this->load->view('admin/report/v_mobil_masuk_pdf',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Mobil Masuk dan Keluar".$dari.'-'.$sampai, array('Attachment' => 0));
	}

	function laporan_excel()
	{
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		// Load plugin PHPExcel nya
    	include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    	// Panggil class PHPExcel nya
    	$excel = new PHPExcel();

    	$dari = $this->input->get('dari');
    	$sampai = $this->input->get('sampai');
        $cdari = date('d-m-Y',strtotime($dari));
        $csampai = date('d-m-Y',strtotime($sampai));

    	$data = $this->db->query("SELECT p.nama_pelanggan, p.alamat_pelanggan, p.hp_pelanggan,b.nama_brandmobil, p.merk_mobil, p.plat_mobil, pa.masuk, pa.keluar, pa.lama_parkir, pa.bayar FROM tb_pelanggan p INNER JOIN tb_parkir pa ON p.kode = pa.kode_pelanggan INNER JOIN tb_brandmobil b ON p.brand_mobil = b.id WHERE date(pa.masuk) BETWEEN '$dari' AND '$sampai' ORDER BY pa.masuk DESC")->result();

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
   		$style_col = array(
      		'font' => array('bold' => true), // Set font nya jadi bold
      		'alignment' => array(
        		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      		),
            
      		'borders' => array(
        		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      		)
    	);

    	// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    	$style_row = array(
      		'alignment' => array(
        		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      		),
      		'borders' => array(
        		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      		)
   		);

   		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MOBIL MASUK DAN KELUAR");
   		$excel->setActiveSheetIndex(0)->setCellValue('A2', "$cdari s/d $csampai");
    	$excel->getActiveSheet()->mergeCells('A1:K1');
    	$excel->getActiveSheet()->mergeCells('A2:K2'); 
    	$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
    	$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); 
   		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
   		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15); 
    	$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    	$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    	// Buat header tabel nya pada baris ke 4
    	$excel->setActiveSheetIndex(0)->setCellValue('A4', "No"); 
    	$excel->setActiveSheetIndex(0)->setCellValue('B4', "Nama"); 
    	$excel->setActiveSheetIndex(0)->setCellValue('C4', "Alamat"); 
    	$excel->setActiveSheetIndex(0)->setCellValue('D4', "No. HP"); 
    	$excel->setActiveSheetIndex(0)->setCellValue('E4', "Brand Mobil"); 
    	$excel->setActiveSheetIndex(0)->setCellValue('F4', "Merk Mobil");
    	$excel->setActiveSheetIndex(0)->setCellValue('G4', "Plat Mobil");
    	$excel->setActiveSheetIndex(0)->setCellValue('H4', "Masuk Parkir");
    	$excel->setActiveSheetIndex(0)->setCellValue('I4', "Keluar Parkir");
    	$excel->setActiveSheetIndex(0)->setCellValue('J4', "Lama Parkir");
    	$excel->setActiveSheetIndex(0)->setCellValue('K4', "Biaya");

    	// Apply style header yang telah kita buat tadi ke masing-masing kolom header
    	$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
    	$excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);

    	$no = 1;
    	$numrow = 5;
    	foreach($data as $l){ // Lakukan looping pada variabel siswa
            $total = $total+$l->bayar;
          
	      	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $l->nama_pelanggan);
	      	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $l->alamat_pelanggan);
	      	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $l->hp_pelanggan);
	      	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $l->nama_brandmobil);
	      	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $l->merk_mobil);
	      	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $l->plat_mobil);
	      	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $l->masuk);
	      	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $l->keluar);
	      	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $l->lama_parkir);
	      	$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $l->bayar);

      
	      	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	      	$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	      
	      	$no++; // Tambah 1 setiap kali looping
	      	$numrow++; // Tambah 1 setiap kali looping
	    }
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow,"Total");
            $excel->getActiveSheet()->mergeCells("A".$numrow.":"."J".$numrow);
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle("A".$numrow)->getFont()->setSize(11);
            $excel->getActiveSheet()->getStyle("A".$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow,"$total");
            $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle("K".$numrow)->getFont()->setSize(11); 
            $excel->getActiveSheet()->getStyle("K".$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            
            

	    // Set width kolom
    	$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    	$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
    	$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
    	$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
    	$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
    	$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom A
    	$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom B
    	$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom C
    	$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom D
    	$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
    	$excel->getActiveSheet()->getColumnDimension('K')->setWidth(10); // Set width kolom E

    	// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    	$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    	// Set orientasi kertas jadi LANDSCAPE
    	$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    	// Set judul file excel nya
    	$excel->getActiveSheet(0)->setTitle("Report Mobil Masuk dan Keluar");
    	$excel->setActiveSheetIndex(0);
    	// Proses file excel
    	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    	header("Content-Disposition: attachment; filename='Report Mobil Masuk dan Keluar $cdari s/d $csampai.xlsx' "); // Set nama file excel nya
    	header('Cache-Control: max-age=0');
    	$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    	$write->save('php://output');
	}
}
?>