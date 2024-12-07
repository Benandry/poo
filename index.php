<?php

declare(strict_types=1);

// Le mot cle $this se rattacher a chaque instance ou objet (se referer au objet)

class Pont{



    private string $unit = "m²";
    private float $longueur;
    protected float $largeur;

    //Encapsulation 
    public function setLongueur(float $longueur): void
    {
       $this->validateSize($longueur);
        $this->longueur = $longueur;
        
    }

    public function getLongueur(): float{
        return $this->longueur;
    }

    public function setLargeur(float $largeur): void
    {
        $this->validateSize($largeur);
        $this->largeur = $largeur;
        
    }

    public function getLargeur() : float
    {
        return $this->largeur;
    }

   private function validateSize(float $size) : void{
        if($size  <= 0 ){
            trigger_error("Le nombre est trop court min(1)",E_USER_ERROR);
        }
   }

   public function getSurface(): float
   {
        return $this->longueur * $this->largeur;
   }

   public function displaySurfaceText() : string
   {
         return $this->getSurface(). " ". $this->unit;
   }

}



$pont = new Pont;

$pont->setLongueur(25);
$pont->setLargeur(10);

print_r($pont->displaySurfaceText());
