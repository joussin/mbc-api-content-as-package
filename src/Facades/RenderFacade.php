<?php

namespace MbcApiContent\Facades;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
/**
 *
 *
 * @method static ?string getHtml()
 * @method static void requestToRender(Request $request)
 *
 * @see \MbcApiContent\Services\RenderService;
 */
class RenderFacade  extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'render_service_facade_accessor';
    }
}
