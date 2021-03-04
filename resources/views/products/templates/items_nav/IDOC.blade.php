<div class="row mb-2" id="{{ $nav->descriptioncode }}">
    <div class="col-12  specs-area">
        <div class="row">
            <h4 class="bg-theme-text custom-underline">{{ $nav->descriptionname }}</h4>
        </div>
        
        @forelse ($productDocs['header'] as $doc)
            
        
            {{-- Document header section --}}
            <div class="row specs-head">
                <div class="col-12">
                    <span class="">{{ $doc->propertiesname }}</span>
                </div>
            </div>
            
            {{-- Document docs description section  --}}
            @forelse ($productDocs['data'] as $doc_details)
                @if ($doc_details->propertiescode == $doc->propertiescode)
                    
                    <div class="row">
                        
                        <div class="col-12 col-md-8">
                            
                            @php
                            $file = $doc_details->filename;
                            $type = '';
                            $doc_url = '';
                            $base64D = '';
                            $base64Type = '';

                            if($file != ""){

                                $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                                $isFile = @file_get_contents($file);

                                if($isFile !== False){
                                    $base64D = base64_encode($isFile);
                                    
                                    if($base64D != ''){
                                        
                                        if($type == 'pdf'){
                                            $base64Type = 'data:application/pdf;';
                                        }else if ($type == 'jpg' 
                                            ||   $type == 'jpeg'
                                            ||   $type == 'png'
                                            ||   $type == 'gif'
                                            ||   $type == 'webp'
                                        ) {
                                            $base64Type = 'data:image/'.$type.';';
                                        }
                                        
                                    }

                                    $doc_url = $base64Type . 'base64,' . $base64D;

                                }

                            }

                        @endphp
                            
                            <span class="text-danger">
                                <i class="fas fa-file-pdf"></i> 
                            </span>
                            <span class="pl-2">
                                {{ $doc_details->propertiesvalue }}
                            </span>

                            @if ($doc_url != '')
                                <span class="pl-2">
                                    <small>
                                        <a href="#" onclick='openDocument("{{ $doc_url }}")'>
                                            ( <i class="fas fa-download"></i>
                                            Download )
                                        </a>
                                    </small>
                                </span>
                            @endif
                            
                        </div>
                        <div class="col-12 col-md-4">                            
                            <div class="text-uppercase">
                                {{ $type ?? '' }}
                            </div>
                        </div>
                    </div>

                @endif
            @empty
            
            @endforelse            

            
        
        @empty
        
            {{-- Document header section --}}
            <div class="row">
                <div class="col-12">
                    <i class="fas fa-file-pdf"></i> 
                    <span class="pl-2"> No related document found.</span>
                </div>
            </div>

        @endforelse
        
    </div>
</div>