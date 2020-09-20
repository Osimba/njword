$(window).on('load', () => {
    
    otherCheck();

    $("#group-name").on('change', () => {
        otherCheck();
    });

    function otherCheck() {
        if ($("#group-name").val() === "other") {
            $("#other-form #member-name").attr('hidden', '');
            $("#other-form #other-name").removeAttr('hidden');
        } else {
            $("#other-form #other-name").attr('hidden', '');
            $("#other-form #member-name").removeAttr('hidden');
        }
    }
});