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
use AppBundle\Services;

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

            if($form->isValid())
            {
                if($car->getImage() != null)
                {
                    $file = $car->getImage();
                    $dataService = $this->get(Services\GlobalFunctionService::class);
                    $fileName = $dataService->generateUniqueFileName().".".$file->guessExtension();

                    $file->move($this->getParameter('profile_car_directory'),$fileName);
                    $car->setImage($fileName);

                }
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($car);
                $entityManager->flush();

                $this->addFlash("success", "Car {$car->getMark()} has been successfully added");


                return $this->redirectToRoute("car_cars");
            }
        }
        return $this->render("komis/add.html.twig", ["form"=>$form->createView()]);
    }

    public function editAction(Request $request, Car $car)
    {
        $form = $this->createForm(CarType::class, $car);

        if($request->isMethod("post"))
        {
            $form->handleRequest($request);

            if($form->isValid())
            {
                if($car->getImage() != null)
                {
                    $file = $car->getImage();
                    $dataService = $this->get(Services\GlobalFunctionService::class);
                    $fileName = $dataService->generateUniqueFileName().".".$file->guessExtension();

                    $file->move($this->getParameter('profile_car_directory'),$fileName);
                    $car->setImage($fileName);

                }
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($car);
                $entityManager->flush();

                $this->addFlash("success", "Contact {$car->getMark()} has been successfully added");


                return $this->redirectToRoute("car_cars");
            }
        }
        return $this->render("komis/edit.html.twig", ["form"=>$form->createView()]);
    }

    public function deleteAction(Car $car)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($car);
        $entityManager->flush();

        return $this->redirectToRoute("car_cars");
    }

    public function detailsAction(Car $car)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $car = $entityManager->getRepository(Car::class)->find($car->getId());

        return $this->render("komis/details.html.twig", ["car"=>$car]);
    }

}