/*
Copyright (c) 2010, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.com/yui/license.html
version: 3.4.0
build: nightly
*/
YUI.add("autocomplete-filters-accentfold",function(d){var c=d.Text.AccentFold,a=d.Text.WordBreak,b=d.Array,e=d.Object;d.mix(d.namespace("AutoCompleteFilters"),{charMatchFold:function(h,g){if(!h){return g;}var f=b.unique(c.fold(h).split(""));return b.filter(g,function(i){var j=c.fold(i.text);return b.every(f,function(k){return j.indexOf(k)!==-1;});});},phraseMatchFold:function(g,f){if(!g){return f;}g=c.fold(g);return b.filter(f,function(h){return c.fold(h.text).indexOf(g)!==-1;});},startsWithFold:function(g,f){if(!g){return f;}g=c.fold(g);return b.filter(f,function(h){return c.fold(h.text).indexOf(g)===0;});},subWordMatchFold:function(h,f){if(!h){return f;}var g=a.getUniqueWords(c.fold(h));return b.filter(f,function(i){var j=c.fold(i.text);return b.every(g,function(k){return j.indexOf(k)!==-1;});});},wordMatchFold:function(h,f){if(!h){return f;}var g=a.getUniqueWords(c.fold(h));return b.filter(f,function(i){var j=b.hash(a.getUniqueWords(c.fold(i.text)));return b.every(g,function(k){return e.owns(j,k);});});}});},"3.4.0",{requires:["array-extras","text-accentfold","text-wordbreak"]});