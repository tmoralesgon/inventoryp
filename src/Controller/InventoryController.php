<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\InvInventory;
use App\Form\Type\InvInventoryType;

class InventoryController extends AbstractController
{
    /**
     * @Route("/inventory-form", name="inventory-form")
     */
    public function addInventory(Request $request): Response
    {

        
        $inventory = new InvInventory();

        $form = $this->createForm(InvInventoryType::class, $inventory);

        return $this->render('inventory-form.html.twig', [
            'form' => $form->createView(),
        ]);
        
    }
}
?>