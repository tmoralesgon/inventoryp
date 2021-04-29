<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\InvInventory;
use App\Entity\InvUser;
use App\Form\Type\InvInventoryType;

use Doctrine\ORM\EntityManagerInterface;

class InventoryController extends AbstractController
{
    /**
     * @Route("/inventory-add", name="inventory-add")
     */
    public function addInventory(EntityManagerInterface $em, Request $request): Response
    {
        $user = $this->getDoctrine()->getRepository(InvUser::class)->find(1);
        dump($user);
        
        $inventory = new InvInventory();

        $form = $this->createForm(InvInventoryType::class, $inventory);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
    
            if ($form->isSubmitted() && $form->isValid()) {
                $inventory = $form->getData();
                
                $inventory->setUser($user);

                $em->persist($inventory);
                $em->flush();

                return $this->redirectToRoute('index');
            } else {
                echo 'error';
            }
        }

        return $this->render('inventory-add.html.twig', [
            'form' => $form->createView(),
        ]);
        
    }

    /**
     * @Route("/inventory-update", name="inventory-update")
     */
    public function updateInventory(EntityManagerInterface $em, Request $request): Response
    {
        $inventory = $this->getDoctrine()->getRepository(InvInventory::class)->find(1);
        dump($inventory);

        $form = $this->createForm(InvInventoryType::class, $inventory);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
    
            if ($form->isSubmitted() && $form->isValid()) {

                $em->flush();

                return $this->redirectToRoute('index');
            } else {
                echo 'error';
            }
        }

        return $this->render('inventory-add.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
?>