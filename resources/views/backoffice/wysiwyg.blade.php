<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        #container {
            /*width: 1000px;*/
            /*margin: 20px auto;*/

            width: 100%;
            margin: 0;
        }
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }







        .dropdown-menu li
        {
            border-bottom: 1px solid #5b5b5b;
        }


        .dropdown-menu li:nth-child(odd)
        {
            background: #ffffff;
        }
        .dropdown-menu li:nth-child(even)
        {
            background: #ececec;
        }

        .dropdown-menu-header{
            margin: 0;
        }
        .dropdown-menu-header a{
            font-size: 15px;
        }

        div.dropdown-menu-footer{
            font-size: 13px;
            padding-bottom: 10px;
            padding-top: 10px;
            padding-left: 30px;
        }

        p.dropdown-menu-footer-header
        {

            margin: 0;
            display: inline;

        }

        p.dropdown-menu-footer-separator
        {
            font-weight: bolder;
            display: inline;
            margin: 0;
            width: 5px;
        }

        p.dropdown-menu-footer-footer
        {
            margin: 0;
            display: inline;
        }


        .template-edit-btn,
        .page-edit-btn
        {
            display: inline;
            margin: 0;
            padding: 0;
            text-decoration: underline;
            color: #3869d4;
        }

        p.dropdown-menu-footer-footer i
        {

        }




        /*POPOVER*/


        .popover
        {
            width: 400px;
        }

        .popover-arrow
        {

        }

        .popover-header
        {

        }

        .popover-body
        {

        }




    </style>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/super-build/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/super-build/translations/es.js"></script>

    <link
        href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
        rel="stylesheet"  type='text/css'>
</head>
<body>






<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Backoffice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($pages as $page)

                            <li  >
                                <p class="dropdown-menu-header">
                                    <a href="#" id="page_{{$page['id']}}"   class="dropdown-item  page-edit-btn"   >
                                        <strong>{{$page['id']}}</strong> <small><i>{{$page['alias']}}</i></small>
                                    </a>
                                </p>



                                <div class="dropdown-menu-footer">

                                    <p class="dropdown-menu-footer-header">
                                        <i class="fa fa-arrow-right"></i> template_id: <strong>{{$page['template_id']}}</strong>
                                    </p>
                                    <p class="dropdown-menu-footer-separator"></p>
                                    <p class="dropdown-menu-footer-footer">
{{--                                         <a class="dropdown-item template-edit-btn" href="#" id="page_template_{{$page['template_id']}}">--}}
{{--                                            <i class="fa fa-link"></i>--}}
{{--                                        </a>--}}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Templates
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($templates as $template)

                            <li>
                                <p class="dropdown-menu-header">
                                    <a href="#"        class="dropdown-item"  >
                                        {{$template['id']}}: {{$template['alias']}}
                                    </a>
                                    <a class="dropdown-item template-edit-btn" href="#" id="template_{{$template['id']}}">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </p>

                            </li>
                        @endforeach
                    </ul>
                </li>



            </ul>
        </div>
    </div>
</nav>


<div id="container">
    <div id="editor">
    </div>
</div>


