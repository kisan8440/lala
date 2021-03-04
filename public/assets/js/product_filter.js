// const { max } = require("lodash");

$(function() {

    //Tooltip
    $('[data-toggle="tooltip"]').tooltip()

    //Toggle filter bar
    $('.toggle-filter-box-button').on('click', function() {
        $('.toggle-filter-box-button').toggleClass('active');
        $('.products-box .filter-box').toggleClass('active');
    });

    //ToggleFilter bar options
    $('.filter-type.dd').on('click', function() {
        $(this).toggleClass('active');
    });

    //Price range selector
    $("#slider-range").slider({
        range: true,
        min: 1,
        max: 10000000,
        values: [10, 10000000],
        slide: function(event, ui) {
            $("#amount").val("Rs." + ui.values[0] + " - Rs." + ui.values[1]);
            getFilterQuery();
        }
    });
    $("#amount").val(
        "Rs." + $("#slider-range").slider("values", 0) + " - Rs." + $("#slider-range").slider("values", 1)
    );


    //Check if URL query has price variable
    var winQueryStringUrl = window.location.href.split('?')[1];
    if (winQueryStringUrl != '') {
        var urlParamsForPrice = new URLSearchParams(window.location.search);
        if (urlParamsForPrice.has('price')) {
            var fPrice = urlParamsForPrice.get('price');
            fPrice = fPrice.split(',');

            //Set filter range slider value
            var min = fPrice[0];
            var max = fPrice[1];

            $("#amount").val("Rs." + min + " - Rs." + max);
            $("#slider-range").slider("option", "values", [min, max]);

        }
    }


    //Invoke filter query
    //Category
    $('input[name="category"]').on('change', function() {
        getFilterQuery();
    });
    //Subcategory
    $('input[name="subCategory"]').on('change', function() {
        getFilterQuery();
    });
    //OEM
    $('input[name="oem"]').on('change', function() {
        getFilterQuery();
    });
    //OEM SERIES
    //filter parama
    $('input[name="ProductParameter"]').on('change', function() {
        getFilterQuery();
    });
    // end filer params

    $('input[name="oemseries"]').on('change', function() {
        getFilterQuery();
    });
    //Price range slider
    $("#slider-range").on("slidestop", function(event, ui) {
        getFilterQuery();
    });

    //sorting query 
    //Price sort filter
    $('input[name="price_sort_filter"]').on('change', function() {
        getFilterQuery();
    });
    //Name sort filter
    $('input[name="name_sort_filter"]').on('change', function() {
        getFilterQuery();
    });
    //Newest item first
    $('input[name="newest_sort_filter"]').on('change', function() {
        getFilterQuery();
    });


})

