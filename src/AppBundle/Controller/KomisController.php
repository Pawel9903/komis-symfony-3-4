<?php
/**
 * Created by PhpStorm.
 * User: pawel9903
 * Date: 09.07.18
 * Time: 10:46
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Komis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class KomisController extends Controller
{
    public function indexAction()
    {
        return $this->render("komis/index.html.twig");
    }

    public function carsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $cars = $entityManager->getRepository(Komis::class)->findAll();

        return $this->render("komis/cars.html.twig", ['cars' => $cars]);
    }
}