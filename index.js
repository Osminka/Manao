var password = document.getElementById("password")
confirm_password = document.getElementById("confirm_password");

function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
}


password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;  

// var button = document.getElementById("butt1");
// button.disabled = !button.disabled;
// document.getElementById("butt1").disabled = false;


//а теперь? мейби надо разные скрипты для разных страниц??
// alert("hgjsdj")
// $(document).ready(function () {
//     alert('чезах')
//     $('#reg').submit(function(e){
//         e.preventDefault();
//         $.ajax({
//             type: "POST",
//             url: $(this).attr('action'),
//             data: $(this).serialize(),
//             succes:function (response){
//                 console.log((this).attr('action'))
//                 console.log(response);
//                 var jsonData = JSON.parse(response);
//                 if(jsonData.sucess="0"){
//                     alert(jsonData.message)
//                 }
//             }
//         })
//     })
// })