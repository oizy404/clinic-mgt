$(document).ready(function(){
    $("#btn-login").click(function(){
        $(".admin-login").fadeIn(500);
    });
    $("#btn-cancel").click(function(){
        $(".admin-login").fadeOut(500);
    });
})