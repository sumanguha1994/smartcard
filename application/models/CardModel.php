<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CardModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function create($card)
    {
        $cardArray = array(
            'cardno' => $card['cardno'],
        );
        if(isset($card['id']) && !empty($card['id'])){
            $this->db->where('id', $card['id'])
                        ->update('card', $cardArray);
        }else{
            $this->db->insert('card', $cardArray);
        }   
        return true;
    }

    public function getCard($id)
    {
        return $this->db->select('*')->from('card')
                    ->where('id', $id)
                    ->get()
                    ->row();
    }

    public function getAllCard()
    {
        return $this->db->select('*')->from('card')
                        ->get()
                        ->result_array();
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->from('card')->delete();
    }

    public function getClauseCard()
    {
        return $this->db->where('status', 'deactive')
                        ->or_where('status', 'issued')
                        ->get('card')
                        ->result_array();
    }

    public function total()
    {
        return $this->db->from('card')
                        ->count_all_results();
    }
}