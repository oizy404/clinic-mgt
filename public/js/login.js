$(document).ready(function(){
    $("#btn-acdstaff").click(function(){
        $(".login").fadeIn(500);
        $(".front-cont").fadeOut(500);
    });
    $("#loginbtn-cancel").click(function(){
        $(".login").fadeOut(500);
    });
    $("#loginbtn-login").click(function(){
        $(".login").fadeOut(500);
        $(".front-cont").fadeOut(500);
    });
    $("#btn-acdpatient").click(function(){
        $(".patient-login").fadeIn(500);
        $(".front-cont").fadeOut(500);
    });
    $("#patientbtn-cancel").click(function(){
        $(".patient-login").fadeOut(500);
    });
    $("#patientbtn-login").click(function(){
        $(".patient-login").fadeOut(500);
        $(".front-cont").fadeOut(500);
    });
});