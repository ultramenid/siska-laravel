<div>
    <div class="overflow overflow-x-auto">
        <table class="w-full divide-y divide-gray-200  rounded-lg  border border-gray-100">
            <thead class="">
                <tr >
                    <th wire:click='sortingField("tahun")'  class="bg-gray-50 px-6 py-4  cursor-pointer  text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-1/12 w-4/12">
                        <div class="flex space-x-1 " >
                            <a>Tahun</a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                         </div>
                     </th>
                    <th  class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sm:w-1/12 w-4/12">
                       <div class="flex space-x-1">
                           <a>TBM</a>

                        </div>
                    </th>
                    <th  class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-1/12 w-4/12">
                        <div class="flex space-x-1">
                            <a>TM</a>
                         </div>
                     </th>
                     <th  class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-1/12 w-11/12">
                        <div class=" space-x-1 " >
                            <a >TR</a>

                         </div>
                     </th>
                     <th  class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-1/12 w-11/12">
                        <div class=" space-x-1 " >
                            <a >Total luas</a>

                         </div>
                     </th>
                     <th  class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-1/12 w-11/12">
                        <div class=" space-x-1 " >
                            <a >Produksi</a>

                         </div>
                     </th>

                     <th  class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-1/12 w-11/12">
                        <div class=" space-x-1 " >
                            <a >Produktifitas</a>
                         </div>
                     </th>
                     <th  class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-1/12 w-11/12">
                        <div class=" space-x-1 " >
                            <a >Petani</a>
                         </div>
                     </th>
                     <th  class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-1/12 w-11/12">
                        <div class=" space-x-1 " >
                            <a >Produk</a>
                         </div>
                     </th>
                     <th  class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-2/12 w-11/12">
                        <div class=" space-x-1 " >
                            <a >Pengusahaan</a>
                         </div>
                     </th>



                </tr>
            </thead>
            <tbody class="bg-white  divide-y divide-gray-200 ">
                @forelse ($sawit as $item)
                <tr>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->tahun }}</a>
                    </td>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->tbm }}</a>
                    </td>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->tm }}</a>
                    </td>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->tr }}</a>
                    </td>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->totalluas }}</a>
                    </td>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->produksi }}</a>
                    </td>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->produktifitas }}</a>
                    </td>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->petani }}</a>
                    </td>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->produk }}</a>
                    </td>
                    <td class="px-6 py-4 break-words text-xs  text-newgray-700 ">
                        <a >{{ $item->pengusahaan }}</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="whitespace-nowrap text-xs text-gray-500 px-6 py-3">
                        No data found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($sawit)
    {{ $sawit->links('livewire.pagination') }}
    @endif
</div>
