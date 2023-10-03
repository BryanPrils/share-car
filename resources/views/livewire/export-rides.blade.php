<header
    x-data="{
        open: true,
        from: @entangle('fromStr'),
        till: @entangle('tillStr'),
        datepicker: null
    }"
    x-init="
        datepicker = flatpickr($refs.datepicker, {
            inline: true,
            mode: 'range',
            defaultDate: [from, till],
            disableMobile: true,
            showMonths: 3,
            onChange: function(selectedDates){
                if (selectedDates.length === 2){
                    $wire.setFrom(format(selectedDates[0], 'yyyy-MM-dd'));
                    $wire.setTill(format(selectedDates[1], 'yyyy-MM-dd'));
                }
            }
        });

        $watch('from', function() {
            datepicker.setDate([from, till], false);
            datepicker.jumpToDate(from, false);
        });

        $watch('till', function() {
            datepicker.setDate([from, till], false);
            datepicker.jumpToDate(from, false);
        });
    "
    class="mb-5"
>
    <p class="fs-3 fw-bolder text-center cursor-pointer" @click="open = ! open">
        @if($from && $till)
            @if($from->isToday() && $till->isToday())
                {{ __('Today') }}
            @elseif($from->isYesterday() && $till->isYesterday())
                {{ __('Yesterday') }}
            @else
                {{ $from->format('d M Y') }} - {{ $till->format('d M Y') }}
            @endif
        @else
            {{ __('All time') }}
        @endif
    </p>

    <div class="card card-body" x-show="open">
        <div class="d-flex justify-content-between mb-3" style="overflow-x: auto">
            <div wire:ignore>
                <style>
                    .flatpickr-calendar {
                        box-shadow: none;
                        -webkit-box-shadow: none;
                    }

                    .flatpickr-months {
                        margin-bottom: 1rem;
                    }

                    .flatpickr-input {
                        display: none;
                    }
                </style>

                <input type="text" name="date" x-ref="datepicker">
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" wire:click="export">{{ __('Export') }}</button>
        </div>
    </div>
</header>
