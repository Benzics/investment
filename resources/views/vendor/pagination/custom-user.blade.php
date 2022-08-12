
@if ($paginator->hasPages())
    
            <div class="pagination p9">
                <ul>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                    <a class="disabled prev">
                        <li>
                           &lsaquo; Prev
                        </li>
                    </a>
                    @else
                    <a class="prev" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <li>
                           &lsaquo; Prev
                        </li>
                    </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            @php
                            continue;
                            @endphp
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                <a class="is-active disabled">
                                    <li>{{ $page }}</li>
                                </a>
                                @else
                                  <a class="page-link" href="{{ $url }}"><li>{{ $page }}</li></a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        
                            <a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><li>Next &rsaquo;</li></a>
                    
                    @else
                    <a class="disabled next">
                        <li>
                            Next &rsaquo;
                        </li>
                    </a>
                    @endif
                </ul>
            </div>
      
@endif
