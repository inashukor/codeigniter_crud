<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    //insert data into database
    function createData() {
        $data = array (
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'birthdate' => $this->input->post('birthdate'),
            'contactNo' => $this->input->post('contactNo'),
            'bio' => $this->input->post('bio')
        );
        $this->db->insert('tb_crud', $data);
    }

    //display all data in database
    function getAllData() {
        $query = $this->db->query('SELECT * FROM tb_crud');
        return $query->result();
    }

    //view data based on id selected
    function getData($id) {
        $query = $this->db->query('SELECT * FROM tb_crud WHERE `id` =' .$id);
        return $query->row();
    }

    //update data
    function updateData($id) {
        $data = array (
            'lastName' => $this->input->post('lastName'),
            'firstName' => $this->input->post('firstName'),
            'birthdate' => $this->input->post('birthdate'),
            'contactNo' => $this->input->post('contactNo'),
            'bio' => $this->input->post('bio')
        );
        $this->db->where('id', $id);
        $this->db->update('tb_crud', $data);
    }

    //delete data based on id
    function deleteData($id) {
        $this->db->where('id', $id);
        $this->db->delete('tb_crud');
    }
}