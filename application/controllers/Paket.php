<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user','user');
        $this->load->model('M_paket','paket');
    }

    public function index()
    {
        redirect('soal','refresh');
    }


    function create(){
        if(isset($_POST['submit'])){
            $insert =  $this->paket->createPaket();
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('soal');
        }else{
            $this->load->view('soal/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $update =  $this->paket->editPaket();
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('soal');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['datapaket'] = $this->paket->getPaket_byID($params['id']);
            $head[ 'title' ] = "Halaman Admin";
            $head[ 'token' ] = $this->user->sesi_user();
            $this->load->view('header', $head);
            $this->load->view('paket/edit',$data);
        }
    }
    
    function delete($id){
        if(empty($id)){
            redirect('paket');
        }else{
            $delete =  $this->paket->deletePaket($id);
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('soal');
        }
    }
}
