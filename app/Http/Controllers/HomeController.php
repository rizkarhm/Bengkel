<?php

namespace App\Http\Controllers;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\Panther\Client as PantherClient;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

}
