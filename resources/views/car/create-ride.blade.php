<x-layouts.app title="Create ride">
    <x-forms.form :action="action(\App\Http\Controllers\Car\StoreRideController::class)">
        <div class="container">
            <div
                x-data
                x-init="
                    flatpickr($refs.date, {
                        defaultDate: new Date(),
                        altInput: true,
                        altFormat: 'd/m/Y',
                        dateFormat: 'Y-m-d',
                        disable: [
                        function(date) {
                            today = new Date();

                            today.setHours(0,0,0,0)
                            return date < today;
                        }]
                    })
                "
            >
                <x-forms.label for="date">{{ __('Date') }}</x-forms.label>
                <x-forms.input name="date" x-ref="date"/>
            </div>
            <div class="mt-4">
                <x-forms.label for="mileage">{{ __('Mileage') }}</x-forms.label>
                <x-forms.input type="number" min="{{ $mileage }}" step="0.01" :value="$mileage" name="mileage"/>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
    </x-forms.form>

</x-layouts.app>
