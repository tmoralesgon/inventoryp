<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        if(true){ //provisional
            return $this->redirectToRoute('inventory-form');
        }
        return $this->render('index.html.twig', ['number' => 525]);
    }
}
?>