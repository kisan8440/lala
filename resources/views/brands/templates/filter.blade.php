<div class="filter-box">
    <div class="toggle-filter-box text-right pr-3">
        <a href="javascript: void(0);" class="toggle-filter-box-button yellow-badge-button font-12 bg-danger"><i class="fas fa-times"></i></a>
    </div>
    <div class="main-filter-outer">
        <div class="pl-3 pr-3" style="position: relative; height: 40px">
            <h5 class=" custom-underline float-left">Filters</h5>
            @if (!empty($params))
                <a href="{{ route('brands.search') }}" class="clear-all-filter yellow-badge-button font-12 float-right">  <i class="fas fa-filter"></i>  Clear filter <i class="fas fa-times"></i></a>
            @endif
        </div>

        {{-- Porduct OEM filter --}}
        @if ($brandoem)

            <div class="top-devider p-3">
                <div class="filter-type dd
                @isset($params)
                    @if ($params['brandoem'] != '')
                        active
                    @endif
                @endisset
                ">
                    <h6 class="m-0">BRAND</h6>
                </div>
                <div class="filter-options">

                    @forelse ($brandoem as $boem)
                        <div class="option">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="{{ $boem->oemcode }}" class="custom-control-input" id="{{ 'oemfilter_'.$loop->index }}" name="oem"
                                @isset($params)
                                    @if ($params['brandoem'] != '')
                                        @if (strpos($params['brandoem'], $boem->oemcode) > -1)
                                            checked
                                        @endif
                                    @endif
                                @endisset
                                >
                                <label class="custom-control-label" for="{{ 'oemfilter_'.$loop->index }}">{{ $boem->oemname }}</label>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse

                </div>
            </div>
            
        @endif

        {{-- CATEGORY FILTER --}}
        <div class="top-devider p-3">
            <div class="filter-type dd 
            @isset($params)
                @if ($params['brandcategory'] != '')
                    active
                @endif
            @endisset
            ">
                <h6 class="m-0">CATEGORIES</h6>
            </div>
            
            @if ($brandcategory)
                <div class="filter-options">

                    @forelse ($brandcategory as $bcat)
                        <div class="option">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="{{ $bcat->categorycode }}" class="custom-control-input filter-box" id="{{ $loop->index.'category_options_for_filter' }}" name="category" 
                                    @isset($params)
                                        @if ($params['brandcategory'] != '')
                                            @if (strpos($params['brandcategory'], $bcat->categorycode) > -1)
                                                checked
                                            @endif
                                        @endif
                                    @endisset
                                >
                                <label class="custom-control-label" for="{{ $loop->index.'category_options_for_filter' }}">{{ $bcat->categoryname }}</label>
                            </div>
                        </div>
                    @empty
                    
                        <div class="option">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" disabled readonly class="custom-control-input">
                                <label class="custom-control-label">No data.</label>
                            </div>
                        </div>

                    @endforelse

                </div>
            @endif

        </div>
        
        {{-- SUB CATEGORY --}}
        <div class="top-devider p-3">
            <div class="filter-type dd 
            @isset($params)
                @if ($params['brandsubcategory'] != '')
                    active
                @endif
            @endisset
            ">
                <h6 class="m-0">SUBCATEGORY</h6>
            </div>
            
            @if ($brandsubcategory)
                <div class="filter-options">

                    @forelse ($brandsubcategory as $bscat)
                        <div class="option">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="{{ $bscat->subcategorycode }}" class="custom-control-input" id="{{ $loop->index.'subCategory_options_for_filter' }}" name="subCategory"
                                @isset($params)
                                    @if ($params['brandsubcategory'] != '')
                                        @if (strpos($params['brandsubcategory'], $bscat->subcategorycode) > -1)
                                            checked
                                        @endif
                                    @endif
                                @endisset
                                >
                                <label class="custom-control-label" for="{{ $loop->index.'subCategory_options_for_filter' }}">{{ $bscat->subcategoryname }}</label>
                            </div>
                        </div>
                    @empty
                    
                        {{-- <div class="option">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" disabled readonly class="custom-control-input">
                                <label class="custom-control-label">No data.</label>
                            </div>
                        </div> --}}

                    @endforelse

                </div>
            @endif

        </div>

              

        {{-- PRICE RANGE --}}
        <div class="top-devider p-3">
            <div class="filter-type dd
            @isset($params)
                @if ($params['price'] != '')
                    active
                @endif
            @endisset
            ">
                <h6 class="m-0">PRICE</h6>
            </div>
            <div class="filter-options">
                <div class="option range-slider">
                    <div class="price-range-slider">
                        <p class="range-value">
                            <input type="text" class="font-12" id="amount" name="amount" readonly>
                        </p>
                        <div id="slider-range" class="range-bar"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-devider pt-4">
            <div class="pl-3 pr-3" style="position: relative; height: 40px">
                <h5 class=" custom-underline float-left">Product Sort By</h5>
            </div>
        </div>
        
        {{-- Price sorting --}}
        <div class="top-devider p-3">
            <div class="filter-type dd
                @isset($params)
                    @if ($params['price_sort'] != '')
                        active
                    @endif
                @endisset
            ">
                <h6 class="m-0">SORT BY PRICE</h6>
            </div>
            <div class="filter-options">
                <div class="option">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="pricelth"
                        @isset($params)
                            @if ($params['price_sort'] == 'ASC')
                                checked
                            @endif
                        @endisset
                        value="ASC" name="price_sort_filter">
                        <label class="custom-control-label" for="pricelth">Price - low to high</label>
                    </div>
                </div>
                <div class="option">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input"
                        @isset($params)
                            @if ($params['price_sort'] == 'DESC')
                                checked
                            @endif
                        @endisset
                        value="DESC" id="pricehtl" name="price_sort_filter">
                        <label class="custom-control-label" for="pricehtl">Price - high to low</label>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Name sorting --}}
        <div class="top-devider p-3">
            <div class="filter-type dd
                @isset($params)
                    @if ($params['name_sort'] != '')
                        active
                    @endif
                @endisset
            ">
                <h6 class="m-0">SORT BY NAME</h6>
            </div>
            <div class="filter-options">
                <div class="option">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input"
                        @isset($params)
                            @if ($params['name_sort'] == 'ASC')
                                checked
                            @endif
                        @endisset
                        value="ASC" id="namelth" name="name_sort_filter">
                        <label class="custom-control-label" for="namelth">Name - A : Z</label>
                    </div>
                </div>
                <div class="option">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input"
                        @isset($params)
                            @if ($params['name_sort'] == 'ASC')
                                checked
                            @endif
                        @endisset
                        value="DESC" id="namehtl" name="name_sort_filter">
                        <label class="custom-control-label" for="namehtl">Name - Z : A</label>
                    </div>
                </div>
            </div>
        </div>

        {{-- Latest sorting --}}
        <div class="top-devider p-3">
            <div class="filter-type dd
                @isset($params)
                    @if ($params['newest_sort'] != '')
                        active
                    @endif
                @endisset
            ">
                <h6 class="m-0">SORT BY LATEST</h6>
            </div>
            <div class="filter-options">
                <div class="option">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"
                        @isset($params)
                            @if ($params['newest_sort'] == 'ASC')
                                checked
                            @endif
                        @endisset
                        value="ASC" id="newestfirst" name="newest_sort_filter">
                        <label class="custom-control-label" for="newestfirst">Newest first</label>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</div>