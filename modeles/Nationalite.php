<?php
class Nationalite{
    /**
     * numéro du nationalite
     * 
     * @var int
     */
    private$num;
    
    /**
     * libellé du nationalite
     * 
     * @var string
     */
    private$libelle;

    /**
     * numéro du continent
     * 
     * @var int
     */
    private $numContinent;

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
     * ecrit le libellé de nationalite
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
     * revoie l'objet continent associé
     * 
     * @return Continent
     */
    public function getNumContinent() : Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * ecrit le numéro du continent
     * 
     * @param Continent $continent
     * @return  self
     */
    public function setNumContinent(Continent $continent): self
    {
        $this->numContinent = $continent->getNum();
        return $this;
    }



    /**
     * returne l'ensemble des nationalites
     *
     * @return array
     */
    public static function findAll():array
    {
        $req=MonPdo::getInstance()->prepare("select n.num, n.libelle as 'libNation', c.libelle as 'libContinent'  from nationalite n, continent c where n.numContinent=c.num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * retourne une nationalite en le cherchant par son numéro
     *
     * @param integer $id
     * @return nationalite
     */
    public static function findById(int $id):Nationalite
    {
        $req=MonPdo::getInstance()->prepare("Select * from nationalite WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->bindParam(':id',$id);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat;
    }


    /**
     * ajoute une nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function addNationalite(Nationalite $nationalite):int
    {
        $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle, numContinent) VALUES(:libelle, :numContinent)");
        $req->bindparam(':libelle',$nationalite->getLibelle());
        $req->bindparam(':numContinent',$nationalite->numContinent);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de modifier un nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function uptdate(Nationalite $nationalite):int
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set libelle=:libelle,numContinent= :numContinent WHERE num=:id");
        $req->bindparam(':libelle',$nationalite->getLibelle());
        $req->bindparam(':id',$nationalite->getNum());
        $req->bindparam(':numContinent',$nationalite->numContinent);
        $nb=$req->execute();
        return $nb;
    }


    /**
     * permet de supprimer un nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function delete(Nationalite $nationalite):int
    {
        $req=MonPdo::getInstance()->prepare("delet from nationalite WHERE num=:id");
        $req->bindparam(':id',$nationalite->getNum());
        $nb=$req->execute();
        return $nb;
    }
}
?>