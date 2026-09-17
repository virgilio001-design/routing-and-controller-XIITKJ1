@if ($status === 'Aktif')
    <span class="inline-flex items-center gap-1.5 rounded-full border border-green-200 bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700">
        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
        {{ $status }}
    </span>
@else
    <span class="inline-flex items-center gap-1.5 rounded-full border border-red-200 bg-red-50 px-2.5 py-0.5 text-xs font-medium text-red-700">
        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
        {{ $status }}
    </span>
@endif
