<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


/**
 * CountryController implements the CRUD actions for country model.
 * Code by Nizamettin
 */

class ExampleController extends Controller
{
  public function actionSay($message = 'Nizamettin')
  {
    echo "Hello $message";
    exit;
  }
}