<script>



    function showLoader()
    {

        // $("body").append(
        //     '<div class="spinner-border" role="status"> <span class="visually-hidden">Loading...</span></div>'
        // )
    }


    function hideLoader()
    {
        // $("body").find('.spinner-border').remove()
    }

    function phpModelCollectionToJs() {
        var pagesJsonCollection = [];
        var templatesJsonCollection = [];

        <?php
        foreach ($pages as $index => $page) {
            $pageArrayAsJson = json_encode($page);
        ?>
                var pageJsonObj = <?php echo $pageArrayAsJson; ?>;
                pagesJsonCollection.push(pageJsonObj);
       <?php
        }
        ?>


        <?php
        foreach ($templates as $index => $template) {
            $templateArrayAsJson = json_encode($template);
        ?>
            var templateJsonObj = <?php echo $templateArrayAsJson; ?>;
            templatesJsonCollection.push(templateJsonObj);
        <?php
        }
        ?>

        // console.log("pages collection", pagesJsonCollection)
        // console.log("templates collection", templatesJsonCollection)

            return {
                "pages" : pagesJsonCollection,
                "templates" : templatesJsonCollection,
            };
    }



    function hydrateButton(selector, obj)
    {
        console.log('---hydrateButton---')
        console.log('selector', selector)
        console.log('obj', obj)

        $(selector).setDataset({
            data: obj,
            prefix: 'bo_api_content'
        })
    }

    function hydrateCollectionButton(collection, selector)
    {
        var htmlElementCollections = collection;

        for (const index in htmlElementCollections) {

            var selector_index = selector + (htmlElementCollections[index].id);

            hydrateButton(selector_index, htmlElementCollections[index])
        }
    }





    function getDataset(selector)
    {

        var excludes = ["href",  "data-bs-toggle",   "data-bs-placement"];

        var prefix = 'bo_api_content';


        var options = {
            excludes:  excludes,
            prefix: {filter: prefix, clean: prefix}
        }

        var dataset = $(selector).getDataset(options)

        return dataset;
    }


    $( document ).ready(function() {


        collections = phpModelCollectionToJs();



        hydrateCollectionButton(collections.pages, "#page_")
        hydrateCollectionButton(collections.templates, "#template_")


        // $('.page-edit-btn').on('click', function(e){
        //     e.preventDefault()
        //     console.log('----------PAGE click---------')
        //
        //     var id = $(this).attr('id');
        //     console.log('id', id)
        //     var dataset =  getDataset('#' + id)
        //     console.log('----------PAGE dataset---------')
        //     console.log(dataset)
        //     return;
        //
        //
        //
        // });



        $('.template-edit-btn').on('click', function(e){
            e.preventDefault()
            console.log('----------TEMPLATE click---------')

            var id = $(this).attr('id');

            console.log('id', id)

            var dataset =  getDataset('#' + id)
            console.log('----------TEMPLATE dataset---------')
            console.log(dataset)


            showLoader();


            editor(dataset.template_content, true)


            hideLoader();

            // ajax("GET", "/api/template/" + dataset.id, {},
            //     function( msg, textStatus, xhr ) {
            //     // console.log( msg, textStatus, xhr )
            //
            //     editor(msg.template_content, true)
            //
            // }, function( jqXHR, textStatus ) {
            //
            //     console.log(  textStatus, xhr )
            // })



        });


        // initTooltip('page-edit-btn');
        // initTooltip('template-edit-btn');


        initPopover('page-edit-btn');
        initPopover('template-edit-btn');

    });





    function setTitleContent(element, className)
    {

        if(className === 'page-edit-btn')
        {
            var dataset =  getDataset('#' + element.id)



            var HTML = '';
             HTML += 'Page model:';
             HTML += '<br>';
             HTML += 'Page.id='+dataset.id;
            HTML += '<br>';
            HTML += 'Page.alias='+dataset.alias;
            HTML += '<br>';
            HTML += 'Page.url='+dataset.url;
            HTML += '<br>';
            HTML += 'Page.template_id='+dataset.template_id;

            return HTML;
        }
        else if(className === 'template-edit-btn')
        {
            var dataset =  getDataset('#' + element.id)

            // console.log("setTitleContent.Element.Template.dataset", dataset)

            // // console.log(dataset)

            var HTML = '';
            HTML += 'Template model:';
            HTML += '<br>';
            HTML += 'Template.id='+dataset.tid;

            HTML += '<br>';
            HTML += 'Template.alias='+dataset.alias;


            HTML += '<br>';
            HTML += 'Template.version='+dataset.version;





            HTML += '<br>';
            HTML += 'Template.template_data='+dataset.template_data;





            HTML += '<br>';
            HTML += 'Template.template_data_value_object='+dataset.template_data_value_object;



            return HTML;
        }

        return "default";
    }



    // initTooltip('page-edit-btn')
    function initTooltip(name)
    {
        var elements = document.getElementsByClassName(name)

        for (const element of elements) {

            element.setAttribute('data-bs-toggle', 'tooltip');
            element.setAttribute('data-bs-placement', 'top');

            var tooltip = new bootstrap.Tooltip(element, {html: true})

            element.setAttribute('title', setTitleContent(element, name));
        }
    }


    // initPopover('page-edit-btn')
    function initPopover(name)
    {
        var elements = document.getElementsByClassName(name)

        for (const element of elements) {

            element.setAttribute('data-bs-toggle', 'popover');
            element.setAttribute('data-bs-trigger', 'hover focus');
            element.setAttribute('data-bs-placement', 'top');
            element.setAttribute('data-bs-content', "And here's some amazing content. It's very engaging. Right?");

            element.setAttribute('title', setTitleContent(element, name));

            var popover = new bootstrap.Popover(element, {html: true})
        }
    }




    function ajax(method, url, data, callbackDone, callbackFail)
    {
        $.ajax({
            method      : method,
            url         : url,
            data        : data,
            dataType    : "json"
        })
            .done(function( msg, textStatus, xhr ) {
                if(typeof callbackDone != "undefined"){
                    callbackDone(msg, textStatus, xhr);
                }
            })
            .fail(function( jqXHR, textStatus ) {
                if(typeof callbackFail != "undefined"){
                    callbackFail(jqXHR, textStatus );
                }
            });
    }



    function editor(content, editor = false){
        // "/backoffice/wysiwyg/editor_example"

        var container = document.querySelector( '#editor' );

        console.log(container)

        $(container).html(content);

        if(editor){
            classicEditor(container);
        }
    }

    function classicEditor(container){

// This sample still does not showcase all CKEditor 5 features (!)
// Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(container, {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF','exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Welcome to CKEditor 5!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType
                'MathType'
            ]
        });



    }