function getFilterQuery() {

    var filterLoader = $('.filter-loader');

    if (!filterLoader.hasClass('active')) {
        filterLoader.addClass('active');
    }

    var queryString = '';

    //Get selected Category            
    var cat = '';
    var categorySelected = $('input[name="category"]');
    categorySelected.each(function() {
        if ($(this).is(':checked')) {
            if (cat != '') {
                cat = cat + ',' + $(this).val();
            } else {
                cat = $(this).val();
            }
        }
    });

    //Get selected Subcategory
    var subCat = '';
    var subCategorySelected = $('input[name="subCategory"]');
    subCategorySelected.each(function() {
        if ($(this).is(':checked')) {
            if (subCat != '') {
                subCat = subCat + ',' + $(this).val();
            } else {
                subCat = $(this).val();
            }
        }
    });

    //Get selected oem
    var oem = '';
    var oemSelected = $('input[name="oem"]');
    oemSelected.each(function() {
        if ($(this).is(':checked')) {
            if (oem != '') {
                oem = oem + ',' + $(this).val();
            } else {
                oem = $(this).val();
            }
        }
    });

    //Get selected oemseries
    var oemseries = '';
    var oemseriesSelected = $('input[name="oemseries"]');
    oemseriesSelected.each(function() {
        if ($(this).is(':checked')) {
            if (oemseries != '') {
                oemseries = oemseries + ',' + $(this).val();
            } else {
                oemseries = $(this).val();
            }
        }
    });



    //Concatenating queries
    //category
    if (queryString != '') {
        if (cat != '') {
            queryString = queryString + '&' + 'category=' + cat;
        }
    } else {
        if (cat != '') {
            queryString = 'category=' + cat;
        }
    }

    //SubCategory 
    if (queryString != '') {
        if (subCat != '') {
            queryString = queryString + '&' + 'subCategory=' + subCat;
        }
    } else {
        if (subCat != '') {
            queryString = 'subCategory=' + subCat;
        }
    }




    //Get price range
    var priceRange = '';
    var priceRangeSelected = $('#amount').val();;
    if (priceRangeSelected != '') {

        priceRangeSelected = priceRangeSelected.split(' - Rs.');
        var max = (priceRangeSelected[1]) ? priceRangeSelected[1] : 10;
        var min = (priceRangeSelected[0].split('Rs.')[1]) ? priceRangeSelected[0].split('Rs.')[1] : 10000000;

        priceRange = min + ',' + max;

        if (!isNaN(min) && !isNaN(max)) {
            if (queryString != '') {
                if (priceRange != '') {
                    queryString = queryString + '&' + 'price=' + priceRange;
                }
            } else {
                if (priceRange != '') {
                    queryString = 'price=' + priceRange;
                }
            }
        }

    }

    //OEM QUERY STRING 
    if (queryString != '') {
        if (oem != '') {
            queryString = queryString + '&' + 'oem=' + oem;
        }
    } else {
        if (oem != '') {
            queryString = 'oem=' + oem;
        }
    }

    //OEMSERIES QUERY STRING 
    if (queryString != '') {
        if (oemseries != '') {
            queryString = queryString + '&' + 'oemseries=' + oemseries;
        }
    } else {
        if (oemseries != '') {
            queryString = 'oemseries=' + oemseries;
        }
    }


    //sorting query generation

    //Get selected price sort option
    var price_sort = '';
    var priceSortSelect = $("input[name='price_sort_filter']:checked").val();
    if (priceSortSelect != '' && priceSortSelect != undefined) {
        price_sort = priceSortSelect;
    }
    //PRICE SORT QUERY STRING 
    if (queryString != '') {
        if (price_sort != '') {
            queryString = queryString + '&' + 'price_sort=' + price_sort;
        }
    } else {
        if (price_sort != '') {
            queryString = 'price_sort=' + price_sort;
        }
    }


    //Get selected name sort option
    var name_sort = '';
    var nameSortSelect = $("input[name='name_sort_filter']:checked").val();
    if (nameSortSelect != '' && nameSortSelect != undefined) {
        name_sort = nameSortSelect;
    }
    //name SORT QUERY STRING 
    if (queryString != '') {
        if (name_sort != '') {
            queryString = queryString + '&' + 'name_sort=' + name_sort;
        }
    } else {
        if (name_sort != '') {
            queryString = 'name_sort=' + name_sort;
        }
    }


    //Get selected newest sort option
    var newest_sort = '';
    var newestSortSelect = $("input[name='newest_sort_filter']:checked").val();
    if (newestSortSelect != '' && newestSortSelect != undefined) {
        newest_sort = newestSortSelect;
    }
    //newest SORT QUERY STRING 
    if (queryString != '') {
        if (newest_sort != '') {
            queryString = queryString + '&' + 'newest_sort=' + newest_sort;
        }
    } else {
        if (newest_sort != '') {
            queryString = 'newest_sort=' + newest_sort;
        }
    }


    //find current URL
    var curURL = window.location.href.split('?')[0];
    var newUrl = curURL + '?' + encodeURI(queryString);
    window.location.replace(newUrl);

}