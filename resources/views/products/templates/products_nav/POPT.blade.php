<div class="row mb-2" id="{{ $nav->descriptioncode }}">
    <div class="col-12  specs-area">
        <div class="row">
            <h4 class="bg-theme-text custom-underline">{{ $nav->descriptionname }}</h4>
        </div>

        <div class="row">
            
            @forelse ($productOptions as $prodBom)

                @php                                                                     							
                    $path = $prodBom->filename;
                    $base64 = '';
                    if($path != ''){
                        if(     strpos($path, '.jpg') > -1 
                            ||  strpos($path, '.JPG') > -1 
                            ||  strpos($path, '.jpeg') > -1 
                            ||  strpos($path, '.JPEG') > -1 
                            ||  strpos($path, '.png') > -1 
                            ||  strpos($path, '.PNG') > -1 
                            ||  strpos($path, '.webp') > -1 
                            ||  strpos($path, '.WEBP') > -1 
                        ){
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            
                            $data = @file_get_contents($path);

                            if($data === false){
                                $path = asset('public/assets/images/products/img_404.jpg');
                                $data = file_get_contents($path);
                            }   
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        }else{
                            $base64 = asset('public/assets/images/products/img_404.jpg');
                        }
                    }else{
                        $base64 = asset('public/assets/images/products/img_404.jpg');
                    }                                            
                @endphp

                @php

                    $opt_csls = '';
                    $opt_qtys = '';
                    $opt_vals = $prodBom->itemcsl . '___' . $prodBom->qty;

                    $qtyUpdated = false;

                    $opt_csl = explode(',', request()->input('option-added'));
                    if($opt_csl[0] != ''){
                    foreach ($opt_csl as $csl___qty) {
                            if($opt_csls != '') {
                                $opt_csls = $opt_csls . ',' . explode('___', $csl___qty)[0];
                                $opt_qtys = $opt_qtys . ',' . explode('___', $csl___qty)[1];
                            }else {
                                $opt_csls = explode('___', $csl___qty)[0];
                                $opt_qtys = explode('___', $csl___qty)[1];
                            }
                        }

                        if(in_array($prodBom->itemcsl , explode(',', $opt_csls))){
                            $qtys = explode(',', $opt_qtys)[array_search($prodBom->itemcsl , explode(',', $opt_csls))];
                            if($qtys > 0){
                                $opt_vals = $prodBom->itemcsl . '___' . $qtys;
                                $qtyUpdated = true;
                            }
                        }
                    }

                @endphp

                <input type="checkbox" class="hidden opt-a" name="opt-added-{{ $prodBom->itemcsl }}" @if($qtyUpdated) checked @endif>
                <input type="text" class="hidden opt-q" name="opt-q-{{ $loop->index }}" data-target="{{ $prodBom->itemcsl }}" value="{{ $opt_vals }}">
                
                <div class="col-sm-12 mb-2 opt-outer-to-bom-{{ $prodBom->itemcsl }}">
                    <div class="border border-custom-light p-2 view overlay rounded z-depth-1 gallery-item">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-2 bom-image">
                                <a class="" href="{{ route('product.optional_item_view', $prodBom->productcsl) }}">
                                    <img src="{{ $base64 }}" alt="{{ $prodBom->itemname }}" class="img-fluid">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-8 col-lg-10">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h6 class="mt-1">
                                            <a class="" href="{{ route('product.optional_item_view', $prodBom->productcsl) }}">
                                                {{ $prodBom->itemname }}
                                            </a>
                                        </h6>
                                        <p class="m-0 mb-1 font-12">
                                            {{ $prodBom->modelno }}
                                        </p>
                                        <p class="m-0 font-12 d-flex align-items-center">
                                            <div class="qty-adjust-btn font-12">
                                                Qty ({{ $prodBom->uomname }}):
                                                &nbsp;
                                                &nbsp;
                                                <button class="bg-theme-yellow qty-reduce"  onclick="changeItemQTY(this, 'opt-qty-{{ $prodBom->itemcsl }}', {{ $prodBom->itemcsl }}, 'opt-q-{{ $loop->index }}', 'total-price-of-optional-item-{{ $prodBom->itemcsl }}', '{{ $prodBom->rate ?? '0' }}')">
                                                    <i class="fas fa-minus "></i>                                                    
                                                </button>
                                                <input type="text" readonly name="opt-qty-{{ $prodBom->itemcsl }}" value="@if($qtyUpdated) {{ $qtys }} @else {{ $prodBom->qty }}@endif"/>
                                                <button class="bg-theme-yellow qty-increase" onclick="changeItemQTY(this, 'opt-qty-{{ $prodBom->itemcsl }}', {{ $prodBom->itemcsl }}, 'opt-q-{{ $loop->index }}', 'total-price-of-optional-item-{{ $prodBom->itemcsl }}', '{{ $prodBom->rate ?? '0' }}')">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                
                                            </div>
                                        </p>  
                                        <p class="m-0 font-12">
                                            Price: Rs.{{ $prodBom->rate ?? '0.00' }}
                                        </p> 
                                        <p class="m-0 font-12">
                                            Total amount: Rs.<span class="opt-items-total-price @if($qtyUpdated) opt-items-total-price-added @endif" name="total-price-of-optional-item-{{ $prodBom->itemcsl }}">@if($qtyUpdated) {{ $qtys * $prodBom->rate }} @else {{ $prodBom->amount ?? '0.00' }}@endif</span>
                                        </p>                                                                    
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-flex flex-sm-row-reverse">
                                            <button class="btn btn-sm btn-outline-primary" 
                                                onclick="addItemToBOM('add-to-bom-{{ $prodBom->itemcsl }}', 'opt-added-{{ $prodBom->itemcsl }}', 'opt-outer-to-bom-{{ $prodBom->itemcsl }}', 'total-price-of-optional-item-{{ $prodBom->itemcsl }}')">
                                                
                                                <span name="add-to-bom-{{ $prodBom->itemcsl }}">
                                                    @if ($qtyUpdated)
                                                        <i class="fas fa-check"></i> Added
                                                    @else
                                                        <i class="fas fa-plus"></i>
                                                        Add item
                                                    @endif
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

                <div class="row">
                    <div class="col-12">
                        No addition option.
                    </div>
                </div>
                
            @endforelse
        </div>
        
    </div>
</div>