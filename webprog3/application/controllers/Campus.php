<?php
class Campus extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('campus_model');
    }

    public function list($campusid = NULL)
    {
        $this->load->helper('url');

        if($campusid == NULL)
        {
            $view_params = [
                'title' => 'Campusok listaja',
                'records' => $this->campus_model->getList()
            ];
    
            $this->load->view('campus/list', $view_params);
            // echo 'list';
        }
        else
        {
            if(!is_numeric($campusid))
            {
                show_error('Nem helyes parameterertek!');
            }
            
            $record = $this->campus_model->getRecord($campusid);
            if($record == NULL || empty($record))
            {
                show_error('Nincs ilyen rekord!');
            }

            $view_params = [
                'title' => 'Reszletes rekordadatok!',
                'records' => $record
            ];

            $this->load->view('campus/showrecord', $view_params);
        }
    }

    public function insert()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('campus_nev', 'Campus neve', 'required|min_length[2]');
        $this->form_validation->set_rules('campus_leiras', 'Campus leirasa', 'required|min_length[2]');

        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('campus_nev');
            $leiras = !empty($this->input->post('campus_leiras')) ? $this->input->post('campus_leiras') : NULL;
            $id = $this->campus_model->insRecord($nev, $leiras);
            if($id)
            {
                redirect(base_url('campus/list'));
            }
            else
            {
                show_error('Hiba a beszuras soran!');
            }
        }
        else
        {
            $this->load->helper('form');
            $this->load->view('campus/add');
        }
    }

    public function update($campus_id = NULL)
    {
        $this->load->helper('url');

        if($campus_id == NULL)
        {
            redirect(base_url('campus/list'));
        }

        if(!is_numeric($campus_id))
        {
            redirect(base_url('campus/list'));
        }

        $record = $this->campus_model->getRecord($campus_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('campus/list'));
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('campus_nev', 'Campus neve', 'required|min_length[2]');
        $this->form_validation->set_rules('campus_aktiv', 'Campus statusza', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('campus_nev');
            $leiras = !empty($this->input->post('campus_leiras')) ? $this->input->post('campus_leiras') : NULL;
            $aktiv = $this->input->post('campus_aktiv');

            if($this->campus_model->updateRecord($campus_id, $nev, $leiras, $aktiv))
            {
                redirect(base_url('campus/list'));
            }
            else
            {
                show_error('Sikertelen frissites');
            }
        }
        else
        {
            $view_params = [
                'record' => $record,
                'statuszok' => [0 => 'Inaktiv', 1 => 'Aktiv']
            ];
    
            $this->load->helper('form');
            $this->load->view('campus/update', $view_params);
        }
    }

    public function delete($campusid = NULL)
    {
        $this->load->helper('url');

        if($campusid == NULL)
        {
            redirect(base_url('campus/list'));
        }

        if(!is_numeric($campusid))
        {
            redirect(base_url('campus/list'));
        }

        $record = $this->campus_model->getRecord($campusid);
        if($record == NULL || empty($record))
        {
            redirect(base_url('campus/list'));
        }

        if($this->campus_model->delRecord($campusid))
        {
            redirect(base_url('campus/list'));
        }
        else
        {
            show_error('A torles sikertelen!');
        }
    }

}