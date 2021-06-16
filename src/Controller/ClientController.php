<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Carousel;
use App\Entity\Client;
use App\Form\ClientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/client")
     */

class ClientController extends AbstractController
{
    private $entityManager;

   public function __construct(EntityManagerInterface $entityManager)
   {
       $this->entityManager = $entityManager;
   }
    /**
     * @Route("/", name="client_index")
     */
    public function index(): Response
    {
         
 
           $annonce = new Annonce();
           $annonce->setNom('Pc');
           $annonce->setTitre('Mac');
           $annonce->setDetail('Mac Book Pro'); 


           //$em = $this->getDoctrine()->getManager();
           $this->entityManager->persist($annonce);
           $this->entityManager->flush(); 


    //   $chourque = $this->entityManager->getRepository(Client::class)->findOneBy(['nom' => 'Chourque']);
    //   $id = $chourque->getId();
    //   $nom = $chourque->getNom();
      


    $clients = $this->entityManager->getRepository(Client::class)->findAll();

    $annonce = $this->entityManager->getRepository(Annonce::class)->findAll();
      
    $carousels = $this->entityManager->getRepository(Carousel::class)->findAll();
    
        return $this->render('client/index.html.twig',[
            'clients' => $clients,
            'annonces' => $annonce,
            'carousels' => $carousels
        ]);
    }


   /**
     * @Route("/new", name="client_new", methods={"GET", "POST"})
     */

     public function new(Request $request){

        $client = new Client();
       
        /* test FORM */
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('client_index');
        }
       /* fin test FORM */

        return $this->render('client/new.html.twig',[
            'form' => $form->createView(),
        ]);
     }

     /**
     * @Route("/{id}/edit", name="client_edit", methods={"GET", "POST"})
     */

     public function edit(Request $request, Client $client){


        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()){

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('client_index');

        }

        return $this->render(('client/edit.html.twig'),[
            'form' => $form->createView(),
        ]);

     }



     /**
     * @Route("/list", name="client_list")
     */

    public function listclient(){ 
        $clients = $this->entityManager->getRepository(Client::class)->findAll();

        return $this->render('client/list.html.twig',[
             'clients' =>  $clients 
        ]);
     }

     /**
     * @Route("/{id}", name="client_show")
     */

    public function showclient(Client $client){  

        return $this->render('client/show.html.twig',[
             'client' =>  $client 
        ]);
     }

   /**
     * @Route("/delete/{id}", name="client_delete", methods={"POST"})
     */

     public function delete(Request $request, Client $client){

        if($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($client);
            $entityManager->flush();
        }
        


        return $this->redirectToRoute('client_index');
     }

 

}
