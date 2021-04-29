<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\InvInventory;
use App\Entity\InvItem;
use App\Form\Type\InvItemType;

use Doctrine\ORM\EntityManagerInterface;

class ItemController extends AbstractController
{
    /**
     * @Route("/item-add", name="item-add")
     */
    public function addItem(EntityManagerInterface $em, Request $request): Response
    {
        $inventory = $this->getDoctrine()->getRepository(InvInventory::class)->find(1);
        dump($inventory);
        
        $item = new InvItem();

        $form = $this->createForm(InvItemType::class, $item);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
    
            if ($form->isSubmitted() && $form->isValid()) {
                $item = $form->getData();
                
                $item->addInventory($inventory);

                $em->persist($item);
                $em->flush();

                return $this->redirectToRoute('index');
            } else {
                echo 'error';
            }
        }

        return $this->render('item-add.html.twig', [
            'form' => $form->createView(),
        ]);
        
    }

    /**
     * @Route("/item-update", name="item-update")
     */
    public function updateItem(EntityManagerInterface $em, Request $request): Response
    {
        /*$inventory = $this->getDoctrine()->getRepository(InvInventory::class)->find(1);
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
        ]);*/

    }
}
?>