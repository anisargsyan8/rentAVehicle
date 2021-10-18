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

    public function rent($type, $brand): Response
    {
        $vehicleType =  $this->getDoctrine()
        ->getRepository(Vehicle::class)
        ->find($type);

        $rentInfo = $this->getDoctrine()
            ->getRepository(VehicleBrand::class)
            ->findBy(['vehicle_type' => $type, 'name' => $brand]);

        return $this->render('vehicle/rent.html.twig', [
            'controller_name' => 'VehicleController',
            'vehicleType' => $vehicleType,
            'rentInfo' => $rentInfo,
        ]);
    }

    public function update($type, $brand): Response
    {
        $vehicle = $this->getDoctrine()->getManager();
        $vehicleInfo = $vehicle
            ->getRepository(VehicleBrand::class)
            ->findBy(['vehicle_type' => $type, 'name' => $brand]);

        if(!$vehicleInfo) {
            throw $this->createNotFoundException(
                'No info'
            );
        }    

        $vehicleInfo[0]->setAvailableCount($vehicleInfo[0]->getAvailableCount() - 1);
        $vehicle->flush();
        
        return $this->redirectToRoute('vehicle');
    }
}
