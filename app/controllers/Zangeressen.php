<?php

class Zangeressen extends BaseController
{
    private $zangeressenModel;

    public function __construct()
    {
         $this->zangeressenModel = $this->model('ZangeressenModel');
    }

    public function index($message = 'none')
    {
       /**
        * Het $data-array geeft informatie mee aan de view-pagina
        */
       $data = [
            'title' => 'Top 5 rijkste zangeressen ter wereld',
            'message' => $message
       ];

       /**
        * Hier halen we alle smartphones op uit de database
        */
       $data['zangeressen'] = $this->zangeressenModel->getAllZangeressen();       
       

      /**
       * Met de view-method uit de BaseController-class wordt de view
       * aangeroepen met de informatie uit het $data-array
       */
       $this->view('zangeressen/index', $data); 
    }

    public function delete($Id)
    {
          $result = $this->zangeressenModel->delete($Id);
          
          header('Refresh:3 ; url=' . URLROOT . '/zangeressen/index');

          $this->index('flex');
    }


    public function create()
    {
          $data = [
               'title' => 'Nieuwe zangeres toevoegen',
               'message' => 'none'
          ];

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
               if (empty($_POST['naam']) || empty($_POST['nettowaarde']) || empty($_POST['land']) || empty($_POST['mobiel']) || empty($_POST['leeftijd'])) {
                    echo '<div class="alert alert-danger text-center" role="alert"><h4>Vul alle velden in</h4></div>';
                    header('Refresh: 3; URL=' . URLROOT . '/zangeressen/create');
                    exit;
               }

               $data['message'] = 'flex';

               $this->zangeressenModel->create($_POST);
               
               header('Refresh: 3; URL=' . URLROOT . '/zangeressen/index');
          }          

          $this->view('zangeressen/create', $data);
    }

    public function update($Id = NULL)
    {
          $data = [
               'title' => 'Wijzig de zangeres',
               'message' => 'none'
          ];

          if ($_SERVER['REQUEST_METHOD'] == "POST") 
          {
               $Id = $_POST['Id'];

               $result = $this->zangeressenModel->updateZangeres($_POST);

               $data['message'] = 'flex';

               header("Refresh:3 ; url=" . URLROOT . "/zangeressen/index");
          }

          $data['zangeres'] = $this->zangeressenModel->getZangeresById($Id);


          $this->view('zangeressen/update', $data);
    }

}