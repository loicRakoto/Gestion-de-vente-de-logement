

$(document).ready(function () {
    var pretClient;
    var pretLogement;



    $('#client-select').on('change', function () {
        if ($(this).val()) {
            $('#logement-select').prop('disabled', false);

        } else {
            $('#logement-select').prop('disabled', true);
            $('#logement-select').val('');
            $("#resultat").fadeOut(1000);
            $("#checkPay").fadeOut(1000);
            $('input[name="radioMethode"]').prop('checked', false);
            $('#btnacheter').fadeOut(1000);
        }


        var NumCli = $(this).val();
        if (NumCli == '') {
            $("#resultCli").fadeOut(1000);

        } else {

            $.ajax({
                url: '/achat/showCli',
                data: {
                    NumCli
                },

                dataType: 'json',
                method: 'GET',
                success: function (e) {

                    $("strong.nomCli").html(e[0].Nom_cli);
                    $("strong.prenomCli").html(e[0].Prenom_cli);
                    $("strong.telCli").html(e[0].Tel_cli);
                    $("strong.cinCli").html(e[0].CIN_cli);
                    $("strong.lieuxTrav").html(e[0].Lieux_travail);
                    $("#resultCli").slideDown(1000);
                    $("#resultCli").show();
                }
            });
        }

    });

    $('#logement-select').on('change', function () {
        var Numlog = $(this).val();
        var NumCli = $('#client-select').val();
        var token = $("[name='_token']").val();
        if (Numlog == '') {
            $("#resultat").fadeOut(1000);
            $("#checkPay").fadeOut(1000);
            $('input[name="radioMethode"]').prop('checked', false);
            $('#btnacheter').fadeOut(1000);

            // $("#resultat").hide();
        } else {
            $.ajax({
                url: '/achat/show',
                data: {
                    Numlog, NumCli, token
                },
                dataType: 'json',
                method: 'GET',
                success: function (e) {


                    $("h5.nomAgence").html(e[0].Libelle_agence);
                    $("strong.contact").html(e[0].contact_agence);
                    $("strong.adresse").html(e[0].Adresse_agence);
                    $("strong.email").html(e[0].Email_agence);
                    $("strong.nomcite").html(e[0].Nom_cite);
                    $("strong.lieuxcite").html(e[0].Lieux);
                    $("strong.quartier").html(e[0].Quartier);
                    $("strong.libloge").html(e[0].Libelle_logement);
                    $("strong.nbrpiece").html(e[0].Nombre_piece);
                    $("strong.superficie").html(e[0].Superficie);
                    $("strong.prixLoge").html(e[0].Prix_logement + ' ' + 'Ariary');
                    $("#checkPay").fadeIn(1000);
                    $("#resultat").slideDown(1000);
                    $("#resultat").show();
                }
            });
        }
    });

    $('input[name="radioMethode"]').change(function () {
        if ($(this).is(':checked')) {
            $('#btnacheter').fadeIn(1000);
        }
    });




});
