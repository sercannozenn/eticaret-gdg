<?php

namespace App\Spiders;

use App\Services\CategoryService;
use Monolog\Processor\ProcessorInterface;
use RoachPHP\ItemPipeline\Item;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;

class SaveToDatabaseItemProcessor implements ItemProcessorInterface
{
    use Configurable;

    public function __construct(public CategoryService $categoryService)
    {
    }

    public function processItem(ItemInterface $data): ItemInterface
    {
        $arr = ['Kadın', 'Erkek', 'Çocuk'];
        $categories = array_values($data['categories']);
        foreach ($arr as $item) {
            $mainCategory = $this->categoryService->setPrepareData([
                                                                       'name'   => $item,
                                                                       'status' => 1,
                                                                       'slug'   => str_slug($item)
                                                                   ])->create();
            foreach ($categories as $subCat) {
                if (!str_contains($subCat, '&')){
                    try {
                        $this->categoryService->setPrepareData([
                                                                   'name'      => $subCat,
                                                                   'status'    => 1,
                                                                   'slug'      => str_slug($item.' '.$subCat),
                                                                   'parent_id' => $mainCategory->id
                                                               ])->create();
                    }
                    catch (\Exception $exception){
                        dd($subCat, $item);
                    }
                }

            }
        }
        return $data;
    }
}
