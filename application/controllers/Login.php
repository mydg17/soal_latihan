<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user','user');
    }

    public function index()
    {
        if(isset($_POST['submit'])){
        $check = $this->user->authUser();
            if($check)
            {
                setcookie('log_token',  $check['token'] , time()+3600, "/");
                redirect('users');
            }else
            {
                redirect('login');
            }
        }else{
            $this->load->view('login');
        }
    }

    function out(){
        setcookie("log_token", "", time() - 3600,"/");
        redirect('login','refresh');
        
    }
}
