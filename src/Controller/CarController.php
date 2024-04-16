<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    /**
     * Page d'accueil
     */
    #[Route('/voiture/{id}', name: 'car.show')]
    public function index(int $id, CarRepository $carRepository): Response
    {
        $car = $carRepository->find($id);

        if (!$car) {
            return $this->redirectToRoute('home.show');
        }

        return $this->render('car/index.html.twig', [
            'car' => $car,
        ]);
    }

    /**
     * Supprimer un véhicule
     */
    #[Route('/voiture/{id}/supprimer', name: 'car.delete')]
    public function delete(int $id, CarRepository $carRepository, EntityManagerInterface $entityManager): Response
    {
        $car = $carRepository->find($id);

        if (!$car) {
            return $this->redirectToRoute('home.show');
        }

        $entityManager->remove($car);
        $entityManager->flush();

        return $this->redirectToRoute('home.show');
    }
}
