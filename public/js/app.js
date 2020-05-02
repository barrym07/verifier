$(window).on('load', function() {
    $(document).ready(function(){
        $(".loader").hide();
        $(".header").show();
        $(".container").show();

        $('select').formSelect();
        $('.modal').modal();
        $('.sidenav').sidenav();

        $('.accounts .not-connected#steam').hover(
            function() { 
                $('#connect-steam').toggle({ duration: 90 });
            }
        );
        $('.accounts .not-connected#facebook').hover(
            function() { 
                $('#connect-facebook').toggle({ duration: 90 });
            }
        );
        $('.accounts .not-connected#discord').hover(
            function() { 
                $('#connect-discord').toggle({ duration: 90 });
            }
        );
        $('.accounts .not-connected#battlenet').hover(
            function() { 
                $('#connect-battlenet').toggle({ duration: 90 });
            }
        );
        $('.accounts .not-connected#microsoft').hover(
            function() { 
                $('#connect-microsoft').toggle({ duration: 90 });
            }
        ); 
        $('.accounts .not-connected#twitch').hover(
            function() { 
                $('#connect-twitch').toggle({ duration: 90 });
            }
        ); 
    });
});