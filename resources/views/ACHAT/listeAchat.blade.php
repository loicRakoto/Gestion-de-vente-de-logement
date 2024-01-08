@extends('/layout/app')

@section('content')
<div class="container-fluid">
   
    <div class="card">
        <div class="card-header">
            <h5 style="letter-spacing: 5px;
            word-spacing: 13px;
            font-weight: bolder;">Liste des achats clients</h5>
        </div>
        <div class="card-body">
            <table id="example" class="table" style="text-align: center;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Agence</th>
                        <th>Cite</th>
                        <th>Libelle logement</th>
                        <th>Pièces</th>
                        <th>Superficie</th>
                        <th>Type de vente</th>
                        <th>Date d'achat</th>
                        <th>Prix du logement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($jointure as $item)  
                    <tr>
                        <td> {{ $item->Num_logement  }} </td>
                        <td>{{ $item->Nom_cli   }}</td>
                        <td>{{ $item->Prenom_cli    }}</td>
                        <td>{{ $item->Libelle_agence    }}</td>
                        <td>{{ $item->Nom_cite    }}</td>
                        <td>{{ $item->Libelle_logement    }}</td>
                        <td>{{ $item->Nombre_piece    }}</td>
                        <td>{{ $item->Superficie}} m²</td>
                        <td>{{ $item->Type_vente    }}</td>
                        <td>{{ $item->Date_achat    }}</td>
                        <td>{{ $item->Prix_logement}} Ar</td>
                        <td> 
                            <a href="{{ route('liste.show', ['id'=>$item->Num_logement ]) }}"><i class="fa-solid fa-magnifying-glass" style="color: #017e48;"></i></a> |
                            <a href="{{ route('liste.convert', ['id'=>$item->Num_logement ]) }}"><i class="fa-solid fa-print" style="color: #90093f;"></i></a> |                    
                            <a href="{{ route('liste.destroy', ['id'=>$item->Num_logement ]) }}"><i class="fa-solid fa-broom"></i></a>
                        </td> 
                    </tr>

                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection