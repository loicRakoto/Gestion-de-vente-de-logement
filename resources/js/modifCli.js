$(document).on('click', 'tbody tr td a.modif', function () {
    var id = $(this).attr('id');
    var token = $("[name='_token']").val();

    $.ajax({
        url: '/client/edit',
        data: {
            id, token
        },
        dataType: 'json',
        method: 'GET',
        success: function (edit) {
            console.log(edit);
            //var obj = [{ Id_cli: 2, Nom_cli: 'RANDRIANANDRASANA', Prenom_cli: 'Koro', Tel_cli: '0348942186', CIN_cli: '477227272727' }];
            var nomClient = edit[0].Nom_cli;
            $("[name='Nom']").val(edit[0].Nom_cli);
            $("[name='Prenom']").val(edit[0].Prenom_cli);
            $("[name='Tel']").val(edit[0].Tel_cli);
            $("[name='CIN']").val(edit[0].CIN_cli);
            $("[name='Lieux']").val(edit[0].Lieux_travail);
            $("#status").val(edit[0].Id_cli);
            $("#buton").val('MODIFIER');
        }
    })
});