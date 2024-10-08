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

        $listing->load(['images']);

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
    
}
