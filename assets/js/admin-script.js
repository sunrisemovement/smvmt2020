jQuery(function($) {
    $('[name="acf[field_smvmt2020_appearance_disable_title]"]').change(function () {
        $('.editor-styles-wrapper').toggleClass('editor-styles-wrapper--title-disabled');
    });
});