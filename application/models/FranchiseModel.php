<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FranchiseModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function create($franch)
    {
        $franchArray = array(
            'name' => $franch['name'],
            'email' => $franch['email'],
            'location' => $franch['location'],
            'phone' => $franch['phone'],
            'password' => $franch['password']
        );
        if(isset($franch['id']) && !empty($franch['id'])){
            $this->db->where('id', $franch['id'])
                        ->update('franchise', $franchArray);
        }else{
            $this->db->insert('franchise', $franchArray);
        }   
        return true;
    }

    public function getfranch($id)
    {
        return $this->db->select('*')->from('franchise')
                    ->where('id', $id)
                    ->get()
                    ->row();
    }

    public function getAllFranch()
    {
        if($this->session->userdata('loginrole') != 'franchise'){
            return $this->db->select('*')->from('franchise')
                            ->where('role', 'franchise')
                            ->get()
                            ->result_array();
        }else{
            return $this->db->select('*')->from('franchise')
                            ->where('id', $this->session->userdata('loginid'))
                            ->get()
                            ->result_array();
        }
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->from('franchise')->delete();
    }

    public function total()
    {
        return $this->db->from('franchise')
                        ->count_all_results();
    }
}