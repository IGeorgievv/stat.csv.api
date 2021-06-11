<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;

/**
 * Country controller.
 * @Route("/api", name="api_")
 */
class CountryController extends AbstractFOSRestController
{
    /**
     * Lists all Countries.
     * @Rest\Get("/countries")
     *
     * @return Response
     */
    public function index()
    {
        $countries = json_decode(file_get_contents(__DIR__ .'/../../resources/Countries.json'), 1);
        return $this->handleView($this->view($countries));
    }
}