@extends('layouts.app')


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project 01</title>

        <!-- Fonts -->

        <!-- Styles -->
    </head>
    <body>
        {{-- Navigation bars --}}
        @section('navigation-bar')
            {{-- @parent        --}}

            @section('content')
        <div class="content">
                
            
            {{-- Pages heros --}}
            <div class="intro">
                <h1>Pressing a domicile haute qualiter livre partout a abidjan </h1>
                
                <h4>Nous recuperons et livrons vos vetements </h4>
                
                <input type="text" placeholder="Saisissez votre adresse"> <button class="btn">Reserver votre crenaux</button>
                
            </div>
            
            {{-- Section services --}}
            <section class="services">
                <div>
                    <h1>Comment ca marche ?</h1>
                    <div class="list-service">
                        <ul>
                            <li><img src="" alt=""></li>
                            <li><img src="" alt=""></li>
                            <li><img src="" alt=""></li>
                        </ul>
                    </div>
                </div>
            </section>
            
            {{-- Section About us  --}}
            <section class="about-us">
                <div class="about-us-list">
                    <p>Les services d'un pressing de haute qualite a votre porte</p>
                    <ul>
                        <li><img src="" alt=""></li>
                        <li><img src="" alt=""></li>
                        <li><img src="" alt=""></li>
                    </ul>
                </div>
            </section>
            
            {{-- Section command  --}}
            <section class="commands">
                <div class="commands-list">
                    
                </div>
            </section>
            
            {{-- Section temoignage --}}
            <section class="temoignage">
                
            </section>
            
            {{-- Section about us  --}}
            <section class="contact-us">
                
            </section>
            
            {{-- Footer  --}}
            <footer>
                
            </footer>
        </div>
        @endsection

    </body>
    </html>
    