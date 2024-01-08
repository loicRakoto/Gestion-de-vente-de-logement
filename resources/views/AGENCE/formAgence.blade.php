@extends('layout/app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 style="letter-spacing: 5px;
                word-spacing: 13px;
                font-weight: bolder;">FORMULAIRE D'AJOUT AGENCE</h5>
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
                <form action="{{route('agence.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nom</span>
                        <input name="Libelle_agence" type="text" class="form-control" placeholder="Libelle de l'agence" aria-label="LibelleAgence" aria-describedby="basic-addon1">
                      </div>
                      
                      <div class="input-group mb-3">
                        <input name="contact_agence" type="text" class="form-control" placeholder="Contact" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">Telephone</span>
                      </div>
                
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input name="Adresse_agence" type="text" class="form-control" placeholder="Adresse de l'agence" aria-label="LibelleAgence" aria-describedby="basic-addon1">
                      </div>

                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Email</span>
                        <input name="Email_agence" type="text" placeholder="agence.name@gmail.com" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                      </div>
                      
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Date</span>
                        <input name="created_at"  type="datetime-local" class="form-control" placeholder="Date de creation" aria-label="LibelleAgence" aria-describedby="basic-addon1">
                      </div>

                      <div class="input-group mb-3">
                        <input name="image" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                      </div>
           
                 

                      <input type="hidden" value="<?=  date("Y-m-d h:i:00"); ?>" name="updated_at">

                      <button type="submit" style="width: 100%" class="btn btn-success">ENREGISTRER</button>
                </form>
            </div>

        </div>


    </div>

    <script>
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
    
    
    </script>

@endsection