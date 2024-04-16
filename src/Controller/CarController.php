<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/voiture/{id}', name: 'car.show')]
    public function index(int $id, CarRepository $carRepository): Response
    {
        $car = $carRepository->find($id);

        return $this->render('car/index.html.twig', [
            'car' => $car,
        ]);
    }
}
