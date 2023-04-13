<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RootController extends AbstractController
{
    #[Route(path: '/')]
    public function test(Request $request): string
    {
        $request->attributes->set(
            'terminate',
            static function () {
                echo 'Выполняется после респонса.';
            }
        );
        return 'test';
    }
}