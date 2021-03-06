var original = "";
var scramble = "";
var counter = 1;
$(document).ready(function () {
    function deleteScore() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/score/delete",
            method: "get",
            success: function (responseScore) {
            }
        })
    }

    $("#next").click(function () {
        if (counter == 10) {
            location.replace("/result/history/")
        } else {
            $('.form-guess').addClass('d-none');
            $('.form-player').removeClass('d-none');
            document.getElementById("form-playground").reset();
            generate()
        }
    });


    function generate() {
        // $('.preloader').show(300)

        $.ajax({
            url: "/scrambler/generate",
            method: "get",
            success: function (responseGenerate) {
                original = responseGenerate.original_word;
                scramble = responseGenerate.scramble_word;
                $('span#scramble-word').text("(" + responseGenerate.scramble_word + ")");
                $('.preloader').hide();
            }
        })
    }


    function score() {
        // $('.preloader').show(300)

        $.ajax({
            url: "/score/get",
            method: "get",
            success: function (responseScore) {
                $('span#score').text(responseScore);
            }
        })
    }
    if (window.location.href.indexOf("playground") > -1) {
        generate();
        deleteScore()
        score();
    }
    if (window.location.href.indexOf("history") > -1) {
        score();
    }
    
    $('#guess').click(function (e) {
        e.preventDefault();
        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        /* Submit form data using ajax*/
        $.ajax({
            url: "/scrambler/check",
            method: 'post',
            data: {
                original_word: original,
                scramble_word: scramble,
                form: $('#form-playground').serialize(),
            },

            success: function (response) {
                //------------------------
                score();
                $('#counter').text(counter += 1);
                $('#res_message').show();
                $('span#res_message').text(response.message);
                $('.form-guess').removeClass('d-none');
                $('.form-player').addClass('d-none');
                // document.getElementById("form-playground").reset();
                // setTimeout(function () {
                //     $('#form-guess').hide();
                //     $('#form-player').show();
                // }, 10000);
                //--------------------------
            },
        });
    });
});
