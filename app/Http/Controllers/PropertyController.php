<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Helpers\CountryHelper;
use App\Helpers\CurrencyHelper;
use App\Helpers\TimeZoneHelper;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $countries = CountryHelper::getCountries();
            $currencies = CurrencyHelper::getCurrencies();
            $time_zones = TimeZoneHelper::getTimeZones();

            $user = User::findOrFail(Auth::user()->id);

            // Fetch properties belonging to the authenticated user and apply search
            $properties = $user->properties()
            ->searchProperties(request()->input('search-property'))
            ->paginate(25);


            return view('frontend.my_property.properties', compact(
                'properties',
                'countries',
                'currencies',
                'time_zones'
            ));
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //validate form data
            $request->validate([
                'hotel_name' => ['required', 'string', 'max:255', 'unique:' . Property::class],
                'hotel_icon' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:5048'],
                'address' => ['required', 'string', 'max:255'],
                'lat' => ['nullable', 'string'],
                'lng' => ['nullable', 'string'],
                'currency' => ['required', 'string', 'max:255'],
                'post_code' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'contact' => ['required', 'string', 'max:255'],
                'time_zone' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string']


            ]);
            //get extension of image
            $image_ext1 = $request->hotel_icon->getClientOriginalExtension();

            //  //get current date
            $date = date('Y-m-d');
            $hotel_icon = $date . '_' . rand(0, 999) . '.' . $image_ext1;

            //save image to public/images folder
            $request->hotel_icon->move(public_path('images/hotel_icon'), $hotel_icon);

            $code = 'prt' . $this->generatePropertyCode();


            //get form data
            $user = Property::create([
                'code' => $code,
                'user_id' => Auth::user()->id,
                'hotel_name' => $request->hotel_name,
                'hotel_icon' => $hotel_icon,
                'address' => $request->address,
                'latitude' => $request->lat,
                'longitude' => $request->lng,
                'currency' => $request->currency,
                'post_code' => $request->post_code,
                'city' => $request->city,
                'state' => $request->state,
                'email' => $request->email,
                'country' => $request->country,
                'contact' => $request->contact,
                'time_zone' => $request->time_zone,
                'description' => $request->description,
                //  'hotel_image_1' => $request->hotel_image_1,
                //  'hotel_image_2' => $request->hotel_image_2,
                //  'hotel_image_3' => $request->hotel_image_3,
                //  'hotel_image_4' => $request->hotel_image_4,

            ]);
            //save report to database
            event(new Registered($user));

            return redirect()->route('my-properties')->with('toast_success', 'Property Created Successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->with('toast_error', $e->validator->getMessageBag())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.'.$e->getMessage());
        }
    }

    public function add_property_images(Request $request, $id)
    {
        try {
            $request->validate([
                'hotel_image1' => ['image', 'mimes:png,jpg,jpeg', 'max:5048'],
                'hotel_image2' => ['image', 'mimes:png,jpg,jpeg', 'max:5048'],
                'hotel_image3' => ['image', 'mimes:png,jpg,jpeg', 'max:5048'],
                'hotel_image4' => ['image', 'mimes:png,jpg,jpeg', 'max:5048'],
            ]);

            $property = Property::findOrFail($id);

            // Loop through each image and process it
            for ($i = 1; $i <= 4; $i++) {
                $imageKey = 'hotel_image' . $i;

                // Process the image if it's present in the request
                if ($request->hasFile($imageKey)) {
                    $image = $request->file($imageKey);
                    $imageExtension = $image->getClientOriginalExtension();
                    $imageName = date('Y-m-d') . '_' . rand(0, 999) . '.' . $imageExtension;
                    $image->move(public_path('images/hotel-images'), $imageName);

                    // Update property with image path
                    $property->{'hotel_image_' . $i} = $imageName;
                }
            }

            // Save updated property
            $property->save();

            // Fire event
            event(new Registered($property));

            return redirect()->back()->with('toast_success', 'Property Image(s) Updated Successfully');
        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show_property($id)
    {
        try {
            $property = Property::findOrFail($id);

            $countries = CountryHelper::getCountries();
            $currencies = CurrencyHelper::getCurrencies();
            $time_zones = TimeZoneHelper::getTimeZones();


            return view('frontend.my_property.update-property', compact(
                'property',
                'countries',
                'currencies',
                'time_zones'
            ));
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.');
        }
    }

    public function view_property_info($id)
    {
        try {
            $property = Property::findOrFail($id);

            $countries = CountryHelper::getCountries();
            $currencies = CurrencyHelper::getCurrencies();
            $time_zones = TimeZoneHelper::getTimeZones();


            return view('frontend.my_property.view-property', compact(
                'property',
                'countries',
                'currencies',
                'time_zones'
            ));
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        try {
            // Validate form data
            $request->validate([
                'code' => ['nullable','string'],
                'hotel_name' => ['required', 'string', 'max:255', Rule::unique('properties')->ignore($property->id)],
                'hotel_icon' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:5048'],
                'address' => ['required', 'string', 'max:255'],
                'lat' => ['nullable', 'string'],
                'lng' => ['nullable', 'string'],
                'currency' => ['required', 'string', 'max:255'],
                'post_code' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'contact' => ['required', 'string', 'max:255'],
                'time_zone' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string']
            ]);

            // Update property fields
            $property->hotel_name = $request->hotel_name;
            $property->address = $request->address;
            $property->currency = $request->currency;
            $property->post_code = $request->post_code;
            $property->city = $request->city;
            $property->state = $request->state;
            $property->email = $request->email;
            $property->country = $request->country;
            $property->contact = $request->contact;
            $property->time_zone = $request->time_zone;
            $property->description = $request->description;


            // If lat and lng are provided, update them
            if ($request->filled('lat')) {
                $property->latitude = $request->lat;
            }
            if ($request->filled('lng')) {
                $property->longitude = $request->lng;
            }
            if ($request->filled('code')) {
                $property->code = $request->code;
            }

            // If hotel_icon is provided, update it
            if ($request->hasFile('hotel_icon')) {
                $image_ext = $request->hotel_icon->getClientOriginalExtension();
                $hotel_icon = $request->hotel_icon->storeAs('images/hotel_icon', $property->id . '.' . $image_ext);
                $property->hotel_icon = $hotel_icon;
            }

            // Save changes
            $property->save();

            // Redirect with success message
            return redirect()->route('my-properties')->with('toast_success', 'Property Updated Successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->with('toast_error', $e->validator->getMessageBag())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }

    public function generatePropertyCode()
    {
        do {
            $uid = random_int(100, 999);
        } while (Property::where('code', '=', $uid)->first());

        return $uid;
    }
}
