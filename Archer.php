<?php


class Archer extends Character
{
       public function __construct($name) {
        parent::__construct($name);
        $this->damage = 4;
        $this->arrowQuiver = 10;
        $this->healthPoints =100;
    }

//définir ordre du choix d'attaque//
    public function turn($target) {
        if ($this->arrowQuiver >= 2) {
            $status = $this->doubleArrow($target);
        } else if ($this->arrowQuiver == 1) {
            $status = $this->simpleArrow($target);
        } else if ($this->arrowQuiver == 0) {
            $status = $this->daggerBlow($target);
        }
        return $status;
    }
        
//coup de l'attaque//
    public function arrowCost($arrowQuiver){
        $this->$arrowQuiver -= $arrowCost;
    }
      
        
//la double fleche en premier//
public function doubleArrow($target) {
    $arrowCost = 2;
    if ($arrowQuiver >=2) {
        $doubleArrowDamage = $this->arrowQuiver * 2;
        $this->arrowQuiver = 2;
    } else {
        $doubleArrowDamage = $arrowCost * 2;
        $this->doubleArrowDamage -= $arrowCost;
    }
    $target->setHealthPoints($doubleArrowDamage);
    $status = "$this->name lance une double fêche sur $target->name à qui il reste $target->healthPoints points de vie ! Il reste $this->arrowQuiver flêche dans le carquois de $this->name !";
    return $status;
}

//fleche simple en deuxieme possibilité//
public function simpleArrow($target) {

    $arrowCost = rand(1, 20);
    if ($arrowCost > $this->arrowQuiver) {
        $simpleArrowDamage = $this->arrowQuiver * 1;
        $this->arrowQuiver = -1;
    } else {
        $simpleArrowDamage = $arrowCost * 1;
        $this->simpleArrowDamage -= $arrowCost;
    }
    $target->setHealthPoints($simpleArrowDamage);
    $status = "$this->name lance une fêche sur $target->name à qui il reste $target->healthPoints points de vie ! Il reste $this->arrowQuiver flêche dans le carquois de $this->name !";
    return $status;
}

//dague si il y a plus de fleche//    
    public function daggerBlow($target) {
        if ($arrowQuiver == 0){
        $target->daggerBlow($this->damage);
        $status = "$this->name donne un coup de dague à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
}
}
