<?php

namespace App\Controllers\User;

use App\Controllers\Controller;

use App\Models\Adresses;

class AdresseController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Adresses();
    }

    public function index()
    {

        $title = "Adresse de livraison";
        $userAdress = $this->getAdress();



        return $this->view('profil.Adresse', compact('title', 'userAdress'));
    }

    public function getAdress()
    {
        $model = new Adresses();
        $argument = ['fk_id_utilisateur'];
        $fk_id_utilisateur = $_SESSION['user']['id_utilisateur'];
        $userAdress = $model->find($argument, compact('fk_id_utilisateur'));
        return $userAdress;
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $nom_adresse = $_POST['nomAdresse'];
            $ville = $_POST['ville'];
            $voie = $_POST['libelle'];
            $voie_sup = $_POST['voieSup'];
            $code_postal = $_POST['codePostal'];
            $telephone = $_POST['telephone'];
            $pays = $_POST['pays'];
            $fk_id_utilisateur = $_SESSION['user']['id_utilisateur'];
            if (empty($nom_adresse) || empty($ville) || empty($voie) || empty($code_postal) || empty($telephone) || empty($pays)) {
                $_SESSION['flash']['erreur'] = "Oups ! Vous devez remplir tout les champs !";
                echo "<SCRIPT LANGUAGE=\"JavaScript\"> document.location.href=\"./adresse\" </SCRIPT>"; //force la direction

                exit();
            } else {
                if (preg_match("~^[0-9]{5}$~", $code_postal) && preg_match("~^[0-9]{10}$~", $telephone)) {

                    $adress =
                        $this->model
                        ->setNom_adresse($nom_adresse)
                        ->setVille($ville)
                        ->setVoie($voie)
                        ->setVoie_sup($voie_sup)
                        ->setCode_postal($code_postal)
                        ->setTelephone($telephone)
                        ->setPays($pays)
                        ->setFk_id_utilisateur($_SESSION['user']['id_utilisateur']);
                    $this->model->create($adress, compact('nom_adresse', 'ville', 'voie', 'voie_sup', 'code_postal', 'telephone', 'pays', 'fk_id_utilisateur'));

                    echo "<SCRIPT LANGUAGE=\"JavaScript\"> document.location.href=\"./adresse\" </SCRIPT>"; //force la direction
                } else {
                    $_SESSION['flash']['erreur_insert_livraison'] = "code postal ou telephone incorrect.";
                    echo "<SCRIPT LANGUAGE=\"JavaScript\"> document.location.href=\"./adresse\" </SCRIPT>"; //force la direction

                }
            }
        }
    }
}
