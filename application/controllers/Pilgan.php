<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pilgan extends CI_Controller {

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user','user');
        $this->load->model('M_pilgan','pilgan');
        $this->load->library('Datatables', 'datatables');
    }

    // public function index()
    // {
    //     $data[ 'datapilgan' ] = json_decode( $this->curl->simple_get( $this->API.'/api/pilgan' ) );
    //     $this->load->view('pilgan/show', $data );
    // }


    function create(){
        if(isset($_POST['submit'])){
            $insert =  $this->soal->createPilgan();
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('soal');
        }else{
            $this->load->view('pilgan/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_pilgan'      => $this->input->post( 'id' ),
                'id_soal'        => $this->input->post( 'id_soal' ),
                'text_pilgan'    => $this->input->post( 'text' ),
                'order_pilgan'   => $this->input->post( 'order' )
            );
            $update =  $this->curl->simple_put($this->API.'/api/pilgan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('pilgan');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['datapilgan'] = json_decode($this->curl->simple_get($this->API.'/api/pilgan',$params));
            $this->load->view('pilgan/edit',$data);
        }
    }
    
    function delete($id){
        if(empty($id)){
            redirect('pilgan');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/api/pilgan', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('pilgan');
        }
    }
}
