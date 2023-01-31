<?php

namespace MbcApiContent\Models;



use MbcApiContent\Models\Factories\PageContentFactory;
use MbcApiContent\Models\Factories\PageFactory;

class PageContent extends BaseModel
{

    protected $table = 'page_content';

    protected $connection = "mysql";



    protected $fillable = [
        "content",
        "page_id",
    ];




//    public function page()
//    {
//        return $this->belongsTo(Page::class, 'page_id', 'id');
//    }



    protected static function newFactory()
    {
        return PageContentFactory::new();
    }

}