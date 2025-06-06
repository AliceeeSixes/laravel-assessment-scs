@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-transparent cursor-default leading-5 rounded-xl dark:text-gray-600 dark:bg-slate-900">
                &lsaquo; Prev
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-white border border-transparent leading-5 rounded-xl hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-slate-900 dark:text-white dark:focus:border-blue-700 dark:active:text-white">
                &lsaquo; Prev
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-white border border-transparent leading-5 rounded-xl hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-slate-900 dark:text-white dark:focus:border-blue-700 dark:active:text-white">
                Next &rsaquo;
            </a>
        @else
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-transparent cursor-default leading-5 rounded-xl dark:text-gray-600 dark:bg-slate-900">
                Next &rsaquo;
            </span>
        @endif
    </nav>
@endif
