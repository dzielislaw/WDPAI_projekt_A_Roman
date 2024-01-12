<?php

    require_once 'AppController.php';
    class DefaultController extends AppController{
        public function index(): void
        {
            //TODO diaply index.html
            $this->render('login');
        }
        public function dashboard(): void
        {
            //TODO display projects.html
            $this->render('dashboard');
        }

        public function addEquipment(): void
        {
            $this->render('addEquipment');
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

        public function searchTool()
        {
            if(isset($_POST['toolSelect'])){
                $database = new Database();
                $stmt = $database->connect()->prepare('
SELECT egzemplarz_id, narzedzia.nazwa AS name, producenci.nazwa AS producerName, cena, kategorie.nazwa as kategoria, uwagi FROM egzemplarze
    INNER JOIN public.narzedzia ON narzedzia.narzedzie_id = egzemplarze.narzedzie_id
    INNER JOIN public.producenci ON producenci.producent_id = narzedzia.producent_id
    INNER JOIN public.narzedzia_kategorie ON narzedzia.narzedzie_id = narzedzia_kategorie.narzedie_id
    INNER JOIN kategorie ON kategorie.kategoria_id = narzedzia_kategorie.kategoria_id
    WHERE kategorie.nazwa = :nazwa;'
                );
                $stmt->bindParam(':nazwa', $_POST['toolSelect']);
                $stmt->execute();
                
            }
        }
    }
?>