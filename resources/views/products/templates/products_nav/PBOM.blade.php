<div class="row mb-2" id="{{ $nav->descriptioncode }}">
    <div class="col-12 specs-area">

        <div class="row">
            <h4 class="bg-theme-text custom-underline">{{ $nav->descriptionname }}</h4>
        </div>
        
        <div class="row">
            
            @forelse ($productDetails['product_bom'] as $prodBom)

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
                
                {{-- -------------- --}}
                @php
                    $bqcsls = '';
                    $bqqtys = '';
                    $bqvals = '';

                    $qtyUpdated = false;

                    $bqcsl = explode(',', request()->input('bom-q'));
                    if($bqcsl[0] != ''){
                       foreach ($bqcsl as $csl___qty) {
                            if($bqcsls != '') {
                                $bqcsls = $bqcsls . ',' . explode('___', $csl___qty)[0];
                                $bqqtys = $bqqtys . ',' . explode('___', $csl___qty)[1];
                            }else {
                                $bqcsls = explode('___', $csl___qty)[0];
                                $bqqtys = explode('___', $csl___qty)[1];
                            }
                        }

                        if(in_array($prodBom->itemcsl , explode(',', $bqcsls))){
                            $qtys = explode(',', $bqqtys)[array_search($prodBom->itemcsl , explode(',', $bqcsls))];
                            if($qtys > 0){
                                $bqvals = $prodBom->itemcsl . '___' . $qtys;
                                $qtyUpdated = true;
                            }
                        }
                    }

                @endphp

                <input type="text" class="bom-q hidden" name="bom-q-{{ $loop->index }}" data-target="{{ $prodBom->itemcsl }}" value="{{ $bqvals }}">
                <input type="checkbox" class="bom-r hidden" name="bom-r-{{ $loop->index }}" data-target="{{ $prodBom->itemcsl }}" @if(in_array($prodBom->itemcsl , explode(',', request()->input('bom-r')))) checked @endif>

                {{-- ------------- --}}
                @if (!in_array($prodBom->itemcsl , explode(',', request()->input('bom-r'))))
                <div class="col-sm-12 mb-2 bom-outer bom-outer-{{ $prodBom->itemcsl }}">
                    <div class="border border-custom-light p-2 view overlay rounded z-depth-1 gallery-item">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-2 bom-image">
                                <a class="" href="{{ route('product.item_view', $prodBom->itemcsl) }}">
                                    <img src="{{ $base64 }}" alt="{{ $prodBom->itemname }}" class="img-fluid">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-8 col-lg-10">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h6 class="mt-1">
                                            <a class="" href="{{ route('product.item_view', $prodBom->itemcsl) }}">
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
                                                <span>{{ $prodBom->qty }}</span>
                                                <button class="bg-theme-yellow qty-reduce d-none" onclick="changeQTY(this, 'bom-qty-{{ $prodBom->itemcsl }}', {{ $prodBom->itemcsl }}, 'bom-q-{{ $loop->index }}', 'total-price-of-item-{{ $prodBom->itemcsl }}', '{{ $prodBom->rate }}')">
                                                    <i class="fas fa-minus "></i>                                                    
                                                </button>
                                                <input type="text" class="d-none" name="bom-qty-{{ $prodBom->itemcsl }}" readonly value="@if($qtyUpdated) {{ $qtys }} @else {{ $prodBom->qty }}@endif"/>
                                                <button class="bg-theme-yellow qty-increase d-none" onclick="changeQTY(this, 'bom-qty-{{ $prodBom->itemcsl }}', {{ $prodBom->itemcsl }}, 'bom-q-{{ $loop->index }}', 'total-price-of-item-{{ $prodBom->itemcsl }}', '{{ $prodBom->rate }}')">
                                                    <i class="fas fa-plus"></i>
                                                </button>                                                
                                            </div>
                                        </p> 
                                        <p class="m-0 font-12 ">
                                            Price: Rs.{{ $prodBom->rate ?? '0.00' }}
                                        </p> 
                                        <p class="m-0 font-12">
                                            Total amount: Rs. <span class="bom-items-total-price" name="total-price-of-item-{{ $prodBom->itemcsl }}">@if($qtyUpdated) {{ $qtys * $prodBom->rate }} @else {{ $prodBom->amount ?? '0.00' }}@endif</span>
                                        </p>                                                                 
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-flex flex-sm-row-reverse">
                                            {{-- ------------------- --}}
                                            <button class="btn btn-sm btn-outline-primary d-none" onclick="removeBOM(this, {{ $prodBom->itemcsl }}, 'bom-r-{{ $loop->index }}')">
                                                <i class="fas fa-minus"></i>
                                                Remove
                                            </button>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @empty

                <div class="row">
                    <div class="col-12">
                        No addition BOM required.
                    </div>
                </div>
                
            @endforelse


            {{-- Optional when added --}}



            {{-- Services when added --}}


        </div>
    </div>
</div>