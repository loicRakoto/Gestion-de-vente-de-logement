@extends('layout/app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 style="letter-spacing: 5px;
            word-spacing: 13px;
            font-weight: bolder;">FORMULAIRE DE MODIFICATION D'UNE CITE</h5>
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
            <form action="{{route('cite.update',$existCite->Num_cite)}}" method="GET">
                @csrf
                   <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nom du cite</span>
                    <input value="{{ $existCite->Nom_cite }}" name="Nom_cite" type="text" class="form-control" placeholder="Nom du cite" aria-label="LibelleAgence" aria-describedby="basic-addon1">
                  </div>
                  
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Lieux</span>
                    <input value="{{ $existCite->Lieux }}" name="Lieux" type="text" class="form-control" placeholder="Lieu du cite" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  </div>
            
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input value="{{ $existCite->Quartier }}" name="Quartier" type="text" class="form-control" placeholder="Residence" aria-label="LibelleAgence" aria-describedby="basic-addon1">
                  </div>                  
            

                  <button type="submit" style="width: 100%" class="btn btn-success">MODIFIER</button>
            </form>
        </div>
    </div>
</div>
@endsection