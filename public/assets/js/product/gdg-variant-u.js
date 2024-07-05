document.addEventListener("DOMContentLoaded", function () {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios.defaults.headers.common['Content-Type'] = "application/json";

    var variantCount = 0;
    var variantSizeStockInfo = [];

    let btnSubmit = document.querySelector('#btnSubmit');
    let gdgForm = document.querySelector('#gdgForm');
    let addVariant = document.querySelector('#addVariant');
    let variants = document.querySelector('#variants');
    let typeID = document.querySelector('#type_id');
    let gender = document.querySelector('#gender');

    let productVariantTab = document.querySelector('#productVariantTab');

    const sizeDivKey = "sizeDiv";
    const requiredFields = {
        name: { type: "input" },
        price: { type: "input", data_type: "price" },
        type_id: { type: "select" },
        brand_id: { type: "select" },
        category_id: { type: "select" }
    };
    checkRequireFieldsForProductVariantTab();


    // const sizes = {
    //     1: ['xs', 's', 'm', 'l', 'xl', 'xxl', '3xl', '4xl', '5xl'],
    //     2: Array.from({ length: 31 }, (_, i) => i +20),
    //     3: ['standart'],
    //     4: Array.from({ length: 22 }, (_, i) => 56 + i * 6)
    // };

    const createElement = (tag, className = '', attrs = {}) => {
      let el =   document.createElement(tag);
      el.className = className;
      Object.entries(attrs).forEach(([key, value]) => el.setAttribute(key, value));
      return el;
    };

    const createInput = (className, id, placeholder, name, type = 'text', value = '') =>
        createElement("input", className, {id, placeholder, name, type, value});

    const createDiv = (className, id = '') => createElement('div', className, { id });

    const createLabel = (className, forAttr, textContent = '') => {
        let label = createElement('label', className, { for: forAttr});
        label.textContent = textContent;
        return label;
    };

    const createSelect = (className, id, name, options = [], selectedOption = false) => {
      let select = createElement('select', className, { id, name});
      options.forEach(opt => {
          let attrs = {
           value: opt === 'Beden Seçebilirsiniz' ? '-1' : opt,
          };
          if (selectedOption && opt == selectedOption){
              attrs.selected = ''
          }
          let option = createElement('option', '', attrs);
          option.textContent = opt;
          select.appendChild(option);
      })
        return select;
    };

    prepareInitializeData();
    showErrors();

    btnSubmit.addEventListener('click', function () {
        let { isValid, message } = validateForm();
        gdgForm.submit();

        // if (isValid) {
        //     gdgForm.submit();
        // } else {
        //     Swal.fire({
        //                   title: 'Uyarı!',
        //                   text : message || 'Lütfen gerekli alanları doldurunuz.',
        //                   icon : 'warning'
        //               });
        // }
    });

    addVariant.addEventListener('click', function () {
        createVariant();
    });

    gender.addEventListener('change', function () {
        let childrenTypes = document.querySelectorAll('[is-child]');
        if (this.value == 3 || this.value ==4)
        {
            childrenTypes.forEach(function (element) {
                element.disabled=false;
                                  });
        }else{
            childrenTypes.forEach(function (element) {
                element.disabled=true;
            });
        }
    });
    typeID.addEventListener('change', function () {
        if (typeof productData !== 'undefined'){
            Swal.fire({
                          title: 'Uyarı!',
                          text : 'Ürün türü değişikliği sonrası varyantlarınızın beden bilgilerini güncellemeniz gerekmektedir.',
                          icon : 'warning'
                      });
        }

       document.querySelectorAll(`[id^=${sizeDivKey}]`).forEach(div => div.innerHTML = "");
    });

    document.body.addEventListener('click', function (event) {
        let element = event.target;

        if (element.classList.contains('btn-delete-variant')) {
            let variantID = element.getAttribute("data-variant-id");
            let findDeleteVariantElement = document.querySelector('#row-' + variantID);
            if (findDeleteVariantElement) {
                findDeleteVariantElement.remove();
                variantSizeStockInfo.splice(variantID, 1);
                updateVariantIndexes();
            }
        }

        if (element.classList.contains('btn-size-stock-delete')) {
            let dataSizeStockID = element.getAttribute('data-size-stock-id');
            let findSizeStockDiv = document.querySelector("#sizeStockDeleteGeneral-" + dataSizeStockID);
            if (findSizeStockDiv) {
                findSizeStockDiv.remove();
                updateSizeStockIndexes(dataSizeStockID);
            }
        }

        if (element.classList.contains('btn-add-size')) {
            btnAddSizeAction(element);
        }

        if (element.parentElement.classList.contains('btn-add-size')) {
            btnAddSizeAction(element.parentElement);
        }

        if (element.classList.contains('btn-add-image')) {
            openFileManager(element);
        }

        if (element.classList.contains("delete-variant-image")) {
            deleteVariantImage(element);
        }
    });

    document.body.addEventListener('input', function (event) {
        let element = event.target;


        checkRequireFieldsForProductVariantTab();

        if (element.classList.contains("additional-price-input"))
        {
           calculateFinalPrice(element);
        }

        if (element.id === 'name') {
            changeNameForSlug(element);
        }

        if (element.classList.contains("variant-product-name")) {
            changeVariantProductNameForSlug(element);
        }

        if (element.classList.contains("variant-name")) {
            changeVariantNameForSlug(element);
        }
    });

    document.body.addEventListener('focusout', function (event)
    {
        let element = event.target;

        if (element.classList.contains("product-slug")) {
            let slug = generateSlug(element.value);
            validateSlug(element, slug);
        }
        if (element.classList.contains("variant-product-name") || element.classList.contains("variant-name"))
        {
            let variantID = element.id.split("-")[1];
            let slugInput = document.querySelector("#slug-" + variantID);

            let slug = generateSlug(slugInput.value);
           validateSlug(element, slug);
        }
    });

    function createVariant(variant = {}, isEdit = false)
    {


        let row = createDiv("row variant", `row-${variantCount}`);

        let variantDeleteDiv = createDiv('col-md-12 mb-1');
        let variantDeleteAElement = createElement("a", "btn-delete-variant btn btn-danger col-3", { href: 'javascript:void(0)', 'data-variant-id': variantCount })
        variantDeleteAElement.textContent = "Varyant Kaldır";
        let hr = createElement('hr', 'my-2');
        variantDeleteDiv.appendChild(variantDeleteAElement);
        variantDeleteDiv.appendChild(hr);
        row.appendChild(variantDeleteDiv);

        let inputName = document.querySelector('#name');
        let nameSLug = generateSlug(inputName.value);

        let fields = [
            { id: 'name', label: 'Ürün Adı', className: 'variant-product-name', colClass: "col-md-4 mb-4", value: variant.name || ''},
            { id: 'variant_name', label: 'Ürün Varyant Adı', className: 'variant-name', colClass: "col-md-4 mb-4", value: variant.variant_name || ''},
            { id: 'slug', label: 'Slug', className: 'product-slug', colClass: "col-md-4 mb-4", value: variant.slug || nameSLug},
            { id: 'additional_price', label: 'Fiyat', className: 'additional-price-input', colClass: "col-md-6 mb-4", dataAttr: { 'data-variant-id' : variantCount }, type: "number", value: variant.additional_price || ''},
            { id: 'final_price', label: 'Son Fiyat', className: 'readonly', colClass: "col-md-6 mb-4", readonly: true, value: variant.final_price || document.querySelector('#price').value },
            { id: 'extra_description', label: 'Ekstra Açıklama', className: '', colClass: "col-md-12 mb-4", value: variant.extra_description || ''},
            { id: 'publish_date', label: 'Yayınlanma Tarihi', className: '', colClass: "col-md-12 mb-4", date: true,  value: variant.publish_date || ''},
            { id: 'p_status', label: 'Aktif mi?', className: '', colClass: "col-md-6 mb-4", checkbox: true, value: 1, checked: variant.status || variant.p_status || false },
        ];

        fields.forEach(field => {
            let colDiv = createDiv(field.colClass);
            colDiv.appendChild(createLabel("form-label", `${field.id}-${variantCount}`, field.label));
            let input;
            if (field.checkbox){
                input = createInput("form-check-input " + field.className, `${field.id}-${variantCount}`, '', `variant[${variantCount}][${field.id}]`, 'checkbox', field.value || '');
                if (field.checked) input.checked = true;
                colDiv.appendChild(input);
            }else if (field.date){
                input = createInput("form-control " + field.className, `${field.id}-${variantCount}`, field.label, `variant[${variantCount}][${field.id}]`, 'text', field.value || '');
                input.setAttribute('data-input', "");
                let span = createElement('span', 'input-group-text input-group-addon', {'data-toggle' : ''});
                span.innerHTML = '<i data-feather="calendar"></i>';
                let dateDiv = createDiv('input-group flatpickr flatpickr-date');
                dateDiv.appendChild(input);
                dateDiv.appendChild(span);
                colDiv.appendChild(dateDiv);
            }else{
                input = createInput("form-control " + field.className, `${field.id}-${variantCount}`, field.label, `variant[${variantCount}][${field.id}]`, field.type || 'text', field.value || '');
                if (field.dataAttr) Object.entries(field.dataAttr).forEach(([key, value]) => input.setAttribute(key, value));
                if (field.readonly) { input.readOnly = true; input.classList.add('readonly'); }
                colDiv.appendChild(input);
            }
            row.appendChild(colDiv);
        });
        if (isEdit){
            console.log("variant");
            console.log(variant);
            var variantIDElement = createInput('', `variant-index-${variantCount}`, '', `variant[${variantCount}][variant_index]`, 'hidden', variant.id);
            row.appendChild(variantIDElement);
        }else{
            console.log(variant, "isEdit");
        }

        let urunAddSizeDiv = createDiv("row");
        let urunAddSizeSpan   = createElement("span", 'ms-2');
        urunAddSizeSpan.textContent='Beden Ekle'
        let urunAddSizeiElement   = createElement("i", 'add-size', { 'data-feather': 'plus-circle'});
        let urunAddSizeAElement   = createElement("a", 'btn-add-size col-md-12', { href: 'javascript:void(0)', 'data-variant-id': variantCount});
        urunAddSizeAElement.appendChild(urunAddSizeiElement);
        urunAddSizeAElement.appendChild(urunAddSizeSpan);

        let urunAddSizeIElementImage = createElement('i', 'add-size', { 'data-feather': 'image'})
        let images = variant.image || variant.variant_images || '';
        if (isEdit && variant.variant_images) {
            images = '';
            variant.variant_images.forEach(function (item) {
                                               images = images + item.path + ',';
            });
        }

        console.log(images);
        let imageDataInputElement = createInput("form-control", `data-input-${variantCount}`, '', `variant[${variantCount}][image]`, 'hidden', images );
        let imageDataPreviewElement = createDiv('col-md-12',`data-preview-${variantCount}` );

        let urunAddSizeAElementImage = createElement("a", "btn btn-info btn-add-image mb-4", {href: "javascript:void(0)", 'data-variant-id': variantCount, 'data-input': "data-input-" + variantCount, 'data-preview': "data-preview-" + variantCount });
        urunAddSizeAElementImage.textContent = "Görsel Ekle";
        let urunAddSizeAElementDiv = createDiv("col-md-12");

        urunAddSizeAElementImage.appendChild(urunAddSizeIElementImage);
        urunAddSizeAElementDiv.appendChild(urunAddSizeAElementImage);

        urunAddSizeDiv.appendChild(urunAddSizeAElementDiv);
        urunAddSizeDiv.appendChild(imageDataInputElement);
        urunAddSizeDiv.appendChild(imageDataPreviewElement);
        urunAddSizeDiv.appendChild(urunAddSizeAElement);

        let urunAddSizeGeneralDiv = createDiv("col-md-12 p-0 mb-3", sizeDivKey + variantCount);

        row.appendChild(urunAddSizeDiv);
        row.appendChild(urunAddSizeGeneralDiv);

        let hr2 = createElement('hr', 'my-5');
        row.appendChild(hr2);

        variants.insertAdjacentElement('afterbegin', row);

        try{
            if (!isObjectEmpty(variant) && variant.hasOwnProperty('size') && variant.size && variant.hasOwnProperty('stock') && variant.stock){
                setSizeStock(variant);
            } else if (!isObjectEmpty(variant) && variant.hasOwnProperty('size_stock') && variant.size_stock) {
                setSizeStock(variant, true);
            }

            if (!isObjectEmpty(variant) && variant.hasOwnProperty('image') && variant.image && variant.image.length) {
                oldVariantImageViewer(variant.image, variant.featured_image, variantCount, false);
            }else if (!isObjectEmpty(variant) && variant.hasOwnProperty('variant_images') && variant.variant_images){
                console.log("oldVariantImageViewer gönderme", variant);
                oldVariantImageViewer(variant.variant_images, '', variantCount, true);
            }
        }catch (exception) {
            console.log(variant);
            console.log(exception);
        }

        variantCount++;
        feather.replace();
        flatpickr(".flatpickr-date", {
            wrap      : true,
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    }
    function updateVariantIndexes()
    {
        let allVariants = Array.from(document.querySelectorAll('.row.variant')).reverse();

        const attributesToUpdate = [
            { selector: '[data-variant-id]',  attr: 'data-variant-id', prefix: '' },
            { selector: '[for^="name-"]',  attr: 'for', prefix: 'name-' },
            { selector: '[id^="name-"]',  attr: 'id', prefix: 'name-', name: true },
            { selector: '[for^="variant_name-"]',  attr: 'for', prefix: 'variant_name-' },
            { selector: '[id^="variant_name-"]',  attr: 'id', prefix: 'variant_name-', name: true },
            { selector: '[for^="slug-"]',  attr: 'for', prefix: 'slug-' },
            { selector: '[id^="slug-"]',  attr: 'id', prefix: 'slug-', name: true },
            { selector: '[for^="additional_price-"]',  attr: 'for', prefix: 'additional_price-' },
            { selector: '[id^="additional_price-"]',  attr: 'id', prefix: 'additional_price-', name: true },
            { selector: '[for^="final_price-"]',  attr: 'for', prefix: 'final_price-' },
            { selector: '[id^="final_price-"]',  attr: 'id', prefix: 'final_price-', name: true },
            { selector: '[for^="extra_description-"]',  attr: 'for', prefix: 'extra_description-' },
            { selector: '[id^="extra_description-"]',  attr: 'id', prefix: 'extra_description-', name: true },
            { selector: '[for^="publish_date-"]',  attr: 'for', prefix: 'publish_date-' },
            { selector: '[id^="publish_date-"]',  attr: 'id', prefix: 'publish_date-', name: true },
            { selector: '[for^="p_status-"]',  attr: 'for', prefix: 'p_status-' },
            { selector: '[id^="p_status-"]',  attr: 'id', prefix: 'p_status-', name: true },
            { selector: '[for^="size-"]',  attr: 'for', prefix: 'size-' },
            { selector: '[id^="size-"]',  attr: 'id', prefix: 'size-', name: true },
            { selector: '[id^="sizeDiv"]',  attr: 'id', prefix: 'sizeDiv' },
            { selector: '[for^="stock-"]',  attr: 'for', prefix: 'stock-' },
            { selector: '[id^="stock-"]',  attr: 'id', prefix: 'stock-', name: true },
            { selector: '[id^="sizeStockDeleteGeneral-"]',  attr: 'id', prefix: 'sizeStockDeleteGeneral-', special: true },
            { selector: '[for^="radio-"]',  attr: 'for', prefix: 'radio-', special: true },
            { selector: '[id^="radio-"]',  attr: 'id', prefix: 'radio-', name: true, special: true },
            { selector: '[id^="data-input-"]',  attr: 'id', prefix: 'data-input-', special: true },
            { selector: '[id^="sizeStockDelete-"]',  attr: 'data-size-stock-id', prefix: 'sizeStockDelete-', special: true },
            { selector: '[id^="variant-index-"]',  attr: 'name', prefix: 'variant-index-', name: 'variant_index', special: true },

        ];
        allVariants.forEach((variant, index) => {
                                variant.id = `row-${index}`;
            attributesToUpdate.forEach(({ selector, attr, prefix, name, special }) => {
               variant.querySelectorAll(selector).forEach(element => {
                  if (special && attr === 'id' && selector === '[id^="sizeStockDeleteGeneral-"]'){
                      let [_,oldVariantID, stockID] = element.getAttribute(attr).split('-');
                      element.id = `${prefix}${index}-${stockID}`;
                      element.classList.replace(`size-stock-${oldVariantID}`, `size-stock-${index}`);
                      element.querySelectorAll('[for^="size-"]').forEach(e => e.setAttribute('for', `size-${index}-${stockID}`));
                      element.querySelectorAll('[id^="size-"]').forEach(e => {
                          e.id = `size-${index}-${stockID}`;
                          e.setAttribute('name', `variant[${index}][size][${stockID}]`);
                      });

                      element.querySelectorAll('[for^="stock-"]').forEach(e => e.setAttribute('for', `stock-${index}-${stockID}`));
                      element.querySelectorAll('[id^="stock-"]').forEach(e => {
                          e.id = `stock-${index}-${stockID}`;
                          e.setAttribute('name', `variant[${index}][stock][${stockID}]`);
                      })
                  }else if(special && selector === '[for^="radio-"]'){
                      let [_, __, imageID] = element.getAttribute(attr).split("-");
                      element.setAttribute(attr, `${prefix}${index}-${imageID}`);
                  }else if (special && selector === '[id^="radio-"]') {
                      let [_, __, imageID] = element.getAttribute(attr).split("-");
                      element.id = `${prefix}${index}-${imageID}`;
                      element.setAttribute("name", `variant[${index}][featured_image]`);
                  }
                  else if (special && selector === '[id^="sizeStockDelete-"]') {
                      let [_, size] = element.getAttribute(attr).split('-');
                      element.id = `${prefix}${index}-${size}`;
                      element.setAttribute(attr, `${index}-${size}`);
                  }else if(special && selector === '[id^="data-input-"]') {
                      element.id = `${prefix}${index}`;
                      element.name = `variant[${index}][image]`;
                  } else if(special && selector === '[id^="variant-index-"]'){
                      element.id = `${prefix}${index}`;
                      element.setAttribute(attr, `variant[${index}][${name}]`);
                  }else{
                      element.setAttribute(attr, `${prefix}${index}`);
                      if (name) element.setAttribute('name', `${name === true ? `variant[${index}][${prefix.slice(0,-1)}]` : `${name}[${index}]` }`);
                  }
               });
            });
        });
        variantCount--;
    }
    function updateSizeStockIndexes(dataSizeStockID)
    {
        let [variantID, sizeStockID] = dataSizeStockID.split("-");
        variantSizeStockInfo[variantID].size_stock -=1;

        let allSizeStock = document.querySelectorAll('.row.size-stock-' + variantID);
        allSizeStock.forEach((variant, index) => {
            let id = variantID + "-" + index;
            variant.id = "sizeStockDeleteGeneral-" + id;

            variant.querySelectorAll('[for^="size-"]').forEach(element => element.setAttribute('for', ("size-" + id)));
            variant.querySelectorAll('[id^="size-"]').forEach(element => {
                                                                  element.id = "size-" + id;
                                                                  element.setAttribute("name", "variant[" + variantID + "][size][" + index + "]")
                                                              });
            variant.querySelectorAll('[for^="stock-"]').forEach(element =>  element.setAttribute('for', ("stock-" + id)));
            variant.querySelectorAll('[id^="stock-"]').forEach(element => {
                                                                   element.id = "stock-" + id;
                                                                   element.setAttribute("name", "variant[" + variantID + "][stock][" + index + "]")
                                                               });
            variant.querySelectorAll('[id^="sizeStockDelete-"]').forEach(element => {
                                                                             element.id = "sizeStockDelete-" + id;
                                                                             element.setAttribute("data-size-stock-id", id);
                                                                         });
        });
    }
    function btnAddSizeAction(element, sizeValue = null, stockValue = null)
    {
        let dataVariantID = element.getAttribute("data-variant-id");
        let sizeStock = variantSizeStockInfo[dataVariantID]?.size_stock || 0;
        let productSize = sizes[typeID.value];
        let options = ["Beden Seçebilirsiniz", ...productSize];
        let divID = sizeDivKey + dataVariantID;
        let findDiv = document.querySelector("#" + divID);

        let urunSizeID = 'size-' + dataVariantID + '-' + sizeStock;
        let urunSizeDiv = createDiv("col-md-5 mb-4 px-3")
        let urunSizeLabel = createLabel("form-label", urunSizeID, "Beden");

        let urunSizeSelect = createSelect("form-control", urunSizeID, `variant[${dataVariantID}][size][${sizeStock}]`, options, sizeValue || null);
        urunSizeDiv.appendChild(urunSizeLabel);
        urunSizeDiv.appendChild(urunSizeSelect);

        let urunStockID = 'stock-' + dataVariantID + '-' + sizeStock;
        let urunStockDiv = createDiv("col-md-5 mb-4 px-3")
        let urunStockLabel = createLabel("form-label", urunStockID, "Stok Sayısı");
        let urunStockInput = createInput("form-control", urunStockID, 'Stok Sayısı', `variant[${dataVariantID}][stock][${sizeStock}]`, 'number', stockValue || null);

        urunStockDiv.appendChild(urunStockLabel);
        urunStockDiv.appendChild(urunStockInput);

        let generalDivID = "sizeStockDeleteGeneral-" + dataVariantID + "-" + sizeStock;
        let urunSizeStockGeneralDivClass = "row mx-0 size-stock-" + dataVariantID;
        let urunSizeStockGeneralDiv = createDiv(urunSizeStockGeneralDivClass, generalDivID)

        let urunSizeStockDeleteDiv = createDiv("col-md-2 mb-4 px-3")
        let aElementID = "sizeStockDelete-" + dataVariantID + "-" + sizeStock;
        let urunSizeStokDeleteAElement = createElement("a", 'btn btn-danger w-100 btn-size-stock-delete', {id: aElementID, href: 'javascript:void(0)', 'data-size-stock-id': dataVariantID + '-' + sizeStock,});
        urunSizeStokDeleteAElement.textContent = 'Beden Sil';
        let urunSizeStokDeleteAElementLabel = createLabel("form-label d-block");
        urunSizeStokDeleteAElementLabel.innerHTML = '&nbsp;'
        urunSizeStockDeleteDiv.appendChild(urunSizeStokDeleteAElementLabel);
        urunSizeStockDeleteDiv.appendChild(urunSizeStokDeleteAElement);

        urunSizeStockGeneralDiv.appendChild(urunSizeDiv);
        urunSizeStockGeneralDiv.appendChild(urunStockDiv);
        urunSizeStockGeneralDiv.appendChild(urunSizeStockDeleteDiv);

        findDiv.appendChild(urunSizeStockGeneralDiv);

        variantSizeStockInfo[dataVariantID] = { 'size_stock' : sizeStock + 1};
    }

    function openFileManager(element)
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
            file_path = file_path + ",";

            // set the value of the desired input to image url
            target_input.value = file_path;
            target_input.dispatchEvent(new Event('change'));

            // clear previous preview
            target_preview.innerHTML = '';

            // set or change the preview image src
            selectedVariantImage(items, variantID, target_preview);

            target_preview.dispatchEvent(new Event('change'));
        }
    }
    function deleteVariantImage(element)
    {
        let variantID = element.getAttribute("data-variant-id");
        let dataUrl = element.getAttribute("data-url") + ",";
        let dataImageIndex = element.getAttribute("data-image-index");

        let dataInputFind = document.querySelector("#data-input-" + variantID);
        dataInputFind.value =  dataInputFind.value.replace(dataUrl, "");

        let findImageContainer = document.querySelector("#image-container-" + variantID + "-" + dataImageIndex);
        findImageContainer.remove();

        let dataPreview = document.querySelector('#data-preview-' + variantID);
        let imageContainers = dataPreview.querySelectorAll('.image-container');

        imageContainers.forEach((container, index) => {
                                    let variantIndex = variantID + "-" + index;
                                    container.id = "image-container-" + variantIndex;

                                    container.querySelectorAll('[id^="radio-"]').forEach(element => element.id = `radio-${variantIndex}`);
                                    container.querySelectorAll('[for^="radio-"]').forEach(element => element.setAttribute('for', ("radio-" + variantIndex)));
                                    container.querySelectorAll('svg').forEach(element => element.setAttribute('data-image-index', index));
                                });
    }
    function calculateFinalPrice(element)
    {
        let variantID = element.getAttribute("data-variant-id");
        let findFinalPriceElement = document.querySelector("#final_price-" + variantID);
        let priceValue = document.querySelector('#price').value;
        findFinalPriceElement.value = Number(priceValue) + Number(element.value);
    }

    function checkRequireFieldsForProductVariantTab()
    {
        let requiredFieldStatus = true;

        for (const [key, properties] of Object.entries(requiredFields)) {
            let keyElement = document.querySelector('#' + key);
            let keyElementValue = keyElement.value;

            if (properties.type === 'input') {
                if (keyElementValue.length < 2) {
                    requiredFieldStatus = false;

                } else if (properties.hasOwnProperty('data_type') && properties.data_type === 'price' && (isNaN(keyElementValue) || keyElementValue < 0)) {
                    requiredFieldStatus = false;
                }
            } else if (properties.type === 'select' && keyElementValue === '-1') {
                requiredFieldStatus = false;
            }
        }

        if (requiredFieldStatus) {
            productVariantTab.removeAttribute('disabled');
        } else {
            productVariantTab.setAttribute('disabled', '');
        }
    }

    function changeNameForSlug(element)
    {
        let slugInputs = document.querySelectorAll(".product-slug");
        slugInputs.forEach(function (slugInput) {
            let variantID = slugInput.id.split("-")[1];
            let findVariantProductName = document.querySelector("#name-" + variantID).value;
            let findVariantName = document.querySelector("#variant_name-" + variantID).value;
            let slug = element.value + "-" + findVariantName;

            if (findVariantProductName.trim() !== "") {
                slug = findVariantProductName + "-" + findVariantName
            }
            slugInput.value = generateSlug(slug);
        });
    }
    function changeVariantProductNameForSlug(element)
    {
        let variantID = element.id.split("-")[1];
        let findVariantName = document.querySelector("#variant_name-" + variantID).value;
        let slugInput = document.querySelector("#slug-" + variantID);
        let nameInput = document.querySelector("#name").value.trim();
        let slug = nameInput + "-" + findVariantName;
        if (element.value.trim() !== '') {
            slug = element.value.trim() + "-" + findVariantName;
        }
        slugInput.value = generateSlug(slug);
    }

    function changeVariantNameForSlug(element)
    {
        console.log(element);
        let variantID = element.id.split("-")[1];
        let findVariantProductName = document.querySelector("#name-" + variantID).value;
        let slugInput = document.querySelector("#slug-" + variantID);
        let nameInput = document.querySelector("#name").value;
        let variantName = element.value.trim();
        let slug = nameInput + "-" + variantName;

        if (findVariantProductName.trim() !== '') {
            slug = findVariantProductName + "-" + variantName;
        }
        slugInput.value = generateSlug(slug);
    }

    function generateSlug(slug)
    {
        const turkishMap = {
            "ç": "c", "ğ": "g", "ş": "s", "ü": "u", "ö": "o", "ı": "i",
            "İ": "i", "Ç": "c", "Ğ": "g", "Ş": "s", "Ü": "u", "Ö": "o"
        };
        slug = slug.toLowerCase().replace(/[çşğüöıİÇŞĞÜÖ]/g, match => turkishMap[match]);
        slug = slug.replace(/[\s\W-]+/g, '-').replace(/^-+|-+$/g, '');
        return slug;
    }
    function validateSlug(element, slug)
    {
        let response = checkSlug(slug);
        element.classList.remove("is-invalid")
        if (response != null)
        {
            element.classList.add("is-invalid")
        }
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
        let genderSelect = document.querySelector('#gender');

        if (!nameInput.value.trim()) {
            isValid = false;
            nameInput.classList.add("is-invalid");
        } else {
            nameInput.classList.remove("is-invalid");
        }

        if (!priceInput.value.trim() || isNaN(priceInput.value) || priceInput.value < 1) {
            isValid = false;
            priceInput.classList.add("is-invalid");
        } else {
            priceInput.classList.remove("is-invalid");
        }
        if (typeSelect.value === '-1') {
            isValid = false;
            typeSelect.classList.add("is-invalid");
        } else {
            typeSelect.classList.remove("is-invalid");
        }

        if (brandSelect.value.trim() === '-1') {
            isValid = false;
            brandSelect.classList.add("is-invalid");
        } else {
            brandSelect.classList.remove("is-invalid");
        }

        if (categorySelect.value.trim() === '-1') {
            isValid = false;
            categorySelect.classList.add("is-invalid");
        } else {
            categorySelect.classList.remove("is-invalid");
        }

        if (genderSelect.value.trim() === '-1') {
            isValid = false;
            genderSelect.classList.add("is-invalid");
        } else {
            genderSelect.classList.remove("is-invalid");
        }

        let variantElements = Array.from(document.querySelectorAll(".row.variant")).reverse();
        if (variantElements.length < 1) {
            isValid = false;
            message = "En az bir varyant eklemelisiniz";
        }

        variantElements.forEach((variant, index) => {
            let variantNameInput = variant.querySelector(`#variant_name-${index}`);
            let slugInput = variant.querySelector(`#slug-${index}`);
            let finalPriceInput = variant.querySelector(`#final_price-${index}`);
            let imageDataInput = variant.querySelector(`#data-input-${index}`);

            if (!variantNameInput.value.trim()) {
                isValid = false;
                variantNameInput.classList.add("is-invalid");
            } else {
                variantNameInput.classList.remove("is-invalid");
            }

            if (!slugInput.value.trim()) {
                isValid = false;
                slugInput.classList.add("is-invalid");
            } else {
                slugInput.classList.remove("is-invalid");
            }

            if (!finalPriceInput.value.trim()) {
                isValid = false;
                finalPriceInput.classList.add("is-invalid");
            } else {
                finalPriceInput.classList.remove("is-invalid");
            }

            if (!imageDataInput.value.trim()) {
                isValid = false;
                imageDataInput.classList.add("is-invalid");
                message = "Lütfen varyantlara görsel seçiniz.";
            } else {
                imageDataInput.classList.remove("is-invalid");
            }
            let sizeInputs = variant.querySelectorAll(`[id^="size-${index}"]`);
            let stockInputs = variant.querySelectorAll(`[id^="stock-${index}"]`);

            if (sizeInputs.length < 1) {
                isValid = false;
                message = "Lütfen varyantlara beden ekleyiniz.";
            }
            sizeInputs.forEach(input => {
                                   if (input.value === '-1') {
                                       isValid = false;
                                       input.classList.add("is-invalid");
                                   } else {
                                       input.classList.remove("is-invalid");
                                   }
            });
            stockInputs.forEach(input => {
                                    if (!input.value.trim()) {
                                        isValid = false;
                                        input.classList.add("is-invalid");
                                    } else {
                                        input.classList.remove("is-invalid");
                                    }
            });
        });
        return {isValid, message};
    }

    function checkSlug(slug)
    {
        return axios.post(checkSlugRoute, {
            slug
        });
    }

    function selectedVariantImage(items, variantID, target_preview)
    {
        items.forEach(function (item, index)
                      {
                          let container = createDiv("image-container", `image-container-${variantID}-${index}`);
                          let radio = createInput("", `radio-${variantID}-${index}`, '', `variant[${variantID}][featured_image]`, 'radio', item.url);
                          if (item.is_featured || index === 0) radio.checked = true;

                          let iElement = createElement("i", "delete-variant-image", {"data-feather": "x", "data-url": item.url, "data-variant-id": variantID, "data-image-index": index});

                          let label = createLabel("", `radio-${variantID}-${index}`);

                          let img = createElement("img", "", {style: "height: 5rem", 'src': item.url})

                          label.appendChild(img);
                          container.appendChild(radio);
                          container.appendChild(label);
                          container.appendChild(iElement);
                          target_preview.appendChild(container);
                          feather.replace();
                      });
    }

    function oldVariantImageViewer(oldImages = '', featuredImagePath = '', index, isEdit = false)
    {
        console.log("oldVariantImageViewer");
        let finalImages = [];
        let target_preview = document.querySelector('#data-preview-' + index);

        if (oldImages.length && oldImages !== '' && !isEdit) {
            let images = oldImages.split(",");
            images.pop();
            images.forEach(function (item, index) {
                               finalImages.push({url: item, is_featured: item === featuredImagePath })
                           });
        } else if (isEdit) {
            console.log(oldImages);
            oldImages.forEach(function (item, index) {
                finalImages.push({url: item.path, is_featured: Boolean(item.is_featured) })
            });
        }
        else{
            console.log("oldVariantImageViewer --- Else");
        }

        if (finalImages.length) selectedVariantImage(finalImages, index, target_preview);


    }

    function showErrors()
    {
        for (let key in displayErrors){
            let nameAttribute = key;
            if (displayErrors.hasOwnProperty(key)) {
                let explode = nameAttribute.split('.');
                // variant[0][variant_name]
                // variant.0.variant_name
                for (let i = 0; i < explode.length; i++){
                    if (i !== 0) explode[i] = `[${explode[i]}]`;
                }
                nameAttribute = explode.join('');

                let element = document.querySelector(`[name="${nameAttribute}"]`);

                if (element && key.indexOf('image') < 0){
                    element.classList.add('is-invalid');
                    let errorDiv = createDiv("invalid-feedback d-block");
                    errorDiv.textContent = displayErrors[key][0];
                    element.parentElement.appendChild(errorDiv);
                }else if (element && key.indexOf('[image]')){
                        Swal.fire({
                                      title: 'Uyarı!',
                                      text : 'Varyantlarınıza en az bir görsel seçmelisiniz.',
                                      icon : 'warning'
                                  });
                        element.parentElement.parentElement.classList.add("border");
                        element.parentElement.parentElement.classList.add("border-danger");
                        let  divElement = createDiv('text-danger', '');
                        divElement.textContent = "Lütfen varyanta görsel seçin";
                        let [_, __, elementVariantID] = element.id.split("-");
                        let findBtnAddImageElement = document.querySelector(`.btn-add-image[data-input="data-input-${elementVariantID}"]`);
                        findBtnAddImageElement.insertAdjacentElement('afterend', divElement);

                }
            }
        }
    }

    function initializeValue(isEdit = false)
    {
        if (typeof initializeData !== 'undefined' && initializeData !== null) {
            initializeData = Object.entries(initializeData);
            console.log("Veri", initializeData);
            initializeData.forEach(function ([index, variant]) {
                if (isEdit) {
                    if (productData['variants'].hasOwnProperty(index) && productData['variants'][index].hasOwnProperty("id")) {
                        variant.id = productData['variants'][index]['id'];
                        createVariant(variant, true);
                    }else{
                        createVariant(variant, false);
                    }
                }else{
                    createVariant(variant, false);
                }
            });
        }

    }

    function isObjectEmpty(object)
    {
        return  Object.entries(object).length === 0;
    }

    function setSizeStock(variant, isEdit = false)
    {
        let btnAddSizeElement = document.querySelector('[data-variant-id="' + variantCount + '"]');

        if (!isEdit) {
            variant.size.forEach(function (size, index) {
                let stock = variant.stock[index];
                btnAddSizeAction(btnAddSizeElement, size, stock);
            });
        }else{
            variant.size_stock.forEach(function (item, index) {
                let stock = item.stock;
                let size = item.size;
                btnAddSizeAction(btnAddSizeElement, size, stock);
            });
        }
    }

    function setVariantImage(variant, isEdit = false)
    {
        if (!isEdit){
            oldVariantImageViewer(variant.image, variantCount);
        }else{

        }
    }

    function prepareInitializeData()
    {
        if (initializeData && typeof productData !== 'undefined'){
            initializeValue(true);
        } else if (initializeData){
            initializeValue();
        } else if (typeof productData !== 'undefined'){
            let variants = productData.variants;
            variants.forEach(function (variant, index) {
                createVariant(variant, true)
            });
        }
    }
});
