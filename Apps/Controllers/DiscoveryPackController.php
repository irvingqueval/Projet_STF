<?php

namespace Apps\Controllers;

class DiscoveryPackController extends Controller
{
    protected $modelName = \Apps\Models\DiscoveryPack::class;

    public function index()
    {
        $discoveryPacks = $this->model->findAll();

        $pageTitle = "Shooting Discovery Packs";

        \Apps\Libs\Renderer::render("discovery-pack/index", [
            "pageTitle" => $pageTitle,
            "discoveryPacks" => $discoveryPacks
        ]);
    }


    public function show()
    {
        $discoveryPack_id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $discoveryPack_id = $_GET['id'];
        }

        if (!$discoveryPack_id) {
            die("You must specify a valid `id` parameter in the URL!");
        }

        $discoveryPack = $this->model->findOne($discoveryPack_id);

        $pageTitle = $discoveryPack['name'];

        \Apps\Libs\Renderer::render('discovery-pack/show', [
            'pageTitle' => $pageTitle,
            'discoveryPack' => $discoveryPack
        ]);
    }
}
