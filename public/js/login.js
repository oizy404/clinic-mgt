$(document).ready(function(){
    $("#btn-acdstaff").click(function(){
        $(".login").fadeIn(500);
    });
    $("#loginbtn-cancel").click(function(){
        $(".login").fadeOut(500);
    });
    $("#loginbtn-login").click(function(){
        $(".login").fadeOut(500);
    });

    $("#btn-acdpatient").click(function(){
        $(".patient-login").fadeIn(500);
        // $(".register-patient").fadeIn(500);
    });
    $("#loginbtn-cancel").click(function(){
        $(".patient-login").fadeOut(500);
        // $(".register-patient").fadeOut(500);
    });
    $("#loginbtn-login").click(function(){
        $(".patient-login").fadeOut(500);
        // $(".register-patient").fadeOut(500);
    });
});
// $(document).ready(function(){
//     $("#btn-acdpatient").click(function(){
//         $(".patient-login").fadeIn(500);
//         // $(".register-patient").fadeIn(500);
//     });
//     $("#loginbtn-cancel").click(function(){
//         $(".patient-login").fadeOut(500);
//         // $(".register-patient").fadeOut(500);
//     });
//     $("#loginbtn-login").click(function(){
//         $(".patient-login").fadeOut(500);
//         // $(".register-patient").fadeOut(500);
//     });
// });
