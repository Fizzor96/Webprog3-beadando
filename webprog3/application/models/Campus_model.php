<?php

class Campus_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getList()
    {
        $this->db->select('id, nev, leiras, aktiv');
        $this->db->from('campusok c');
        $this->db->where('c.aktiv', 1);
        $this->db->order_by('c.id', 'ASC');

        return $this->db->get()->result();
    }

    public function getRecord($campusid)
    {
        $this->db->select('id, nev, leiras, aktiv');
        $this->db->from('campusok c');
        $this->db->where('id', $campusid);
        $this->db->where('c.aktiv', 1);

        return $this->db->get()->row();
    }

    public function delRecord($campusid)
    {
        $this->db->where('id', $campusid);
        $this->db->where('aktiv', 1);
        return $this->db->delete('campusok');
    }

    public function insRecord($nev, $leiras)
    {
        $record = [
            'nev' => $nev,
            'leiras' => $leiras
        ];
        $this->db->insert('campusok', $record);
        return $this->db->insert_id();
    }

    public function updateRecord($id, $nev, $leiras, $aktiv)
    {
        $record = [
            'nev' => $nev,
            'leiras' => $leiras,
            'aktiv' => $aktiv
        ];

        $this->db->where('id', $id);
        return $this->db->update('campusok', $record);
    }
}