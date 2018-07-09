<?php
/**
 * Created by PhpStorm.
 * User: pawel9903
 * Date: 09.07.18
 * Time: 10:46
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Cars;
use AppBundle\Form\CarType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarsController extends Controller
{
    public function indexAction()
    {
        return $this->render("komis/index.html.twig");
    }

    public function carsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $cars = $entityManager->getRepository(Cars::class)->findAll();

        return $this->render("komis/cars.html.twig", ['cars' => $cars]);
    }

    public function addAction(Request $request)
    {
        $car = new Cars();

        $form = $this->createForm(CarType::class, $car);

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute("cars_cars");
        }

        return $this->render("komis/add.html.twig", ["form"=>$form->createView()]);
    }
}