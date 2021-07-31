<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user','user');
        $this->load->library('Datatables', 'datatables');
        // $this->methods['index_get']['limit'] = 2;
    }

    public function index()
    {
        $head[ 'title' ] = "Halaman Admin";
        $head[ 'token' ] = $this->user->sesi_user();
        $data[ 'datauser' ] = $this->user->getUser();
        $this->load->view('header', $head);
        $this->load->view('user/people', $data );
    }

    function create(){
        if(isset($_POST['submit'])){
            $insert =  $this->user->createUser();
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('users');
        }else{
            $this->load->view('user/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $update =  $this->user->editUser();
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('users');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['datauser'] = $this->user->getUser_byID($params['id']);
            $head[ 'title' ] = "Halaman Admin";
            $head[ 'token' ] = $this->user->sesi_user();
            $this->load->view('header', $head);
            $this->load->view('user/edit',$data);
        }
    }
    
    function delete($id){
        if(empty($id)){
            redirect('users');
        }else{
            $delete =  $this->user->deleteUser($id);
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('users');
        }
    }
}
