<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }
	public function index()
	{
		$this->load->view('registration');
	}

    public function new_user()
	{
        $user = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        $mail = $this->input->post('email');
        $role = $this->input->post('role');
		$user = $this->user->add_new_user( $user, $pass, $mail, $role );
        if($user){
            redirect('login');
        }else{
            redirect('registrion');
        }
	}
}
