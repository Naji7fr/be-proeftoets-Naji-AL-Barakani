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
        $result = $this->sneakersModel->getAllSneakers();

        $data = [
            'title' => 'Overzicht sneakers',
            'sneakers' => $result,
            'showForm' => isset($_GET['action']) && $_GET['action'] === 'create'
        ];

        $this->view('sneakers/index', $data); 
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['merk']) && !empty($_POST['model']) && !empty($_POST['type'])) {
                $this->sneakersModel->create($_POST);
            }
            header('Location: ' . URLROOT . '/sneakers/index');
            exit;
        }
        // Show form via index with GET param
        header('Location: ' . URLROOT . '/sneakers/index?action=create');
        exit;
    }

    public function delete($id)
    {
        $this->sneakersModel->delete($id);
        header('Location: ' . URLROOT . '/sneakers/index');
        exit;
    }

}