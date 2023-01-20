@if($this->refers($r->refer->id))
    @foreach( $this->refers($r->refer->id) as $r)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                {{$this->nivel($r->refer->id)}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ $r->refer->code }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ $r->refer->name}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ $r->refer->points }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{$r->refer->points_residual}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{$r->refer->acum_points}}
            </td>
           
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$this->partner_name($r->refer->id)}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$this->partner_code($r->refer->id)}}
            </td>
        </tr>
        @include('livewire.admin.partials.directos')
        @endforeach
    @endif