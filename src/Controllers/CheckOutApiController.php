<?php

use Repository\CheckOutRepository;

require_once 'AuthController.php';
require_once __DIR__.'/../Repository/CheckOutRepository.php';

class CheckOutApiController extends AuthController
{
    public function checkOut()
    {
        if($this->isWorker()) {
            $checkOutRepository = new CheckOutRepository();
            if (isset($_GET['rentalId'])) {
                $rentalId = $_GET['rentalId'];
                $checkOutRepository->markAsReceived($rentalId);
            }
        }
    }
}