<div>

    <div class="card-header">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-600 leading-tight">
                Lista de sus referidos directos
            </h2>

          
        </div>
    </div>

    <div class="pt-6 pb-12 row">

    @if($refers_direct->count())
        @foreach ($refers_direct as $refer)
            <div class="col-md-4">
                <div class="card card-widget widget-user">

                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username"> {{ $refer->refer->name}}</h3>
                        <h5 class="widget-user-desc"> {{ $refer->refer->code}}</h5>
                    </div>
                    <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ $refer->refer->profile_photo_url }}" alt="{{ $refer->refer->name }}">
                    </div>
                    <div class="card-footer">
                    <div class="row">
                    <div class="col-sm-4 border-right">
                    <div class="description-block">
                    <h5 class="description-header">{{ $refer->refer->points }}</h5>
                    <span class="description-text">PVP</span>
                    </div>

                    </div>

                    <div class="col-sm-4 border-right">
                    <div class="description-block">
                    <h5 class="description-header">{{$refer->refer->points_residual}}</h5>
                    <span class="description-text">PVG</span>
                    </div>

                    </div>

                    <div class="col-sm-4">
                    <div class="description-block">
                    <h5 class="description-header">{{$this->refer_count($refer->refer->id)}}</h5>
                    <span class="description-text text-sm">REFERIDOS DIR.</span>
                    </div>

                    </div>

                    </div>

                    </div>
                </div>
            </div>
            
        @endforeach
    @endif

    
    </div>
    
    @if ($refers_direct->hasPages())
                
        <div class="px-6 py-4">
            {{ $refers_direct->links() }}
         </div>
                
    @endif
</div>
