$('.search-open').on("click", function () {
    $('.search-inside').fadeIn();
});

$('.search-close').on("click", function () {
    $('.search-inside').fadeOut();
});

document.addEventListener("DOMContentLoaded", function ()
{
    initializeCard();
    function initializeCard(){
        axios.get(getCardRoute)
             .then(function (response)
                   {
                       let cardContainer = document.querySelector('.user-basket');
                       console.log(cardContainer);
                       cardContainer.innerHTML = response.data;
                       console.log(response.data);
                   })
             .catch(function (error)
                    {
                        if (error.response && error.response.status === 422)
                        {
                            let errors = error.response.data.errors;
                            displayErrors(errors);
                        }
                        console.log(error)
                    })
    }
    function displayErrors(errors){
        let errorText  = '';
        for (let key in errors)
        {
            if (errors.hasOwnProperty(key)){
                if (errorText.length) {
                    errorText += ',';
                }
                errorText += errors[key];
                Swal.fire({
                              title: "Sepete Eklenmedi!",
                              text: errorText,
                              icon: "error"
                          });
            }
        }
    }

});
