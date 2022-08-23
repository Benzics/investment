<?php
/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Services\UserInvestmentService;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{

    public $service;
    public function __construct(UserInvestmentService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $page_title = 'Investment Plans';
        $investments = $this->service->get_investment_plans();

        return view('admin.investments', compact('title', 'page_title', 'investments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $page_title = 'Investment Plans';

        return view('admin.investments-create', compact('title', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'commission' => 'required|numeric',
            'minimum' => 'required|numeric',
            'maximum' => 'required|numeric',
            'type' => 'required|numeric',
            'times' => 'required|numeric',
        ]);

        $data = [
            'name' => $validate['name'],
            'commission' => $validate['commission'],
            'minimum' => $validate['minimum'],
            'maximum' => $validate['maximum'],
            'type' => $validate['type'],
            'commission_type' => $request->commission_type,
            'times' => $validate['times'],
        ];

        $this->service->create_investment_plan($data);

        return redirect('/admin/investments')->with(['success' => 'Investment plan successfully created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = $title = 'Investment Plans';
        $investment = $this->service->get_investment($id);

        return view('admin.investments-view', compact('page_title', 'title', 'investment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = $title = 'Investment Plans';
        $investment = $this->service->get_investment($id);

        return view('admin.investments-edit', compact('page_title', 'title', 'investment', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $investment = $this->service->get_investment($id);

        if(!$investment)
        {
            return back()->with('error', 'Invalid investment plan ID.');
        }

        $validate = $request->validate([
            'name' => 'required',
            'commission' => 'required|numeric',
            'minimum' => 'required|numeric',
            'maximum' => 'required|numeric',
            'type' => 'required|numeric',
            'times' => 'required|numeric',
        ]);

        $data = [
            'name' => $validate['name'],
            'commission' => $validate['commission'],
            'minimum' => $validate['minimum'],
            'maximum' => $validate['maximum'],
            'type' => $validate['type'],
            'commission_type' => $request->commission_type,
            'times' => $validate['times'],
        ];


        $this->service->update_plan($data, $id);
        
        return redirect('/admin/investments/' . $id)->with('success', 'Investment plan edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investment = $this->service->get_investment($id);

        if(!$investment)
        {
            return back()->with('error', 'Invalid investment plan ID.');
        }

        $this->service->delete_plan($id);

        return redirect('/admin/investments')->with('success', 'Investment plan deleted successfully');
    }

    /**
     * Show the user investments
     * @return 
     */
    public function investments()
    {
        $page_title = $title = 'User Investments';
        $investments = $this->service->get_all_investments();

        return view('admin.user-investments', compact('page_title', 'title', 'investments'));
    }
}
