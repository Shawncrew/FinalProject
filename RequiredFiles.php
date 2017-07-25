<?php

require_once __DIR__ . '/Models/Aircraft.php';
require_once __DIR__ . '/Models/Airport.php';
require_once __DIR__ . '/Models/AirportParkingSpace.php';
require_once __DIR__ . '/Models/CarRental.php';
require_once __DIR__ . '/Models/CreditCard.php';
require_once __DIR__ . '/Models/Customer.php';
require_once __DIR__ . '/Models/Flight.php';
require_once __DIR__ . '/Models/FlightSeat.php';
require_once __DIR__ . '/Models/Order.php';
require_once __DIR__ . '/Models/ParkingReservation.php';
require_once __DIR__ . '/Models/RentalCar.php';
require_once __DIR__ . '/Models/Model.php';

require_once __DIR__ . '/Models/Repositories/Database.php';
require_once __DIR__ . '/Models/Repositories/IRepository.php';
require_once __DIR__ . '/Models/Repositories/CustomerRepository.php';

require_once __DIR__ . '/Views/View.php';
require_once __DIR__ . '/Views/Index.php';
require_once __DIR__ . '/Views/Customer/RegistrationForm.php';

require_once __DIR__ . '/Controllers/IFrontController.php';
require_once __DIR__ . '/Controllers/FrontController.php';
require_once __DIR__ . '/Controllers/DefaultController.php';
require_once __DIR__ . '/Controllers/Project4Controller.php';
require_once __DIR__ . '/Controllers/TestController.php';
require_once __DIR__ . '/Controllers/CustomerController.php';