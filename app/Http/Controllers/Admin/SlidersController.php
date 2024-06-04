<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use App\Services\SliderService;
use App\Traits\GdgException;
use Illuminate\Http\Request;
use Throwable;

class SlidersController extends Controller
{
    use GdgException;

    public function __construct(public SliderService $sliderService)
    {
    }

    public function index()
    {
        $sliders = $this->sliderService->getAllPaginate();

        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create_edit');
    }

    public function edit(Sliders $slider)
    {
        return view('admin.slider.create_edit', compact('slider'));
    }

    public function update(Request $request, Sliders $slider)
    {
        $request->validate(['path'  => ['required', 'image', 'max:2024', 'mimes:jpeg,jpg,webp,png'],
                            'name'  => ['required', 'string', 'max:255'],
                            'order' => ['sometimes', 'nullable', 'integer']
                           ]);

        try {
            $this->sliderService
                ->prepareData($request->all())
                ->setSlider($slider)
                ->update();

            alert()->success('Başarılı', 'Slider güncellendi.');

            return redirect()->route('admin.slider.index');
        }
        catch (\Throwable $exception) {
            return $this->exception($exception, 'admin.slider.index', "Slider güncellenemedi.");
        }

    }

    public function store(Request $request)
    {
        $request->validate(['path'  => ['required', 'image', 'max:2024', 'mimes:jpeg,jpg,webp,png'],
                            'name'  => ['required', 'string', 'max:255'],
                            'order' => ['sometimes', 'nullable', 'integer']
                           ]);

        try {
            $this->sliderService->prepareData($request->all())->store();
            alert()->success('Başarılı', 'Slider kaydedildi');

            return redirect()->route('admin.slider.index');
        }
        catch (\Throwable $exception) {
            return $this->exception($exception, 'admin.slider.index', "Slider eklenmedi");
        }

    }

    public function delete(Sliders $slider)
    {
        try {
            $this->sliderService->setSlider($slider)->delete();
            alert()->success('Başarılı', 'Slider silindi');

            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, "admin.slider.index", 'Slider Silinemedi');
        }
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;

        $slider = $this->sliderService->getById($id);
        if (is_null($slider)) {
            return response()
                ->json()
                ->setData(['message' => 'Slider bulunamadı'])
                ->setStatusCode(404)
                ->setCharset('utf-8')
                ->header('Content-Type', 'application/json')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $data = ['status' => !$slider->status];

        $this->sliderService
            ->setSlider($slider)
            ->setPrepareData($data)
            ->update();

        return response()
            ->json()
            ->setData($slider)
            ->setStatusCode(200)
            ->setCharset('utf-8')
            ->header('Content-Type', 'application/json')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
