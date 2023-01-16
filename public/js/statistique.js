$(function(){

    $(document).on('click','#rechercher', function(event){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        event.preventDefault();

        var feuille= $("#feuille").val();
        var _token = $('input[type="hidden"]').attr('value');

        $.ajax({

            url:"/rechercher",
            data : {
                feuille,
                _token
            },
            dataType : "json",
            method : "POST",
            success : function(data){
                $('#resultTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('rechercher') }}",
                    columns: [
                        { data: 'Action' },
                        { data: 'Situation_Actuelle' },
                        { data: 'Budget' },
                        { data: 'Depense' },
                        { data: 'Resultat_Attendu' },
                    ]
                });
                
                $("#resultTable").show();
                
                /*for(let i=0; i<data<data.length;i++){
                    $("#element").append('<tr><td>'+data[i].Action+'</td><td>'+data[i].Situation_Actuelle+'</td><td>'+data[i].Budget+'</td><td>'+data[i].Depense+'</td><td>'+data[i].Resultat_attendu+'</td></tr>');
                }*/
            }
        });
    });

});