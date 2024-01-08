@extends('layout/app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between">
            <div>
                @php
                   $cite = App\Models\Logement::with('citee')->where('Num_cite', $id)->get();
                   $nomLogement = null;
                    if ($cite->first() == null) {
                        $nomLogement = "null";
                    } else {
                        $nomLogement = $cite->first()->citee->Nom_cite;
                    }
                
                @endphp
                <h5 style="letter-spacing: 5px;
                word-spacing: 13px;
                font-weight: bolder;">                              
                    @if ($nomLogement == 'null')
                        AUCUN LOGEMENT ASSOCIER
                    @else
                        LOGEMENT DISPONIBLE CHEZ {{ $nomLogement }}    
                    @endif             
                </h5>
                   
            </div>
            <div>
                <a href="{{route('logement.create',$id)}}"><i class="fa-solid fa-circle-plus fa-2x" style="color: #1f71ff;"></i></a> 
            </div>
            
        </div>
        <div class="card-body">
            <table id="example" class="table table-hover" style="text-align: center">
                <thead>
                    <tr>
                      <th scope="col">N°</th>
                      <th scope="col">Libelle</th>
                      <th scope="col">Nombre de piece</th>
                      <th scope="col">Superficie</th>
                      <th scope="col">Prix</th>
                      <th scope="col">Disponibilite</th>
                      <th scope="col">Modifier</th>
                      <th scope="col">Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($logement as $item)
                    <tr>
                        <td>{{ $item->Num_logement }}</td>
                        <td>{{ $item->Libelle_logement }}</td>
                        <td>{{ $item->Nombre_piece }}</td>
                        <td>{{ $item->Superficie }} m²</td>
                        <td>{{ $item->Prix_logement }} Ar</td>
                        @if ($item->Id_cli==0)
                            <td>DISPO</td>
                        @else
                            <td>PAYER</td>
                        @endif
                        <td> <a href=" {{ route('logement.edit',$item->Num_logement) }} " ><i class="fa-solid fa-marker"></i></a></td>
                        <td> <a href=" {{ route('logement.destroy',$item->Num_logement) }}"  ><i class="fa-solid fa-broom" style="color: rgb(206, 32, 32)"></i></a></td>
                    </tr>
                    @empty
                        
                    @endforelse

                  </tbody>
            </table>
        </div>
    </div>
</div>
@endsection