<?php


use Repository\CheckInRepository;

require_once __DIR__.'/../Repository/CheckInRepository.php';

class CheckInApiController extends AuthController
{
    public function checkIn(): void
    {
        if($this->isWorker()) {
            $checkInRepository = new CheckInRepository();
            if (isset($_GET['rentalId'])) {
                $rentalId = $_GET['rentalId'];
                $checkInRepository->markAsReturned($rentalId);
            }
        }
    }


}