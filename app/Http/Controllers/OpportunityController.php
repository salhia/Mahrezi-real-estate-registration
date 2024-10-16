<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opportunity;


class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::all();
        return view('opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('opportunities.create');
    }

    public function indexview()
    {
        $opportunities = Opportunity::all(); // Retrieve all opportunities
        return view('opportunities.indexview', compact('opportunities'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'opportunity_number' => 'required',
            'researcher_name' => 'required',
            'region' => 'required',
            'phone_number' => 'required',
            'building_details' => 'required',
            'contact_details' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',

            'building_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $opportunity = new Opportunity($request->all());
// Set the user_id to the currently authenticated user's ID
      $opportunity->user_id = auth()->id(); // Add this line

        if ($request->hasFile('building_image')) {
            $filename = $request->file('building_image')->store('images', 'public');
            $opportunity->building_image = $filename;
        }

        $opportunity->save();
        return redirect()->route('opportunities.index')->with('success', 'Opportunity created successfully.');
    }

    public function show(Opportunity $opportunity)
    {
        return view('opportunities.show', compact('opportunity'));
    }

    public function edit(Opportunity $opportunity)
    {
        return view('opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, Opportunity $opportunity)
    {

        // Find the opportunity by ID
    $opportunity = Opportunity::findOrFail($opportunity->id);

    // Check if the authenticated user is the owner
    if ($opportunity->user_id !== auth()->id()) {
        return redirect()->route('opportunities.index')->with('error', 'ليس لديك الصلاحية لتعديل الملف لانك ليس المدخل الحقيقي.');
    }


        $request->validate([
            'opportunity_number' => 'required',
            'researcher_name' => 'required',
            'region' => 'required',
            'phone_number' => 'required',
            'building_details' => 'required',
            'contact_details' => 'required',
            'location' => 'required',
           // 'latitude' => 'required',
            //'longitude' => 'required',
            'building_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $opportunity->update($request->all());

        if ($request->hasFile('building_image')) {
            $filename = $request->file('building_image')->store('images', 'public');
            $opportunity->building_image = $filename;
        }

        $opportunity->save();
        return redirect()->route('opportunities.index')->with('success', 'تم تعديل الملف بنجاح.');
    }

    public function destroy(Opportunity $opportunity)

    {
        $opportunity = Opportunity::findOrFail($opportunity->id);

        // Check if the authenticated user is the owner
        if ($opportunity->user_id !== auth()->id()) {
            return redirect()->route('opportunities.index')->with('error', 'ليس لديك الصلاحية لمسح الملف لانك ليس المدخل الحقيقي.');
        }

        $opportunity->delete();
        return redirect()->route('opportunities.index')->with('success', 'تم مسح المف بنجاح.');
    }
}
