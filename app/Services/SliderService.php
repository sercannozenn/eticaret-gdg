<?php

namespace App\Services;

use App\Models\Sliders;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;

class SliderService
{
    private array $preparedData = [];

    public function __construct(public Sliders $sliders, public ImageService $imageService)
    {
    }

    public function store(): Sliders
    {
        return $this->sliders::create($this->preparedData);
    }

    public function update(): bool
    {
        return $this->sliders->update($this->preparedData);
    }

    public function delete(): bool
    {
        return $this->sliders->delete();
    }

    public function getById(int $sliderID): Sliders | null
    {
        return $this->sliders::find($sliderID);
    }

    public function getAllPaginate(int $page = 10, $orderBy = ['order', 'DESC']): LengthAwarePaginator
    {
        return $this->sliders::orderBy($orderBy[0], $orderBy[1])->paginate($page);
    }


    public function prepareData(array $data): self
    {
        $path = $this->imageUpload($data['path'], $data['name']);

        $this->preparedData = [
            'name'           => $data['name'],
            'path'           => $path,
            'status'         => isset($data['status']) ? 1 : 0,
            'release_start'  => $data['release_start'],
            'release_finish' => $data['release_finish'],
            'order'          => $data['order'],
            'row_1_text'     => $data['row_1_text'],
            'row_1_color'    => $data['row_1_color'],
            'row_1_css'      => $data['row_1_css'],
            'row_2_text'     => $data['row_2_text'],
            'row_2_color'    => $data['row_2_color'],
            'row_2_css'      => $data['row_2_css'],
            'button_text'    => $data['button_text'],
            'button_url'     => $data['button_url'],
            'button_target'  => $data['button_target'],
            'button_color'   => $data['button_color'],
            'button_css'     => $data['button_css'],
        ];
        return $this;
    }

    public function setPrepareData(array $data):self
    {
        $this->preparedData = $data;

        return $this;
    }

    public function setSlider(Sliders $sliders):self
    {
        $this->sliders = $sliders;
        return $this;
    }

    public function imageUpload(UploadedFile $image, string $fileName): string|null
    {
        $path = 'uploads/sliders/original';
//        $fileName =
        return $this->imageService->singleUpload($image, $fileName, $path);
    }
}
