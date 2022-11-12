<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->load->view('home');
	}

	public function acesso()
	{
		$login = $this->input->post('login');
		$senha = $this->input->post('senha');

		$this->load->model('M_busca');
		$retorno = $this->M_busca->acesso($login, $senha);

		echo $retorno;
	}
}
