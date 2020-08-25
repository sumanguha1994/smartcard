<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('dashboard');
	}
//dashboard
	public function dashboard()
	{
		$this->load->view('dashboard');
	}
//members view
	public function member()
	{
		$this->load->view('member');
	}

//card view
	public function card()
	{
		$this->load->view('card');
	}
}
