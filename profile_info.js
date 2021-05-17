let save;
save = document.getElementById('save');
let first_name = document.getElementById('first_name');
console.log(first_name);
let last_name = document.getElementById('last_name');



$(document).ready(function(){

    $("form input[type=text]").prop("disabled",true);
    $("form input[type=email]").prop("disabled",true);
    $("#bio_info").prop("disabled",true);

    $("input[name=edit]").on('click',function(){
        $("input[type=text],#bio_info").removeAttr("disabled");
    }); 

    $("input[name=save]").on("click",function(){

        $("input[type=text],input[type=email],#bio_info").prop("disabled",true);
    });
});