<nav class="navbar navbar-expand-lg navbar-dark" style="    background-color: #ec3131;" >
    <div class="container-fluid">
      
      <a class="navbar-brand" href="#">Gestion vente de logement</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{ route('agence.index') }}">Agences</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{ route('client.index') }}">Client</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('achat.index') }}">Achat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('liste.index') }}">Liste</a>
          </li>

          @php
              $agences = App\Models\Agence::all(); 
              $cites = App\Models\Cite::all();        
          @endphp

        <li class="nav-item dropdown">
        
            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-paperclip"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        
                @foreach($agences as $agence)
                    <a href="{{route('cite.index',['id'=>$agence->Num_agence])}}" class="dropdown-item dropdown-agence" >{{ $agence->Libelle_agence }}</a>
                       <div class="dropdown-menu dropdown-villes" aria-labelledby="dropdownMenuButton">
                        @foreach($cites->where('Num_agence', $agence->Num_agence) as $lescite)
                            <a href="{{ route('logement.index', ['id'=>$lescite->Num_cite ]) }}" class="dropdown-item dropdown-ville">{{ $lescite->Nom_cite }}</a>
                        @endforeach
                    </div>
                @endforeach
             
            </div>
          </li>








          

        <style>
            .dropdown-menu.dropdown-villes {
                position: absolute;
                top: 0;
                left: 100%;
                margin-left: 10px;
            }
        </style>

        <script>
            $('.dropdown-agence').hover(function() {
                $('.dropdown-villes').hide();
                $(this).next('.dropdown-villes').show();
            });

            $('.dropdown-ville').hover(function() {
                $('.dropdown-villes').hide();
                $(this).closest('.dropdown-villes').show();
            });
        </script>

        </ul>
        <form class="d-flex">

        </form>
      </div>
    </div>
  </nav>
  

  