document.addEventListener('DOMContentLoaded', function ()
{
    let productFilterForm = document.querySelector('#productFilterForm');
    let btnPriceSearch = document.querySelector('#btnPriceSearch');

    productFilterForm.addEventListener('keypress', function (event)
    {
        if (event.key === 'Enter')
        {
            let newUrl = generateSearchUrl();
            window.location.href = newUrl;
        }
    });
    productFilterForm.addEventListener('input', function (event)
    {
        let currentElement = event.target;
        let newUrl = generateSearchUrl();

        if (!['min_price', 'max_price', 'q', 'categories'].includes(currentElement.name))
        {
            window.location.href = newUrl;
        }
    });
    btnPriceSearch.addEventListener('click', function ()
    {
        let newUrl = generateSearchUrl();
        window.location.href = newUrl;
    });

    document.querySelectorAll('.parent-category').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            let subCategoryElement = document.getElementById('subCategories-' + this.getAttribute('data-id'));
            if(this.checked){
                subCategoryElement.style.display = 'block';
            }else{
                subCategoryElement.style.display = 'none';
                subCategoryElement.querySelectorAll('input[type="checkbox"]').forEach(function (subCheckbox) {
                    subCheckbox.checked = false;
                });
            }
            updateUrl();
            let newUrl = generateSearchUrl();
            window.location.href = newUrl;
        });

        if(checkbox.checked){
            document.getElementById('subCategories-' + checkbox.getAttribute('data-id')).style.display = 'block';
        }

    });
    document.querySelectorAll('.sub-category').forEach(function (subCheckbox) {
        subCheckbox.addEventListener('change', function () {
            updateUrl();
            let newUrl = generateSearchUrl();
            window.location.href = newUrl;
        });
    });
    function generateSearchUrl()
    {
        let params = {};
        let elements = productFilterForm.elements;
        let selectedCheckbox = [];
        Array.from(elements).forEach(function (element)
                                     {
                                         if (element.name && element.value && element.type === 'checkbox')
                                         {
                                             let checkboxes = document.querySelectorAll('input[name*="' + element.name + '"]');
                                             checkboxes.forEach(function (checkbox)
                                                                {
                                                                    if (checkbox.checked)
                                                                    {
                                                                        if (!selectedCheckbox[element.name])
                                                                        {
                                                                            selectedCheckbox[element.name] = [];
                                                                        }
                                                                        if (!selectedCheckbox[element.name].includes(checkbox.value))
                                                                        {
                                                                            selectedCheckbox[element.name].push(checkbox.value);
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if (selectedCheckbox[element.name] && selectedCheckbox[element.name].includes(checkbox.value))
                                                                        {
                                                                            const index = selectedCheckbox[element.name].indexOf(checkbox.value);
                                                                            selectedCheckbox[element.name].splice(index, 1);
                                                                            params[element.name].splice(index, 1);
                                                                        }
                                                                    }
                                                                })
                                         }
                                         else if (element.name && element.value)
                                         {
                                             params[element.name] = element.value;
                                         }
                                     });
        for (let key in selectedCheckbox)
        {
            params[key] = selectedCheckbox[key];
        }

        let queryString = Object.keys(params).map(function (key)
                                                  {
                                                      return encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
                                                  }).join('&');
        let actionUrl = productFilterForm.action;
        actionUrl = actionUrl.replace('#', '');
        let newUrl = actionUrl + (queryString ? '?' + queryString : '');
        return newUrl;
    }
    function updateUrl(){
        let newUrl = generateSearchUrl();
        history.pushState(null, '', newUrl);
    }
});
