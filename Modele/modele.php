<?php
class Modele
{
private $monPdo=null;
//effectue la connexion à la bdd
//instancie et renvoie l'objet PDO associé
private function getBdd()
{
    if ($this->monPdo==null) { 
        // Connexion à la base "monblog" locale, utilisation du compte root sans mot de passe
        $this->monPdo = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
     
    }
    return $this->monPdo;
}

public function getBillets()
{
    $requeteBillets = "select * from T_BILLET order by BIL_ID desc";
    $stmtBillets = $this->getBdd()->query($requeteBillets);
    $billets = $stmtBillets->fetchAll();
    return $billets;
}

public function getBillet($idBillet)
{
    $requeteBillet = "select * from T_BILLET where BIL_ID= $idBillet";
    $stmtBillet = $this->getBdd()->query($requeteBillet);
    $billet = $stmtBillet->fetch();  // Accès au premier élément résultat
    return $billet;
}

}
