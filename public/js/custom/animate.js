$('#btnActivateModal').click(function() {
    $('#modalForm')
        .prop('class', 'modal fade') // revert to default
        .addClass( $(this).data('direction') );
    $('#modalForm').modal('show');
});


