<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->database(); 
        $this->load->model('CardModel', 'card');
        $this->load->model('IssueModel', 'issue');
        $this->load->model('UserModel', 'us');
    }

    public function createcard()
    {
        $this->card->create($this->input->post(), true);
        return redirect('card');
    }
    public function editcard()
    {
        $card = $this->card->getCard($this->input->get('id'), true);
        header('Content-Type: application/json');
        echo json_encode($card);
    }
    public function deletecard()
    {
        $this->card->delete($this->input->get('id'), true);
        return redirect('card');
    }
//issue cards
    public function getname()
    {
        $issue = $this->issue->getname($this->input->get('issueto'), true);
        header('Content-Type: application/json');
        echo json_encode($issue);
    }
    public function createissuecard()
    {
        $this->issue->create($this->input->post(), true);
        return redirect('issue-card');
    }
    public function editissuecard()
    {
        $issue = $this->issue->getIssueCard($this->input->get('id'), true);
        header('Content-Type: application/json');
        echo json_encode($issue);
    }
    public function deleteissuecard()
    {
        $this->issue->delete($this->input->get('id'), true);
        return redirect('issue-card');
    }
//issue user
    public function createissueuser()
    {
        $this->us->create($this->input->post(), true);
        return redirect('user');
    }
}