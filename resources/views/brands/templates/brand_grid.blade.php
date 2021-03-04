<div class="product-box">
    <div class="toggle-filter-box text-right">
        <a href="javascript: void(0);" class="toggle-filter-box-button yellow-badge-button font-12">  Filter <i class="fas fa-filter"></i></a>
    </div>
    
    <div class="container position-relative">

        @include('layouts.includes.filter-loader')

        <div class="row">

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h6>
                            Showing ({{ $brands->firstItem() ?? '0' }} - {{ $brands->lastItem() ?? '0' }}) of total {{ $brands->total() }} items.
                        </h6>
                        <hr>
                    </div>
                </div>
            </div>

            @forelse ($brands as $item)

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="product-outer theme-block box-hover-effect parent p-3">
                        <a href="{{ route('brands.view', $item->csl) }}">
                            <div class="image-block">
                                <?php                                  							
                                    $path = $item->filename;
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
                                                $path = asset('public/assets/images/brands/img_404.jpg');
                                                $data = file_get_contents($path);
                                            }                                        
                                                
                                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                        }else{
                                            $base64 = asset('public/assets/images/brands/img_404.jpg');
                                        }
                                    }else{
                                        $base64 = asset('public/assets/images/brands/img_404.jpg');
                                    }
                                ?>
                                <img src="{{ $base64 }}" alt="{{ $item->itemname }}">
                            </div>
                            <div class="p-name text-center">
                                {{ $item->itemname }}
                            </div>
                            <div class="p-name text-center">
                                {{ $item->modelno}}
                            </div>
                            <div class="price text-center font-12">
                                <div class="font-12">
                                    <i class="fas fa-rupee-sign"></i>
                                    {{ $item->itemprice ?? 'NA' }}
                                </div>
                            </div>
                        </a>
                        <a href="#" class="add-to-cart">
                            <i class="fas fa-cart-plus "></i> Add to cart
                        </a>                                            
                        <div class="buy-block text-center">
                            <a href="#">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <span>Buy now</span>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
            
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="product-outer theme-block box-hover-effect parent p-3">
                        <a href="#">
                            <div class="p-name text-center" data-toggle="tooltip" data-placement="top">
                                {{ __('No data found.') }}
                            </div>
                        </a>                                           
                        <div class="buy-block text-center">
                            <a href="{{ route('brands.search') }}">
                                <i class="fas fa-eye"></i>
                                <span>View all</span>
                            </a>
                        </div>
                    </div>
                </div>

            @endforelse 
            
        </div>

        <div class="row mt-3">
            <div class="col-12 font-12 theme-pagination">
                @if ($brands)
                    {{ $brands->withQueryString()->links() }}
                @endif
            </div>
        </div>

    </div>

</div>