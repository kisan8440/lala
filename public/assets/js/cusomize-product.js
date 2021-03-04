$(function() {

    //Cart functionality
    $('.add-product-to-cart').on('click', function() {

        //Set a loader
        let btn = $(this);
        let loader = '<i class="fa fa-spinner fa-spin"></i> Saving...';
        let addToCart = '<i class="fas fa-shopping-cart"></i> Add to cart ';
        let addedToCart = '<i class="fas fa-check"></i> Added to cart ';

        btn.empty().append(loader);

        //fetching all required data
        // MenuModuleCSL
        let item_csl = $.trim($('#product_csl').val());
        if (item_csl != '') {
            //MenuModuleCode
            let item_type = 'product';
            let total_price = $.trim($('#product-price').text());
            let url = $.trim($('#base_url').val());
            let IsCustomized = 'NO';
            let CustomizedData = $.trim($('#urlPath').val());
            if (CustomizedData != '') {
                IsCustomized = 'YES';
            }
            let Carttype = 'cart';
            let data = {
                'MenuModuleCode': item_type,
                'MenuModuleCSL': item_csl,
                'TotalPrice': total_price,
                'IsCustomized': IsCustomized,
                'CustomizedData': CustomizedData,
                'Carttype': Carttype
            };
            //save data in db

            // check user is login
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let isLogin = false;
            $.ajax({
                url: url + '/auth/is-login',
                success: function(r) {
                    if (r == 1) {
                        isLogin = true;

                        if (isLogin === true) {

                            $.ajax({
                                url: url + '/user/add-to-cart',
                                type: 'post',
                                data: data,
                                success: function(param) {
                                    if (param.type != 'error') {
                                        alert(param.msg);
                                        btn.empty().append(addedToCart);
                                    } else {
                                        alert(param.msg);
                                        btn.empty().append(addToCart);
                                    }
                                },
                                error: function(param) {
                                    alert('Opps! Something went wrong, Try again.');
                                    btn.empty().append(addToCart);
                                }
                            })
                        }
                    } else {
                        alert('Please login first to add data into cart.');
                        btn.empty().append(addToCart);
                    }
                }
            });


        } else {
            alert('Oops! Something went wrong. Try to refresh your page by clicking ctrl + f5.');
        }

    });


    //Onload if customized
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if (urlParams.has('customized')) {
        getAllCustoms();
    }

})

let urlPath = '';

// querydemo = ?customized=true&bom-r=123,234&bom-qty=123___2,234___5&option-added=2345___4,432___1&service-added=44598___2,231___2

//BOM Item removed --- 
function removeBOM(e, csl, bom_r) {

    document.getElementsByName(bom_r)[0].checked = true;
    document.getElementsByClassName('bom-outer-' + csl)[0].remove();
    getAllCustoms();

}

//BOM Item qty changes ---
function changeQTY(e, qty, csl, bom_q, tPrice, basePrice) {

    let q = document.getElementsByName(qty)[0].value;
    q = parseInt(q);
    if (e.classList.contains("qty-reduce")) {
        if (q > 1) {
            q--;
        }
    }
    if (e.classList.contains("qty-increase")) {
        if (q < 100) {
            q++;
        }
    }

    document.getElementsByName(tPrice)[0].innerText = parseFloat(basePrice) * q;
    document.getElementsByName(qty)[0].value = q
    document.getElementsByName(bom_q)[0].value = csl + '___' + q;

    getAllCustoms();
}

//Option Item qty changes ---
function changeItemQTY(e, qty, csl, bom_q, tPrice, basePrice) {

    let q = document.getElementsByName(qty)[0].value;
    q = parseInt(q);
    if (e.classList.contains("qty-reduce")) {
        if (q > 1) {
            q--;
        }
    }
    if (e.classList.contains("qty-increase")) {
        if (q < 100) {
            q++;
        }
    }

    let bp = parseFloat(basePrice);
    let tAmount = bp * q;

    document.getElementsByName(tPrice)[0].innerText = tAmount;
    document.getElementsByName(qty)[0].value = q
    document.getElementsByName(bom_q)[0].value = csl + '___' + q;

    getAllCustoms();

}

