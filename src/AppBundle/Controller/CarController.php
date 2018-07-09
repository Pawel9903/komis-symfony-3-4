<?php
/**
 * Created by PhpStorm.
 * User: pawel9903
 * Date: 09.07.18
 * Time: 15:01
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Car;
use AppBundle\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CarController extends Controller
{
    public function indexAction()
    {
        return $this->render("komis/index.html.twig");
    }

    public function carsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $cars = $entityManager->getRepository(Car::class)->findAll();

        return $this->render("komis/cars.html.twig", ['cars' => $cars]);
    }

    public function addAction(Request $request)
    {
        $car = new Car();

        $form = $this->createForm(CarType::class, $car);

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute("car_cars");
        }

        return $this->render("komis/add.html.twig", ["form"=>$form->createView()]);
    }
}