<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;
use App\Models\Category;
use App\Models\News;
use App\Models\Resource;
use App\Services\ParserService;
use Illuminate\Http\Request;
use App\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $rssLinks = Resource::all();

        foreach ($rssLinks as $rssLink) {
            $this->dispatch(new NewsJob($rssLink->resource_url));
        }

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'The news has been successfully parsed');
    }
}
