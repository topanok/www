<?php

namespace App\Controllers;

use App\Models\CategoryModelRepository;
use Framework\Controller;

class FrontController extends Controller
{
    public function render($template, $data = [])
    {
        $categories = new CategoryModelRepository();
        $data['categories'] = $categories->getItems();

        parent::render('app/views/header.php',[]);
        parent::render($template, $data);
        parent::render('app/views/footer.php',[]);
    }
}