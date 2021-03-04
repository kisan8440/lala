<div class="row mb-2" id="{{ $nav->descriptioncode }}">
    <div class="col-12  specs-area">
        <div class="row">
            <h4 class="bg-theme-text custom-underline">{{ $nav->descriptionname }}</h4>
        </div>
        <div class="row">
            
            @forelse ($productServices as $prodBom)

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
                                $path = asset('public/assets/images/products/img_service_404.jpg');
                                $data = file_get_contents($path);
                            }   
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        }else{
                            $base64 = asset('public/assets/images/products/img_service_404.jpg');
                        }
                    }else{
                        $base64 = asset('public/assets/images/products/img_service_404.jpg');
                    }                                            
                @endphp

                @php

                    $ser_csls = '';
                    $ser_qtys = '';
                    $ser_vals = $prodBom->csl . '___' . $prodBom->qty;

                    $qtyUpdated = false;

                    $ser_csl = explode(',', request()->input('service-added'));
                    if($ser_csl[0] != ''){
                    foreach ($ser_csl as $csl___qty) {

                            if($ser_csls != '') {
                                $ser_csls = $ser_csls . ',' . explode('___', $csl___qty)[0];
                                $ser_qtys = $ser_qtys . ',' . explode('___', $csl___qty)[1];
                            }else {
                                $ser_csls = explode('___', $csl___qty)[0];
                                $ser_qtys = explode('___', $csl___qty)[1];
                            }

                        }

                        if(in_array($prodBom->csl , explode(',', $ser_csls))){
                            $qtys = explode(',', $ser_qtys)[array_search($prodBom->csl , explode(',', $ser_csls))];
                            if($qtys > 0){
                                $ser_vals = $prodBom->csl . '___' . $qtys;
                                $qtyUpdated = true;
                            }
                        }
                    }

                @endphp

                <input type="checkbox" class="hidden ser-a" name="ser-added-{{ $prodBom->csl }}" @if($qtyUpdated) checked @endif>
                <input type="text" class="hidden ser-q" name="ser-q-{{ $loop->index }}" data-target="{{ $prodBom->csl }}" value="{{ $ser_vals }}">
                
                <div class="col-sm-12 mb-2">
                    <div class="border border-custom-light p-2 view overlay rounded z-depth-1 gallery-item">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-2 bom-image">
                                <a href="#"  data-toggle="modal" data-target="#modelTargetNo_{{ $loop->index }}">
                                    <img src="{{ $base64 }}" alt="{{ $prodBom->itemname }}" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-8 col-lg-10">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h6 class="mt-1">
                                            <a href="#"  data-toggle="modal" data-target="#modelTargetNo_{{ $loop->index }}">
                                                {{ $prodBom->itemname }}
                                            </a>
                                        </h6>
                                        <p class="m-0 font-12">
                                            {{ $prodBom->modelno }}
                                        </p>
                                        <p class="m-0 font-12 d-flex align-items-center">
                                            <div class="qty-adjust-btn font-12">
                                                Qty ({{ $prodBom->uomname }}):
                                                &nbsp;
                                                &nbsp;
                                                <button class="bg-theme-yellow qty-reduce"  onclick="changeItemQTY(this, 'ser-qty-{{ $prodBom->csl }}', {{ $prodBom->csl }}, 'ser-q-{{ $loop->index }}', 'total-price-of-service-item-{{ $prodBom->csl }}', '{{ $prodBom->rate ?? '0' }}')">
                                                    <i class="fas fa-minus "></i>                                                    
                                                </button>
                                                <input type="text" readonly name="ser-qty-{{ $prodBom->csl }}" value="@if($qtyUpdated) {{ $qtys }} @else {{ $prodBom->qty }}@endif"/>
                                                <button class="bg-theme-yellow qty-increase" onclick="changeItemQTY(this, 'ser-qty-{{ $prodBom->csl }}', {{ $prodBom->csl }}, 'ser-q-{{ $loop->index }}', 'total-price-of-service-item-{{ $prodBom->csl }}', '{{ $prodBom->rate ?? '0' }}')">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                
                                            </div>
                                        </p>  
                                        <p class="m-0 font-12">
                                            Price: Rs.{{ $prodBom->rate ?? '0.00' }}
                                        </p> 
                                        <p class="m-0 font-12">
                                            Total amount: Rs.<span class="ser-items-total-price @if($qtyUpdated) ser-items-total-price-added @endif" name="total-price-of-service-item-{{ $prodBom->csl }}">@if($qtyUpdated) {{ $qtys * $prodBom->rate }} @else {{ $prodBom->amount ?? '0.00' }}@endif</span>
                                        </p>                                                                    
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-flex flex-sm-row-reverse">
                                            <button class="btn btn-sm btn-outline-primary" 
                                                onclick="addItemToBOM('add-service-to-bom-{{ $prodBom->csl }}', 'ser-added-{{ $prodBom->csl }}', 'ser-outer-to-bom-{{ $prodBom->csl }}', 'total-price-of-service-item-{{ $prodBom->csl }}')">
                                                
                                                <span name="add-service-to-bom-{{ $prodBom->csl }}">
                                                    @if ($qtyUpdated)
                                                        <i class="fas fa-check"></i> Added
                                                    @else
                                                        <i class="fas fa-plus"></i>
                                                        Add item
                                                    @endif
                                                </span>
                                            </button>
                                        </div>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelTargetNo_{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-md  modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h6>{{ $prodBom->itemname }}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 d-flex align-items-center">
                                                                <div>
                                                                    <img src="{{ $base64 }}" alt="{{ $prodBom->itemname }}" class="service-image">
                                                                </div>
                                                                <div class="pl-2">
                                                                    <p class="m-0 mb-1 font-12">
                                                                        <span class="font-500">
                                                                            Model No:
                                                                        </span>
                                                                        {{ $prodBom->modelno }}
                                                                    </p>
                                                                    <p class="m-0 font-12">
                                                                        <span class="font-500">
                                                                            QTY: 
                                                                        </span>
                                                                        {{ $prodBom->qty }} {{ $prodBom->uomname }}
                                                                    </p> 
                                                                    <p class="m-0 font-12">
                                                                        <span class="font-500">
                                                                            Price: Rs.
                                                                        </span>
                                                                        {{ $prodBom->rate ?? '0.00' }}
                                                                    </p> 
                                                                    <p class="m-0 font-12">
                                                                        <span class="font-500">
                                                                            Total amount: Rs.
                                                                        </span>
                                                                        {{ $prodBom->amount ?? '0.00' }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
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
                        No addition item required.
                    </div>
                </div>
                
            @endforelse
        </div>
    </div>
</div>