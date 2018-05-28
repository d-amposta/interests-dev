$(document).ready(function(){
	$(document).on("click", ".landing-nav", function(){
		var formToShow = $(this).attr("data-target");
		$(this).closest(".landing-form-container").fadeOut(function(){
			$("#"+formToShow+"").fadeIn();
		});
	});

    function showOptions() {
        $(".options_container").css({"visibility":"visible", "opacity":1});
    }

    function hideOptions() {
        $(".options_container").css({"visibility":"hidden", "opacity":0});
    }

    $(".pqv_dropdown_btn").on("click", function() {
        $(this).slideUp(function() {
            $(".timeline_dropdown_menu").slideDown();    
        });
    });

    $(".timeline_btn_collapse").on('click', function(){
        $(".timeline_dropdown_menu").slideUp(function() {
            $('.pqv_dropdown_btn').slideDown();
        });

    });

    $(document).on('click', '.option_toggle', function() {
        var optionsContainer = $(this).next();
        var otherContainer = $(".post_header_options");
        var optionsDisplay = optionsContainer.css('display');
        
        optionsContainer.toggle();
    })

    $(".profile_button").on("mouseover", function(){
        showOptions();
    });

    $(".profile_button").on("mouseleave", function() {
        hideOptions();
    });

    $(".options_container").on("mouseover", function() {
        showOptions();
    });

    $(".options_container").on("mouseleave", function() {
        hideOptions();
    });

	$('#add_friend').click(function() {
        $('#add_friend').html('Added to your Interests');
    })

    $('#edit_reply').click(function() {
        $('.edit_reply').toggle();
        $('#edit_reply').html('Close');
    })

    $('.add_photobutton').click(function() {
        $('.addphoto').toggle();
    })

    $('#avatar').click(function() {
        $('.change_profile_picture').toggle();
    })

	 function addReply(id) {
            var token = $('#token').val();
            var reply = $('#reply'+id).val();
            $.post(('add_reply/'+id), {
                _token : token,
                reply : reply,
            }, function(data) {
                $('#replies'+id).html(data);
                $('#reply'+id).val('');

            });
        }

    $(".remove_interest").on("click", function() {
        var id = $(this).attr("data-id");
        
        $.ajax({
            method: "POST",
            url: "cancelRequest/"+id,
            data: {
                id : id
            },
            success: function(data) {
                alert("success");
            }
        });
    });
});