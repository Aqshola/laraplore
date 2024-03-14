<?php

namespace App\Utility;

use Exception;
use Illuminate\Support\Facades\Request as FacadesRequest;

class FeatureFlag{

    private $featureList=[];
    private const PROD_DOMAIN='127.0.0.1:8000';
    private const DEV_DOMAIN= '127.0.0.1:3000';



    public function __construct() {
        $this->featureList['login'] = $this->generateToggle(true, false);
        $this->featureList['logout'] = $this->generateToggle(false, false);
    }



    private function generateToggle(bool $prodToggle, bool $devToggle){
        return [
            'production'=>$prodToggle,
            'development'=>$devToggle
        ];
    }

    public function getToggle(string $toggleName){

        if(!array_key_exists($toggleName,$this->featureList)){
            throw new Exception("Feature $toggleName Not Found");
        }

        $domain=FacadesRequest::getHttpHost();
        $isProd=$domain == self::PROD_DOMAIN;
        $isDev=$domain == self::DEV_DOMAIN;
        $toggle=$this->featureList[$toggleName];

        if(is_null($toggle)){
            return false;
        }

        if($isProd){
            return $toggle['production'];
        }

        if($isDev){
            return $toggle['development'];
        }

        return false;
    }


}
