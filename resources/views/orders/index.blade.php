@extends('layouts.app')

@section('content')
<div class="main_profil" style="height: 100%">

        {{-- <loader-component :is-visible="isLoading"></loader-component> --}}
    @php
        $getSession = Session::get('cart');
        if($getSession){
            //$getQty  = $getSession->items;
            $getItems = $getSession->items;
        }
        @endphp

    <div class="wrapper " id="app">
        <global-order></global-order>
    </div>
    @include('includes.footer')

</div>
{{-- <div id="footer"> --}}
{{-- </div> --}}
@endsection
