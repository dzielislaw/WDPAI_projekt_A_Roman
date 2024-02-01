<?php

require_once 'AuthController.php';
require_once __DIR__.'/../Repository/ClientRepository.php';
require_once __DIR__.'/../Repository/EquipmentRepository.php';
require_once __DIR__.'/../../Database.php';

class RentController extends AuthController
{
    public function rent(){
        if(!isset($_POST['productId'])){
            $this->render('dashboard');
            exit();
        }
        $equipmentId = $_POST['productId'];
        $this->rentEquipment($equipmentId);
    }
  private function rentEquipment(int $equipmentId): void
  {
      if($this->isClient()) {
          $equipmentRepository = new \EquipmentRepository();
          $equipment = $equipmentRepository->getEquipment($equipmentId);
          $clientId = $this->getCurrentUserId();
          $price = intval(
              trim($equipment->getPrice(), "$")
          );

          $db = new \Database();
          $stmt = $db->connect()->prepare('
            CALL wypozycz_sprzet(:equipmentId, :clientId, :price);
          ');
          $stmt->bindParam(':equipmentId', $equipmentId);
          $stmt->bindParam(':clientId', $clientId);
          $stmt->bindParam(':price', $price);
          $stmt->execute();
          echo 'Sprzęt wypożyczony';
      }
      else{
          $this->render('login.php', ['messages' => 'Please login into a client account']);
      }
  }

}