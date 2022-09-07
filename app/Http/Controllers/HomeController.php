<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
     public function home (): Factory|View|Application
     {
         return view('home/home');
     }
     public function nosotros (): Factory|View|Application
     {
         return view('home/nosotros');
     }

     public function contacto (): Factory|View|Application
     {
         return view('home/contacto');
     }

}
