

<?php
class Administrateurs extends Controller {
    public function __construct() {
        $this->administrateursModel = $this->model('Administrateur');
    }

    public function indexAdmin() {
        $administrateurs = $this->administrateursModel->findAllAdministrateurs();
        $data = [
            'administrateurs' => $administrateurs
        ];

        $this->view('administrateurs/indexAdmin', $data);
    }

    public function detailAdmin($idAdmin) {
        $administrateurs = $this->administrateursModel->findAllAdministrateurByID($idAdmin);
        $data = [
            'administrateur' => $administrateurs
        ];

        $this->view('administrateurs/detailAdmin', $data);
    }



    public function createAdmin() {
        $administrateurs = $this->administrateursModel->findAllAdministrateurs();
        $data = [
            'administrateurs' => $administrateurs
        ];

        $this->view('administrateurs/createAdmin', $data);
    }


    public function updateAdmin($idAdmin) {
        $administrateurs = $this->administrateursModel->findAllAdministrateurByID($idAdmin);
        $data = [
            'administrateur' => $administrateurs
        ];

        $this->view('administrateurs/updateAdmin', $data);
    }


    public function deleteAdmin($idAdmin) {
        $administrateurs = $this->administrateursModel->findAllAdministrateurByID($idAdmin);
        $data = [
            'administrateur' => $administrateurs
        ];

        $this->view('administrateurs/deleteAdmin', $data);
    }


}
