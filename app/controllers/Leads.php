<?php
class Leads extends Controller {
    public function __construct() {
        $this->leadModel = $this->model('Lead');
    }

    public function leadlist() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/leadlist', $data);
    }


    public function leadinfos() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/leadInfos', $data);
    }


    public function creatLead() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/creatLead', $data);
    }


    public function updateLead() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/updateLead', $data);
    }

    public function deleteLead() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/deleteLead', $data);
    }



}

