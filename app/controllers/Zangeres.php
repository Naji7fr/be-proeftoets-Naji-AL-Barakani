<?php

class Zangeres extends BaseController
{
    private $zangerModel;

    public function __construct()
    {
        $this->zangerModel = $this->model('ZangersModel');
    }

    public function index()
    {
        $results = $this->zangerModel->getAllZangers();

        $data = [
            'title' => 'Zangers',
            'zangers' => $results
        ];

        $this->view('zangeres/index', $data);
    }
}