// jQuery.dataset.js EXPORT IN EXTERN FILE --------------------------------------------------
// jQuery.dataset.js EXPORT IN EXTERN FILE --------------------------------------------------
// jQuery.dataset.js EXPORT IN EXTERN FILE --------------------------------------------------
// jQuery.dataset.js EXPORT IN EXTERN FILE --------------------------------------------------

    /*
jQuery.dataset.js

jQuery helper for HTML Dom Node dataset attribute

    - set dataset with js Object
    - get dataset with filter / set dataset with prefix/filter
    - has dataset property
    - remove dataset



$btn.hasDataset(
    ['period_id', 'period_title', 'period_list_friend', 'period_date_start']
);

$btn.hasDataset(
    ['period_title']
);


var excludes = ["href",  "data-bs-toggle",   "data-bs-placement"];

var prefix = 'bo_api_content';


var options = {
    excludes:  excludes,
    prefix: {filter: prefix, clean: prefix}
}

var dataset = $(selector).getDataset(options)



$btn.hasValidatedDataset(
    {
        period_id: 'integer',
        period_title: 'string',
        period_list_friend: 'number',
        period_date_start: 'date'
    }
);

$btn.hasValidatedDataset(
    {
    period_id: 'integer'
    }
);



$btn.removeDataset(
    ['period_id', 'period_title', 'period_list_friend', 'period_date_start']
);

$btn.removeDataset(
    ['period_title']
);



*/


    const DISTINCT_PREFIX = "backoffice_api_content";


    String.prototype.while1stCharNotClean = function()
    {
        var that = this;

        while( /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(that[0]) )
        {
            that = that.slice(1, that.length-1)
        }
        return that;
    }

    String.prototype.cleanDomAttributeName = function()
    {
        var that = this;
        that = that.toLowerCase();
        that = that.trim();
        that = that.replace(' ', '');
        that = that.replace('-', '_');
        //that = that.while1stCharNotClean();
        return that;
    }





    jQuery.fn.setDataset = function (options) {

        options = (typeof options !== "undefined") ? options : {};

        var data = (typeof options.data !== "undefined") ? options.data : {};
        var prefix = (typeof options.prefix !== "undefined") ? options.prefix : '';

        //clean prefix
        prefix = prefix.cleanDomAttributeName();
        prefix = DISTINCT_PREFIX + '_' + prefix;

        for (const property in data) {
            var key = property;
            var value = data[property];

            // clean key
            key = key.cleanDomAttributeName();

            var attribute_data = 'data-' + prefix + '_' + key;
            // clean value
            var attribute_value = (typeof value !== "undefined") ? value : "null";

            $(this).attr(attribute_data, attribute_value);
        }
    };




    /**
     * $btn.getDataset(options);
     * options : { excludes: ["toggle"], prefix: {filter: 'auth', clean: 'auth'}" }
     *
     * excludes : array|null
     * prefix : obj|null
     * prefix.filter : return only data attr with prefix
     * prefix.clean : return data attr with name cleaned of prefix
     *
     * @param options
     * @returns {{}}
    */
    jQuery.fn.getDataset = function (options) {

        options = (typeof options !== "undefined") ? options : {};
        var excludes = (typeof options.excludes !== "undefined") ? options.excludes : null;
        var prefix = (typeof options.prefix !== "undefined") ? options.prefix : null;

        // clean 'excludes' option
        excludes.forEach(function(exclude){
            if(!exclude.includes('data-')){
                excludes.push("data-" + exclude)
            } else {
                excludes.push(exclude.replace('data-',''))
            }
        });

        var thisNative = this.get(0);

        var result = {};
        $.each(thisNative.attributes, function (index, attribute) {

            if ( (excludes === null || !excludes.includes(attribute.name)) && attribute.name.includes("data-")) {
                // on retire le "data-"
                // on recupere le string apres "data-"
                var attribute_name_datastr_index = attribute.name.indexOf('-');
                var attribute_name_without_datastr = attribute.name.substr(attribute_name_datastr_index + 1);
                attribute_name_without_datastr = attribute_name_without_datastr.replace(DISTINCT_PREFIX+'_', "");
                result[attribute_name_without_datastr] = attribute.value;
            }
        });


        if (typeof options.prefix !== "undefined" && typeof options.prefix.filter !== "undefined") {
            // remove elem has start with :  DISTINCT_PREFIX + '_' + prefix;
            for (key in result) {
                var start_test_str = options.prefix.filter;
                if (!key.startsWith(start_test_str)) {
                    delete result[key];
                }
            }
        }


        if (typeof options.prefix !== "undefined" && typeof options.prefix.clean !== "undefined") {
            // if elem start with :  DISTINCT_PREFIX + '_' + prefix;
            // remove prefix to hve clean obj
            for (key in result) {
                var start_test_str = options.prefix.clean;
                if (key.startsWith(start_test_str)) {
                    var key_ = key.replace(start_test_str+'_','');
                    result[key_] = result[key];
                    delete result[key];
                }
            }
        }

        return result;
    };



</script>
</body>
</html>
