<?php

namespace App\Http\Controllers;

use App\Utility\FeatureFlag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    private FeatureFlag $featureFlag;

    public function __construct(FeatureFlag $featureFlag) {
        $this->featureFlag=$featureFlag;
    }


    public function renderViewWelcome(){
        return view('welcome');
    }
}
