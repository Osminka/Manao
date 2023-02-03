let errorElement = document.createElement('span')
errorElement.className = 'error'
document.querySelector('.bord').style.display = 'block'
$(document).ready(function () {
    $('#reg').submit(function (e) {
        e.preventDefault();
        console.log($(this).attr('action'));
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $("form").serialize(),
            success: function (response) {
                console.log($("form").serialize());
                console.log(response);  
                var jsonData = JSON.parse(response);
                if (jsonData.success == 0) {
                    if (jsonData.message && jsonData.field) {
                        console.log(jsonData.field);
                        console.log( document.getElementById(jsonData.field));
                        errorElement.innerText = jsonData.message
                        document.querySelector('#reg').insertBefore(errorElement, document.getElementById(jsonData.field).nextSibling)
                    }
                    // $('form')[0].reset();
                }
                else{
                    window.location.href = '../index.php'
                }
                
            }
        })
    })
})
document.querySelectorAll('input').forEach(element => {
    element.addEventListener('input', (e)=>{
        console.log(e.data);
        if (e.data == ' ') {
            element.value = element.value.trim()
            errorElement.innerText = 'Пробелы недопустимы'
            document.querySelector('#reg').insertBefore(errorElement, element.nextSibling)
        }else{
            errorElement.innerText = ''
        }
    })
});
