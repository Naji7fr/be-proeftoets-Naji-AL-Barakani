<?php

class Sneakers extends BaseController
{
    private $sneakersModel;

    public function __construct()
    {
        $this->sneakersModel = $this->model('SneakersModel');
    }

    public function index()
    {
        /**
         * Je roept de method getAllSmartphones aan van de smartphoneModel class
         */
        $results = $this->sneakersModel->getAllSneakers();
        
        $data = [
            'title' => 'Mooiste Sneakers',
            'sneakers' => $results
        ];

        $this->view('sneakers/index', $data);
    }
}