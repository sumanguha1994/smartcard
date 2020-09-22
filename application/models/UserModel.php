<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function create($sk)
    {
        $card = $this->getCardNo($sk['cardid']);
        $skArray = array(
            'customer_name' => $sk['customer_name'],
            'customer_phone' => $sk['customer_phone'],
            'customer_cards' => $card->cardno,
            'activate_date' => date('Y-m-d'),
            'activated_by' => 'fr',
            'activator_id' => $this->session->userdata('loginid'),
            'deactivate_date' => date('Y-m-d', strtotime('+5 years'))
        );
        if(isset($sk['id']) && !empty($sk['id'])){
            $this->db->where('id', $sk['id'])
                        ->update('customer', $skArray);
        }else{
            $this->db->insert('customer', $skArray);
            $this->db->where('id', $sk['cardid'])
                        ->update('card', array('status' => 'Activated'));
        }   
        return true;
    }

    public function getCardNo($id)
    {
        return $this->db->select('*')->from('card')
                        ->where('id', $id)
                        ->get()
                        ->row();
    }

    public function getUs($id)
    {
        return $this->db->select('*')->from('customer')
                    ->where('id', $id)
                    ->get()
                    ->row();
    }

    public function getAllUs()
    {
        $customer = $this->db->select('*')->from('customer')
                            ->get()
                            ->result_array();
        for($i = 0;$i < count($customer);$i++)
        {
            if($customer[$i]['activated_by'] == 'sh'){
                $sh = $this->db->where('id', $customer[$i]['activator_id'])->select('shphone')->get('shopkeeper')->row();
                $customer[$i]['shphone'] = $sh->shphone;
            }elseif($customer[$i]['activated_by'] == 'fr'){
                $fr = $this->db->where('id', $customer[$i]['activator_id'])->select('phone')->get('franchise')->row();
                $customer[$i]['shphone'] = $fr->phone;
            }else{
                $customer[$i]['shphone'] = '';
            }
        }
        return $customer;
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->from('customer')->delete();
    }

    public function total()
    {
        return $this->db->from('customer')
                        ->count_all_results();
    }
}