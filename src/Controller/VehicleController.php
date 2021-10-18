<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Entity\VehicleBrand;
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

    public function info($id): Response
    {
        $vehicle = $this->getDoctrine()
            ->getRepository(Vehicle::class)
            ->find($id);

        $vehicleInfo = $this->getDoctrine()
            ->getRepository(VehicleBrand::class)
            ->findBy(['vehicle_type' => $id]);

        return $this->render('vehicle/info.html.twig', [
            'controller_name' => 'VehicleController',
            'vehicle' => $vehicle,
            'vehicleInfo' => $vehicleInfo,
        ]);
    }
}
