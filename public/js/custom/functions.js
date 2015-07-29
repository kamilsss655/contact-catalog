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
        $('#submitContact').html('<i class="glyphicon glyphicon-plus"></i> Wykonaj');
    }

});

$('#imageUploadReset').on("click", function(){
    $('#fileUploadErrors').text(''),
    $('#fileUploadErrors').attr("hidden", true),
    $('#submitContact').attr("disabled", false),
    $('#submitContact').attr('class', 'btn btn-success'),
    $('#submitContact').html('<i class="glyphicon glyphicon-plus"></i> Wykonaj');
});

$( document ).ready(function() {
    $('#submitContact').attr("disabled", false);
});

//Jquery checkbox buttons

$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});


