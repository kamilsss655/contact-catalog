// Add contact modal animation
$('.btnActivateModal').click(function() {
    $('#modalForm')
        .prop('class', 'modal fade') // revert to default
        .addClass( $(this).data('direction') );
    $('#modalForm').modal('show');
});

// Add contact client side image validation


$('#imageToUpload').on("change", function(){

    //this.files[0].size gets the size of your file.
    if ((this.files[0].size/1024/1024) > (3)) {
        $('#fileUploadErrors').text('Zdjęcie jest zbyt duże. Maksymalny rozmiar pliku to 3MB.'),
        $('#fileUploadErrors').attr("hidden", false),
        $('#submitContact').attr("disabled", true),
        $('#submitContact').attr('class', 'btn btn-danger'),
        $('#submitContact').html('<i class="glyphicon glyphicon-exclamation-sign"></i> Formularz zawiera błędy'),
        this.reset();
    }
    else {
        $('#fileUploadErrors').text(''),
        $('#fileUploadErrors').attr("hidden", true),
        $('#submitContact').attr("disabled", false),
        $('#submitContact').attr('class', 'btn btn-success'),
        $('#submitContact').html('<i class="glyphicon glyphicon-plus"></i> Dodaj kontakt');
    }

});

$('#imageUploadReset').on("click", function(){
    $('#fileUploadErrors').text(''),
    $('#fileUploadErrors').attr("hidden", true),
    $('#submitContact').attr("disabled", false),
    $('#submitContact').attr('class', 'btn btn-success'),
    $('#submitContact').html('<i class="glyphicon glyphicon-plus"></i> Dodaj kontakt');
});

$( document ).ready(function() {
    $('#submitContact').attr("disabled", false);
});


