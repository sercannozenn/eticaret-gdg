<form method="GET" action="{{ $action }}" id="filter-form">
    <div class="row">
        @foreach($filters as $filter)
            <div class="{{ isset($customClass) ? $customClass : 'col' }} mb-3">
                <label for="{{ $filter['column'] }}" class="form-label">{{ $filter['label'] }}</label>
                @if($filter['type'] == 'text')
                    <input type="text"
                           class="form-control"
                           id="{{ $filter['column'] }}"
                           autocomplete="off"
                           placeholder="{{ $filter['label'] }}"
                           name="{{$filter['column']}}"
                           value="{{ request($filter['column']) }}">
                @elseif($filter['type'] == 'number')
                    <input type="number"
                           class="form-control"
                           id="{{ $filter['column'] }}"
                           autocomplete="off"
                           placeholder="{{ $filter['label'] }}"
                           name="{{ $filter['column']}}"
                           value="{{ request($filter['column']) }}">
                @elseif($filter['type'] == 'select')
                    <select
                        class="form-select"
                        name="{{ $filter['column']}}"
                        id="{{ $filter['column'] }}">
                        @foreach($filter['options'] as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}"
                                {{ !is_null(request($filter['column'])) && request($filter['column']) == $optionKey ? 'selected' : '' }}>
                                {{ $optionValue }}
                            </option>
                        @endforeach
                    </select>
                @elseif($filter['type'] == 'date')
                    <div class="input-group flatpickr" id="flatpickr-date">
                        <input type="text"
                               class="form-control"
                               placeholder="{{ $filter['label'] }}"
                               data-input
                               name="{{$filter['column']}}"
                               value="{{ request($filter['column']) }}">
                        <span class="input-group-text input-group-addon" data-toggle><i
                                data-feather="calendar"></i></span>
                    </div>
                @endif

            </div>
        @endforeach
        @if(!isset($disableButton))
            <div class="col-md-12">
                <hr>
                <button type="submit" class="btn btn-success w-100">Filtrele</button>
                <hr>
            </div>
        @endif
    </div>
</form>
