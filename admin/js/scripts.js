$(document).ready(function() {

    var user_href
    var user_href_splitted
    var id
    var image_src
    var image_href_splitted
    var image_name
    var photo_id

    $(".modal_thumbnails").click(function(){

        $("#set_user_image").prop('disabled', false)

        $(this).addClass('selected')
        user_href = $("#user-id").prop('href')
        user_href_splitted = user_href.split("=")
        user_id = user_href_splitted[user_href_splitted.length - 1]

        image_src = $(this).prop("src")
        image_href_splitted = image_src.split("/")
        image_name = image_href_splitted[image_href_splitted.length - 1]

        photo_id = $(this).attr("data")

        $.ajax({
            url: "inc/inc_ajax_code.php",
            data:{photo_id:photo_id},
            type: "POST",
            success:function(data) {
                if(!data.error) {
                    $("#modal_sidebar").html(data);	
                }
            }
        })
        
    })

    $("#set_user_image").click(function(){
        $.ajax({
            url: "inc/inc_ajax_code.php",
            data: {image_name: image_name, user_id: user_id},
            type: "POST",
            success:function(data) {
                if(!data.error) {
                    $(".user_image_box a img").prop('src', data);
                }
            }
        })
    })

})
/* END: jQuery Code */
    
tinymce.init({
    selector: '#mytextarea'
})

// Delete confirmation event
$(".delete_link").click(function() {
    return confirm("Are you sure you want to delete the selected item.");
})

function showPassword() {
  var x = document.getElementById("password");
  var y = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}

var checkPassword = function() {
    if (document.getElementById('password').value ==
      document.getElementById('confirm_password').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Passwords match.';
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Passwords do not match.';
    }
}