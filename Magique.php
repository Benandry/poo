
<?php

class Tablier {

    // Constructeur
    public function __construct(public float $heigth,public float $width){
    }
}

class Pont {

    public function __construct(public string $name, private Tablier $tablier){}
    

    // Method clone pour copier un objet 
    public function __clone(){
        $this->name = "Tower bridge ee";
        $this->tablier = clone $this->tablier;
    }

    // Method __tostring pour convertir en chaine de caractere l'obje
    public function __tostring():string{
        return sprintf("le pont %s avait de longueur de %f et de largeur de %f", $this->name, $this->tablier->heigth, $this->tablier->width);
    }
}


class Majuscule{

    // Method   __invoke
    public function __invoke(string $str){
        return strtoupper($str);
    }
}

class StartWith{

    public function __construct(public string $str){}

    public function __invoke(string $str2){
        return str_starts_with($str2,$this->str);
    }
}

print_r(
    array_filter(["Gourmette","Gagasaa","Itentionnelle"],new StartWith("G"))
);


$maj = new Majuscule;

echo $maj("Hello world");


$tablier = new Tablier(25.0,10.00);

echo "\n";
echo "\n";
$strObj =  serialize($tablier);
echo $strObj;

echo "\n";
echo "\n";




$pont = new Pont("Mahnattan",$tablier);

$pont2 = clone $pont;

echo $pont2;

// print_r($pont->name);

// print_r($pont2->name);



Class NumberEven{

    public function __invoke(array $numbers): array{

        /** @var array $evens */
        $evens = [];

        foreach($numbers as $number){
            if($number % 2 == 0){
                $evens[] = $number;
            }
        }

        return $evens;
    }
}


$nombrePaire = new NumberEven;

print_r(
    $nombrePaire(array_filter([44,23,55,89,74,41,42,23,56,56]))
);
