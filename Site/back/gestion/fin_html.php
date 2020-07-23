<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script>
    $(document).ready( function () {
        if(window.innerWidth>960){
            $('#catalogueP').DataTable({
                "pageLength": 50,
                "dom": '<"top"lf><"stop"p>rt<"bottom"ip><"clear">',
                "columnDefs": [{
                    "orderable": false,
                    "targets": [2,3,4]
                }]
            });
            $('#catalogueV').DataTable({
                "pageLength": 50,
                "dom": '<"top"lf><"stop"p>rt<"bottom"ip><"clear">',
                "columnDefs": [{
                    "orderable": false,
                    "targets": [2,5,6]
                }]
            });
            $('#tableModiPB').DataTable({
                "pageLength": 50,
                "dom": '<"top"lf><"stop"p>rt<"bottom"ip><"clear">',
                "columnDefs": [{
                    "orderable": false,
                    "targets": [1,3]
                }]
            });
        }
        else{
            $('#catalogueP').DataTable({
                "pageLength": 10,
                "dom": '<"top"lf><"stop"p>rt<"bottom"ip><"clear">',
                "columnDefs": [{
                    "orderable": false,
                    "targets": [2,3,4]
                }]
            });
            $('#catalogueV').DataTable({
                "pageLength": 10,
                "dom": '<"top"lf><"stop"p>rt<"bottom"ip><"clear">',
                "columnDefs": [{
                    "orderable": false,
                    "targets": [2,5,6]
                }]
            });
            $('#tableModiPB').DataTable({
                "pageLength": 10,
                "dom": '<"top"lf><"stop"p>rt<"bottom"ip><"clear">',
                "columnDefs": [{
                    "orderable": false,
                    "targets": [1,3]
                }]
            });
        }

        $('#tableModiPH').DataTable({
            "pageLength": 10,
            "dom": '<"top"lf><"stop"p>rt<"bottom"ip><"clear">',
            "columnDefs": [{
                "orderable": false,
                "targets": [1,3]
            }]
        });

        $('#catalogueT').DataTable({
            "pageLength": 10,
            "dom": '<"top"lf><"stop"p>rt<"bottom"ip><"clear">',
            "order": [[ 0, "desc" ]],
            responsive: true
        });
        $('#catalogueTP').DataTable({
            "pageLength": 10,
            "dom": '<"top"lf><"stop"p>rt<"bottom"ip><"clear">',
            "order": [[ 0, "desc" ]]
        });
        $('#catalogueV').addClass("ui celled");
        $('#catalogueP').addClass("ui celled");
    } );
</script>
<script>
    if($('.show_categorie').prop('checked')){
        $('.tutu').slideDown(300);
    }
    $('.hide_categorie').click(function(){
        $('.tutu').slideUp(300);
    });

    $('.show_categorie').click(function(){
        $('.tutu').slideDown(300);
    });
</script>
<script>
    $('.select-file').click(function(){
        $('input[type="file"]').click();
    });
    $('input[type="file"]').change(function(e) {
        let file = e.target.files[0];
        if(file.size>2000000){
            $('input[type="file"]').val('');
            $('.filename').text('Fichier trop volumineux (Max : 2 Mo)');
            $('.filename').css('color','#FF7C45');
        }
        else{
            $('.filename').text(file.name);
            $('.filename').css('color','rgba(0, 0, 0, 0.4)');
        }
        $('.filename').css('padding','0 10px');
    });
</script>
<script src="../../js/form.js"></script>
</body>
</html>