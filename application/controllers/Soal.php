<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user','user');
        $this->load->model('M_soal','soal');
        $this->load->model('M_paket','paket');
        $this->load->model('M_pilgan','pilgan');
        $this->load->library('Datatables', 'datatables');

    }

    public function index()
    {
        $head[ 'title' ] = "Halaman Tutor - soal";
        $head[ 'token' ] = $this->user->sesi_user();
        $data[ 'datasoal' ] = $this->soal->getSoal();
        $data[ 'datapaket' ] = $this->paket->getPaket();
        $this->load->view('header', $head);
        $this->load->view('soal/show', $data );
    }

    public function preview()
    {
        $params = array('id'=>  $this->uri->segment(3));
        $data['datapaketan'] = $this->soal->getPaketan_byID($params['id']);
        $head[ 'title' ] = "Halaman Tutor - soal";
        $head[ 'token' ] = $this->user->sesi_user();
        $this->load->view('header', $head);
        $this->load->view('soal/preview_mode', $data );
    }


    function create(){
        if(isset($_POST['submit'])){
            $insert =  $this->soal->createSoal();
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

    function create_latsol(){
        if(isset($_POST['submit'])){
            $insert =  $this->soal->insMultiOpsi();
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
            $update =  $this->soal->editSoal();
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
            $data['datasoal'] = $this->soal->getSoal_byID($params['id']);
            $head[ 'title' ] = "Halaman Admin";
            $head[ 'token' ] = $this->user->sesi_user();
            $this->load->view('header', $head);
            $this->load->view('soal/edit',$data);
        }
    }
    
    function delete($id){
        if(empty($id)){
            redirect('soal');
        }else{
            $delete =  $this->soal->deleteSoal($id);
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
