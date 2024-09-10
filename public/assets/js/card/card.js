document.addEventListener("DOMContentLoaded", function () {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios.defaults.headers.common['Content-Type'] = "application/json";

    document.body.addEventListener('click', function (event) {
        let element = event.target;

        if (element.classList.contains('piece-decrease')) {
            decrease();
        }

        if (element.classList.contains('piece-increase')) {
            increase();
        }

        if (element.classList.contains('add-to-card')) {
            let productID = element.getAttribute('data-product-id');
            let sizeID = document.querySelector('#footSize').value;
            let pieceVal = document.querySelector('.piece').value;

            addToCard(productID, pieceVal, sizeID);
        }
    });

    function decrease()
    {
        let pieceElement = document.querySelector('.piece');
        let pieceVal = parseInt(pieceElement.value);
        if (pieceVal){
            pieceVal -= 1;
            pieceElement.value = pieceVal;
        }else{
            alert('Sıfırın altında bir adet eklenemez.');
        }
    }
    function increase()
    {
        let pieceElement = document.querySelector('.piece');
        let pieceVal = parseInt(pieceElement.value);
        if (pieceVal < 100){
            pieceVal += 1;
            pieceElement.value = pieceVal;
        }else{
            alert('100 adetten fazla sepete eklenemez.');
        }
    }

    function addToCard(productID, pieceVal, sizeID){
       axios.post(addToCardRoute , {
            product_id: productID,
            quantity: pieceVal,
            size_id: sizeID
        })
           .then(function (response)
                 {
                     let cardContainer = document.querySelector('.user-basket');
                     console.log(cardContainer);
                     cardContainer.innerHTML = response.data;
                     console.log(response.data);
                 })
           .catch(function (error)
                  {
                      if (error.response && error.response.status === 422){
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
