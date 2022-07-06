

$( "#userlogin" ).click(function() {
    //alert( "Handler for .click() called." );
    $("#login").modal("show");
});

$( "#userJoin" ).click(function() {
    
    $("#Join").modal("show");
});


$(function () {

            $("#email").focus(function () {
                $('#error_e').html(" ");
                $('#sent_this').show();
            });

            $("#email").blur(function () {
                var em = $('#email').val();

                $.get("validator.php?email=" + em + "&action=ec", function (data, status) {
                    if (data == "ok") {
                        $('#error_e').html("<div class='success'> " + em + " is ok</div>");
                        $('#sent_this').show();
                    } else if (data == "taken") {
                        $('#error_e').html("<div class='error'> " + em + " is taken</div>");
                        $('#sent_this').hide();
                    } else if (data == "Invalid email format") {
                        $('#error_e').html("<div class='error'>Invalid email format</div>");
                        $('#sent_this').hide();
                    }
                });
            });

            $("#phone_number").focus(function () {
                $('#error_pn').html(" ");
                $('#sent_this').show();
            });

            $("#phone_number").blur(function () {
                var em = $('#phone_number').val();

                $.get("validator.php?pn=" + em + "&action=pn", function (data, status) {
                    if (data == "ok") {
                        $('#error_pn').html("<div class='success'>" + em + " is ok</div>");
                        $('#sent_this').show();
                    } else if (data == "taken") {
                        $('#error_pn').html("<div class='error'>" + em + " is taken</div>");
                        $('#sent_this').hide();
                    } else if (data == " is not a number") {
                        $('#error_pn').html("<div class='#'>" + em + data + "</div>");
                        $('#sent_this').hide();
                    }
                });
            });


            $("#p1").focus(function () {
                $('#error_p1').html(" ");
                $('#sent_this').show();
            });

            $('#p1').blur(function () {
                var em = $('#p1').val();

                if (em.length < 6) {
                    $('#error_p1').html("<div class='error'> password must be a minimum of 6 characters</div>");
                    $('#sent_this').hide();
                }

            });

            $("#p2").focus(function () {
                $('#error_p2').html(" ");
                $('#sent_this').show();
            });

            $('#p2').blur(function () {
                var p2 = $('#p2').val();
                var p1 = $('#p1').val();

                if (p1 != p2) {
                    $('#error_p2').html("<div class='error'> passwords don't match</div>");
                    $('#sent_this').hide();
                }
            });

        });

//sing up
            $("#sent_this").click(function () {
                var pn = $('#phone_number').val();
                var p = $('#p1').val();
                var p2 = $('#p2').val();
                var fn = $('#first_name').val();
                var ln = $('#last_name').val();
                var gen = $('#gender').val();

                $.get("register.php?phone_number="+pn+"&password="+p+"&password_again="+p2+"&first_name="+fn+"&last_name="+ln+"&gender="+gen, function (data, status) {
                    if (data == 'ok') {
                    	alert("You have been registered successfully, Please login");
                    	location.reload(true);

                    }
                }); 

            });