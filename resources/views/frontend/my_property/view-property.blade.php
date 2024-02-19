<x-base-layout>

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="row align-items-end">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Property Infomation for, {{ $property->hotel_name }}</h1>
                <hr>
                <a href="{{ route('my-properties') }}">
                    <span class="badge bg-dark rounded-pill"><i class="bi-chevron-left me-1"></i> Back</span>
                </a>
            </div>
        </div>



        <div class="mt-3 p-3">
            <div id="grid3">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="card">
                        @php
                            $imageField = 'hotel_image_' . $i;
                            $imagePath = $property->$imageField ? asset('/images/hotel-images/' . $property->$imageField) : asset('assets/img/documentation/img7.jpg');
                        @endphp

                        <img class="card-img card-img-top" src="{{ $imagePath }}" alt="Card image cap"
                            style="width: 100% !important;height: 20rem;object-fit: fill !important;">

                    </div>
                @endfor


                <h4>Name: {{ $property->hotel_name }}</h4>
                <h4>Address: {{ $property->address }}</h4>
                <h4>Country: {{ $property->country }}</h4>
                <h4>Email: {{ $property->email }}</h4>
                <h4>Contact: {{ $property->contact }}</h4>
                <h4>Sate: {{ $property->state }}</h4>
                <h4>City: {{ $property->city }}</h4>
                <h4>Post code: {{ $property->city }}</h4>
                <h4>Currency: {{ $property->currency }}</h4>
                <h4>Time Zone: {{ $property->time_zone }}</h4>
                <h4>Description: {{ $property->description }}</h4>


            </div>
        </div>
    </div>



</x-base-layout>
