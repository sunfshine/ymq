<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function show($table = 'activities'){

        $query = $this->db->get($table);

        return $query;
    }

    function insert($table = 'activities', $data){
        $this->db->insert($table, $data);
    }

}