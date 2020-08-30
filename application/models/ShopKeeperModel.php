<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopKeeperModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function create($sk)
    {
        $skArray = array(
            'shname' => $sk['shname'],
            'shphone' => $sk['shphone'],
            'shpincode' => $sk['shpincode'],
            'shlocation' => $sk['shlocation'],
            'category' => $sk['category'],
            'shaddress' => $sk['shaddress'],
            'skphone' => $sk['skphone'],
            'skuserid' => $sk['skuserid'],
            'skpass' => $sk['skpass'],
        );
        if(isset($sk['id']) && !empty($sk['id'])){
            $this->db->where('id', $sk['id'])
                        ->update('shopkeeper', $skArray);
        }else{
            $this->db->insert('shopkeeper', $skArray);
        }   
        return true;
    }

    public function getsk($id)
    {
        return $this->db->select('*')->from('shopkeeper')
                    ->where('id', $id)
                    ->get()
                    ->row();
    }

    public function getAllSk()
    {
        return $this->db->select('s.*, c.cat_name')->from('shopkeeper as s')
                        ->join('category as c', 'c.id = s.category')
                        ->get()
                        ->result_array();
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->from('shopkeeper')->delete();
    }

    public function total()
    {
        return $this->db->from('shopkeeper')
                        ->count_all_results();
    }
}