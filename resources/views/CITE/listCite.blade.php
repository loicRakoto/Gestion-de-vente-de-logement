@extends('layout/app')

@section('content')
    
<div class="container">

    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between">
            <div>
 
                <h5 style="letter-spacing: 5px;
                word-spacing: 13px;
                font-weight: bolder;">   
                  @if ($nomAgence == 'null')
                      AUCUN CITE ASSOCIER
                  @else
                  CITE DISPONIBLE CHEZ {{ $nomAgence }}    
                  @endif                           
                </h5>
                   
            </div>
            <div>
              <a href="{{route('cite.create',$id)}}"><i class="fa-solid fa-circle-plus fa-2x" style="color: #1f71ff;"></i></a> 
            </div>
            
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($cite as $item)
                
                  <div class="col-md-4">
                    <div class="card">
                   
                      <div class="card-body cardBodyCite" style="text-align: center"> 
                        <ul class="list-group mb-3 list-group-flush">
                          <li class="list-group-item px-0 d-flex justify-content-between">
                              <span>Nom du cité</span>
                              <strong style=" font-weight: lighter;">{{$item->Nom_cite}}</strong>
                          </li>
                          <li class="list-group-item px-0 d-flex justify-content-between">
                              <span>Nombre de département</span>
                              <strong  style=" font-weight: lighter;">{{ App\Models\Logement::where('Num_cite',$item->Num_cite )->count() }}</strong>
                          </li>
                          <li class="list-group-item px-0 d-flex justify-content-between">
                              <span>Lieu</span>
                              <strong  style=" font-weight: lighter;">{{$item->Lieux}}</strong>
                          </li>
                          <li class="list-group-item px-0 d-flex justify-content-between">
                              <span>Résidence</span>
                              <strong  style=" font-weight: lighter;">{{$item->Quartier}}</strong>
                          </li>
                          <li class="list-group-item px-0 d-flex justify-content-between">
                              <span>Solde obtenu</span>
                              <strong  style=" font-weight: lighter;">{{ App\Models\Logement::where('Num_cite', $item->Num_cite)->where('Id_cli', '!=', 0)->sum('Prix_logement');  }} Ar</strong>
                          </li>
                        </ul>                      </div>

                      <div class="card-footer" style="    display: flex;
                      align-items: center;
                      justify-content: space-around;">
                        <a href="{{ route('logement.index', $item->Num_cite) }}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-circle-info"></i></a>
                        <a href="{{ route('cite.edit', $item->Num_cite) }}" class="btn btn-warning"><i class="fa-solid fa-marker"></i></a>
                        <a href="{{ route('cite.destroy', $item->Num_cite) }}" class="btn btn-danger"><i class="fa-solid fa-broom"></i></a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div> 
        </div>
    </div>

</div>

<style>
.cardBodyCite span{
    font-weight: bold;
}
</style>


@endsection