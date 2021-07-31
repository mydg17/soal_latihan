<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends CI_Controller {

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
        $data[ 'datapaket' ] = $this->paket->getPaket();
        $this->load->view('header', $head);
        $this->load->view('soal/list_preview_mode', $data );
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
}
