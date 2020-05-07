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

    $('[name="acf[field_smvmt2020_appearance_disable_title]"]').change(function () {
        $('.editor-styles-wrapper').toggleClass('editor-styles-wrapper--title-disabled');
    });

    $('[name="acf[field_smvmt2020_appearance_disable_top_spacing]"]').change(function () {
        $('.editor-styles-wrapper').toggleClass('editor-styles-wrapper--top-spacing-disabled');
    });

});