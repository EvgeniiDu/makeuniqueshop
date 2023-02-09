<div>
    @if ($paginator->hasPages())
        <div class="pagination_container">
            <ul class="pagination_items">
                <li class="prev_btn style_btn">
                    <a href="#" wire:click.prevent="previousPage"><img
                            src="{{asset('assets/images/prev_btn_icon.png')}}" alt=""></a>
                </li>

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled d-none d-md-block" aria-disabled="true"><span
                                class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="number_item"><div class="current_page"><span>{{ $page }}</span></div></li>
                            @else
                                <li class="number_item">
                                    <button type="button" class="page-link"
                                            wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach


                @if ($paginator->hasMorePages())
                    <li class="next_btn">
                        <a href="#" wire:click.prevent="nextPage"><img
                                src="{{asset('assets/images/next_btn_icon.png')}}" alt=""></a>
                    </li>
                @else
                    <li class="next_btn">
                        <a><img src="{{asset('assets/images/next_btn_icon.png')}}" alt=""></a>
                    </li>
                @endif
            </ul>
        </div>
    @endif
</div>

