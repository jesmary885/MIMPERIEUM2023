<div>



    <div class=" mt-2">

        @if($cont_img == 'si')

        <div>

            <video  class="player h-96 w-full aspect-video"  controls crossorigin playsinline >
                <source src="{{Storage::url($imagen_c->url)}}" type="video/mp4" size="576">
            </video>

        </div>

        <div class="flex justify-start mt-2 ">
            @livewire('admin.contenidoweb.ganar-dinero-edit', ['imagen' => $imagen_c,'accion' => 'edit'],key($imagen_c->id))
        </div>

        @else

        <div>
            @livewire('admin.contenidoweb.ganar-dinero-edit', ['accion' => 'create'])
        </div>

        @endif




    </div>
</div>
