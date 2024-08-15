<?php

namespace Apps\Controllers;

class WeaponRentalController extends Controller
{
    protected $modelName = \Apps\Models\WeaponRental::class;

    public function index()
    {
        $weapons = $this->model->findAll();

        $pageTitle = "Weapon Rental";

        \Apps\libs\Renderer::render("weapon-rental/index", [
            "pageTitle" => $pageTitle,
            "weapons" => $weapons
        ]);
    }

    public function show()
    {
        $weaponModel = new \Apps\Models\WeaponRental();

        $weapon_id = null;

        // If the 'id' parameter exists and is an integer, it is retrieved
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $weapon_id = $_GET['id'];
        }

        // If no valid id, stop execution
        if (!$weapon_id) {
            die("You must specify a valid `id` parameter in the URL!");
        }

        $weapon = $this->model->findOne($weapon_id);

        $pageTitle = $weapon['name'];

        \Apps\Libs\Renderer::render('weapon-rental/show', compact('pageTitle', 'weapon', 'weapon_id'));

        /** Note : 
         * The function compact('pageTitle', 'weapon', 'weapon_id') 
         * is equivalent to 
         * ['pageTitle' => $pageTitle, 'weapon' => $weapon, 'weapon_id' => $weapon_id]
         */
    }
}
