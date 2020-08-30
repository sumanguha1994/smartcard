<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Franchise extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
        $this->load->model('FranchiseModel', 'franch');
        $this->load->model('ShopKeeperModel', 'sk');
        $this->load->model('UserModel', 'us');
    }
//franchise
    public function createfranchise()
    {
        $this->franch->create($this->input->post(), true);
        return redirect('member');
    }
    public function deletefranchise()
    {
        $this->franch->delete($this->input->get('id'), true);
        return redirect('member');
    }
    public function editfranchise()
    {
        $fran = $this->franch->getfranch($this->input->get('id'), true);
        header('Content-Type: application/json');
        echo json_encode($fran);
    }
//shop keeper
    public function createshopkeeper()
    {
        $this->sk->create($this->input->post(), true);
        return redirect('shopkeeper');
    }
    public function editshopkeeper()
    {
        $sk = $this->sk->getsk($this->input->get('id'), true);
        header('Content-Type: application/json');
        echo json_encode($sk);
    }
    public function deleteshopkeeper()
    {
        $this->sk->delete($this->input->get('id'), true);
        return redirect('shopkeeper');
    }
//user 
    public function deletecustomer()
    {
        $this->us->delete($this->input->get('id'), true);
        return redirect('user');
    }

}