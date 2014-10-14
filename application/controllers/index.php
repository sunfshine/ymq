<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index(){

        $this->load->model('home');
        $activities = $this->home->get_activities();


        $this->load->view('homepage', array(
            "activities" => $activities
        ));

    }
}

