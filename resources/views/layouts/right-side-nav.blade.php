@php
    use App\Models\User;

    $user = User::findOrFail(Auth::user()->id);

    $all_properties = $user->properties()->get();

@endphp

@forelse ($all_properties as $key => $prop)
    <div class="d-grid">
        <button type="button" class="mb-2 btn btn-white"><i class="bi-house"></i>&nbsp; {{ $prop->hotel_name }}
            ({{ ++$key }})</button>
    </div>
@empty
<div class="d-grid">
    <button type="button" class="btn btn-danger"><i class="bi-house"></i>&nbsp; No Properties Available</button>
</div>
@endforelse
