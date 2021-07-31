<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

	public function index()
	{
		$data['tampil'] = $this->tdl->get_tdl();
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}

	public function addtask()
	{
		$task = $this->input->post('task');
		$this->tdl->add_tdl($task);
	}

	public function deltask($task)
	{
		$this->tdl->del_tdl($task);
		
		redirect('home','refresh');
		
	}

	public function updatetask()
	{
		$task = $this->input->post('task');
		$user = $this->input->post('user');
		$teks = $this->input->post('text_task');
		$this->tdl->upd_tdl($task,$user,$teks);
		
		redirect('home','refresh');
		
	}
}
