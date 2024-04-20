document.addEventListener('DOMContentLoaded', function ()
{
    let btnRegister = document.querySelector("#btnRegister");
    let registerForm = document.querySelector("#registerForm");

    let registerFormInputs = document.querySelectorAll("#registerForm input");


    let validation = {
        rules   : {
            name                 : {
                required : true,
                minLength: 2,
                maxLength: 125,
            },
            email                : {
                required : true,
                minLength: 2,
                maxLength: 125,
                email    : true
            },
            password             : {
                required : true,
                minLength: 8,
                maxLength: 125,
                password : true
            },
            password_confirmation: {
                required        : true,
                minLength       : 8,
                maxLength       : 125,
                password        : true,
                compareElementId: "password"
            }
        },
        messages: {
            name                 : {
                required : "Ad Soyad alanı zorunludur.",
                minLength: "Ad Soyad alanı en az 2 karakterden oluşmalıdır.",
                maxLength: "Ad Soyad alanı en fazla 125 karakterden oluşmalıdır.",
            },
            email                : {
                required : "Email alanı zorunludur.",
                minLength: "Email alanı en az 2 karakterden oluşmalıdır.",
                maxLength: "Email alanı en fazla 125 karakterden oluşmalıdır.",
                email    : "Geçerli bir email adresi girin."
            },
            password             : {
                required : "Parola alanı zorunludur.",
                minLength: "Parola alanı en az 8 karakterden oluşmalıdır.",
                maxLength: "Parola alanı en fazla 125 karakterden oluşmalıdır.",
                password : "Parolanız en az bir büyük harfi bir küçük harf, bir sayı ve bir özel karakter içermelidir."
            },
            password_confirmation: {
                required        : "Parola Tekrarı alanı zorunludur.",
                minLength       : "Parola Tekrarı alanı en az 8 karakterden oluşmalıdır.",
                maxLength       : "Parola Tekrarı alanı en fazla 125 karakterden oluşmalıdır.",
                password        : "Parola Tekrarınız en az bir büyük harfi bir küçük harf, bir sayı ve bir özel karakter içermelidir.",
                compareElementId: "Parola ve parola tekrarı uyuşmuyor."
            },
        }
    }

    let validationRules = validation.rules;
    let validationMessages = validation.messages;
    /**
     * Formun içerisindeki inputlar değiştiğinde
     */
    registerFormInputs
        .forEach(function (input)
                 {
                     input.addEventListener("blur", function (event)
                     {
                         let element = event.target;
                         let parentElement = element.parentElement;
                         let elementID = element.id;
                         let nextElement = element.nextElementSibling;

                         let feedbackList = parentElement.querySelectorAll(".invalid-feedback");
                         feedbackList.forEach(element => element.remove());

                         if (element.className.includes("is-invalid"))
                         {
                             /**
                              * Elementin kendisinde uyaru verien bir durum varsa siliyoruz.
                              */
                             element.classList.remove("is-invalid");
                         }

                         /**
                          * ElementinID'si kuralların içerisinde ekliyse
                          */
                         if (validationRules.hasOwnProperty(elementID))
                         {
                             // Email password ve password confirmation dıiında kalan diğer validation işlemleri
                             let elementValue = element.value.trim();

                             for(let fieldKey in validationRules[elementID])
                             {
                                 let fieldValue = validationRules[elementID][fieldKey];

                                 if (fieldKey === "required" && fieldValue && elementValue.length < 1)
                                 {
                                     element.classList.add("is-invalid");

                                     let  invalidElementInfo = document.createElement("div");
                                     invalidElementInfo.className = "invalid-feedback";
                                     invalidElementInfo.id = elementID + "-feedback-" + fieldKey;
                                     invalidElementInfo.textContent = validationMessages[elementID].required

                                     element.insertAdjacentElement("afterend", invalidElementInfo);
                                 }
                                 else if (fieldKey === 'required' && fieldValue && elementValue.length >= 1)
                                 {
                                     let invalidElementInfo = document.querySelector("#" + elementID + "-feedback-" + fieldKey);
                                     if (invalidElementInfo)
                                     {
                                         invalidElementInfo.remove();
                                     }
                                 }

                                 if (fieldKey === "minLength" && fieldValue && elementValue.length < fieldValue)
                                 {
                                     element.classList.add("is-invalid");

                                     let  invalidElementInfo = document.createElement("div");
                                     invalidElementInfo.className = "invalid-feedback";
                                     invalidElementInfo.id = elementID + "-feedback-" + fieldKey;
                                     invalidElementInfo.textContent = validationMessages[elementID].minLength

                                     element.insertAdjacentElement("afterend", invalidElementInfo);
                                 }
                                 else if (fieldKey === 'minLength' && fieldValue && elementValue.length >= fieldValue)
                                 {
                                     let invalidElementInfo = document.querySelector("#" + elementID + "-feedback-" + fieldKey);
                                     if (invalidElementInfo)
                                     {
                                         invalidElementInfo.remove();
                                     }
                                 }

                                 if (fieldKey === "maxLength" && fieldValue && elementValue.length > fieldValue)
                                 {
                                     element.classList.add("is-invalid");

                                     let  invalidElementInfo = document.createElement("div");
                                     invalidElementInfo.className = "invalid-feedback";
                                     invalidElementInfo.id = elementID + "-feedback-" + fieldKey;
                                     invalidElementInfo.textContent = validationMessages[elementID].maxLength

                                     element.insertAdjacentElement("afterend", invalidElementInfo);
                                 }
                                 else if (fieldKey === 'maxLength' && fieldValue && elementValue.length <= fieldValue)
                                 {
                                     let invalidElementInfo = document.querySelector("#" + elementID + "-feedback-" + fieldKey);
                                     if (invalidElementInfo)
                                     {
                                         invalidElementInfo.remove();
                                     }
                                 }
                             }









                             /**
                              * Element email ise ve geçerli bir email adresi girilmediyse
                              */

                             if (validationRules[elementID].hasOwnProperty('email') &&
                                 validationRules[elementID].email &&
                                 !validateEmail(element.value.trim()))
                             {
                                 element.classList.add("is-invalid");

                                 let  invalidElementInfo = document.createElement("div");
                                 invalidElementInfo.className = "invalid-feedback";
                                 invalidElementInfo.id = elementID + "-feedback";
                                 invalidElementInfo.textContent = validationMessages[elementID].email

                                 element.insertAdjacentElement("afterend", invalidElementInfo);
                             }
                             else if (validationRules[elementID].hasOwnProperty('password') &&
                                 validationRules[elementID].password &&
                                 !validatePassword(element.value.trim()))
                             {
                                 element.classList.add("is-invalid");

                                 let  invalidElementInfo = document.createElement("div");
                                 invalidElementInfo.className = "invalid-feedback";
                                 invalidElementInfo.id = elementID + "-feedback";
                                 invalidElementInfo.textContent = validationMessages[elementID].password

                                 element.insertAdjacentElement("afterend", invalidElementInfo);
                             }
                             else if (validationRules[elementID].hasOwnProperty('compareElementId') &&
                                 validationRules[elementID].password &&
                                 validationRules[elementID].compareElementId)
                             {
                                 /**
                                  * Element Parola Tekrarı ise
                                  */

                                 if (!validatePassword(element.value.trim()))
                                 {
                                     element.classList.add("is-invalid");

                                     let  invalidElementInfo = document.createElement("div");
                                     invalidElementInfo.className = "invalid-feedback";
                                     invalidElementInfo.id = elementID + "-feedback-1";
                                     invalidElementInfo.textContent = validationMessages[elementID].password

                                     element.insertAdjacentElement("afterend", invalidElementInfo);
                                 }

                                 let passwordValue = document.querySelector('#' + validationRules[elementID].compareElementId).value;

                                 if (!checkPasswordsMatch(passwordValue, element.value.trim()))
                                 {
                                     element.classList.add("is-invalid");

                                     let  invalidElementInfo = document.createElement("div");
                                     invalidElementInfo.className = "invalid-feedback";
                                     invalidElementInfo.id = elementID + "-feedback-2";
                                     invalidElementInfo.textContent = validationMessages[elementID].compareElementId

                                     element.insertAdjacentElement("afterend", invalidElementInfo);
                                 }
                             }


                         }
                     });
                 });

    btnRegister.addEventListener("click", function ()
    {
        ruleName:
        for (const rule in validationRules)
        {
            // let element = $('[name=' + rule + ']');
            let element = document.querySelector('[name=' + rule + ']');
            if (element)
            {
                let elementValue = element.value.trim();
                for (const fieldKey in validationRules[rule])
                {
                    let fieldValue = validationRules[rule][fieldKey];

                    if (
                        (fieldKey === 'required' && elementValue.length < 1) ||
                        (fieldKey === 'minLength' && elementValue.length < fieldValue) ||
                        (fieldKey === 'maxLength' && elementValue.length > fieldValue) ||
                        (fieldKey === 'email' && elementValue && !validateEmail(elementValue)) ||
                        (fieldKey === 'password' && elementValue && !validatePassword(elementValue)) ||
                        (fieldKey === 'compareElementId' && elementValue && !checkPasswordsMatch(document.querySelector("#" + fieldValue).value ,elementValue))
                    )
                    {
                        Swal.fire({
                                      title: "Uyarı!",
                                      text: validationMessages[rule][fieldKey],
                                      icon: "warning"
                                  });
                        break ruleName;
                    }
                    else
                    {
                        registerForm.submit();
                    }
                }
            }
        }
    });

    function validateEmail(email)
    {
        let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function validatePassword(password)
    {
        const minLength = validationRules.password.minLength;
        const maxLength = validationRules.password.maxLength;
        const containsUppercase = /[A-Z]/.test(password);
        const containsLowercase = /[a-z]/.test(password);
        const containsNumber = /\d/.test(password);
        const containsSpecialChar = /[!@#$%^&*(),.?"{}|<>]/.test(password);

        return password.length >= minLength &&
            password.length <= maxLength &&
            containsUppercase &&
            containsLowercase &&
            containsNumber &&
            containsSpecialChar;
    }

    function checkPasswordsMatch(password, confirmPassword)
    {
        return password === confirmPassword;
    }
});
