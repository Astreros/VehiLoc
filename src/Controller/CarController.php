<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    /**
     * Ajouter un véhicule
     */
    #[Route('/voiture/creer', name: 'car.create')]
    public function add(Request $request): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $car->setCreatedAt(new \DateTimeImmutable());
            $this->entityManager->persist($car);
            $this->entityManager->flush();

            return $this->redirectToRoute('home.show');
        }

        return $this->render('car/createForm.html.twig', [
            'form' => $form
        ]);
    }

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

        $this->entityManager->remove($car);
        $this->entityManager->flush();

        return $this->redirectToRoute('home.show');
    }
}
