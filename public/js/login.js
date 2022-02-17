    const login = document.querySelector(".loginn");
    const signup = document.querySelector(".signupp");
    const form = document.querySelector("#form");
    const switchs = document.querySelectorAll(".switch");

    let current = 1;

    function tab2(){
        form.style.marginLeft = "-100%";
        login.style.background = "none";
        signup.style.background = "#007bff";
        switchs[current - 1].classList.add("active");
    }
    function tab1(){
        form.style.marginLeft = "0";
        signup.style.background = "none";
        login.style.background = "#007bff";

        switchs[current - 1].classList.remove("active");
    }