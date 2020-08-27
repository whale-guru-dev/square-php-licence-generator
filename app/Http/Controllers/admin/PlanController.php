<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Model\Plans;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $plans = Plans::all();

        return view('admin.plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'term' => 'required',
        ]);

        Plans::create([
            'name' => $request->name,
            'price' => $request->price,
            'term' => $request->term. " minutes"
        ]);

        return redirect()->route('plans.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plans::find($id);
        return view('admin.plan.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plan = Plans::find($id);
        return view('admin.plan.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $plan = Plans::find($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'term' => 'required'
        ]);


        $plan->update([
            'name' => $request->name,
            'price' => $request->price,
            'term' => $request->term. " minutes"
        ]);

        return redirect()->route('plans.index')->with('success', 'Plan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plans::find($id);
        $plan->delete();

        return redirect()->route('plans.index')
            ->with('success', 'Plan deleted successfully');
    }
}
