window.addEventListener('load', e => {
    const btnLogout = document.querySelector('#btn-logout');
    const btnAddWishList = document.querySelectorAll('.btn-wishlist');
    const form = document.querySelector("#login-form")

    form?.addEventListener('submit', event => {
        event.preventDefault();
        const email = document.querySelector('#email')
        const password = document.querySelector('#password')
        const url = form.action
        const data = new FormData();
        data.append('action', 'auth')
        data.append('user', email.value)
        data.append('password', password.value)
        data.append('local_wishlist', JSON.stringify(getProductFromLocal()))

        if (email.value && password.value) {

            fetch(url + 'api.php', {
                body: data,
                method: 'POST'
            })
                .then(response => response.json())
                .then(response => {
                    location.href = url;
                })
                .catch(error => {
                    alert('bad credential');
                })
        } else {
            alert('bad credential');
        }

    })


    btnLogout?.addEventListener('click', event => {
        event.preventDefault();

        const data = new FormData();
        data.append('action', 'logout')
        const url = 'http://localhost/wishlist/';

        fetch(url + 'api.php', {
            body: data,
            method: 'POST'
        })
            .then(response => response.json())
            .then(response => {
                location.reload()
            })
            .catch(error => {
                alert('bad request');
            })

    })

    btnAddWisthList.forEach(btn => {
        btn.addEventListener('click', event => {
            const id = event.target.dataset.productId;
            const name = event.target.dataset.productName;
            const description = event.target.dataset.productDescription;
            const cost = event.target.dataset.productCost;
            const img = event.target.dataset.productImage;
            const data = new FormData();
            data.append('action', 'add_product_wishlist')
            data.append('id', id)
            const url = 'http://localhost/wishlist/';

            fetch(url + 'api.php', {
                body: data,
                method: 'POST'
            })
                .then(response => response.json())
                .then(response => {
                    if (!response.is_login) {
                        addProductFromLocal(id, name, description, cost, img);
                    }
                    else if(response.is_added){
                        alert('Product added!')
                    }
                    else {
                        alert(`Product not added!, may it's already in the wish list`)
                    }
                })
                .catch(error => {
                    alert('bad request');
                })
        })
    })

    const addEventListenerRemoveButton = () => {
        const btnRemoveWisthList = document.querySelector('#product-wish-list');
        btnRemoveWisthList?.addEventListener('click', event => {
            const id = event.srcElement.dataset.productId;
            if (id) {
                const data = new FormData();
                data.append('action', 'remove_product_wishlist')
                data.append('id', id)
                const url = 'http://localhost/wishlist/';

                fetch(url + 'api.php', {
                    body: data,
                    method: 'POST'
                })
                    .then(response => response.json())
                    .then(response => {
                        if (!response.is_added) {
                            removeProductFromLocal(id)
                            renderProducs(getProductFromLocal())
                        }
                        alert('Product removed!')
                    })
                    .catch(error => {
                        alert('bad request');
                    })
            }
        })
    }
    addEventListenerRemoveButton();

    const loadProducts = () => {
        const data = new FormData();
        data.append('action', 'load_product_wishlist')
        const url = 'http://localhost/wishlist/';

        fetch(url + 'api.php', {
            body: data,
            method: 'POST'
        })
            .then(response => response.json())
            .then(response => {

                if (response.hasOwnProperty('is_login') && !response.is_login) {
                    renderProducs(getProductFromLocal())
                } else {
                    renderProducs(response)
                }
            })
            .catch(error => {
                alert('bad request');
            })

    }

    loadProducts()

    const renderProducs = (products) => {
        const list = document.querySelector('#product-wish-list')
        let template = products.length === 0 ?`
            <div class="col-12">
                <p>No products in the wish list</p>
            </div>
        `  : '';

        products.forEach(product => {
            template += `
            <div class="card mb-3 mr-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img  src="data:image/jpeg;base64, ${product.image}" class="card-img product-image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body align-items-between">
                                    <h5 class="card-title">
                                        ${product.name}
                                    </h5>
                                    <p class="card-text">
                                         ${product.description.substr(0, 90)}
                                    </p>
                                    <div class="d-flex align-items-between justify-content-between mb-0">
                                        <h5 class="card-text text-right text-muted mb-0">$ ${product.cost}</h5>
                                        <button data-product-id="${product.id}"
                                                data-product-name="${product.name}"
                                                data-product-image="${product.image}"
                                                data-product-description="${product.description}"
                                                data-product-cost="${product.cost}"
                                                class="btn btn-primary btn-sm btn-wishlist">Remove to wish list</button>
                                        <a href="http://localhost/wishlist/product_view.php?id=${product.id}" class="btn btn-light btn-sm">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        `;
        });

        if (list) {
            list.innerHTML = template;
        }
    }

    const getProductFromLocal = () => {
        return JSON.parse(localStorage.getItem('local_wish_list'));
    }

    const addProductFromLocal = (id, name, description, cost, img) => {
        let products = getProductFromLocal();

        if (products.find(product => product.id === id)) {
            alert(`Product not added!, may it's already in the wish list`);
        } else {
            products.push({
                id: id,
                name: name,
                description: description,
                cost: cost,
                image: img,
            })
            setProductFromLocal(products);
            alert(`Product added`);
        }
    }

    const removeProductFromLocal = (id) => {
        let products = getProductFromLocal();
        setProductFromLocal(products.filter(product => product.id !== id))
    }

    const createProductFromLocal = () => {
        let products = getProductFromLocal();
        if (!products) {
            setProductFromLocal([]);
        }
    }

    const setProductFromLocal = (products) => {
        localStorage.setItem('local_wish_list', JSON.stringify(products));
    }
    createProductFromLocal();
})