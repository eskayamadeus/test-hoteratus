<x-base-layout>
    {{--  <x-cbase-layout>  --}}

    <div class="content container-fluid">
        <div class="row justify-content-lg-center">
            <div class="col-lg-10">


                <!-- Nav -->
                <div class="js-nav-scroller hs-nav-scroller-horizontal mb-5">
                    <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                        <a class="hs-nav-scroller-arrow-link" href="javascript:void(0)">
                            <i class="bi-chevron-left"></i>
                        </a>
                    </span>

                    <span class="hs-nav-scroller-arrow-next" style="display: none;">
                        <a class="hs-nav-scroller-arrow-link" href="javascript:void(0)">
                            <i class="bi-chevron-right"></i>
                        </a>
                    </span>

                    <ul class="nav nav-tabs align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('test') }}">Profile</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link{{ Request::routeIs('test2') ? ' active' : '' }}" href="{{ route('test2') }}">Projects </a>

                        </li>
                        
                    </ul>
                </div>
                <!-- End Nav -->


                <p>this is a second...........</p>

            </div>









        </div>




        {{--  </x-cbase-layout>  --}}
</x-base-layout>
