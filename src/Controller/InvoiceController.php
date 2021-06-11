<?php
namespace App\Controller;

use App\Entity\Invoice;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Form\ProcessInvoices;
use FOS\RestBundle\Controller\AbstractFOSRestController;

/**
 * Movie controller.
 * @Route("/api", name="api_")
 */
class InvoiceController extends AbstractFOSRestController
{
    /**
     * Lists all Movies.
     * @Rest\Get("/invoices")
     *
     * @return Response
     */
    public function index()
    {
        // $repository = $this->getDoctrine()->getRepository(Invoice::class);
        // $movies = $repository->findall();
        $movies = [];
        return $this->handleView($this->view($movies));
    }
    /**
     * Create Movie.
     * @Rest\Post("/invoices")
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $form = $this->createForm(ProcessInvoices::class, $movie);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($movie);
        $em->flush();
        return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
        }

        return $this->handleView($this->view($form->getErrors()));
    }
    }