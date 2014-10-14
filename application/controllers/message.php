<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Message extends CI_Controller {

    function __construct(){
        parent::__construct();

        header('Content-Type: text/html; charset=utf-8');

//        $this->load->helper{array('form', 'url')};
        $this->load->model('Message_model');
        $this->load->database();
        $this->load->library('table');

    }

    function index() {
        $this->load->view('message_view');
    }


    function post(){
        $data = array(
            'id' => '',
            'name' => $this->input->post('name'),
            'cost' => $this->input->post('cost'),
            'owner' => $this->input->post('owner'),
            'description' => $this->input->post('description'),
            'time' => date('Y-m-d hh-mm')
        );

        $this->Message_model->insert('activity', $data);
        redirect(site_url());
    }

    function edit(){
        $this->load->view('edit_view');
    }



}
