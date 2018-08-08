@if ($paginator->hasPages())
    <div class="weui-flex">
        {{-- Previous Page Link --}}
        <div>
        @if ($paginator->onFirstPage())
            <div class="placeholder">
                <a class="weui-btn weui-btn_mini weui-btn_default">←</a>
            </div>
        @else
            <div class="placeholder">
                <a href="{{ $paginator->previousPageUrl() }}" class="weui-btn weui-btn_mini weui-btn_default">←</a>
            </div>
        @endif
        </div>
        <div class="weui-flex__item"><div class="placeholder" style="text-align: center;">{{ $paginator->currentPage() }}/{{ $paginator->count() }}</div></div>
        {{-- Next Page Link --}}
        <div>
        @if ($paginator->hasMorePages())
            <div class="placeholder">
                <a href="{{ $paginator->nextPageUrl() }}" class="weui-btn weui-btn_mini weui-btn_default">→</a>
            </div>
        @else
            <div class="placeholder">
                <a class="weui-btn weui-btn_mini weui-btn_default">→</a>
            </div>
        @endif
        </div>
    </div>
@endif
