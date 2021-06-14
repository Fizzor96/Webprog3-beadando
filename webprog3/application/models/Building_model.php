<?php

class Building_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getRecordByKodCampusId($kod, $campusid)
    {
        $this->db->select('*');
        $this->db->from('buildings');
        $this->db->where('kod', $kod);
        $this->db->where('campus_id', $campusid);

        return $this->db->get()->result();
    }

    public function getList()
    {
        $this->db->select('b.id, b.kod, b.nev, b.leiras, c.nev campus_nev');
        $this->db->from('buildings b');
        $this->db->join('campusok c', 'c.id = b.campus_id', 'inner');
        $this->db->order_by('c.nev', 'ASC');
        $this->db->order_by('b.nev', 'ASC');
        return $this->db->get()->result();
    }

    public function getRecord()
    {

    }

    public function insRecord($campusid, $kod, $nev, $active, $leiras)
    {
        $record = 
        [
            'campus_id' => $campusid,
            'kod' => $kod,
            'nev' => $nev,
            'aktiv' => $active,
            'leiras' => $leiras
        ];
        $this->db->insert('buildings', $record);
        return $this->db->insert_id();
    }

}