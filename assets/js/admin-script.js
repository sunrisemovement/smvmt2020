jQuery(function($) {

    const interval = setInterval( function() {
        if ( $('.editor-styles-wrapper').length !== 0 ) {
            setupWrapperClass();
        }
    }, 50);

    function setupWrapperClass () {
        clearInterval(interval);
        if ( acf.getField('field_smvmt2020_appearance_disable_title').val() === 1 ) {
            $('.editor-styles-wrapper').toggleClass('editor-styles-wrapper--title-disabled');
        }
        if ( acf.getField('field_smvmt2020_appearance_disable_top_spacing').val() === 1 ) {
            $('.editor-styles-wrapper').toggleClass('editor-styles-wrapper--top-spacing-disabled');
        }
    }

    $('[name="acf[field_smvmt2020_appearance_disable_title]"]').change(function (evt) {
        $('.editor-styles-wrapper').toggleClass('editor-styles-wrapper--title-disabled');
    });

    acf.addAction('show_field/key=field_smvmt2020_appearance_disable_top_spacing', function () {
        if ( acf.getField('field_smvmt2020_appearance_disable_top_spacing').val() === 1 ) {
            console.log('top spacing disabled');
            $('.editor-styles-wrapper').addClass('editor-styles-wrapper--top-spacing-disabled');
        }
    }); 

    $('[name="acf[field_smvmt2020_appearance_disable_top_spacing]"]').change(function () {
        console.log('top spacing', acf.getField('field_smvmt2020_appearance_disable_top_spacing').val());
        $('.editor-styles-wrapper').toggleClass('editor-styles-wrapper--top-spacing-disabled');
    });

    acf.add_filter('color_picker_args', function( args, $field ){
        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ['#ffde16', '#33342E', '#222', '#ffefea']
        // return colors
        return args;
    });

});