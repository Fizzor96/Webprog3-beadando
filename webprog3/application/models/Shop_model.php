<?php

class Shop_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getList()
    {
        $this->db->select('id, title, publisher, description, cost');
        $this->db->from('games g');
        $this->db->order_by('g.id', 'ASC');

        return $this->db->get()->result();
    }

    public function getRecord($gameid)
    {
        $this->db->select('id, title, publisher, description, cost');
        $this->db->from('games g');
        $this->db->where('id', $gameid);

        return $this->db->get()->row();
    }

    public function delRecord($gameid)
    {
        $this->db->where('id', $gameid);
        return $this->db->delete('games');
    }

    public function insRecord($title, $publisher, $description, $cost)
    {
        $record = [
            'title' => $title,
            'publisher' => $publisher,
            'description' => $description,
            'cost' => $cost
        ];
        $this->db->insert('games', $record);
        return $this->db->insert_id();
    }

    public function updateRecord($id, $title, $publisher, $description, $cost)
    {
        $record = [
            'title' => $title,
            'publisher' => $publisher,
            'description' => $description,
            'cost' => $cost
        ];

        $this->db->where('id', $id);
        return $this->db->update('games', $record);
    }
}