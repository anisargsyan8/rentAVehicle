<?php

namespace App\Controller;

use App\Entity\Vehicle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    public function index(): Response
    {
        $vehicleTypes = $this->getDoctrine()
            ->getRepository(Vehicle::class)
            ->findAll();

        return $this->render('vehicle/index.html.twig', [
            'controller_name' => 'VehicleController',
            'vehicleTypes' => $vehicleTypes,
        ]);
    }
}
