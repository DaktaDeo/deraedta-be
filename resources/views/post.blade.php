<?php
    abort_if(!$post, 404);
?>
<x-master-layout :page-title="$post->title">
   <x-post-detail :post="$post"/>
</x-master-layout>
