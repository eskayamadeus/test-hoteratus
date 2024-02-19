@foreach ($data as $item)
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-header-title">{{ $item['name'] }}</h4>
        </div>
        <div class="card-body">
            @if ($item['data']->isEmpty())
            <div class="table-responsive">
                <table class="table table-nowrap table-align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th>Hotel Name</th>
                            @foreach ($item['dates'] as $date)
                                <th>{{ $date }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" colspan="{{ $item['dates']->count() + 1 }}">No data found</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @else
                @foreach ($item['data'] as $room)
                    <h5 class="card-title">{{ $room['room_name'] }}</h5>
                    <div class="table-responsive mb-4">
                        <table class="table table-nowrap table-align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th>Hotel Name</th>
                                    @foreach ($item['dates'] as $date)
                                        <th>{{ $date }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($room['data'] as $hotel)
                                <tr>
                                    <th>{{ $hotel['scraped_hotel_name'] }} ({{ $hotel['room_name'] }})</th>
                                    @foreach ($hotel['data'] as $date => $price)
                                    <td class="text-center">{{ !is_null($price) ? number_format($price, 2) : '-' }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Average Daily Rate</th>
                                    @foreach ($room['avg'] as $date => $price)
                                        <th class="text-center">{{ !is_null($price) ? number_format($price, 2) : '-' }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Minimum Daily Rate</th>
                                    @foreach ($room['min'] as $date => $price)
                                        <th class="text-center">{{ !is_null($price) ? number_format($price, 2) : '-' }}</th>
                                    @endforeach
                                </tr>
                                @if ($room['moderate']->filter()->isNotEmpty())
                                    <tr class="font-black">
                                        <th>Moderate Rate Approach</th>
                                        @foreach ($room['moderate'] as $date => $price)
                                            <th class="text-center font-bold">{{ !is_null($price) ? number_format($price, 2) : '-' }}</th>
                                        @endforeach
                                    </tr>
                                @endif
                                @if ($room['aggressive']->filter()->isNotEmpty())
                                    <tr>
                                        <th>Aggressive Rate Approach</th>
                                        @foreach ($room['aggressive'] as $date => $price)
                                            <th class="text-center font-w font-bold">{{ !is_null($price) ? number_format($price, 2) : '-' }}</th>
                                        @endforeach
                                    </tr>
                                @endif
                            </tfoot>
                        </table>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endforeach