//function add optional item
function addItemToBOM(e, checkbox, div_to_bom, total_price_span) {

    let newAdded = document.getElementsByName(total_price_span)[0];
    if (newAdded.classList.contains('opt-items-total-price')) {
        newAdded.classList.add('opt-items-total-price-added');
    } else if (newAdded.classList.contains('ser-items-total-price')) {
        newAdded.classList.add('ser-items-total-price-added');
    }

    document.getElementsByName(checkbox)[0].checked = true;
    document.getElementsByName(e)[0].innerHTML = '<i class="fas fa-check"></i> Added';

    getAllCustoms();

}



// update custom query variable `urlPath` to append into url
function getAllCustoms() {

    resetVars();

    //check removed BOM
    let rm_bom_csl = '';
    let rm_bom = document.getElementsByClassName('bom-r');
    $.each(rm_bom, function() {
        if ($(this).prop('checked')) {
            let bom_csl = $(this).attr('data-target');
            if (rm_bom_csl != '') {
                rm_bom_csl = rm_bom_csl + ',' + bom_csl;
            } else {
                rm_bom_csl = bom_csl;
            }
        }
    });
    //Updating removed bom item in url
    if (rm_bom_csl != '') {
        updateUrlPath('bom-r', rm_bom_csl);
    }


    //Checking updated qty on bom items
    let qty_bom_csl = '';
    let qty_bom = document.getElementsByClassName('bom-q');
    $.each(qty_bom, function() {
        if ($(this).val() != '') {
            let bom_csl = $(this).val();
            if (qty_bom_csl != '') {
                qty_bom_csl = qty_bom_csl + ',' + bom_csl;
            } else {
                qty_bom_csl = bom_csl;
            }
        }
    });
    //Updating bom qty updated in url
    if (qty_bom_csl != '') {
        updateUrlPath('bom-q', qty_bom_csl);
    }

    //Checking updated qty on bom items
    let qty_opt_csl = '';
    let opt_added_checkbox = document.getElementsByClassName('opt-a');
    $.each(opt_added_checkbox, function() {
        if ($(this).prop('checked')) {
            let opt_csl = $(this).next('input').val();
            if (qty_opt_csl != '') {
                qty_opt_csl = qty_opt_csl + ',' + opt_csl;
            } else {
                qty_opt_csl = opt_csl;
            }
        }
    })

    //Updating opt qty updated in url
    if (qty_opt_csl != '') {
        updateUrlPath('option-added', qty_opt_csl);
    }

    //Checking updated service qty on bom items
    let qty_ser_csl = '';
    let ser_added_checkbox = document.getElementsByClassName('ser-a');
    $.each(ser_added_checkbox, function() {
        if ($(this).prop('checked')) {
            let ser_csl = $(this).next('input').val();
            if (qty_ser_csl != '') {
                qty_ser_csl = qty_ser_csl + ',' + ser_csl;
            } else {
                qty_ser_csl = ser_csl;
            }
        }
    })

    //Updating service qty updated in url
    if (qty_ser_csl != '') {
        updateUrlPath('service-added', qty_ser_csl);
    }


    //Set all values n price 
    setAllValues();

}

//checking all Setting values dynamically ---
function setAllValues() {

    let total_product_amount = 0;
    let allDoms = ['bom-items-total-price', 'opt-items-total-price-added', 'ser-items-total-price-added'];
    total_product_amount = parseFloat(total_product_amount);
    //check qty and set price
    $.each(allDoms, function(i, v) {

        let priceDoms = $('.' + v);

        $.each(priceDoms, function(indexInArray, valueOfElement) {
            let c_price = parseFloat($.trim($(this).text()));
            if (c_price != '') {
                total_product_amount = total_product_amount + c_price;
            }
        });

    });
    //Update total price of product
    $('#product-price').empty().append(total_product_amount)

    //Update URI
    processUrlQuery();

}

//Update URI with current variables
function processUrlQuery() {
    document.getElementById('reset-default').style.display = "inline-block";
    document.getElementById('urlPath').value = urlPath;
    window.history.pushState({}, "", urlPath);
}

//Checking query append condition
function appendWith() {
    return (urlPath == '') ? '?customized=true&' : '&';
}

//Update url string when any changes found
function updateUrlPath(q, v) {
    urlPath = urlPath + appendWith() + q + '=' + v;
}

//Reset url path on every event
function resetVars() {
    urlPath = '';
}