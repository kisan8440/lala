<div class="row mb-2" id="{{ $nav->descriptioncode }}">
    <div class="col-12  specs-area">
        <div class="row">
            <h4 class="bg-theme-text custom-underline">{{ $nav->descriptionname }}</h4>
        </div>

        @isset($itemDetails['itemFeatures'])
        
            @forelse ($itemDetails['itemFeatures'] as $featureGroup)
                
                <div class="row specs-head mb-2 border">
                    <div class="col-12 pb-2">
                        {{ $featureGroup->itemfeaturegroupname }}
                    </div>

                    @isset($featureGroup->itemSubFeatures)
                        <div class="col-12 bg-light font-weight-normal">

                            <div class="row">

                                <div class="col-12 pt-2 pb-2">

                                    <div class="col-12  specs-area">

                                        @forelse ($featureGroup->itemSubFeatures as $featureSubGroup)

                                            @if ($featureGroup->itemfeaturegroupcode == $featureSubGroup->itemfeaturegroupcode)
                                                <div class="row specs-head inner-head">
                                                    <div class="col pt-1 pb-1">
                                                        {{ $featureSubGroup->itemfeaturesubgroupname }}
                                                    </div>
                                                </div>

                                                @isset($featureSubGroup->itemFeaturesList)

                                                    @forelse ($featureSubGroup->itemFeaturesList as $featureList)

                                                        @if (
                                                         $featureSubGroup->itemfeaturegroupcode == $featureList->itemfeaturegroupcode
                                                         &&
                                                         $featureSubGroup->itemfeaturesubgroupcode == $featureList->itemfeaturesubgroupcode
                                                        )
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    {{ $featureList->itemfeaturename }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @empty
                                                        
                                                    @endforelse
                                                    
                                                @endisset
                                                
                                            @endif

                                        @empty
                                            
                                        @endforelse

                                        
                                    </div>
        
                                </div>
                            </div>

                        </div>
                    @endisset                    

                    

                </div>

            @empty
                
            @endforelse 

        @endisset
        
    </div>
</div>