<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
        $this->load->model('CategoryModel', 'cat');
    }

    public function categoryCreate()
    {
        $this->cat->create($this->input->post(), true);
        return redirect('category');
    }
    public function categoryDelete()
    {
        $this->cat->delete($this->input->get('id'), true);
        return redirect('category');
    }
    public function categoryEdit()
    {
        $cat = $this->cat->getcat($this->input->get('id'), true);
        header('Content-Type: application/json');
        echo json_encode($cat);
    }
}