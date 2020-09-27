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
        $folder = 'shop';
        $this->upload->initialize($this->imgConfig($folder));
        if(empty($_FILES['shpic']['name'])){
            $path = $sk['oldshpic'];
        }else{
            if(! $this->upload->do_upload('shpic')){
                log_message('error', "Shop Image Not Uploaded");
                $this->session->set_flashdata('picFail', "Picture Size OR Type Noy Allowed");
                return false;
            }else{
                $data = array('data' => $this->upload->data());
                $path = '/upload/shop/'. $data['data']['file_name'];
            };
        }
        $skArray = array(
            'shname' => $sk['shname'],
            'shphone' => $sk['shphone'],
            'shpincode' => $sk['shpincode'],
            'shlocation' => $sk['shlocation'],
            'category' => $sk['category'],
            'shaddress' => $sk['shaddress'],
            'skphone' => $sk['skdes'],
            'shpic' => $path,
            'skuserid' => $sk['shphone'],
            'skpass' => $sk['skpass'],
            'creatorid' => $this->session->userdata('loginid'),
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
        if($this->session->userdata('loginrole') != 'franchise'){
            return $this->db->select('s.*, c.cat_name')->from('shopkeeper as s')
                            ->join('category as c', 'c.id = s.category')
                            ->get()
                            ->result_array();
        }else{
            return $this->db->select('s.*, c.cat_name')->from('shopkeeper as s')
                            ->join('category as c', 'c.id = s.category')
                            ->where('s.creatorid', $this->session->userdata('loginid'))
                            ->get()
                            ->result_array();
        }
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

    //img config
    public function imgConfig($folder){
        $config = array();
        $config['upload_path'] = './upload/'.$folder;
        $config['allowed_types'] = 'gef|png|jpg|JPEG|pdf|zip';
        $config['max_size'] = 4000;		
        return $config;
    }
}