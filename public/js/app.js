$(window).on('load', function() {
    $(document).ready(function(){
        $(".loader").hide();
        $(".header").show();
        $(".container").show();

        $('select').formSelect();
    });
});