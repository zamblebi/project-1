@component('mail::message')
# Votre commande a été bien reçu 


<p>
    Votre grouilleur 225 passera récupérer votre linge  le {{json_decode($data->deliverable_date)->date}} entre {{json_decode($data->deliverable_date)->slot}}  . vous avez choisie le type de livraison {{$data->deliverable_type}}
     votre livraison sera programmé {{$data->deliverable_type == "Standard" ? '48h' : '4h'}} apres recuperation .  Merci pour votre Commande
</p>

{{-- {{$data}} --}}

@component('mail::button', ['url' => 'https://monpressing.ci'])
MONPRESSING
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
