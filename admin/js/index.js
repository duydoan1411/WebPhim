$('.collapse-link').on("click", function () {
    $(".x_content").toggle("fast");
})

$('#menu_toggle').on("click", function () {
    console.log("click")
    if ($('footer').css("margin-left") === "0px") {
        $('.top_nav').css("margin-left", "230px")
        $('.right_col').css("margin-left", "230px")
        $('.col-md-3.left_col').css("left", "0")
        $('footer').css("margin-left", "230px")
        $('.nav-md .container.body .col-md-3.left_col').css('display', 'flex')
    } else {
        $('.top_nav').css("margin-left", "0px")
        $('.right_col').css("margin-left", "0px")
        $('footer').css("margin-left", "0px")
        $('.nav-md .container.body .col-md-3.left_col').css('display', 'none')
    }
})


$('#sidebar-menu .menu_section ul li').on("click", function () {
    $('#sidebar-menu .menu_section ul li').removeClass('active')
    $(this).addClass('active')
})

function deleteUser(email) {
    $.post(
        'index.php',
        {
            page: "usermod",
            type: "delete",
            email: email
        },
        function (data) {
            location.reload();
        }
    );
}

function deletePhim(id) {
    $.post(
        'index.php',
        {
            page: "moviemod",
            type: "delete",
            id: id
        },
        function (data) {
            location.reload();
        }
    );
}