(function($) {
    //Create plugin named Setcase
    $.fn.Setcase = function(settings) {
        // Defaults
        var config = {
            caseValue: 'Upper',
            changeonFocusout: false
        };

        //Merge settings
        if (settings) $.extend(config, settings);

        this.each(function() {
            //keypress event
            if (config.changeonFocusout == false) {
                $(this).keypress(function() {
                    if (config.caseValue == "lower") {
                        var currVal = $(this).val();
                        $(this).val(currVal.toLowerCase());
                    }
                });
            }
            //blur event		
            $(this).blur(function() {
                if (config.caseValue == "lower") {
                    var currVal = $(this).val();
                    $(this).val(currVal.toLowerCase());
                }

            });
        });
    };
})(jQuery);
// Configura o seletor para converter para minusculo (lower case)
function forceLower(strInput) {
    strInput.value = strInput.value.toLowerCase();
}
$(window).load(function() {
    $(function() {
        $("#txtLower").Setcase({
            caseValue: 'lower'
        });
    });
});