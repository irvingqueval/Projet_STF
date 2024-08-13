<?php

namespace Apps\Controllers;

class WeaponRentalController extends Controller
{
    protected $modelName = \Apps\Models\WeaponRental::class;

    public function index()
    {
        // Appel à la méthode findAll() sur l'instance du modèle pour récupérer les données des armes
        $weapons = $this->model->findAll();

        // Titre de la page pour l'utilisation dans la vue
        $pageTitle = "Weapon Rental";

        // Transmission des données à la vue via la méthode render
        \Apps\libs\Renderer::render("weapon-rental/index", [
            "pageTitle" => $pageTitle,
            "weapons" => $weapons  // Assurez-vous d'inclure 'weapons' ici
        ]);
    }

    public function show()
    {
        // Instanciation du modèle des commentaires
        $weaponModel = new \Apps\Models\WeaponRental();

        /**
         * 1. Récupération du paramètre "id" et vérification de celui-ci
         */
        $weapon_id = null;

        // Si le paramètre 'id' existe et est un nombre entier, on le récupère
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $weapon_id = $_GET['id'];
        }

        // Si pas d'id valide, on arrête l'exécution
        if (!$weapon_id) {
            die("Vous devez préciser un paramètre `id` valide dans l'URL !");
        }

        /**
         * 2. Récupération de l'arme en question
         */
        $weapon = $this->model->findOne($weapon_id);

        /**
         * 4. Affichage des données dans la vue
         */
        $pageTitle = $weapon['name'];

        \Apps\Libs\Renderer::render('weapon-rental/show', compact('pageTitle', 'weapon', 'weapon_id'));

        /** Note : 
         * La fonction compact('pageTitle', 'weapon', 'weapon_id') 
         * est équivalente à 
         * ['pageTitle' => $pageTitle, 'weapon' => $weapon, 'weapon_id' => $weapon_id]
         */
    }
}
