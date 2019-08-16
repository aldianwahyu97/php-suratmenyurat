<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('m_datasuratmasuk');
		$this->load->model('m_datasuratkeluar');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function beranda()
	{
		$data['surat_masuk'] = $this->m_datasuratmasuk->jumlah_data()->num_rows();
		$data['surat_keluar'] = $this->m_datasuratkeluar->jumlah_data()->num_rows();
		$data['surat_masuk2'] = $this->m_datasuratmasuk->tanggal_terakhir()->result();
		$this->load->view('v_beranda',$data);
		//var_dump($data);
	}

	public function suratmasuk()
	{
		$data['surat_masuk'] = $this->m_datasuratmasuk->tampil_data()->result();
		$this->load->view('v_suratmasuk',$data);
	}

	public function suratkeluar()
	{
		$data['surat_keluar'] = $this->m_datasuratkeluar->tampil_data()->result();
		$this->load->view('v_suratkeluar',$data);
	}

	public function tambah_suratkeluar(){
		$agenda = $this->input->post('no_agenda');
		$nomor_surat = $this->input->post('no_surat');
		$dari = $this->input->post('dari');
		$prihal = $this->input->post('prihal');
		$informasi = $this->input->post('informasi');
		$tanggal = date("Y-m-d H:i:s");

		$data = array(
			'tgl_surat' => $tanggal,
			'no_agenda' => $agenda,
			'no_surat' => $nomor_surat,
			'dari' => $dari,
			'prihal' => $prihal,
			'informasi' => $informasi
			);
		$this->m_datasuratmasuk->input_surat($data,'surat_keluar');
		redirect('Welcome/suratkeluar');
	}

	public function tambah_suratmasuk(){
		$agenda = $this->input->post('no_agenda');
		$nomor_surat = $this->input->post('no_surat');
		$dari = $this->input->post('dari');
		$prihal = $this->input->post('prihal');
		$informasi = $this->input->post('informasi');
		$tanggal = date("Y-m-d H:i:s");

		$data = array(
			'tgl_surat' => $tanggal,
			'no_agenda' => $agenda,
			'no_surat' => $nomor_surat,
			'dari' => $dari,
			'prihal' => $prihal,
			'informasi' => $informasi
			);
		$this->m_datasuratmasuk->input_surat($data,'surat_masuk');
		redirect('Welcome/suratmasuk');
	}

	// public function edit_suratmasuk($no){
	// 	$where = array('no' => $no);
	// 	$data['surat_masuk'] = $this->m_datasuratmasuk->edit_suratmasuk($where,'surat_masuk')->result();
	// 	$this->load->view('v_suratmasuk',$data);
	// }

	function update_suratmasuk(){
        $no_agenda=$this->input->post('no_agenda');
        $no_surat=$this->input->post('no_surat');
        $dari=$this->input->post('dari');
		$prihal=$this->input->post('prihal');
		$informasi=$this->input->post('informasi');
        $this->m_datasuratmasuk->update_datasuratmasuk($no_agenda,$no_surat,$dari,$prihal,$informasi);
        redirect('Welcome/suratmasuk');
	}

	function update_suratkeluar(){
        $no_agenda=$this->input->post('no_agenda');
        $no_surat=$this->input->post('no_surat');
        $dari=$this->input->post('dari');
		$prihal=$this->input->post('prihal');
		$informasi=$this->input->post('informasi');
        $this->m_datasuratkeluar->update_datasuratkeluar($no_agenda,$no_surat,$dari,$prihal,$informasi);
        redirect('Welcome/suratkeluar');
	}
	
	function hapus_suratmasuk(){
		$no_surat=$this->input->post('no_surat');
		$this->m_datasuratmasuk->hapus_datasuratmasuk($no_surat);
		// $where = array('no' => $no);
		// $this->m_datasuratmasuk->hapus_datasuratmasuk($where,'surat_masuk');
        redirect('Welcome/suratmasuk');
	}
	
	function hapus_suratkeluar(){
		$no_surat=$this->input->post('no_surat');
		$this->m_datasuratkeluar->hapus_datasuratkeluar($no_surat);
		// $where = array('no' => $no);
		// $this->m_datasuratmasuk->hapus_datasuratmasuk($where,'surat_masuk');
        redirect('Welcome/suratkeluar');
    }

	// public function update_suratmasuk(){
	// 	$no_agenda = $this->input->post('no_agenda');
	// 	$no_surat = $this->input->post('no_surat');
	// 	$dari = $this->input->post('dari');
	// 	$prihal = $this->input->post('prihal');
	// 	$informasi = $this->input->post('informasi');
	
	// 	$data = array(
	// 		'no_agenda' => $no_agenda,
	// 		'no_surat' => $no_surat,
	// 		'dari' => $dari,
	// 		'prihal' => $prihal,
	// 		'informasi' => $informasi,
	// 	);
	
	// 	$where = array(
	// 		'no' => $no
	// 	);
	
	// 	$this->m_datasuratmasuk->update_datasuratmasuk($where,$data,'surat_masuk');
	// 	redirect('Welcome/suratmasuk');
	// }
}
