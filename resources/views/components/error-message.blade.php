@error($name)
<div class="mt-1 text-red-500 text-sm">
    @php
        // clean up the message
        $message = str_replace('.person', '', $message);
        $message = str_replace('data.', '', $message);
        $message = str_replace('Data.', '', $message);
        $message = str_replace('Data', '', $message);
        $message = \Illuminate\Support\Str::title($message);
    @endphp
    {{ $message }}
</div>
@enderror
