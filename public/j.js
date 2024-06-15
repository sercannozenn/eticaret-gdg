document.addEventListener('DOMContentLoaded', function ()
{
    let currentPage = 1;
    let currentSortColumn = 'id';
    let currentSortOrder = 'asc';

    function fetchProducts()
    {
        const search = document.getElementById('search').value;
        const url = '';
        // const url = new URL('{{ route('products.data') }}');
        url.searchParams.append('page', currentPage);
        url.searchParams.append('sort_by', currentSortColumn);
        url.searchParams.append('order', currentSortOrder);
        if (search)
        {
            url.searchParams.append('search', search);
        }

        fetch(url)
            .then(response => response.json())
            .then(data =>
                  {
                      populateTable(data.data);
                      setupPagination(data);
                  });
    }

    function populateTable(products)
    {
        const tbody = document.getElementById('productTableBody');
        tbody.innerHTML = '';
        products.forEach(product =>
                         {
                             const tr = document.createElement('tr');
                             tr.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.price}</td>
                    <td>${product.stock}</td>
                `;
                             tbody.appendChild(tr);
                         });
    }

    function setupPagination(data) {
        const pagination = document.querySelector('.pagination');
        pagination.innerHTML = '';

        // Previous page link
        const prevLi = document.createElement('li');
        prevLi.classList.add('page-item');
        if (data.current_page === 1) {
            prevLi.classList.add('disabled');
            prevLi.setAttribute('aria-disabled', 'true');
        } else {
            prevLi.addEventListener('click', function (e) {
                e.preventDefault();
                currentPage = data.current_page - 1;
                fetchProducts();
            });
        }
        prevLi.setAttribute('aria-label', '« Previous');
        prevLi.innerHTML = `<span class="page-link" aria-hidden="true">‹</span>`;
        pagination.appendChild(prevLi);

        // Page number links
        for (let i = 1; i <= data.last_page; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            if (i === data.current_page) {
                li.classList.add('active');
                li.setAttribute('aria-current', 'page');
                li.innerHTML = `<span class="page-link">${i}</span>`;
            } else {
                li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                li.addEventListener('click', function (e) {
                    e.preventDefault();
                    currentPage = i;
                    fetchProducts();
                });
            }
            pagination.appendChild(li);
        }

        // Next page link
        const nextLi = document.createElement('li');
        nextLi.classList.add('page-item');
        if (data.current_page === data.last_page) {
            nextLi.classList.add('disabled');
            nextLi.setAttribute('aria-disabled', 'true');
        } else {
            nextLi.addEventListener('click', function (e) {
                e.preventDefault();
                currentPage = data.current_page + 1;
                fetchProducts();
            });
        }
        nextLi.setAttribute('aria-label', 'Next »');
        nextLi.innerHTML = `<span class="page-link" aria-hidden="true">›</span>`;
        pagination.appendChild(nextLi);
    }


    document.querySelectorAll('th[data-column]').forEach(function (header)
                                                         {
                                                             header.addEventListener('click', function ()
                                                             {
                                                                 const column = this.getAttribute('data-column');
                                                                 const order = this.getAttribute('data-order');
                                                                 currentSortColumn = column;
                                                                 currentSortOrder = order;

                                                                 // Toggle sort order for next click
                                                                 this.setAttribute('data-order', order === 'asc' ? 'desc' : 'asc');

                                                                 fetchProducts();
                                                             });
                                                         });

    document.getElementById('search').addEventListener('input', function ()
    {
        currentPage = 1;
        fetchProducts();
    });

    fetchProducts();
});
