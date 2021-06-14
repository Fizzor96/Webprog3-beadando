<?php

class Shop extends CI_Controller
{
    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in())
        {
            redirect(base_url('auth'));
        }

        $this->load->model('shop_model');
    }

    public function list($gameid = NULL)
    {
        $errors = [];
        if($this->session->has_userdata('errors'))
        {
            $errors = $this->session->userdata('errors');
        }
        
        $this->load->helper('url');

        if($gameid == NULL)
        {
            $view_params = [
                'title' => 'Games',
                'records' => $this->shop_model->getList(),
                'errors' => $errors
            ];
    
            $this->load->view('shop/list', $view_params);
        }
        else
        {
            if(!is_numeric($gameid))
            {
                show_error('Nem helyes parameterertek!');
            }
            
            $record = $this->shop_model->getRecord($gameid);
            if($record == NULL || empty($record))
            {
                show_error('Nincs ilyen rekord!');
            }

            $view_params = [
                'title' => 'Game description',
                'records' => $record
            ];

            $this->load->view('shop/showrecord', $view_params);
        }
    }

    public function insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Game title', 'required|min_length[2]');
        $this->form_validation->set_rules('publisher', 'Game publisher', 'required|min_length[2]');

        if($this->form_validation->run() == TRUE)
        {
            $title = $this->input->post('title');
            $publisher = $this->input->post('publisher');
            $description = !empty($this->input->post('description')) ? $this->input->post('description') : NULL;
            $cost = !empty($this->input->post('cost')) ? $this->input->post('cost') : '0';
            $id = $this->shop_model->insRecord($title, $publisher, $description, $cost);
            if($id)
            {
                redirect(base_url('shop/list'));
            }
            else
            {
                show_error('Error: insertion!');
            }
        }
        else
        {
            $view_params = [
                'title' => 'New game'
            ];
            $this->load->helper('form');
            $this->load->view('shop/add', $view_params);
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

    public function delete($gameid = NULL)
    {
        if(!$this->ion_auth->is_admin())
        {
            $userdata = ['You don\'t have permission for delete'];
            $this->session->set_userdata(['errors' => $userdata]);
            redirect(base_url('shop/list'));
        }

        if($gameid == NULL)
        {
            redirect(base_url('shop/list'));
        }

        if(!is_numeric($gameid))
        {
            redirect(base_url('shop/list'));
        }

        $record = $this->shop_model->getRecord($gameid);
        if($record == NULL || empty($record))
        {
            redirect(base_url('shop/list'));
        }

        if($this->shop_model->delRecord($gameid))
        {
            redirect(base_url('shop/list'));
        }
        else
        {
            show_error('Error: DELETE!');
        }
    }

}