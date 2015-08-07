// Add contact modal animation
$('.btn-activate-modal').click(function() {
    $('.modal-form')
        .prop('class', 'modal fade modal-form') // revert to default
        .addClass( $(this).data('direction'))
        .modal('show');
});

// Add contact client side image validation
//When user selects file
$('.image-input').on("change", function(){

    //Check if selected file size is less than 3MB
    if ((this.files[0].size/1024/1024) > (3)) {
        //if it is bigger than threshhold lock the form and display error messages
        $(this).closest('form').find('.image-input-errors').html('<i class="glyphicon glyphicon-exclamation-sign"></i> To zdjęcie jest za duże. Max. rozmiar pliku : 3MB'),
        $(this).closest('form').find('.image-input-errors').attr("hidden", false),
        $(this).closest('form').find('.contact-form-submit').prop("disabled", true),
        $(this).closest('form').find('.contact-form-submit').html('<i class="glyphicon glyphicon-exclamation-sign"></i> Formularz zawiera błędy'),
        $(this).closest('form').find('.contact-form-submit').attr('class', 'btn btn-danger contact-form-submit'),
        $(this).reset();
    }
    else {
        //otherwise unlock the form
        $(this).closest('form').find('.image-input-errors').text(''),
        $(this).closest('form').find('.image-input-errors').attr("hidden", true),
        $(this).closest('form').find('.contact-form-submit').prop("disabled", false),
        $(this).closest('form').find('.contact-form-submit').attr('class', 'btn btn-success contact-form-submit'),
        $(this).closest('form').find('.contact-form-submit').html('<i class="glyphicon glyphicon-plus"></i> Wykonaj');
    }

});
//Unlock the form when user resets file selection
$('.image-input-reset').on("click", function(){
    $(this).closest('form').find('.image-input-errors').text(''),
    $(this).closest('form').find('.image-input-errors').attr("hidden", true),
    $(this).closest('form').find('.contact-form-submit').attr("disabled", false),
    $(this).closest('form').find('.contact-form-submit').attr('class', 'btn btn-success contact-form-submit'),
    $(this).closest('form').find('.contact-form-submit').html('<i class="glyphicon glyphicon-plus"></i> Wykonaj');
});

//Show loader on Contact add form submit
$( ".addContactForm" ).submit(function( event ) {
    $('.ContactAddModal').loader('show');
});


$( document ).ready(function() {
    $('.contact-form-submit').attr("disabled", false);
    //preload loader.gif
    var image = new Image();
    image.src = '/img/loader/loader.gif';
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


