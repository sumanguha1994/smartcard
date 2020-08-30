<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IssueModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function create($issuecard)
    {
        $issueCardArray = array(
            'shname' => $issuecard['shname'],
            'cardno' => $issuecard['cardno'],
        );
        if(isset($issuecard['id']) && !empty($issuecard['id'])){
            $this->db->where('id', $issuecard['id'])
                        ->update('issue', $issueCardArray);
        }else{
            $this->db->insert('issue', $issueCardArray);
            $this->updateCardStatus($issuecard['cardno'], 'issued');
        }   
        return true;
    }

    public function getIssueCard($id)
    {
        return $this->db->select('*')->from('issue')
                    ->where('id', $id)
                    ->get()
                    ->row();
    }

    public function getAllIssueCard()
    {
        return $this->db->select('i.*, sk.shname as sh_name, sk.shphone, c.cardno as card_no')->from('issue as i')
                        ->join('shopkeeper as sk', 'sk.id = i.shname')
                        ->join('card as c', 'c.id = i.cardno')
                        ->get()
                        ->result_array();
    }

    public function delete($id)
    {
        $card = $this->getIssueCard($id);
        $this->updateCardStatus($card->cardno, 'deactive');
        return $this->db->where('id', $id)->from('issue')->delete();
    }

    public function updateCardStatus($cardid, $stat)
    {
        $status = array(
          'status' => $stat,  
        );
        return $this->db->where('id', $cardid)
                        ->update('card', $status);
    }
}