

<?php
class Administrateurs extends Controller {
    public function __construct() {
        $this->administrateursModel = $this->model('Administrateur');
    }

    public function listAdministrateur() {
        $administrateurs = $this->administrateursModel->findAllAdministrateurs();
        $data = [
            'administrateurs' => $administrateurs
        ];

        $this->view('administrateurs/listAdministrateur', $data);
    }

}
