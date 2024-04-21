document.addEventListener("DOMContentLoaded", function ()
{
    let verifyMailForm = document.querySelector('#verifyMailForm');
    let email = document.querySelector('#email');
    let btnSendMail = document.querySelector('#btnSendMail');

    btnSendMail.addEventListener('click', function ()
    {
       if (!validateEmail(email.value.trim()))
       {
           Swal.fire({
                         title: "Uyarı!",
                         text: "Lütfen geçerli bir email adresi girin.",
                         icon: "warning"
                     });
       }
       else
       {
           verifyMailForm.submit();
       }
    });

    function validateEmail(email)
    {
        let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
});
