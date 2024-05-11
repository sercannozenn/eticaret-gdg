

document.addEventListener("DOMContentLoaded", function ()
{
    let addVariant = document.querySelector('#addVariant');
    let variants = document.querySelector('#variants');
    let variantCount = 0;

    addVariant.addEventListener('click', function ()
    {
        let row = createDiv("row")

        let urunAdiID = 'name-' + variantCount;
        let urunAdiNameAttr = 'variant[' + variantCount + '][name]';
        let urunAdiDiv = createDiv("col-md-4 mb-4")
        let urunAdiLabel = createLabel("form-label", urunAdiID, "Ürün Adı");
        let urunAdiInput = createInput("form-control", urunAdiID, "off", "Ürün Adı", urunAdiNameAttr);

        urunAdiDiv.appendChild(urunAdiLabel);
        urunAdiDiv.appendChild(urunAdiInput);

        let urunVariantNameID = 'variant_name-' + variantCount;
        let urunVariantNameAttr = 'variant[' + variantCount + '][variant_name]';
        let urunVariantNameDiv = createDiv("col-md-4 mb-4")
        let urunVariantNameLabel = createLabel("form-label", urunVariantNameID, "Ürün Varyant Adı");
        let urunVariantNameInput = createInput("form-control", urunVariantNameID, "off", "Ürün Varyant Adı", urunVariantNameAttr);

        urunVariantNameDiv.appendChild(urunVariantNameLabel);
        urunVariantNameDiv.appendChild(urunVariantNameInput);

        let urunSlugID = 'slug-' + variantCount;
        let urunSlugNameAttr = 'variant[' + variantCount + '][slug]';
        let urunSlugDiv = createDiv("col-md-4 mb-4")
        let urunSlugLabel = createLabel("form-label", urunSlugID, "Slug");
        let urunSlugInput = createInput("form-control", urunSlugID, "off", "Slug", urunSlugNameAttr);

        urunSlugDiv.appendChild(urunSlugLabel);
        urunSlugDiv.appendChild(urunSlugInput);

        let urunAdditionalPriceID = 'additional_price-' + variantCount;
        let urunAdditionalPriceNameAttr = 'variant[' + variantCount + '][additional_price]';
        let urunAdditionalPriceDiv = createDiv("col-md-6 mb-4")
        let urunAdditionalPriceLabel = createLabel("form-label", urunAdditionalPriceID, "Fiyat");
        let urunAdditionalPriceInput = createInput("form-control", urunAdditionalPriceID, "off", "Fiyat", urunAdditionalPriceNameAttr);
        urunAdditionalPriceDiv.appendChild(urunAdditionalPriceLabel);
        urunAdditionalPriceDiv.appendChild(urunAdditionalPriceInput);

        let urunFinalPriceID = 'final_price-' + variantCount;
        let urunFinalPriceNameAttr = 'variant[' + variantCount + '][final_price]';
        let urunFinalPriceDiv = createDiv("col-md-6 mb-4")
        let urunFinalPriceLabel = createLabel("form-label", urunFinalPriceID, "Son Fiyat");
        let urunFinalPriceInput = createInput("form-control", urunFinalPriceID, "off", "Son Fiyat", urunFinalPriceNameAttr);
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

        let urunAddSizeDiv = createDiv("");
        let urunAddSizeSpan = createSpan('ms-2', 'Beden Ekle', null);
        let urunAddSizeIElement = createIElement('add-size', ['data-feather', 'plus-circle']);
        urunAddSizeDiv.appendChild(urunAddSizeIElement);
        urunAddSizeDiv.appendChild(urunAddSizeSpan);

        row.appendChild(urunAdiDiv);
        row.appendChild(urunVariantNameDiv);
        row.appendChild(urunSlugDiv);
        row.appendChild(urunAdditionalPriceDiv);
        row.appendChild(urunFinalPriceDiv);
        row.appendChild(urunExtraDescriptionDiv);
        row.appendChild(urunPublishDateDiv);
        row.appendChild(urunPStatusDiv);
        row.appendChild(urunAddSizeDiv);

        let hr = document.createElement("hr");
        hr.className = "my-5";
        row.appendChild(hr);

        variants.insertAdjacentElement('afterbegin', row);

        variantCount++;

        feather.replace();

    });

    function createDiv(className)
    {
        let div = document.createElement('div');
        div.className = className;
        return div;
    }

    function createLabel(className, forAttr, textContent)
    {
        let label = document.createElement('label');
        label.className = className;
        label.textContent = textContent;
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

    function createInput(className, id, autocomplete, placeholder, nameAttr, setAttribute = null, type = 'text')
    {
        let input = document.createElement('input');
        input.type = type;
        input.className = className;
        input.id=id;
        input.autocomplete = autocomplete
        input.placeholder= placeholder;
        input.setAttribute('name', nameAttr);

        if (setAttribute != null)
        {
            input.setAttribute(setAttribute[0], setAttribute[1])
        }

        return input;
    }
});
