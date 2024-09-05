<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\FormDetail;
//use Illuminate\Http\Request;
//
//class ItAssetTransferController extends Controller
//{
//    public function index()
//    {
//        $forms = FormDetail::orderBy('created_at', 'desc')->paginate(10);
//        return view('forms.index', compact('forms'));
//    }
//
//    public function create()
//    {
//        return view('forms.create');
//    }
//
//    public function store(Request $request)
//    {
//        $formDetail = FormDetail::create($request->all());
//
//        if ($request->has('assets')) {
//            foreach ($request->input('assets') as $assetData) {
//                $formDetail->itAssets()->create($assetData);
//            }
//        }
//
//        return redirect()->route('forms.show', $formDetail);
//    }
//
//    public function show(FormDetail $form)
//    {
//        return view('forms.show', compact('form'));
//    }
//}
