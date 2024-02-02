<?php

    require_once 'AuthController.php';
    class DefaultController extends AuthController {
        public function index(): void
        {
            $this->render('login');
        }
        public function dashboard(): void
        {
            if($this->isWorker()){
                $this->render('workerDashboard');
            }
            else if ($this->isClient()){
                $this->render('dashboard');
            }
            else{
                $this->render('login');
            }
        }

        public function addEquipment(): void
        {
            if($this->isWorker()) {
                $this->render('addEquipment');
            }
            else{
                $this->render('login', ['messages' => ['Please log into worker account']]);
            }
        }

        public function info(){
            $this->render('info');
        }

        public function register(){
            $this->render('register');
        }

        public function error404()
        {
            $this->render('error404');
        }

        public function equipments(){
            $this->render('equipments');
        }

        public function checkOut()
        {
            if($this->isWorker()) {
                $this->render('checkOut');
            }
            else{
                $this->render('login', ['messages' => ['Please log into worker account']]);
            }
        }

        public function checkIn()
        {
            if($this->isWorker()) {
                $this->render('checkIn');
            }
            else{
                $this->render('login', ['messages' => ['Please log into worker account']]);
            }
        }

    }