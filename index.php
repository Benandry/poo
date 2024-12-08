<?php

declare(strict_types=1);

// Le mot cle $this se rattacher a chaque instance ou objet (se referer au objet)
// -> permet d'acceder au element d'un objets c'est a dire reference au instance
// ::  permet d'acceder les element de class direct

// Utiliser le mot clé self pour cibler les element static dans la class

class Pont{

    private const UNIT = "m²";
    public function __construct(private float $longueur, private float $largeur)
    {
        
    }

    //Encapsulation 
    public function setLongueur(float $longueur): void
    {
        self::validateSize($longueur);
        $this->longueur = $longueur;
        
    }

    public function getLongueur(): float{
        return $this->longueur;
    }

    public function setLargeur(float $largeur): void
    {
        self::validateSize($largeur);
        $this->largeur = $largeur;
        
    }

    public function getLargeur() : float
    {
        return $this->largeur;
    }

   public static function validateSize(float $size) : bool
   {
        if($size  <= 0 ){
            trigger_error("Le nombre est trop court min(1)",E_USER_ERROR);
        }

        return true;
   }

   public function getSurface(): float
   {
        return $this->longueur * $this->largeur;
   }

   public function displaySurfaceText() : string
   {
         return $this->getSurface(). " ". self::UNIT;
   }

}



$pont = new Pont(25,10);


print_r($pont->displaySurfaceText());
