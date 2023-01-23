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


const DISTINCT_PREFIX = "dataset___";

/**
 * $jQuery.setDataset(options)
 *
 * options: {data: {id: 1, title: "test"}, prefix: "period"}
 * @param options
 */
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
    // console.log('excludes option clean', excludes);

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

/**
 * @param dataset
 * @returns {boolean}
 */
jQuery.fn.removeDataset = function (dataset) {

    for (const data of dataset) {
        $(this).removeAttr("data-" + data);
    }
    return true;
};

// jQuery.fn.getDataset = function (options) {
//     options = (typeof options !== "undefined") ? options : {};
//     var excludes = (typeof options.excludes !== "undefined") ? options.excludes : null;
//     var filter = (typeof options.filter !== "undefined") ? options.filter : null;
//
//     var nativeObj = this.get(0);
//
//     var result = {};
//
//     $.each(nativeObj.attributes, function (index, value) {
//
//         var attrName = value.name;
//         var attrValue = value.value;
//
//         if ((excludes === null || !excludes.includes(attrName)) && attrName.includes("data-")) {
//
//             // on retire le "data-"
//             // on recupere le string apres "data-"
//             var attrName_first_delimiter = attrName.indexOf('-');
//             var data_attr = attrName.substr(attrName_first_delimiter + 1);
//
//             // if( filter !== null ) {
//             //
//             //     // on recupere le premier string avant _ si existe
//             //     var data_attr_first_delimiter = data_attr.indexOf('_');
//             //     var data_attr_sub = data_attr.substr(0, data_attr_first_delimiter + 1);
//             //     var data_attr_sub_2 = data_attr.substr(data_attr_first_delimiter + 1);
//             //
//             //     console.log("--------------------------")
//             //     console.log("--------------------------")
//             //     console.log("--------------------------")
//             //     console.log("--------------------------")
//             //     console.log("--------------------------")
//             //     console.log({data_attr: data_attr})
//             //     console.log({data_attr_sub: data_attr_sub})
//             //     console.log({data_attr_sub_2: data_attr_sub_2})
//             //
//             //
//             //     if( data_attr_sub !== "")
//             //     {
//             //         if(Array.isArray(filter)){
//             //
//             //             // ......
//             //
//             //         } else if (filter instanceof String && data_attr_sub.includes(filter))
//             //         {
//             //
//             //                 result[filter][data_attr]  = attrValue;
//             //
//             //
//             //         }else {
//             //             result[data_attr] = attrValue;
//             //         }
//             //     } else {
//             //         result[data_attr] = attrValue;
//             //     }
//             //
//             // }
//             // else {
//             result[data_attr] = attrValue;
//             // }
//         }
//     });
//
//
//     return result;
// };

/**
 *
 * @param dataset
 * @returns {{}}
 */
jQuery.fn.hasDataset = function (dataset) {

    var exists = {};

    for (const data of dataset) {
        var exist = $(this).attr("data-" +data);
        if(typeof exist === "undefined"){
            exists[data] = false;
        } else {
            exists[data] = exist;
        }
    }
    return exists;
};




// ----------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------




// String.prototype.isInteger = function()
// {
//     if(isNaN(this)){
//         return false;
//     }
//     that = Number(this)
//
//     return Number.isInteger(that);
// }
//
// String.prototype.isFloat = function()
// {
//     // todo: error sur ***.00
//
//     if(isNaN(this)){
//         return false;
//     }
//     that = Number(this)
//
//     test = Number.isInteger(that);
//
//     if(!test && that === Number.parseFloat(that))
//     {
//         return true;
//     }
//
//     return false;
// }
//
// String.prototype.isNumber = function()
// {
//
//     return this.isInteger() || this.isFloat();
// }
// String.prototype.isString = function()
// {
//
//     return (typeof this === 'string' || this instanceof String);
// }
// String.prototype.isDate = function()
// {
//     // todo: marche pas bien
//     return (!isNaN(Date.parse(this)));
// }
//
// String.prototype.parseData = function()
// {
//     // todo: marche pas bien
//
//     var parsed = this;
//
//     if(  isNaN(parsed) )
//     {
//         return parsed;
//     }
//
//     parsed = Number(parsed);
//
//
//     return parsed;
// }
//
//
// // https://jqueryvalidation.org/validate/
//
// /**
//  *
//  * @param datasetValidator
//  * @returns {{}}
//  */
// jQuery.fn.hasValidatedDataset = function (datasetValidator) {
//
//     var exists = {};
//
//     for (const property in datasetValidator) {
//
//         dataValue = $(this).attr("data-" + property);
//         dataName = "data-" + property;
//         dataTypeExcept = datasetValidator[property];
//
//         dataTypeFound = (typeof (dataValue));
//
//         if(dataTypeExcept === "string"){
//             dataValueParsed = (dataValue).parseData();
//             dataValueParsedTypeFound = dataValue.isString() ? 'string' : (typeof (dataValueParsed));
//         }
//         else if(dataTypeExcept === "integer"){
//             dataValueParsed = dataValue.parseData();
//             dataValueParsedTypeFound = dataValue.isInteger() ? 'integer' : (typeof (dataValueParsed));
//         }
//         else if(dataTypeExcept === "float"){
//             dataValueParsed = dataValue.parseData();
//             dataValueParsedTypeFound = dataValue.isFloat() ? 'float' : (typeof (dataValueParsed));
//         }
//         else if(dataTypeExcept === "number"){
//             dataValueParsed = dataValue.parseData();
//             dataValueParsedTypeFound = dataValue.isNumber() ? 'number' : (typeof (dataValueParsed));
//         }
//         else if(dataTypeExcept === "date"){
//             dataValueParsed = dataValue.parseData();
//             dataValueParsedTypeFound = dataValue.isDate() ? 'date' : (typeof (dataValueParsed));
//         }
//
//         var test = (dataTypeExcept === dataValueParsedTypeFound);
//
//
//         console.log("-------------------");
//         console.log("-------------------");
//
//         console.log({
//             dataValue: dataValue,
//             dataName: dataName,
//             dataTypeExcept: dataTypeExcept,
//             // dataValueParsed: dataValueParsed,
//             // dataTypeFound: dataTypeFound,
//             dataValueParsedTypeFound: dataValueParsedTypeFound,
//             test: (dataTypeExcept === dataValueParsedTypeFound),
//         })
//
//
//         if(typeof  (dataValue) === "undefined"){
//             exists[property] = null;
//         }
//         else if(test){
//             exists[property] = true;
//         }
//         else
//         {
//             exists[property] = false;
//         }
//
//     }
//     console.log("--------hasValidatedDataset-----------");
//     console.log({
//         "resultTests": exists
//     })
//     return exists;
// };
//


