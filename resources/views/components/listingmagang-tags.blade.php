@props(['tagsCsv'])

@php
$Tags = explode(',', $tagsCsv);
@endphp

<ul style="display: flex; flex-wrap: wrap; margin: 0; padding: 0; list-style: none;">
  @foreach($Tags as $Tag)
  <li style="display: flex; align-items: center; justify-content: center; background-color: #114d91  ; 
      color: white; border-radius: 1rem; padding: 0.25rem 0.75rem; margin: 0 0.5rem 0.5rem 0; font-size: 0.75rem;">
    <a href="/logang?Tags={{ $Tag }}" style="color: inherit; text-decoration: none;">{{ $Tag }}</a>
  </li>
  @endforeach
</ul>