
@extends('layout/app')

@section('content')
    <div class="container-md">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col"><h5 style="letter-spacing: 5px;
                        word-spacing: 13px;
                        font-weight: bolder;">LISTE DES AGENCES</h5></div>
                    @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                         <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="col" style="display: flex;
                    align-items: center;
                    justify-content: end;"> 
                            <a href="{{route('agence.create')}}"><i class="fa-solid fa-circle-plus fa-2x" style="color: #1f71ff;"></i></a>               
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                @foreach ($agence as $item)
                <div class="row">
                    <div class="col-8">
                        <div class="" >
                                <div class="row" style="border: 1px solid #d4c8c8;
                                border-radius: 15px;
                                padding: 16px;
                                box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;
                                margin: 14px;">
                                    <div class="col-md-4">
                                        <div class="imageZ" style="width: 100%; height: 100%;">
                                            <img style="width: 100%; height: 100%;" src="{{ Storage::url($item->imageAgence) }}"  alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <br><br>
                                        <div class="">
                                        <h4 class="card-title">{{$item->Libelle_agence}}</h4>
                                        <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span>N°Agence</span>
                                                    <strong style=" font-weight: lighter;">{{$item->Num_agence}}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span>Cité associer</span>
                                                    <strong  style=" font-weight: lighter;">{{ App\Models\Cite::where('Num_agence',$item->Num_agence )->count() }}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span>Contact</span>
                                                    <strong  style=" font-weight: lighter;">{{$item->contact_agence}}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span>Email</span>
                                                    <strong  style=" font-weight: lighter;">{{$item->Email_agence}}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span>Adresse</span>
                                                    <strong  style=" font-weight: lighter;">{{$item->Adresse_agence}}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span>Date creation</span>
                                                    <strong  style=" font-weight: lighter;">{{$item->created_at}}</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span>Chiffre d'affaire </span>
                                                    <strong  style=" font-weight: lighter;"> 
                                                        @foreach(DB::select('SELECT SUM(logements.Prix_logement) AS Somme_totale
                                                        FROM logements
                                                        INNER JOIN cites ON logements.Num_cite = cites.Num_cite
                                                        WHERE cites.Num_agence = ? AND logements.Id_cli != 0
                                                        GROUP BY cites.Num_agence', [$item->Num_agence]) as $result)
                                                            {{ $result->Somme_totale }}
                                                        @endforeach 
                                                        Ar</strong>
                                                </li>
                                        </ul>
                                        <p class="card-text"><small class="text-muted mb-2">Dernier mise à jour le {{$item->updated_at}}</small></p>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="bta" style="max-width: 540px;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        height: 100%;
                        align-items: center;">
                            <div style="width: 100%">  
                                <button onclick=" window.location.href = '{{route('agence.edit',$item->Num_agence)}}' " style="width: 100%" class="btn btn-outline-primary" type="button"> <i class="fa-solid fa-marker"></i> Modifier l'agence</button>
                            </div>
                            <br>
                            <div style="width: 100%">
                                <button onclick=" window.location.href = '{{route('cite.index',$item->Num_agence)}}' " style="width: 100%" class="btn btn-outline-success" type="button"> <i class="fa-solid fa-globe"></i> Consulter l'agence</button>
                            </div>
                            <br>
                            <div style="width: 100%"> 
                                <button onclick=" window.location.href = '{{route('agence.destroy',$item->Num_agence)}}' " style="width: 100%" class="btn btn-outline-danger" type="button"><i class="fa-solid fa-broom"></i> Supprimer l'agence</button>
                            </div>          
                        </div>
                 </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection

