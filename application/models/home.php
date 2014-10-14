<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get_activities(){
        $query = $this->db->get('activities');
        return $query->result();
    }

}