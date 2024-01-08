@extends('layout/app')

@section('content')

<div class="container">
        <div class="card">
                <div class="card-header">
                   <h5 style="letter-spacing: 5px;
                   word-spacing: 13px;
                   font-weight: bolder;">CLIENT</h5>
                   @if(session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                    @endif
                                        
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

                  <div class="row"> 
                    <div class="col">         
                      <form id="formuClient" action="{{ route('client.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <input type="hidden" id="status" name="status" value="">
                         <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nom du client</span>
                            <input name="Nom" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Prénom du client</span>
                            <input name="Prenom"  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Télephone du client</span>
                            <input name="Tel"  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">CIN du client</span>
                            <input name="CIN"  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Lieux travail</span>
                            <input name="Lieux" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                          <input id="buton" type="submit" class="btn btn-success" style="width: 100%">
                      </form>
                    </div>
                    <div class="col-8">
                      <table id="example" class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Télephone</th>
                            <th scope="col">CIN</th>
                            <th scope="col">Lieux travail</th>
                            <th> Edit  </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($result as $item)
                          <tr>
                            <th scope="row">{{ $item->Id_cli }}</th>
                            <td> {{ $item->Nom_cli}} </td>
                            <td> {{ $item->Prenom_cli}} </td>
                            <td> {{ $item->Tel_cli}} </td>
                            <td> {{ $item->CIN_cli}} </td>
                            <td> {{ $item->Lieux_travail}} </td>
                            <td> <a id="{{ $item->Id_cli }}" class="modif" href="#"><i class="fa-solid fa-pencil"></i></a> </td>
                            <td> <a href=" {{ route('client.destroy', ['id'=>$item->Id_cli]) }} "><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a> </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>        
                </div>
        </div>
</div>

    


@endsection
    