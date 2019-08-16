<?php 

class M_datasuratmasuk extends CI_Model{
	function tampil_data(){
		return $this->db->get('surat_masuk');
	}

	function jumlah_data(){
		$hasil = $this->db->query("SELECT * FROM surat_masuk");
		return $hasil;
	}

	function tanggal_terakhir(){
		$hasil = $this->db->query("SELECT tgl_surat FROM surat_masuk ORDER BY tgl_surat DESC LIMIT 1");
		return $hasil;
	}

	function input_surat($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_suratmasuk($where,$table){		
		return $this->db->get_where($table,$where);
	}

	// function update_datasuratmasuk($where,$data,$table){
	// 	$this->db->where($where);
	// 	$this->db->update($table,$data);
	// }

	function update_datasuratmasuk($no_agenda,$no_surat,$dari,$prihal,$informasi){
        $hasil=$this->db->query("UPDATE surat_masuk SET no_agenda='$no_agenda',no_surat='$no_surat',dari='$dari',prihal='$prihal',informasi='$informasi' WHERE no_agenda='$no_agenda'");
        return $hasil;
	}
	
	function hapus_datasuratmasuk($no_surat){
        $hasil=$this->db->query("DELETE FROM surat_masuk WHERE no_surat='$no_surat'");
        return $hasil;
	}

	// function hapus_datasuratmasuk($where,$table){
	// 	$this->db->where($where);
	// 	$this->db->delete($table);
	// }
}