<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IssueModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function getname($issueto)
    {
        $data = array();
        if($issueto == 'Franchise'){
            $fr = $this->db->select('*')->from('franchise')
                            ->where('role', 'franchise')
                            ->get()
                            ->result_array();
            for($i = 0;$i < count($fr);$i++)
            {
                $data[$i]['id'] = $fr[$i]['id'];
                $data[$i]['name'] = $fr[$i]['name'];
            }
        }else{
            $sh = $this->db->select('*')->from('shopkeeper')
                            ->get()
                            ->result_array();
            for($i = 0;$i < count($sh);$i++)
            {
                $data[$i]['id'] = $sh[$i]['id'];
                $data[$i]['name'] = $sh[$i]['shname'];
            }
        }
        return $data;
    }
    public function create($issuecard)
    {
        for($i = 0;$i < count($issuecard['cardno']);$i++)
        {
            if(empty($issuecard['id'])){
                $this->db->where('cardno', $issuecard['cardno'][$i])->from('issue')->delete();
            }
            if($issuecard['issueto'] == 'Franchise'){
                $issueCardArray = array(
                    'issuefor' => 'Franchise',
                    'shname' => '',
                    'frname' => $issuecard['name'],
                    'cardno' => $issuecard['cardno'][$i],
                );
            }else{
                $issueCardArray = array(
                    'issuefor' => 'Shop',
                    'shname' => $issuecard['name'],
                    'frname' => '',
                    'cardno' => $issuecard['cardno'][$i],
                );
            }
            if(isset($issuecard['id']) && !empty($issuecard['id'])){
                $this->db->where('id', $issuecard['id'])
                            ->update('issue', $issueCardArray);
            }else{
                $this->db->insert('issue', $issueCardArray);
                if($issuecard['issueto'] == 'Franchise'){
                    $this->updateCardStatus($issuecard['cardno'][$i], 'Issued to Franchise');
                }else{
                    $this->updateCardStatus($issuecard['cardno'][$i], 'Issued to Shop');
                }
            }   
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
        if($this->session->userdata('loginrole') != 'franchise'){
            $issue = $this->db->select('i.*, c.cardno as card_no, c.status as cstat')->from('issue as i')
                                ->join('card as c', 'c.id = i.cardno')
                                ->get()
                                ->result_array();
            for($i = 0;$i < count($issue);$i++)
            {
                if($issue[$i]['issuefor'] == 'Franchise'){
                    $fr = $this->db->select('name, phone')->from('franchise')
                                    ->where('id', $issue[$i]['frname'])
                                    ->get()
                                    ->row();
                    $issue[$i]['issueto'] = $fr->name;
                    $issue[$i]['issuetoph'] = $fr->phone;
                }else{
                    $sh = $this->db->select('shname, shphone')->from('shopkeeper')
                                    ->where('id', $issue[$i]['shname'])
                                    ->get()
                                    ->row();
                    $issue[$i]['issueto'] = $sh->shname;
                    $issue[$i]['issuetoph'] = $sh->shphone;
                }
            }
        }else{
            $issue = $this->db->select('i.*, c.cardno as card_no, c.status as cstat')->from('issue as i')
                            ->join('card as c', 'c.id = i.cardno')
                            ->where('i.frname', $this->session->userdata('loginid'))
                            ->get()
                            ->result_array();
            for($i = 0;$i < count($issue);$i++)
            {
                if($issue[$i]['issuefor'] == 'Franchise'){
                    $fr = $this->db->select('name, phone')->from('franchise')
                                    ->where('id', $issue[$i]['frname'])
                                    ->get()
                                    ->row();
                    $issue[$i]['issueto'] = $fr->name;
                    $issue[$i]['issuetoph'] = $fr->phone;
                }
            }
        }
        
        return $issue;
    }

    public function delete($id)
    {
        $card = $this->getIssueCard($id);
        $this->updateCardStatus($card->cardno, 'Not Issued');
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