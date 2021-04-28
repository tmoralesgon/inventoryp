<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InventoryController extends AbstractController
{
    /**
     * @Route("/inventory-form", name="inventory-form")
     */
    public function addInventory()
    {

        
        return $this->render('inventory-form.html.twig');
        
    }
}
?>