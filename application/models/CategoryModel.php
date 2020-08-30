<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function create($category)
    {
        $categoryArray = array(
            'cat_name' => $category['cat_name'],
            'cat_icon' => $category['cat_icon'],
        );
        if(isset($category['id']) && !empty($category['id'])){
            $this->db->where('id', $category['id'])
                        ->update('category', $categoryArray);
        }else{
            $this->db->insert('category', $categoryArray);
        }   
        return true;
    }

    public function getcat($id)
    {
        return $this->db->select('*')->from('category')
                    ->where('id', $id)
                    ->get()
                    ->row();
    }

    public function getAllCat()
    {
        return $this->db->select('*')->from('category')
                        ->get()
                        ->result_array();
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->from('category')->delete();
    }
}