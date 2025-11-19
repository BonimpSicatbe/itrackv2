{{--
    Props:
        - label: The label for the fieldset
        - name: The name attribute for the input
        - message: The error message to display (if any)

    Sample Usage:
        <x-text-fieldset label="Page Title" name="page_title" id="page_title" />
 --}}
<fieldset class="fieldset">
    <legend class="fieldset-legend font-bold text-gray-500 pb-1">{{ $label }}</legend>
    <input type="date" min="{{ \Carbon\Carbon::today()->toDateString() }}" {{ $attributes->merge(['class' => 'input input-md w-full' . ($errors->has($name) ? ' input-error' : ''), 'placeholder' => 'Enter ' . $name]) }} />
    @error($name)
        <p class="label text-red-500 text-wrap w-full">{{ $message }}</p>
    @enderror
</fieldset>
