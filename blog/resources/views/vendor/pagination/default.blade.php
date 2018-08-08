@if ($paginator->hasPages())
    <div class="weui-flex">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        	<div>
	            <div class="placeholder">
	                <a class="weui-btn weui-btn_mini weui-btn_default weui-btn_disabled">←&nbsp;上一页</a>
	            </div>
	        </div>
        @else
        	<div>
	            <div class="placeholder">
	                <a href="{{ $paginator->previousPageUrl() }}" class="weui-btn weui-btn_mini weui-btn_default">←&nbsp;上一页</a>
	           	</div>
	        </div>
        @endif

        <div class="weui-flex__item"><div class="placeholder page"></div></div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        	<div>
        		<div class="placeholder">
        			<a href="{{ $paginator->nextPageUrl() }}" class="weui-btn weui-btn_mini weui-btn_default">下一页&nbsp;→</a>
        		</div>
        	</div>
        @else
        	<div>
        		<div class="placeholder">
        			<a style="float:right;" class="weui-btn weui-btn_mini weui-btn_default weui-btn_disabled">下一页&nbsp;→</a>
        		</div>
        	</div>
        @endif
    </div>
@endif
