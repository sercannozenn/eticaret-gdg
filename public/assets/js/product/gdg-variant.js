document.addEventListener("DOMContentLoaded", function ()
{
    let btnSubmit = document.querySelector('#btnSubmit');
    let gdgForm = document.querySelector('#gdgForm');
    let addVariant = document.querySelector('#addVariant');
    let variants = document.querySelector('#variants');
    let typeID = document.querySelector('#type_id');
    let productVariantTab = document.querySelector('#productVariantTab');
    let variantCount = 0;
    let variantSizeStockInfo = [];
    const sizeDivKey = "sizeDiv";
    const requiredFields = {
        name       : {
            type: "input"
        },
        price      : {
            type     : "input",
            data_type: "price",
        },
        type_id    : {
            type: "select"
        },
        brand_id   : {
            type: "select"
        },
        category_id: {
            type: "select"
        },
    };
    let dressSize = ['xs', 's', 'm', 'l', 'xl', 'xxl', '3xl', '4xl', '5xl'];
    let shoesSize = shoesNumberGenerate();
    let standartSize = ['standart'];

    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios.defaults.headers.common['Content-Type'] = "application/json";

    let sizes = {
        1: dressSize,
        2: shoesSize,
        3: standartSize
    };

    btnSubmit.addEventListener('click', function ()
    {
        let result = validateForm();
        let isValid = result.isValid;
        let message = result.message;
        if (isValid)
        {
            gdgForm.submit();
        }
        else
        {
            message = message != null ? message : 'Lütfen gerekli alanları doldurunuz.';
            Swal.fire({
                          title: 'Uyarı!',
                          text : message,
                          icon : 'warning'
                      });
        }
    });

    addVariant.addEventListener('click', function ()
    {
        let row = createDiv("row variant", "row-" + variantCount);
        let row2 = createDiv("row");

        let variantDeleteDiv = createDiv("col-md-12 mb-1")
        let variantDeleteAElement = createAElement(null, 'btn-delete-variant btn btn-danger col-3', 'javascript:void(0)', ['data-variant-id', variantCount], 'Varyant Kaldır');


        let urunAdiID = 'name-' + variantCount;
        let urunAdiNameAttr = 'variant[' + variantCount + '][name]';
        let urunAdiDiv = createDiv("col-md-4 mb-4")
        let urunAdiLabel = createLabel("form-label", urunAdiID, "Ürün Adı");
        let urunAdiInput = createInput("form-control variant-product-name", urunAdiID, "off", "Ürün Adı", urunAdiNameAttr);

        urunAdiDiv.appendChild(urunAdiLabel);
        urunAdiDiv.appendChild(urunAdiInput);

        let urunVariantNameID = 'variant_name-' + variantCount;
        let urunVariantNameAttr = 'variant[' + variantCount + '][variant_name]';
        let urunVariantNameDiv = createDiv("col-md-4 mb-4")
        let urunVariantNameLabel = createLabel("form-label", urunVariantNameID, "Ürün Varyant Adı");
        let urunVariantNameInput = createInput("form-control variant-name", urunVariantNameID, "off", "Ürün Varyant Adı", urunVariantNameAttr);

        urunVariantNameDiv.appendChild(urunVariantNameLabel);
        urunVariantNameDiv.appendChild(urunVariantNameInput);

        let inputName = document.querySelector('#name');
        let nameSLug = generateSlug(inputName.value);

        let urunSlugID = 'slug-' + variantCount;
        let urunSlugNameAttr = 'variant[' + variantCount + '][slug]';
        let urunSlugDiv = createDiv("col-md-4 mb-4")
        let urunSlugLabel = createLabel("form-label", urunSlugID, "Slug");
        let urunSlugInput = createInput("form-control product-slug", urunSlugID, "off", "Slug", urunSlugNameAttr, null, null, nameSLug);

        urunSlugDiv.appendChild(urunSlugLabel);
        urunSlugDiv.appendChild(urunSlugInput);

        let urunAdditionalPriceID = 'additional_price-' + variantCount;
        let urunAdditionalPriceNameAttr = 'variant[' + variantCount + '][additional_price]';
        let urunAdditionalPriceDiv = createDiv("col-md-6 mb-4")
        let urunAdditionalPriceLabel = createLabel("form-label", urunAdditionalPriceID, "Fiyat");
        let urunAdditionalPriceInput = createInput("form-control additional-price-input", urunAdditionalPriceID, "off", "Fiyat", urunAdditionalPriceNameAttr, ['data-variant-id', variantCount]);
        urunAdditionalPriceDiv.appendChild(urunAdditionalPriceLabel);
        urunAdditionalPriceDiv.appendChild(urunAdditionalPriceInput);

        let urunFinalPriceID = 'final_price-' + variantCount;
        let urunFinalPriceNameAttr = 'variant[' + variantCount + '][final_price]';
        let urunFinalPriceDiv = createDiv("col-md-6 mb-4")
        let urunFinalPriceLabel = createLabel("form-label", urunFinalPriceID, "Son Fiyat");
        let getPriceValue = document.querySelector('#price').value;
        let urunFinalPriceInput = createInput("form-control readonly", urunFinalPriceID, "off", "Son Fiyat", urunFinalPriceNameAttr, ['readonly', ""], null, getPriceValue);
        urunFinalPriceDiv.appendChild(urunFinalPriceLabel);
        urunFinalPriceDiv.appendChild(urunFinalPriceInput);

        let urunExtraDescriptionID = 'extra_description-' + variantCount;
        let urunExtraDescriptionNameAttr = 'variant[' + variantCount + '][extra_description]';
        let urunExtraDescriptionDiv = createDiv("col-md-12 mb-4")
        let urunExtraDescriptionLabel = createLabel("form-label", urunExtraDescriptionID, "Ekstra Açıklama");
        let urunExtraDescriptionInput = createInput("form-control", urunExtraDescriptionID, "off", "Ekstra Açıklama", urunExtraDescriptionNameAttr);
        urunExtraDescriptionDiv.appendChild(urunExtraDescriptionLabel);
        urunExtraDescriptionDiv.appendChild(urunExtraDescriptionInput);


        let urunPublishDateID = 'publish_date-' + variantCount;
        let urunPublishDateNameAttr = 'variant[' + variantCount + '][publish_date]';
        let urunPublishDateDiv = createDiv("col-md-12 mb-4");
        let urunPublishDateDiv2 = createDiv("input-group flatpickr flatpickr-date");
        let urunPublishDateLabel = createLabel("form-label", urunPublishDateID, "Yayınlanma Tarihi");
        let urunPublishDateInput = createInput("form-control", urunPublishDateID, "off", "Yayınlanma Tarihi Seçebilirsiniz.", urunPublishDateNameAttr, ['data-input', '']);
        let urunPublishDateSpan = createSpan('input-group-text input-group-addon', '', ['data-toggle', '']);
        let urunPublishDateIElement = createIElement('', ['data-feather', 'calendar']);
        urunPublishDateDiv.appendChild(urunPublishDateLabel);
        urunPublishDateSpan.appendChild(urunPublishDateIElement);
        urunPublishDateDiv2.appendChild(urunPublishDateInput);
        urunPublishDateDiv2.appendChild(urunPublishDateSpan);
        urunPublishDateDiv.appendChild(urunPublishDateDiv2);

        let urunPStatusID = 'p_status-' + variantCount;
        let urunPStatusNameAttr = 'variant[' + variantCount + '][p_status]';
        let urunPStatusDiv = createDiv("col-md-6  mb-4")
        let urunPStatusLabel = createLabel("form-check-label", urunPStatusID, "Aktif mi?");
        let urunPStatusInput = createInput("form-check-input", urunPStatusID, "", "", urunPStatusNameAttr, null, 'checkbox');
        urunPStatusDiv.appendChild(urunPStatusInput);
        urunPStatusDiv.appendChild(urunPStatusLabel);

        let urunAddSizeDiv = createDiv("row");
        let urunAddSizeSpan = createSpan('ms-2', 'Beden Ekle', null);
        let urunAddSizeIElement = createIElement('add-size', ['data-feather', 'plus-circle']);
        let urunAddSizeAElement = createAElement(null, 'btn-add-size col-md-12', 'javascript:void(0)', ['data-variant-id', variantCount]);

        let urunAddSizeIElementImage = createIElement('add-size', ['data-feather', 'image']);
        let urunAddSizeAElementImageSetAttribute = [];
        urunAddSizeAElementImageSetAttribute.push({'data-variant-id': variantCount});
        let dataInputAttr = ("data-input-" + variantCount);
        let dataPreviewAttr = ("data-preview-" + variantCount);
        urunAddSizeAElementImageSetAttribute.push({'data-input': dataInputAttr});
        urunAddSizeAElementImageSetAttribute.push({'data-preview': dataPreviewAttr});
        urunAddSizeAElementImageSetAttribute.push({'data-variant-id': variantCount});

        let imageDataInputElementNameAttr = 'image[' + variantCount + '][]';
        let imageDataInputElement = createInput("form-control", dataInputAttr, 'off', '', imageDataInputElementNameAttr, null, 'hidden')
        let imageDataPreviewElement = createDiv('col-md-12', dataPreviewAttr);

        let urunAddSizeAElementImage = createAElement(null, 'btn btn-info btn-add-image mb-4', 'javascript:void(0)', urunAddSizeAElementImageSetAttribute, 'Görsel Ekle ');
        let urunAddSizeAElementDiv = createDiv("col-md-12");
        urunAddSizeAElementImage.appendChild(urunAddSizeIElementImage);
        urunAddSizeAElementDiv.appendChild(urunAddSizeAElementImage);

        let variantFeatureSpan = createSpan('form-label d-block my-3', 'Varyant İçin Öne Çıkan Görsel Seçin', null);
        urunAddSizeAElementDiv.appendChild(variantFeatureSpan);


        urunAddSizeAElement.appendChild(urunAddSizeIElement);
        urunAddSizeAElement.appendChild(urunAddSizeSpan);

        urunAddSizeDiv.appendChild(urunAddSizeAElementDiv);
        urunAddSizeDiv.appendChild(imageDataInputElement);
        urunAddSizeDiv.appendChild(imageDataPreviewElement);
        urunAddSizeDiv.appendChild(urunAddSizeAElement);

        let urunAddSizeGeneralDiv = createDiv("col-md-12 p-0 mb-3", sizeDivKey + variantCount);


        let hr2 = document.createElement("hr");
        hr2.className = "my-2";
        variantDeleteDiv.appendChild(variantDeleteAElement);
        variantDeleteDiv.appendChild(hr2);

        row2.appendChild(variantDeleteDiv);

        row.appendChild(row2);

        row.appendChild(urunAdiDiv);
        row.appendChild(urunVariantNameDiv);
        row.appendChild(urunSlugDiv);
        row.appendChild(urunAdditionalPriceDiv);
        row.appendChild(urunFinalPriceDiv);
        row.appendChild(urunExtraDescriptionDiv);
        row.appendChild(urunPublishDateDiv);
        row.appendChild(urunPStatusDiv);
        row.appendChild(urunAddSizeDiv);
        row.appendChild(urunAddSizeGeneralDiv);

        let hr = document.createElement("hr");
        hr.className = "my-5";
        row.appendChild(hr);


        // variants.insertAdjacentElement('beforebegin', row2);
        // variants.insertAdjacentElement('beforebegin', hr2);
        variants.insertAdjacentElement('afterbegin', row);

        variantCount++;

        feather.replace();
        flatpickr(".flatpickr-date", {
            wrap      : true,
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    });

    typeID.addEventListener('change', function ()
    {
        for (let i = 0; i <= variantCount; i++)
        {
            let findDiv = document.querySelector('#' + sizeDivKey + i);
            if (findDiv)
            {
                findDiv.innerHTML = "";
            }
        }
    });

    document.body.addEventListener('click', function (event)
    {
        let element = event.target;

        if (element.classList.contains('btn-delete-variant'))
        {
            let variantID = element.getAttribute("data-variant-id");
            let findDeleteVariantElement = document.querySelector('#row-' + variantID);
            if (findDeleteVariantElement)
            {
                findDeleteVariantElement.remove();
                updateVariantIndexes();
            }
        }

        if (element.classList.contains('btn-size-stock-delete'))
        {
            let dataSizeStockID = element.getAttribute('data-size-stock-id');
            let findSizeStockDiv = document.querySelector("#sizeStockDeleteGeneral-" + dataSizeStockID);
            if (findSizeStockDiv)
            {
                findSizeStockDiv.remove();
                updateSizeStockIndexes(dataSizeStockID);
            }
        }

        if (element.classList.contains('btn-add-size'))
        {
            btnAddSizeAction(element);
        }

        if (element.classList.contains('btn-add-image'))
        {
            var options = {
                filebrowserImageBrowseUrl: '/admin/gdg-filemanager?type=Images',
                filebrowserImageUploadUrl: '/admin/gdg-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl     : '/admin/gdg-filemanager?type=Files',
                filebrowserUploadUrl     : '/admin/gdg-filemanager/upload?type=Files&_token=',
                type                     : "file"
            };

            var route_prefix = (options && options.prefix) ? options.prefix : '/admin/gdg-filemanager';

            var target_input = document.getElementById(element.getAttribute('data-input'));
            var target_preview = document.getElementById(element.getAttribute('data-preview'));
            let variantID = element.getAttribute('data-variant-id');
            var file_path = '';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = function (items)
            {
                file_path = items.map(function (item)
                                      {
                                          return item.url;
                                      }).join(',');

                // set the value of the desired input to image url
                target_input.value = file_path;
                target_input.dispatchEvent(new Event('change'));

                // clear previous preview
                target_preview.innerHTML = '';

                // set or change the preview image src
                items.forEach(function (item, index)
                              {

                                  let container = document.createElement('div')
                                  container.className = "image-container";
                                  container.id = "image-container-" + variantID + "-" + index;

                                  let radio = document.createElement('input');
                                  radio.type = "radio";
                                  radio.setAttribute('name', 'variant[' + variantID + '][image]');
                                  radio.setAttribute('value', item.url);
                                  radio.id = ("radio-" + variantID + '-' + index);
                                  if (index === 0)
                                  {
                                      radio.checked = true;
                                  }
                                  let iElement = document.createElement("i");
                                  iElement.setAttribute("data-feather", "x");
                                  iElement.setAttribute("data-url", item.url);
                                  iElement.setAttribute("data-variant-id", variantID);
                                  iElement.setAttribute("data-image-index", index);
                                  iElement.className = "delete-variant-image";

                                  let label = document.createElement('label');
                                  label.setAttribute('for', ("radio-" + variantID + '-' + index));

                                  let img = document.createElement('img')
                                  img.setAttribute('style', 'height: 5rem')
                                  img.setAttribute('src', item.thumb_url);

                                  label.appendChild(img);
                                  container.appendChild(radio);
                                  container.appendChild(label);
                                  container.appendChild(iElement);

                                  target_preview.appendChild(container);

                                  feather.replace();

                              });

                // trigger change event
                target_preview.dispatchEvent(new Event('change'));
            }
        }

        if (element.parentElement.classList.contains('btn-add-size'))
        {
            btnAddSizeAction(element.parentElement);
        }

        if (element.classList.contains("delete-variant-image"))
        {
            let variantID = element.getAttribute("data-variant-id");
            let dataUrl = element.getAttribute("data-url") + ",";
            let dataImageIndex = element.getAttribute("data-image-index");

            let dataInputFind = document.querySelector("#data-input-" + variantID);
            let dataInputValue = dataInputFind.value;
            dataInputValue = dataInputValue.replace(dataUrl, "");
            dataInputFind.value = dataInputValue;

            let findImageContainer = document.querySelector("#image-container-" + variantID + "-" + dataImageIndex);
            findImageContainer.remove();


            // Update Index
            let dataPreview = document.querySelector('#data-preview-' + variantID);
            let imageContainers = dataPreview.querySelectorAll('.image-container');

            imageContainers.forEach((container, index) =>
                                    {
                                        let variantIndex = variantID + "-" + index;
                                        container.id = "image-container-" + variantIndex;


                                        container.querySelectorAll('[id^="radio-"]').forEach(element =>
                                                                                             {
                                                                                                 element.id = "radio-" + variantIndex;
                                                                                             });

                                        container.querySelectorAll('[for^="radio-"]').forEach(element =>
                                                                                              {
                                                                                                  element.setAttribute('for', ("radio-" + variantIndex));
                                                                                              });

                                        container.querySelectorAll('svg').forEach(element =>
                                                                                  {
                                                                                      element.setAttribute('data-image-index', index);
                                                                                  });
                                    });

        }
    })

    document.body.addEventListener('input', function (event)
    {

        let element = event.target;
        let elementID = element.id;
        let requiredFieldStatus = true;

        for (const [key, properties] of Object.entries(requiredFields))
        {
            let keyElement = document.querySelector('#' + key);
            let keylementValue = keyElement.value;

            if (properties.type === 'input')
            {
                if (keylementValue.length < 2)
                {
                    requiredFieldStatus = false;

                }
                else if (properties.hasOwnProperty('data_type') && properties.data_type === 'price' && (isNaN(keylementValue) || keylementValue < 0))
                {
                    requiredFieldStatus = false;
                }
            }
            else if (properties.type === 'select' && keylementValue === '-1')
            {
                requiredFieldStatus = false;
            }
        }


        if (requiredFieldStatus)
        {
            productVariantTab.removeAttribute('disabled');
        }
        else
        {
            productVariantTab.setAttribute('disabled', '');
        }

        if (element.classList.contains("additional-price-input"))
        {
            let variantID = element.getAttribute("data-variant-id");
            let findFinalPriceElement = document.querySelector("#final_price-" + variantID);
            let priceValue = document.querySelector('#price').value;
            let finalPrice = priceValue - element.value;
            findFinalPriceElement.value = finalPrice;
        }

        if (element.id == 'name')
        {
            let slugInputs = document.querySelectorAll(".product-slug");
            slugInputs.forEach(function (slugInput)
                               {
                                   let slugID = slugInput.id;
                                   let variantID = slugID.split("-")[1];
                                   let findVariantProductName = document.querySelector("#name-" + variantID).value;
                                   let findVariantName = document.querySelector("#variant_name-" + variantID).value;
                                   let slug = element.value + "-" + findVariantName;

                                   if (findVariantProductName.trim() != "")
                                   {
                                       slug = findVariantProductName + "-" + findVariantName
                                   }
                                   slug = generateSlug(slug);
                                   slugInput.value = slug;
                               });
        }

        if (element.classList.contains("variant-product-name"))
        {
            let slugID = element.id;
            let variantID = slugID.split("-")[1];
            let findVariantName = document.querySelector("#variant_name-" + variantID).value;
            let slugInput = document.querySelector("#slug-" + variantID);
            let nameInput = document.querySelector("#name").value;
            let productNameValue = element.value.trim();
            let slug = nameInput + "-" + findVariantName;
            if (productNameValue != '')
            {
                slug = productNameValue + "-" + findVariantName;
            }
            slug = generateSlug(slug);
            slugInput.value = slug;
        }

        if (element.classList.contains("variant-name"))
        {
            let slugID = element.id;
            let variantID = slugID.split("-")[1];
            let findVariantProductName = document.querySelector("#name-" + variantID).value;
            let slugInput = document.querySelector("#slug-" + variantID);
            let nameInput = document.querySelector("#name").value;
            let variantName = element.value.trim();
            let slug = nameInput + "-" + variantName;

            if (findVariantProductName.trim() != '')
            {
                slug = findVariantProductName + "-" + variantName;
            }
            slug = generateSlug(slug);
            slugInput.value = slug;
        }

    });

    document.body.addEventListener('focusout', function (event)
    {
        let element = event.target;

        if (element.classList.contains("product-slug"))
        {
            slug = generateSlug(element.value);
            let response = checkSlug(slug);
            element.classList.remove("is-invalid")
            if (response != null)
            {
                element.classList.add("is-invalid")
            }
        }
        if (element.classList.contains("variant-product-name") || element.classList.contains("variant-name"))
        {
            let slugID = element.id;
            let variantID = slugID.split("-")[1];
            let slugInput = document.querySelector("#slug-" + variantID);

            slug = generateSlug(slugInput.value);
            let response = checkSlug(slug);

            slugInput.classList.remove("is-invalid")
            if (response != null)
            {
                slugInput.classList.add("is-invalid")
            }
        }
    });

    function shoesNumberGenerate()
    {
        let numbers = [];
        for (let i = 20; i < 51; i++)
        {
            numbers.push(i);
        }
        return numbers;
    }

    function updateVariantIndexes()
    {
        let allVariants = document.querySelectorAll('.row.variant');
        allVariants = Array.from(allVariants).reverse();
        allVariants.forEach((variant, index) =>
                            {
                                variant.id = "row-" + index;

                                variant.querySelectorAll('[data-variant-id]').forEach(element =>
                                                                                      {
                                                                                          element.setAttribute('data-variant-id', index);
                                                                                      });

                                variant.querySelectorAll('[for^="name-"]').forEach(element =>
                                                                                   {
                                                                                       element.setAttribute('for', ("name-" + index));
                                                                                   });

                                variant.querySelectorAll('[id^="name-"]').forEach(element =>
                                                                                  {
                                                                                      element.id = "name-" + index;
                                                                                      element.setAttribute("name", "variant[" + index + "][name]")
                                                                                  });

                                variant.querySelectorAll('[for^="variant_name-"]').forEach(element =>
                                                                                           {
                                                                                               element.setAttribute('for', ("variant_name-" + index));
                                                                                           });

                                variant.querySelectorAll('[id^="variant_name-"]').forEach(element =>
                                                                                          {
                                                                                              element.id = "variant_name-" + index;
                                                                                              element.setAttribute("name", "variant[" + index + "][variant_name]")
                                                                                          });

                                variant.querySelectorAll('[for^="slug-"]').forEach(element =>
                                                                                   {
                                                                                       element.setAttribute('for', ("slug-" + index));
                                                                                   });

                                variant.querySelectorAll('[id^="slug-"]').forEach(element =>
                                                                                  {
                                                                                      element.id = "slug-" + index;
                                                                                      element.setAttribute("name", "variant[" + index + "][slug]")
                                                                                  });

                                variant.querySelectorAll('[for^="additional_price-"]').forEach(element =>
                                                                                               {
                                                                                                   element.setAttribute('for', ("additional_price-" + index));
                                                                                               });

                                variant.querySelectorAll('[id^="additional_price-"]').forEach(element =>
                                                                                              {
                                                                                                  element.id = "additional_price-" + index;
                                                                                                  element.setAttribute("name", "variant[" + index + "][additional_price]")
                                                                                              });

                                variant.querySelectorAll('[for^="final_price-"]').forEach(element =>
                                                                                          {
                                                                                              element.setAttribute('for', ("final_price-" + index));
                                                                                          });

                                variant.querySelectorAll('[id^="final_price-"]').forEach(element =>
                                                                                         {
                                                                                             element.id = "final_price-" + index;
                                                                                             element.setAttribute("name", "variant[" + index + "][final_price]")
                                                                                         });

                                variant.querySelectorAll('[for^="extra_description-"]').forEach(element =>
                                                                                                {
                                                                                                    element.setAttribute('for', ("extra_description-" + index));
                                                                                                });

                                variant.querySelectorAll('[id^="extra_description-"]').forEach(element =>
                                                                                               {
                                                                                                   element.id = "extra_description-" + index;
                                                                                                   element.setAttribute("name", "variant[" + index + "][extra_description]")
                                                                                               });

                                variant.querySelectorAll('[for^="publish_date-"]').forEach(element =>
                                                                                           {
                                                                                               element.setAttribute('for', ("publish_date-" + index));
                                                                                           });

                                variant.querySelectorAll('[id^="publish_date-"]').forEach(element =>
                                                                                          {
                                                                                              element.id = "publish_date-" + index;
                                                                                              element.setAttribute("name", "variant[" + index + "][publish_date]")
                                                                                          });

                                variant.querySelectorAll('[for^="p_status-"]').forEach(element =>
                                                                                       {
                                                                                           element.setAttribute('for', ("p_status-" + index));
                                                                                       });

                                variant.querySelectorAll('[id^="p_status-"]').forEach(element =>
                                                                                      {
                                                                                          element.id = "p_status-" + index;
                                                                                          element.setAttribute("name", "variant[" + index + "][p_status]")
                                                                                      });

                                variant.querySelectorAll('[for^="size-"]').forEach(element =>
                                                                                   {
                                                                                       element.setAttribute('for', ("size-" + index));
                                                                                   });

                                variant.querySelectorAll('[id^="sizeDiv"]').forEach(element =>
                                                                                    {
                                                                                        element.id = "sizeDiv" + index;
                                                                                    });

                                variant.querySelectorAll('[id^="sizeStockDeleteGeneral-"]').forEach(element =>
                                                                                                    {
                                                                                                        let forAttr = element.getAttribute("id");
                                                                                                        let split = forAttr.split("-");
                                                                                                        let stockID = split[2];
                                                                                                        let oldVariantID = split[1];
                                                                                                        element.id = "sizeStockDeleteGeneral-" + index + "-" + stockID;
                                                                                                        element.classList.remove("size-stock-" + oldVariantID);
                                                                                                        element.classList.add("size-stock-" + index);

                                                                                                        element.querySelectorAll('[for^="size-"]').forEach(element =>
                                                                                                                                                           {
                                                                                                                                                               element.setAttribute('for', ("size-" + index + "-" + stockID));
                                                                                                                                                           });

                                                                                                        element.querySelectorAll('[id^="size-"]').forEach(element =>
                                                                                                                                                          {
                                                                                                                                                              element.setAttribute('id', ("size-" + index + "-" + stockID));
                                                                                                                                                              element.setAttribute('name', ("variant[" + index + "][size][" + stockID + "]"));
                                                                                                                                                          });

                                                                                                    });

                                variant.querySelectorAll('[id^="size-"]').forEach(element =>
                                                                                  {
                                                                                      element.id = "size-" + index;
                                                                                      element.setAttribute("name", "variant[" + index + "][size]")
                                                                                  });

                                variant.querySelectorAll('[for^="stock-"]').forEach(element =>
                                                                                    {
                                                                                        element.setAttribute('for', ("stock-" + index));
                                                                                    });

                                variant.querySelectorAll('[id^="stock-"]').forEach(element =>
                                                                                   {
                                                                                       element.id = "stock-" + index;
                                                                                       element.setAttribute("name", "variant[" + index + "][stock]")
                                                                                   });

                                variant.querySelectorAll('[for^="radio-"]').forEach(element =>
                                                                                    {
                                                                                        let forAttr = element.getAttribute("for");
                                                                                        let split = forAttr.split("-");
                                                                                        let imageID = split[2];
                                                                                        element.setAttribute('for', ("radio-" + index + "-" + imageID));
                                                                                    });

                                variant.querySelectorAll('[id^="radio-"]').forEach(element =>
                                                                                   {
                                                                                       let forAttr = element.getAttribute("id");
                                                                                       let split = forAttr.split("-");
                                                                                       let imageID = split[2];
                                                                                       element.id = "radio-" + index + "-" + imageID;
                                                                                       element.setAttribute("name", "variant[" + index + "][radio]")
                                                                                   });

                                variant.querySelectorAll('[id^="data-input-"]').forEach(element =>
                                                                                        {
                                                                                            element.id = "data-input-" + index;
                                                                                            element.setAttribute("name", "image[" + index + "]")
                                                                                        });

                            });
        variantCount--;
    }


    function btnAddSizeAction(element)
    {
        let dataVariantID = element.getAttribute("data-variant-id");

        let sizeStock = 0;
        if (variantSizeStockInfo.hasOwnProperty(dataVariantID))
        {
            sizeStock = variantSizeStockInfo[dataVariantID]['size_stock'];
        }

        let productTypeID = typeID.value;
        let productSize = sizes[productTypeID];
        let options = ["Beden Seçebilirsiniz"];
        options = options.concat(productSize);
        let divID = sizeDivKey + dataVariantID;
        let findDiv = document.querySelector("#" + divID);

        let urunSizeID = 'size-' + dataVariantID + '-' + sizeStock;
        let urunSizeNameAttr = 'variant[' + dataVariantID + '][size][' + sizeStock + ']';
        let urunSizeDiv = createDiv("col-md-5 mb-4 px-3")
        let urunSizeLabel = createLabel("form-label", urunSizeID, "Beden");

        let urunSizeSelect = createSelect("form-control", urunSizeID, urunSizeNameAttr, null, options);

        urunSizeDiv.appendChild(urunSizeLabel);
        urunSizeDiv.appendChild(urunSizeSelect);

        let urunStockID = 'stock-' + dataVariantID + '-' + sizeStock;
        let urunStockNameAttr = 'variant[' + dataVariantID + '][stock][' + sizeStock + ']';
        let urunStockDiv = createDiv("col-md-5 mb-4 px-3")
        let urunStockLabel = createLabel("form-label", urunStockID, "Stok Sayısı");
        let urunStockInput = createInput("form-control", urunStockID, "off", "Stok Sayısı", urunStockNameAttr);

        urunStockDiv.appendChild(urunStockLabel);
        urunStockDiv.appendChild(urunStockInput);

        let generalDivID = "sizeStockDeleteGeneral-" + dataVariantID + "-" + sizeStock;
        let urunSizeStockGeneralDivClass = "row mx-0 size-stock-" + dataVariantID;
        let urunSizeStockGeneralDiv = createDiv(urunSizeStockGeneralDivClass, generalDivID)

        let urunSizeStockDeleteDiv = createDiv("col-md-2 mb-4 px-3")
        let aElementID = "sizeStockDelete-" + dataVariantID + "-" + sizeStock;
        let urunSizeStokDeleteAElement = createAElement(aElementID, 'btn btn-danger w-100 btn-size-stock-delete', 'javascript:void(0)', ['data-size-stock-id', dataVariantID + '-' + sizeStock], 'Beden Sil');
        let urunSizeStokDeleteAElementLabel = createLabel("form-label d-block", "", "", '&nbsp;');

        urunSizeStockDeleteDiv.appendChild(urunSizeStokDeleteAElementLabel);
        urunSizeStockDeleteDiv.appendChild(urunSizeStokDeleteAElement);

        urunSizeStockGeneralDiv.appendChild(urunSizeDiv);
        urunSizeStockGeneralDiv.appendChild(urunStockDiv);
        urunSizeStockGeneralDiv.appendChild(urunSizeStockDeleteDiv);


        findDiv.appendChild(urunSizeStockGeneralDiv);


        if (variantSizeStockInfo.hasOwnProperty(dataVariantID))
        {
            variantSizeStockInfo[dataVariantID]['size_stock'] = (Number)(variantSizeStockInfo[dataVariantID]['size_stock']) + 1
        }
        else
        {
            variantSizeStockInfo[dataVariantID] = {
                'size_stock': 1
            };
        }
    }


    function createDiv(className, id = null)
    {
        let div = document.createElement('div');
        div.className = className;
        if (id != null)
        {
            div.id = id;
        }
        return div;
    }

    function createLabel(className, forAttr, textContent = null, innerHtml = null)
    {
        let label = document.createElement('label');
        label.className = className;
        label.textContent = textContent;
        if (innerHtml)
        {
            label.innerHTML = innerHtml;
        }
        label.setAttribute('for', forAttr);

        return label;
    }

    function createSpan(className, textContent = null, setAttribute = null)
    {
        let label = document.createElement('span');
        label.className = className;
        if (textContent != null)
        {
            label.textContent = textContent;
        }
        if (setAttribute != null)
        {
            label.setAttribute(setAttribute[0], setAttribute[1]);
        }
        return label;
    }

    function createIElement(className, setAttribute = null)
    {
        let label = document.createElement('i');
        label.className = className;
        if (setAttribute != null)
        {
            label.setAttribute(setAttribute[0], setAttribute[1]);
        }
        return label;
    }

    function createInput(className, id, autocomplete, placeholder, nameAttr, setAttribute = null, type = 'text', value = null)
    {
        let input = document.createElement('input');
        input.type = type;
        input.className = className;
        input.id = id;
        input.autocomplete = autocomplete
        input.placeholder = placeholder;
        input.setAttribute('name', nameAttr);

        if (setAttribute != null)
        {
            input.setAttribute(setAttribute[0], setAttribute[1])
        }

        input.value = value;

        return input;
    }

    function createSelect(className = null, id = null, nameAttr = null, setAttribute = null, options = null)
    {
        let select = document.createElement('select');
        select.className = className;
        if (id != null)
        {
            select.id = id;
        }
        select.setAttribute('name', nameAttr);

        if (setAttribute != null)
        {
            select.setAttribute(setAttribute[0], setAttribute[1])
        }

        if (options != null && Array.isArray(options))
        {
            options.forEach(function (item, index, array)
                            {
                                if (select.options.length < 1)
                                {
                                    select.options[select.options.length] = new Option(item, "-1");
                                }
                                else
                                {
                                    select.options[select.options.length] = new Option(item);
                                }
                            })
        }


        return select;
    }

    function createAElement(id = null, className = null, href = null, setAttribute = null, textContent = null)
    {
        let aElement = document.createElement('a');
        if (className != null)
        {
            aElement.className = className;
        }

        if (id != null)
        {
            aElement.id = id;
        }

        if (setAttribute != null)
        {
            if (Array.isArray(setAttribute) && setAttribute.length > 2)
            {
                setAttribute.forEach(function (item, index)
                                     {
                                         let keys = Object.keys(item);
                                         keys.forEach(function (key)
                                                      {
                                                          aElement.setAttribute(key, item[key])
                                                      })
                                     })
            }
            else
            {
                aElement.setAttribute(setAttribute[0], setAttribute[1])
            }
        }
        aElement.textContent = textContent;

        return aElement;
    }

    function updateSizeStockIndexes(dataSizeStockID)
    {
        dataSizeStockID = dataSizeStockID.split("-");
        let variantID = dataSizeStockID[0];
        let sizeStockID = dataSizeStockID[1];

        let allSizeStock = document.querySelectorAll('.row.size-stock-' + variantID);
        allSizeStock.forEach((variant, index) =>
                             {
                                 let id = variantID + "-" + index;
                                 variant.id = "sizeStockDeleteGeneral-" + id;

                                 variant.querySelectorAll('[for^="size-"]').forEach(element =>
                                                                                    {
                                                                                        element.setAttribute('for', ("size-" + id));
                                                                                    });
                                 variant.querySelectorAll('[id^="size-"]').forEach(element =>
                                                                                   {
                                                                                       element.id = "size-" + id;
                                                                                       element.setAttribute("name", "variant[" + variantID + "][size][" + index + "]")
                                                                                   });

                                 variant.querySelectorAll('[for^="stock-"]').forEach(element =>
                                                                                     {
                                                                                         element.setAttribute('for', ("stock-" + id));
                                                                                     });
                                 variant.querySelectorAll('[id^="stock-"]').forEach(element =>
                                                                                    {
                                                                                        element.id = "stock-" + id;
                                                                                        element.setAttribute("name", "variant[" + variantID + "][stock][" + index + "]")
                                                                                    });

                                 variant.querySelectorAll('[id^="sizeStockDelete-"]').forEach(element =>
                                                                                              {
                                                                                                  element.id = "sizeStockDelete-" + id;
                                                                                                  element.setAttribute("data-size-stock-id", id);
                                                                                              });


                             });

        let sizeStock = --variantSizeStockInfo[variantID]['size_stock'];
        variantSizeStockInfo[variantID]['size_stock'] = sizeStock;
    }

    function validateForm()
    {
        let isValid = true;
        let message = null;

        let nameInput = document.querySelector('#name');
        let priceInput = document.querySelector('#price');
        let typeSelect = document.querySelector('#type_id');
        let brandSelect = document.querySelector('#brand_id');
        let categorySelect = document.querySelector('#category_id');

        if (nameInput.value.trim() === '' || nameInput.value.trim() == null)
        {
            isValid = false;
            nameInput.classList.add("is-invalid");
        }
        else
        {
            nameInput.classList.remove("is-invalid");
        }

        if (priceInput.value.trim() === '' || priceInput.value.trim() == null || isNaN(priceInput.value) || priceInput.value < 1)
        {
            isValid = false;
            priceInput.classList.add("is-invalid");
        }
        else
        {
            priceInput.classList.remove("is-invalid");
        }

        if (typeSelect.value.trim() === '-1')
        {
            isValid = false;
            typeSelect.classList.add("is-invalid");
        }
        else
        {
            typeSelect.classList.remove("is-invalid");
        }

        if (brandSelect.value.trim() === '-1')
        {
            isValid = false;
            brandSelect.classList.add("is-invalid");
        }
        else
        {
            brandSelect.classList.remove("is-invalid");
        }

        if (categorySelect.value.trim() === '-1')
        {
            isValid = false;
            categorySelect.classList.add("is-invalid");
        }
        else
        {
            categorySelect.classList.remove("is-invalid");
        }


        //variant
        let variants = document.querySelectorAll(".row.variant");
        if (variants.length < 1)
        {
            isValid = false;
            message = "En az bir varyant eklemelisiniz";
        }
        variants = Array.from(variants).reverse();

        variants.forEach((variant, index) =>
                         {

                             let variantNameInput = variant.querySelector(`#variant_name-${index}`);
                             let slugInput = variant.querySelector(`#slug-${index}`);
                             let finalPriceInput = variant.querySelector(`#final_price-${index}`);
                             let imageDataInput = variant.querySelector(`#data-input-${index}`);

                             let sizeInputs = variant.querySelectorAll(`[id^="size-${index}"]`);
                             let stockInputs = variant.querySelectorAll(`[id^="stock-${index}"]`);

                             if (variantNameInput.value.trim() === '' || variantNameInput.value.trim() == null)
                             {
                                 isValid = false;
                                 variantNameInput.classList.add("is-invalid");
                             }
                             else
                             {
                                 variantNameInput.classList.remove("is-invalid");
                             }

                             if (slugInput.value.trim() === '' || slugInput.value.trim() == null)
                             {
                                 isValid = false;
                                 slugInput.classList.add("is-invalid");
                             }
                             else
                             {
                                 slugInput.classList.remove("is-invalid");
                             }

                             if (finalPriceInput.value.trim() === '' || finalPriceInput.value.trim() == null)
                             {
                                 isValid = false;
                                 finalPriceInput.classList.add("is-invalid");
                             }
                             else
                             {
                                 finalPriceInput.classList.remove("is-invalid");
                             }

                             if (imageDataInput.value.trim() === '' || imageDataInput.value.trim() == null)
                             {
                                 isValid = false;
                                 imageDataInput.classList.add("is-invalid");
                                 message = "Lütfen varyantlara görsel seçiniz.";
                             }
                             else
                             {
                                 imageDataInput.classList.remove("is-invalid");
                             }

                             if (sizeInputs.length < 1)
                             {
                                 isValid = false;
                                 message = "Lütfen varyantlara beden ekleyiniz.";
                             }
                             sizeInputs.forEach(input =>
                                                {

                                                    if (input.value.trim() === '-1')
                                                    {
                                                        isValid = false;
                                                        input.classList.add("is-invalid");
                                                    }
                                                    else
                                                    {
                                                        input.classList.remove("is-invalid");
                                                    }

                                                });
                             stockInputs.forEach(input =>
                                                 {

                                                     if (input.value.trim() === '' || input.value.trim() == null)
                                                     {
                                                         isValid = false;
                                                         input.classList.add("is-invalid");
                                                     }
                                                     else
                                                     {
                                                         input.classList.remove("is-invalid");
                                                     }
                                                 });


                         });

        return {isValid, message};
    }

    function generateSlug(slug)
    {
        const turkishMap = {
            "ç": "c",
            "ğ": "g",
            "ş": "s",
            "ü": "u",
            "ö": "o",
            "ı": "i",
            "İ": "i",
            "Ç": "c",
            "Ğ": "g",
            "Ş": "s",
            "Ü": "u",
            "Ö": "o"
        };

        slug = slug.toLowerCase();

        slug = slug.replace(/[çşğüöıİÇŞĞÜÖ]/g, function (match)
        {
            return turkishMap[match];
        });


        slug = slug.replace(/[\s\W-]+/g, '-');

        slug = slug.replace(/^-+|-+$/g, '');

        return slug;
    }

    function checkSlug(slug)
    {
        let response = axios.post(checkSlugRoute, {
            slug
        });
        return response;
    }
});
