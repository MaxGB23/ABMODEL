<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaq;

use App\Http\Resources\FaqResource;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{


    public function index(Request $request)
    {
        $faqsQuery = Faq::query();
        $this->applySearch($faqsQuery, $request->search);

        $faqs = FaqResource::collection($faqsQuery->paginate(5));

        return inertia('Faqs/Index', [
            'faqs' => $faqs,
            'search' => $request->search ?? ''
        ]);
    }

    protected function applySearch($query, $search)
    {
        return $query->when($search, function($query, $search) {
            $query->where('pregunta','like','%'.$search.'%');
        });
    }

    public function create()
    {
        $faqs = FaqResource::collection(Faq::all());

        return inertia('Faqs/Create', [
            'faqs' => $faqs,

        ]);
    }

    public function store(StoreFaqRequest $request)
    {
        Faq::create($request->validated());

        return redirect()->route('faqs.index');
    }

    public function edit(Faq $faq)
    {
        // $Faqs = FaqResource::collection(Faq::all());

        return inertia('Faqs/Edit', [
            'faq' => FaqResource::make($faq),
        ]);
    }

    public function update(UpdateFaq $request, Faq $faq)
    {
        $faq->update($request->validated());

        return redirect()->route('faqs.index');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index');
    }

    public function show($id)
    {
        return redirect()->route('faqs.index');
    }
}
