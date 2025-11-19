{{--
    Props:
        - label: The label for the fieldset
        - name: The name attribute for the input
        - message: The error message to display (if any)

    Sample Usage:
        <x-select-fieldset label="Browser" name="browser" id="browser">
            <option>Firefox</option>
            <option>Chrome</option>
            <option>Edge</option>
            <option>Safari</option>
        </x-select-fieldset>
 --}}
<fieldset class="fieldset">
    <legend class="fieldset-legend font-bold text-gray-500 pb-1">{{ $label }}</legend>
    <select
        {{ $attributes->merge(['class' => 'select select-md w-full' . ($errors->has($name) ? ' select-error' : ''), 'placeholder' => 'Enter ' . $label]) }}>
        <option disabled selected>Select {{ $label }}</option>
        {{ $slot }}
    </select>
    @error($name)
        <span class="label text-red-500 w-full">{{ $message }}</span>
    @enderror
</fieldset>
