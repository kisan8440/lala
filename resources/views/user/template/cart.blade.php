
@if (session()->has('error'))
    <div class="alert alert-danger mb-3 alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        {{ session()->get('error') }}    
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        {{ session()->get('success') }}    
    </div>
@endif

@forelse ($cartItem as $item)
    <div class="row">

            @if ($item->menumodulecode == 'product')

                @php
                    $fileName = $item->prodDetails->filename;
                    $name = $item->prodDetails->printname;
                    $href = route('product.view', $item->menumodulecsl) . '' . $item->customizeddata;
                    $price = $item->prodDetails->price;
                    $category = $item->prodDetails->categoryname;
                    $subcategory = $item->prodDetails->subcategoryname;
                @endphp
                
            @elseif($item->menumodulecode == 'item')

                @php
                    $fileName = $item->itemDetails->filename;
                    $name = $item->itemDetails->itemname;
                    $href = route('product.item_view', $item->menumodulecsl) . '' . $item->customizeddata;
                    $price = $item->itemDetails->itemprice;
                    $category = $item->itemDetails->categoryname;
                    $subcategory = $item->itemDetails->subcategoryname;
                @endphp
                
            @endif

            @php                                                                     							
                $path = $fileName ?? '';
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
        
        <div class="col-2">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="{{ $href ?? '#' }}">
                        <img class="cart-image border" src="{{ $base64 }}" alt="{{ $name ?? '' }}">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-12">
                    <a href="{{ $href ?? '#' }}">
                        <h6 class="m-0 mb-1">{{ $name ?? 'NA' }}</h6>
                    </a>
                    <p class="pb-0 mb-0">
                        <small>
                            {{ $category ?? 'NA' }} 
                            /
                            {{ $subcategory ?? 'NA' }}
                        </small>
                    </p>
                    <div class="font-12">
                        <p class="m-0 p-0  text-secondary">
                            Price: Rs. {{ $price ?? '' }} 
                            <span class="pl-3">
                                <a class="text-danger" onclick="return confirm('Are you sure?')" href="{{ route('user.remove_cart', $item->csl) }}"><i>Remove.</i></a>
                            </span>
                        </p>
                        <p class="m-0 p-0  text-secondary">
                            Dated: {{ date('D, d-M-Y H:i:s A', strtotime($item->inserttime)) }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    @if (!$loop->last)
        <hr>
    @endif

@empty

    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning" role="alert">
                Your cart is empty!
            </div>
        </div>
    </div>
    
@endforelse
