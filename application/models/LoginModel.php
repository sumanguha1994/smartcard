<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function checklogin($logindata)
    {
        $check = $this->db->from('franchise')
                            ->select('*')
                            ->where('phone', $logindata['username'])
                            ->where('password', $logindata['pass'])
                            ->get()
                            ->row();
        if(!empty($check)){
            $this->session->set_userdata('loginid', $check->id);
            $this->session->set_userdata('loginrole', $check->role);
            return true;
        }else{
            return false;
        }
    }
}