<?php
class professionels extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Professionel');
    }

    public function listprofessionel() {
        $professionels = $this->postModel->findAllProfessionels();

        $data = [
            'professionels' => $professionels
        ];

        $this->view('professionels/listprofessionel', $data);
    }
}