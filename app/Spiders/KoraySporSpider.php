<?php

namespace App\Spiders;

use App\Models\Category;
use App\Services\CategoryService;
use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Response;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;
use RoachPHP\Support\Configurable;

class KoraySporSpider extends BasicSpider
{
    public array $startUrls = [
        "https://www.korayspor.com"
    ];

    public array $downloaderMiddleware = [
        RequestDeduplicationMiddleware::class,
    ];

    public array $spiderMiddleware = [
        //
    ];

    public array $itemProcessors = [
        SaveToDatabaseItemProcessor::class
    ];

    public array $extensions = [
        LoggerExtension::class,
        StatsCollectorExtension::class,
    ];

    public int $concurrency = 2;

    public int $requestDelay = 1;

    public function __construct(public CategoryService $categoryService)
    {
        parent::__construct();
    }

    /**
     * @return Generator<ParseResult>
     */
    public function parse(Response $response): Generator
    {
        $arr3 = [];

        $response->filter('.featured-item-1  .lvl-3')->each(function ($item) use (&$arr3)
        {
            $item->filter('li')->each(function ($it) use (&$arr3)
            {
                $arr3[] = $it->filter('a')->text();

            });
        });
        $arr3 = array_unique($arr3);

        return yield $this->item([
                              'categories' => $arr3,
                          ]);

    }
}
