<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Json extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('Datatables', 'datatables');
	}

    public function show_user(){
		$this->datatables->table('user');
		$this->datatables->select(' id_user as id, username as val1,email as val2,role as val3');
		$this->datatables->order('username','ASC');
		echo $this->datatables->draw();
	}

    public function show_soal(){
		$this->datatables->table('soal');
		$this->datatables->select(' id_soal as id, text_soal as val1,nama_paket as val2');
        $this->datatables->join('paket_soal', 'paket_soal.id_paket_soal = soal.id_paket_soal');
		$this->datatables->order('text_soal','ASC');
		echo $this->datatables->draw();
	}

    public function show_paket(){
		$this->datatables->table('paket_soal');
		$this->datatables->select(' id_paket_soal as id, nama_paket as val1');
		$this->datatables->order('nama_paket','ASC');
		echo $this->datatables->draw();
	}
	
	public function tampil_po(){

		$this->datatables->table('po');
		//$this->datatables->select('*');
		$this->datatables->select("no_po AS val1,nama AS val2,nama_client AS val3,tgl_dateline AS val4,sarci_projek.id_projek AS ids");
		$this->datatables->join('sarci_projek', 'sarci_projek.id_projek=po.id_projek ');
		$this->datatables->join('produk', 'produk.id_produk=po.id_produk  ');
		$this->datatables->join('sarci_pegawai', 'sarci_pegawai.id_pegawai = sarci_projek.id_pegawai');	
		$this->datatables->order('tgl_dateline','ASC');
		$this->datatables->group('no_po');


		//draw with group
		echo $this->datatables->draw();
	}

	public function tampil_produk(){
		$this->datatables->table('produk');
		$this->datatables->select('id_produk,kode_produk,satuan,item_mo');
		$this->datatables->order('kode_produk','ASC');
		//draw with group
		echo $this->datatables->draw();
	}

	public function tampil_mo_order(){
		$this->datatables->table('mo_order');
		$this->datatables->select('*');
		$this->datatables->join('sarci_projek', 'sarci_projek.id_projek=mo_order.id_projek ');
		$this->datatables->join('po', 'po.id_projek=sarci_projek.id_projek ');
		$this->datatables->join('produk', 'produk.id_produk=po.id_produk ');
		//$this->datatables->group('sarci_projek.id_projek');
		$this->datatables->group('mo_order.no_mo');
		//draw with group
		echo $this->datatables->draw();
	}
}

?>
