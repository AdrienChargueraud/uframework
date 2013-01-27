<?php

namespace Model;

class Locations implements FinderInterface, PersistenceInterface
{
	/*
	tableau de locations 
	*/
	private $locations ; 

	/**
	* Nom du json à charger
	*/
	private $Json_file = '../data/Locations.json';

	// constructeur qui va loader le fichier json
	public function __construct()
	{
		$this->chargerJson();
	}
	
	/**
	 * Cette fonction permet de charger le fichier .json qui chargera automatiquement le tableau de locations
	 */ 
	private function chargerJson()
	{
		if(file_exists($this->Json_file))
		{
			$this->locations = json_decode(file_get_contents($this->Json_file, true));
		}
		else
		{
			$this->locations = null;
		}
	}
	
	/**
	 *  Cette fonction permet de sauver l'array de locations dans un fichier .json
	 */ 
	private function sauverJson()
	{
		if(!file_exists($this->Json_file))
		{
			fopen($this->Json_file, "w");
		}
		
		file_put_contents($this->Json_file, json_encode($this->locations), LOCK_EX);
	}

	// méthode findAll de l'interface
	public function findAll(){
		return $this->locations;
	}

	// méthode findId de l'interface
	public function findOneById($id){
		if (array_key_exists($id, $this->locations))
            return $this->locations[$id];
        else 
            throw new HttpException(404, "Object doesn't exist");
	}
	
	/**
	 * Méthode pour créer une locations dans l'array
	 * Retourne l'id de l'élément créée (respect du REST)
	 */ 
	public function create($name)
	{
		$this->locations[] = $name;
		$this->sauverJson();
		
		// on compte le nombre de clé
		$New_Cle = array_keys($this->locations);
        return count($New_Cle) - 1;
	}

    public function update($id, $name)
    {
		$this->locations[$id] = $name;
		$this->sauverJson();
	}

    public function delete($id)
    {
		// correction du array_splice car cela supprimait tout -__-
		array_splice($this->locations, $id, 1);
        $this->sauverJson();
	}
}
