<link rel="stylesheet" href="{{asset('css/command-status-nav.css')}}">
@yield('status-bar')
<div class="barre-etapes">

    <div class="etape @yield('panier')">
        <div class="cercle">
            1
        </div>
        Panier</div> 
    <div class="chevron">></div>
    <div class="etape @yield('livraison')">
        <div class="cercle">
            2
        </div>Livraison</div>
    
        <div class="chevron" >></div>
    <div class="etape @yield('paiement')">
        <div class="cercle">
            3
        </div>Paiement</div>
</div>