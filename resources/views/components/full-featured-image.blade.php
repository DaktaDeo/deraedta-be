@if($hasFeaturedImage())
<div class="relative w-full">
        <div class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]"
             x-data="{ imgWidth: 1904 }"
             x-init="imgWidth = $refs.img.offsetWidth || 1904">

            <img x-ref="img"
                 :sizes="imgWidth + 'px'"
                 :srcset="'{{ $getOnlySrcset() }}'"
                 src="{{ $getFallbackImageUrl() }}"
                 alt="{{ $getDescriptiveAltText() }}"
                 style="width: 100%; height: auto;">
        </div>

    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
</div>
@endif
