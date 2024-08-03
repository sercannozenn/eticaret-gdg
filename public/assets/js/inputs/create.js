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
