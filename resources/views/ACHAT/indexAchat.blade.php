@extends('layout/app')

@section('content')

    <div class="container">
        <div class="card">
            <h5 class="card-header" style="letter-spacing: 5px;
            word-spacing: 13px;
            font-weight: bolder;">Achat logement</h5>
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-md-6">
                        <form action="{{ route('achat.store') }}" method="GET">
                            @csrf
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="client-select">Clients</label>
                                <select class="form-select" id="client-select" name="numClient">
                                  <option value="" selected>Veuillez sélectionner le numéro client</option>
                                  @foreach ($listCli as $item)                                    
                                    <option class="numCli" value="{{ $item->Id_cli }}">{{ $item->Id_cli }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="input-group mb-3">
                                <label class="input-group-text" for="logement-select">Logements</label>
                                <select class="form-select" id="logement-select" name="numLogement" disabled>
                                  <option  value="" selected>Veuillez choisir le numéro logement</option>
                                  @foreach ($listLogement as $item)
                                  <option value="{{ $item->Num_logement }}">{{ $item->Num_logement }}</option>>
                                  @endforeach
                                </select>
                              </div>  

                              <div id="resultCli" style="display: none">
                                <div class="card">
                                  <div class="card-header">
                                    <h5>CLIENT</h5>
                                  </div>
                                  <div class="card-body">
                                    <ul class="list-group mb-3 list-group-flush">
                                      
                                      <li class="list-group-item px-0 d-flex justify-content-between">
                                          <span>Nom client</span>
                                          <strong class="nomCli" style=" font-weight: lighter;"></strong>
                                      </li>
                                      <li class="list-group-item px-0 d-flex justify-content-between">
                                          <span>Prénom client</span>
                                          <strong class="prenomCli" style=" font-weight: lighter;"></strong>
                                      </li>
                                      <li class="list-group-item px-0 d-flex justify-content-between">
                                          <span>Télephone client</span>
                                          <strong class="telCli"  style=" font-weight: lighter;"></strong>
                                      </li>
                                      <li class="list-group-item px-0 d-flex justify-content-between">
                                          <span>CIN</span>
                                          <strong class="cinCli"  style=" font-weight: lighter;"></strong>
                                      </li>
                                      <li class="list-group-item px-0 d-flex justify-content-between">
                                          <span>Lieux de travail</span>
                                          <strong class="lieuxTrav"  style=" font-weight: lighter;"></strong>
                                      </li>                                
                                  </ul>
                                  </div>
                                </div>
                              </div>
                              <div id="checkPay" style="display: none">                             
                                <div class="input-group mt-3 d-flex justify-content-between" >
                                  <label for="client-select">Mode de payement :</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="radioMethode" value="Carte Bancaire" id="flexRadioDefault1">
                                      <label class="form-check-label" for="flexRadioDefault1">
                                        Carte bancaire
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="radioMethode" value="Espèce" id="flexRadioDefault2">
                                      <label class="form-check-label" for="flexRadioDefault2">
                                        Espèce
                                      </label>
                                    </div>
                                </div>
                              </div>
                              <div id="btnacheter" class="input-group mt-3" style="display: none">
                                <button  type="submit" class="btn btn-success" style="width: 100%;"> <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> ACHETER  </button>
                              </div>

                            </form>
                            
                      </div>
                      <div class="col-md-6">
                        <div id="resultat" style="display:none">
                          <div class="card">
                            <div class="card-header">
                              <h5 class="nomAgence"></h5>
                            </div>
                            <div class="card-body">
                              <ul class="list-group mb-3 list-group-flush">
                                  
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                      <span>Contact</span>
                                      <strong class="contact" style=" font-weight: lighter;"></strong>
                                  </li>
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                      <span>Adresse agence</span>
                                      <strong class="adresse" style=" font-weight: lighter;"></strong>
                                  </li>
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                      <span>Email agence</span>
                                      <strong class="email"  style=" font-weight: lighter;"></strong>
                                  </li>
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                      <span>Nom cite</span>
                                      <strong class="nomcite"  style=" font-weight: lighter;"></strong>
                                  </li>
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                      <span>Lieux</span>
                                      <strong class="lieuxcite"  style=" font-weight: lighter;"></strong>
                                  </li>
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                      <span>Quartier</span>
                                      <strong class="quartier"  style=" font-weight: lighter;"></strong>
                                  </li>
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                      <span>Libelle logement </span>
                                      <strong class="libloge"  style=" font-weight: lighter;"> </strong>
                                  </li>
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                    <span>Nombre de pièce</span>
                                    <strong class="nbrpiece"  style=" font-weight: lighter;"></strong>
                                  </li>
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                    <span>Superficie</span>
                                    <strong class="superficie"  style=" font-weight: lighter;"></strong>
                                  </li>
                                  <li class="list-group-item px-0 d-flex justify-content-between">
                                    <span>Prix du logement</span>
                                    <strong  class="prixLoge" style=" font-weight: lighter;"></strong>
                                </li>
                              </ul>
                            </div>
                          </div>
                             
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="card-footer" style="display: flex;
            justify-content: flex-end;">
              @if(session('success'))

              <div class="toast show">
                <div class="toast-header">
                  <strong class="me-auto">Information</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                  <p style="text-align: center;
                  font-weight: bold;
                  color: #009c65;
                  letter-spacing: 5px;">{{ session('success') }}</p>
                </div>
              </div>
  
              @endif
            </div>
          </div>
    </div>   
@endsection