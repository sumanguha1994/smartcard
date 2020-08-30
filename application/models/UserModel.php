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
        $skArray = array(
            'customer_name' => $sk['customer_name'],
            'customer_phone' => $sk['customer_phone'],
            'customer_cards' => $sk['customer_cards'],
            'activate_date' => $sk['activate_date'],
            'deactivate_date' => $sk['deactivate_date']
        );
        if(isset($sk['id']) && !empty($sk['id'])){
            $this->db->where('id', $sk['id'])
                        ->update('customer', $skArray);
        }else{
            $this->db->insert('customer', $skArray);
        }   
        return true;
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
        return $this->db->select('*')->from('customer')
                        ->get()
                        ->result_array();
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