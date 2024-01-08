<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <div class="container">
        
        <div class="cacher">
            <button class="btn btn-success mt-2" id="impression"><i class="fa-solid fa-print"></i></button>
        </div>
        @foreach ($existLoge as $item)
            <div class="invoice">
                <div class="row">
                    <div class="col-7" style="margin-bottom: 15px;">
                        <img src="{{ Storage::url($item->imageAgence) }}" class="logo"/>
                    </div>
                    <div class="col-5">
                        <h1 class="document-type display-4">FACTURE</h1>
                        <p class="text-right"><strong>Référence facture</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <p class="addressMySam">
                           <strong>{{$item->Libelle_agence }}</strong>
                            <br>
                            <strong> {{$item->contact_agence }}</strong>
                            <br>
                            <strong>{{$item->Adresse_agence }}</strong>
                            <br>
                            <strong> {{$item->Email_agence }}</strong>
                        </p>
                    </div>
                    <div id="clientDet" class="col-5">                        
                            <p class="addressDriver">
                               <strong>Client</strong>
                                <br>
                                <span>{{$item->Nom_cli }}</span> <br> 
                                <span>{{$item->Prenom_cli }}</span><br/>
                                <span>{{$item->Tel_cli }}</span><br/>
                                <span>{{$item->CIN_cli }}</span><br>
                                <span>{{$item->Lieux_travail }}</span><br>
                            </p>
                    </div>
                </div>
                <br/>
                <br/>
                <br/>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Nom du cite</td>
                        <td class="end">{{ $item->Nom_cite  }}</td>
                    </tr>
                    <tr>
                        <td>Lieux</td>
                        <td class="end">{{ $item->Lieux  }}</td>
                    </tr>
                    <tr>
                        <td>Quartier</td>
                        <td class="end">{{ $item->Quartier  }}</td>
                    </tr>
                    <tr>
                        <td>Libelle du logements</td>
                        <td class="end">{{ $item->Libelle_logement  }}</td>
                    </tr>
                    <tr>
                        <td>Nombre de pièces</td>
                        <td class="end">{{ $item->Nombre_piece  }}</td>
                    </tr>
                    <tr>
                        <td>Superficie</td>
                        <td class="end">{{ $item->Superficie  }}</td>
                    </tr>
                    <tr>
                        <td>Type de vente</td>
                        <td class="end">{{ $item->Type_vente  }}</td>
                    </tr>
                    <tr>
                        <td>Date d'achat</td>
                        <td class="end">{{ $item->Date_achat  }}</td>
                    </tr>
                    <tr>
                        <th>Prix du logement</th>
                        <th class="end">{{ $item->Prix_logement  }} Ar</th>
                    </tr>
                    </tbody>
                </table>
                <h5 style="text-align: center">ARRET A LA SOMME DE <span class="valeur" style="text-transform: uppercase;">{{ $result }}</span> ARIARY</h5>
                <p class="conditions">
                    En votre aimable règlement
                    <br/>
                    Et avec nos remerciements.
                    <br/><br/>
                    Conditions de paiement : {{ $item->Type_vente  }}
                </p>
    
            </div>
            @endforeach
        </div>
<script>
    const a = document.querySelector('.cacher');
     document.getElementById("impression").addEventListener("click", function() {
        a.style.display = "none";
        window.print();
        setTimeout(function() {
        a.style.display = "block";
        }, 0.1);
     });
        
</script>

        
        <style>
                                        body {
                            background: rgb(255, 255, 255);
                            
                            font-size: 0.6em;
                            }

                            h6{font-size:1em;}

                            .container {
                            width: 21cm;
                            min-height: 29.7cm;
                            }

                            .invoice {
                            background: #fff;
                            width: 100%;
                            padding: 50px;
                            }

                            .logo {
                            width: 4cm;
                            }

                            .document-type {
                            text-align: right;
                            color: #444;
                            }

                            .conditions {
                            font-size: 0.7em;
                            color: #666;
                            }

                            .bottom-page {
                            font-size: 0.7em;
                            }

                            #clientDet{
                                display: flex;
                                text-align: right;
                                justify-content: end;
                            }

                            .end{
                                text-align: end;
                            }
        </style>
</body>
</html>