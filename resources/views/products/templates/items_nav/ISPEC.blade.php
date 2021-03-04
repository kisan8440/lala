<div class="row mb-2" id="{{ $nav->descriptioncode }}">
    <div class="col-12  specs-area">
        <div class="row">
            <h4 class="bg-theme-text custom-underline">{{ $nav->descriptionname }}</h4>
        </div>

        {{-- {{ dd($specs) }} --}}

        @forelse ($specs as $spec)

            <div class="row specs-head">
                <div class="col-12">
                    {{ $spec->specificationgroupname }}
                </div>
            </div>
        
            @foreach ($itemDetails['productSpecification'] as $ispcs)
            

                @if ($ispcs->specificationgroupcode == $spec->specificationgroupcode)
                    
                    <div class="row">
                        <div class="col-12 col-md-4 font-500">
                            {{ $ispcs->specificationname }}    
                        </div>
                        <div class="col-12 col-md-8">
                            {{ $ispcs->specificationremark }}    
                        </div>
                    </div>

                @endif

            @endforeach

        @empty
                    
            <div class="row">
                <div class="col-12">
                    No more data available related this section. Please feel free to contact us for more details. We will happy to help you.
                </div>
            </div>

        @endforelse
    </div>
</div>