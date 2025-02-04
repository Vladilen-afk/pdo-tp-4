<?php
class Continent{
    /**
     * numéro du continent
     * 
     * @var int
     */
    private$num;
    
    /**
     * libellé du continent
     * 
     * @var string
     */
    private$libelle;

    /**
     * get the value of num
     */
    public function getNum()
    {
        return $this->num;
    }
    /**
     * get the value of libelle
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }
   
    /**
     * ecrit le libellé du continent
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle): self 
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * returne l'ensemble des continents
     *
     * @return array
     */
    public static function findAll():array
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM continent");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * retourne un continent en le cherchant par son numéro
     *
     * @param integer $id
     * @return Continent
     */
    public static function findById(int $id):Continent
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM continent WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->bindParam(':id',$id);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat;
    }


    /**
     * ajoute un continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function addContinent(Continent $continent):int
    {
        $req=MonPdo::getInstance()->prepare("INSERT INTO continent(libelle) VALUES(:libelle)");
        $req->bindparam(':libelle',$continent->getLibelle());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de modifier un continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function uptdate(Continent $continent):int
    {
        $req=MonPdo::getInstance()->prepare("UPDATE continent SET libelle=:libelle WHERE num=:id");
        $req->bindparam(':libelle',$continent->getLibelle());
        $req->bindparam(':id',$continent->getNum());
        $nb=$req->execute();
        return $nb;
    }


    /**
     * permet de supprimer un continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function delete(Continent $continent):int
    {
        $req=MonPdo::getInstance()->prepare("DELETE FROM continent WHERE num=:id");
        $req->bindparam(':id',$continent->getNum());
        $nb=$req->execute();
        return $nb;
    }
}
?>