<?php

namespace App\Models;

class Hours extends Model{

    protected $table = 'horaire';
    public function allhours(): array
    {

        return $this->query("SELECT * FROM horaire");
    }
   

}