@extends('layout/app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 style="letter-spacing: 5px;
            word-spacing: 13px;
            font-weight: bolder;">FORMULAIRE D'AJOUT D'UNE DEPARTEMENT</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif             
        </div>
        <div class="card-body">
            <form action="{{route('logement.store',$id)}}" method="GET">
                @csrf

                  <input type="hidden" name="Num_cite" value="{{$id}}">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Libelle</span>
                    <input name="Libelle_logement" type="text" class="form-control" placeholder="Libelle du logement" aria-label="LibelleAgence" aria-describedby="basic-addon1">
                  </div>
                  
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Piece</span>
                    <input name="Nombre_piece" type="text" class="form-control" placeholder="Nombre de piece" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  </div>
            
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Superficie</span>
                    <input name="Superficie" type="text" class="form-control" placeholder="" aria-label="LibelleAgence" aria-describedby="basic-addon1">
                  </div>                  
                  
          
                    <input name="Type_vente" value="null" type="hidden" class="form-control" aria-label="LibelleAgence" aria-describedby="basic-addon1">
                

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Prix</span>
                    <input name="Prix_logement" type="text" class="form-control" placeholder="Prix du logement" aria-label="LibelleAgence" aria-describedby="basic-addon1">
                  </div>
                  

                  <button type="submit" style="width: 100%" class="btn btn-success">ENREGISTRER</button>
            </form>
        </div>
    </div>
</div>

@endsection