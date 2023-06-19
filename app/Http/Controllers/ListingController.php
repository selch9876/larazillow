<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Auth;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'bathrooms', 'areaFrom', 'areaTo'
        ]);
        $query = Listing::orderByDesc('created_at');

        // if ($filters['priceFrom'] ?? false ) {
        //     $query->where('price', '>=', $filters['priceFrom']);
        // };
        // if ($filters['priceTo'] ?? false ) {
        //     $query->where('price', '<=', $filters['priceTo']);
        // };
        // if ($filters['beds'] ?? false ) {
        //     $query->where('beds', $filters['beds']);
        // };
        // if ($filters['bathrooms'] ?? false ) {
        //     $query->where('bathrooms', $filters['bathrooms']);
        // };
        // if ($filters['areaFrom'] ?? false ) {
        //     $query->where('area', '>=', $filters['areaFrom']);
        // };
        // if ($filters['areaTo'] ?? false ) {
        //     $query->where('area', '<=', $filters['areaTo']);
        // };

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::latest()->filter($filters)
                    ->paginate(10)->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'bathrooms' => 'required|integer|min:1|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'postcode' => 'required',
                'street' => 'required',
                'street_no' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );


        return redirect()->route('listing.index')
        ->with('success', 'Listing created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        // if (Auth::user()->cannot('view', $listing)) {
        //     abort(403);
        // };

        // YA DA

        // $this->authorize('view', $listing);

        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {

        // try {
        //     $validatedData = $request->validate([
        //         'beds' => 'required|integer|min:0|max:20',
        //         'bathrooms' => 'required|integer|min:1|max:20',
        //         'area' => 'required|integer|min:15|max:1500',
        //         'city' => 'required',
        //         'postcode' => 'required',
        //         'street' => 'required',
        //         'street_no' => 'required|min:1|max:1000',
        //         'price' => 'required|integer|min:1|max:20000000',
        //     ]);
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     dd($e->errors());
        // }

        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'bathrooms' => 'required|integer|min:1|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'postcode' => 'required',
                'street' => 'required',
                'street_no' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('listing.index')
        ->with('success', 'Listing updated.');
    }
}
