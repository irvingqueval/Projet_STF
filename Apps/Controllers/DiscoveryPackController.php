<?php

namespace Apps\Controllers;

class DiscoveryPackController extends Controller
{
    protected $modelName = \Apps\Models\DiscoveryPack::class;

    public function index()
    {
        // Récupération de tous les packs de découverte
        $discoveryPacks = $this->model->findAll();

        // Titre de la page
        $pageTitle = "Shooting Discovery Packs";

        // Rendu de la vue avec les données
        \Apps\Libs\Renderer::render("discovery-pack/index", [
            "pageTitle" => $pageTitle,
            "discoveryPacks" => $discoveryPacks
        ]);
    }


    public function show()
    {
        // Récupération de l'ID du pack depuis l'URL
        $discoveryPack_id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $discoveryPack_id = $_GET['id'];
        }

        // Si pas d'id valide, on arrête l'exécution
        if (!$discoveryPack_id) {
            die("Vous devez préciser un paramètre `id` valide dans l'URL !");
        }

        // Récupération du pack correspondant à l'ID
        $discoveryPack = $this->model->findOne($discoveryPack_id);

        // Titre de la page
        $pageTitle = $discoveryPack['name'];

        // Rendu de la vue avec les données du pack
        \Apps\Libs\Renderer::render('discovery-pack/show', [
            'pageTitle' => $pageTitle,
            'discoveryPack' => $discoveryPack
        ]);
    }
}
