@extends('layouts.app')


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mon pressing</title>

        <!-- Fonts -->

        <!-- Styles -->
        {{-- font-awesome --}}

    </head>
    <body>
        {{-- Navigation bars --}}
        {{-- @section('navigation-bar') --}}
            {{-- @parent        --}}
@section('content')
<div class="shoot">

        <div class="content">


            {{-- Pages heros --}}
            <div class="intro wrapper">
                <div class="layer"></div>
                <div class="groups-intro">
                    <h1>Pressing à domicile haute qualité livré partout à Abidjan et banlieue</h1>
                    <br>
                    <p>Nous récupérons et livrons vos vêtement gratuitement*</p>
                </div>

                <div class="cta">
                    <a href="{{url('order')}}" class="btn">Passer une commande</a>
                </div>


        <div class="load"></div>
            </div>

            {{-- Section services --}}
            <section class="wrapper">
                <div class="services">
                    <h1 class="title title-services">Comment ça marche ?</h1>
                    <div class="list-service">
                        <ul>
                            <li>
                                <img class="icon-item" src="/icons/phone.svg" alt="phone">
                                <div>
                                    <p class="step">Étape 1</p>
                                    <p>Choisissez les dates et les horaires les plus pratiques pour vous.</p>
                                </div>
                            </li>
                            <li>
                                <img class="icon-item" src="/icons/iron.svg" alt="iron">
                                <div>
                                    <p class="step">Étape  2</p>
                                    <p>Nous collectons et nettoyons votre linge dans nos pressing haute qualité.</p>
                                </div>
                            </li>
                            <li>
                                <img class="icon-item" src="/icons/suit.svg" alt="suit">
                                <div>
                                    <p class="step">Étape  3</p>
                                    <p>Nous vous livrons votre linge propre et repassé en 48h et 7J/7 ! </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            {{-- Section About us  --}}
            <section class="about-us ">
                <div class="about-us-list wrapper">
                    <div class="groups-title">
                        <h1 class="title title-about-us">MONPRESSING</h1>
                    <p class="small-details-title">Les services d'un pressing de haute qualité à votre porte</p>
                    </div>
                    <ul>
                        <li class="about-item">
                            <img src="/icons/thunder.svg" alt="">
                            <div class="details">
                                <p class="small-title">En un clin d'oeil</p>
                                <p class="small-details">
                                    Gagnez du temps !
                                    Nous récupérons, lavons et livrons vos vêtements en 48 h, vous profitez.
                                </p>
                            </div>
                        </li>
                        <li>
                            <img src="/icons/quality.svg" alt="">
                            <div class="details">
                                <p class="small-title">10 ans de qualité</p>
                                <p class="small-details">
                                    Pressing haute qualité depuis 10 ans.
                                    Maintenant profitez de nos services, sans vous déplacer !
                                </p>
                            </div>
                        </li>
                        <li>
                            <img src="/icons/delivery.svg" alt="">
                            <div class="details">
                                <p class="small-title">Jusqu'à votre porte</p>
                                <p class="small-details">
                                    Le pressing c'est nous,
                                    la livraison c'est Grouilleur 225.
                                    Deux experts à votre service !
                                </p>
                            </div>
                            </li>
                    </ul>
                </div>
            </section>

            {{-- Section command  --}}
            <section>
                <div class="commands">
                    <h1 class="title">Nos services</h1>
                    <div class="details">
                        <ul>
                            <li>
                                <img src="/icons/tshirt.svg" alt="">
                                <p class="name-article">Pressing</p>
                            </li>
                            <li>
                                <img src="/icons/suit.svg" alt="">
                                <p class="name-article">Laverie</p>
                            </li>
                            <li>
                                <img src="/icons/uniform.svg" alt="">
                                <p class="name-article">Repassage</p>
                            </li>
                            <li>
                                <img src="/icons/sneakers.svg" alt="">
                                <p class="name-article">Nettoyage Chaussure</p>
                            </li>
                        </ul>
                    </div>
                    <div class="button">
                    <a href="{{url('order')}}" class="btn">Passer une commande</a>
                    </div>
                </div>
            </section>

            {{-- Section temoignage --}}
            <section>
                <div class="feedback">
                    <div class="feedback-groups">
                        <h1 class="title">Ils nous ont fait confiance</h1>
                        <p class="small-details">et ne le regrettent pas !</p>
                    </div>
                        <div class="comments wrapper">
                            <ul>
                                <li>
                                    <h4>Sophi Koudio</h4>
                                    <p>Très pros, mes Hermés sont revenues comme neuves, tout comme mes robes. Merci pour la rapidité et la qualité du travail.</p>
                                </li>
                                <li>
                                    <h4>Alice Nadine</h4>
                                    <p>Super service de pressing à domicile. Essayé pendant le confinement avec livraison sans contact. Mes chemises m'ont été rendues comme neuves. Merci MONPRESSING!!</p>
                                </li>
                                <li>
                                    <h4>Jacob Williams</h4>
                                    <p>Excellent prestation de ce pressing à domicile, même en plein confinement. Le travail est de qualité et ils vous appellent pour vérifier que vous êtes disponibles.</p>
                                </li>
                            </ul>
                        </div>
                </div>


            </section>


            {{-- Section about us  --}}
            <section class="contact-us">
                <h2  class="ct-us">Contacté nous</h2>
                <ul>
                    <li class="contact-us-item"><img src="/icons/whatsapp.svg" alt="whatsapp"></li>
                    <li class="contact-us-item"><img src="/icons/messenger.svg" alt="messenger"></li>
                </ul>
            </section>

            @include('includes.footer')
</div>

            
@endsection


