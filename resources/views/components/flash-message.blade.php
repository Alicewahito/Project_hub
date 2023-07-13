@if(Session::has('success'))
    <span x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
         x-show="show" class="badge text-bg-success py-1 px-2" style="position: absolute; right: .5rem; top: .5rem">
        {{ Session::get('success') }}
    </span>
@endif

@if(Session::has('error'))
    <span  x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)"
          x-show="show" class="badge text-bg-danger py-1 px-2" style="position: absolute; right: .5rem; top: .5rem">
        {{ Session::get('error') }}
    </span>
@endif
