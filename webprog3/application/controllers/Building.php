<?php

class Building extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('building_model', 'b_model');
    }

    public function list()
    {
        $view_params =
        [
            'title' => 'epuletek listaja',
            'records' => $this->b_model->getList()
        ];

        $this->load->view('building/list', $view_params);
    }

    public function check_campus_building($param1, $param2)
    {
        // $param3 = $this->input->post('campus_id');
        // var_dump($param3);
        
        $records = $this->b_model->getRecordByKodCampusId($param1, $param2);

        if($records == NULL || empty($records))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_campus_building', 'Az epulet kodja nem egyedi a campuson');
            return FALSE;
        }

        return false;
    }

    public function insert()
    {
        $this->load->library('form_validation');

        // $this->form_validation->set_rules('kod', 'Epulet kodja', 'required|is_unique[buildings.kod]');
        $this->form_validation->set_rules('kod', 'Epulet kodja', 'required|callback_check_campus_building['.$this->input->post('campus_id').']');
        $this->form_validation->set_rules('nev', 'Epulet neve', 'required');
        $this->form_validation->set_rules('campus_id', 'Epulet campusa', 'required');
        $this->form_validation->set_rules('active', 'Epulet statusza', 'required');

        if($this->form_validation->run() == TRUE)
        {
            if($this->b_model->insRecord(
                $this->input->post('campus_id'),
                $this->input->post('kod'),
                $this->input->post('nev'),
                $this->input->post('active'),
                empty($this->input->post('leiras')) ? NULL : $this->input->post('leiras')
            ))
            {
                redirect(base_url('building/list'));
            }
        }
        else 
        {
            $this->load->helper('form');
            $this->load->model('campus_model');

            $campuslist = $this->campus_model->getList();
            $campuses = [];

            foreach($campuslist as &$item)
            {
                $campuses[$item->id] = $item->nev;
            }

            $view_params = [
                'statuses' => [1 => 'Aktiv', 0 => 'Inaktiv'],
                'campuses' => $campuses
            ];

            
            $this->load->view('building/add', $view_params);
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}