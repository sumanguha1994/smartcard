<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('CategoryModel', 'cat');
		$this->load->model('FranchiseModel', 'franch');
		$this->load->model('ShopKeeperModel', 'sk');
		$this->load->model('UserModel', 'us');
		$this->load->model('CardModel', 'card');
		$this->load->model('IssueModel', 'issue');
	}

	public function index()
	{
		$data['totalcard'] = $this->card->total();
		$data['totalsk'] = $this->sk->total();
		$data['totalfrn'] = $this->franch->total();
		$data['totalus'] = $this->us->total();
		$data['customer'] = $this->us->getAllUs();
		$this->load->view('dashboard', $data);
	}
//dashboard
	public function dashboard()
	{
		$data['totalcard'] = $this->card->total();
		$data['totalsk'] = $this->sk->total();
		$data['totalfrn'] = $this->franch->total();
		$data['totalus'] = $this->us->total();
		$data['customer'] = $this->us->getAllUs();
		$this->load->view('dashboard', $data);
	}
//categpry
	public function category()
	{
		$data['cat'] = $this->cat->getAllCat();
		$this->load->view('category', $data);
	}
//members view
	public function member()
	{
		$data['fran'] = $this->franch->getAllFranch();
		$this->load->view('member', $data);
	}
//shopkeeper view
	public function shopkeeper()
	{
		$data['cat'] = $this->cat->getAllCat();
		$data['sk'] = $this->sk->getAllSk();
		$this->load->view('shopkeeper', $data);
	}
//user view
	public function user()
	{
		$data['customer'] = $this->us->getAllUs();
		$this->load->view('user', $data);
	}
//card view
	public function card()
	{
		$data['card'] = $this->card->getAllCard();
		$this->load->view('card', $data);
	}
//issue card
	public function issuecard()
	{
		$data['cards'] = $this->card->getClauseCard();
		$data['is'] = $this->issue->getAllIssueCard();
		$this->load->view('issue', $data);
	}
//issue user
	public function issueuser()
	{
		$data['cards'] = $this->card->getOnlyFrCard();
		$this->load->view('issueuser', $data);
	}
}
