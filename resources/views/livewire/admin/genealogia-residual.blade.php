<div>

    <div class="card-header">
        <div class="flex items-center">
            <h2 class="font-semibold text-lg text-gray-600 leading-tight">
                Lista de sus referidos en sistema residual
            </h2>

          
        </div>
        </div>

    <div class="pt-6 pb-12">
        <x-table-responsive>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gen
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Código
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                PVP
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                PVG
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                PVA
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cód Patrocinador
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Patrocinador
                            </th>
                       
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    0
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                {{ Auth::user()->code }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                {{ Auth::user()->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                {{ Auth::user()->points }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{Auth::user()->points_residual}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{Auth::user()->acum_points}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$this->partner_name(Auth::user()->id)}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$this->partner_code(Auth::user()->id)}}
                                </td>
                            </tr>

                            
                            @if($refers_direct->count())
                                @foreach ($refers_direct as $refer)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            1
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $refer->refer->code }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $refer->refer->name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $refer->refer->points }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{$refer->refer->points_residual}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{$refer->refer->acum_points}}
                                        </td>
                                       
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$this->partner_name($refer->refer->id)}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$this->partner_code($refer->refer->id)}}
                                        </td>
                                    </tr>
                                        @if($this->refers($refer->refer->id))
                                            @foreach( $this->refers($refer->refer->id) as $r)
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
                                @endforeach
                            @endif
                    </tbody>
                </table>
                @if ($refers_direct->hasPages())
                
                <div class="px-6 py-4">
                    {{ $refers_direct->links() }}
                </div>
                
            @endif
        </x-table-responsive>
    </div>
</div>