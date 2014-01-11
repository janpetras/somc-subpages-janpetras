# SOMC Wordpress Plugin  

## About:  

Based on the [pagelist] plugin at http://wordpress.org/plugins/page-list/ by webvitaly.

Author: Ioan Petras  
Author URI: http://www.ioanpetras.com/  
Plugin Name: somc-subpages-janpetras  
Plugin URI: http://github.com/janpetras/somc-subpages  

## Description:  
[somc], [subpages], [siblings] and [somc_ext] shortcodes  
**Version**: 0.1  
**License**: GNU GPLv3  

## Summary:  
Wordpress plugin.   
Displays pages and subpages with [somc], [subpages], [siblings] and [somc_ext] shortcodes.  

## Documentation  
Shortcodes **[somc]**, **[subpages]**, **[siblings]** are based on **wp_list_pages('title_li=')** function and show hierarchical tree of pages;  
You can use aditional parameters: **[somc depth="2" child_of="4" exclude="6,7,8"]**.  
Shortcodes **[somc]**, **[subpages]** and **[siblings]** accept the same parameters. The only difference is that **[subpages]** and **[siblings]**do not accept **child_of** parameter, because **[subpages]** shows subpages to the current page and **[siblings]** shows subpages to the parent page.  

Shortcode **[somc_ext]** is based on **get_pages()** function and show list of pages with featured image and with excerpt;  
You can use aditional parameters: **[somc_ext child_of="4" exclude="6,7,8" image_width="50" image_height="50"]**.  

## Parameters for **[somc]**, **[subpages]** and **[siblings]**:  

**depth** - means how many levels in the hierarchy of pages are to be included in the list, by default depth is unlimited (depth=0), but you can specify it like this: [somc depth="3"]; If you want to show flat list of pages (not hierarchical tree) you can use this shortcode: [somc depth="-1"];  
**child_of** - if you want to show subpages of the specific page you can use this shortcode: **[somc child_of="4"]** where 4 is the ID of the specific page;   

If you want to show subpages of the current page you can use this shortcodes: **[subpages]** or **[somc child_of="current"]** or **[somc child_of="this"]**;   

If you want to show sibling pages of the current page you can use this shortcodes: **[siblings]** or **[somc child_of="parent"]**;   

**exclude** - if you want to exclude some pages from the list you can use this shortcode: [somc exclude="6,7,8"] where exclude parameter accepts comma-separated list of Page IDs; You may exclude current page with this shortcode: [somc exclude="current"];  
**exclude_tree** - if you want to exclude the tree of pages from the list you can use this shortcode: [somc exclude_tree="7,10"] where exclude_tree parameter accepts comma-separated list of Page IDs (all this pages and their subpages will be excluded);  
**include** - if you want to include certain pages into the list of pages you can use this shortcode: [somc include="6,7,8"] where include parameter accepts comma-separated list of Page IDs;   
**number** - if you want to specify the number of pages to be included into list of pages you can use this shortcode: [somc number="10"]; by default the number is unlimited (number="");  
**offset** - if you want to pass over (or displace) some pages you can use this shortcode: [somc offset="5"]; by default there is no offset (offset="");  
**meta_key** - if you want to include the pages that have this Custom Field Key you can use this shortcode: [somc meta_key="metakey" meta_value="metaval"];  
**show_date** - if you want to show the date of the page you can use this shortcode: [somc show_date="created"]; you can use this values for show_date parameter: created, modified, updated;  
**menu_order** - if you want to specify the column by what to sort you can use this shortcode: [somc sort_column="menu_order"]; 

Default order columns are menu_order and post_title (sort_column="menu_order, post_title"); you can use this values for sort_column parameter: post_title, menu_order, post_date (sort by creation time), post_modified (sort by last modified time), ID, post_author (sort by the page author's numeric ID), post_name (sort by page slug);  

**sort_order** - if you want to change the sort order of the list of pages (either ascending or descending) you can use this shortcode: [somc sort_order="desc"]; by default sort_order is asc (sort_order="asc"); you can use this values for sort_order parameter: asc, desc;  
**link_before** - if you want to specify the text or html that precedes the link text inside the link tag you can use this shortcode: [somc link_before="<span>"]; you may specify html tags only in the HTML tab in your Rich-text editor;  
**link_after** - if you want to specify the text or html that follows the link text inside the link tag you can use this shortcode: [somc link_after="</span>"]; you may specify html tags only in the HTML tab in your Rich-text editor;  
class - if you want to specify the CSS class for list of pages you can use this shortcode: [somc class="listclass"]; by default the class is empty (class="");  

## Parameters for **[somc_ext]**:  

**show_image** - show or hide featured image [somc_ext show_image="0"]; "show_image" have higher priority than "show_first_image"; by default: show_image="1";  
**show_first_image** - show or hide first image from content if there is no featured image [somc_ext show_first_image="1"]; by default: show_first_image="0";  
**show_title** - show or hide title [somc_ext show_title="0"]; by default: show_title="1";  
**show_content** - show or hide content [somc_ext show_content="0"]; by default: show_content="1";  
**more_tag** - if you want to output all content before and after more tag use this shortcode: [somc_ext more_tag="0"]; this parameter does not add "more-link" to the end of content, it just cut content before more-tag; "more_tag" parameter have higher priority than "limit_content"; by default the more_tag is enabled (more_tag="1") and showing only content before more tag;  
**limit_content** - content is limited by "more-tag" if it is exist or by "limit_content" parameter [somc_ext limit_content="100"]; by default: limit_content="250";  
**image_width** - width of the image [somc_ext image_width="80"]; by default: image_width="50";  
**image_height** - height of the image [somc_ext image_height="80"]; by default: image_height="50";  
**child_of** - if you want to show subpages of the specific page you can use this shortcode: [somc_ext child_of="4"] where 4 is the ID of the specific page; by default it shows subpages to the current page;  
**parent** - if you want to show subpages of the specific page only you can use this shortcode: [somc_ext parent="4"] where 4 is the ID of the specific page and the depth will be only one level; by default parent="-1" and depth is unlimited;  
**sort_order** - if you want to change the sort order of the list of pages (either ascending or descending) you can use this shortcode: [somc_ext sort_order="desc"]; by default: sort_order="asc"; you can use this values for sort_order parameter: asc, desc;  
**sort_column** - if you want to specify the column by what to sort you can use this shortcode: [somc_ext sort_column="menu_order"]; by default order columns are sort_column and post_title (sort_column="menu_order, post_title");   

You can use this values for sort_column parameter: post_title, menu_order, post_date (sort by creation time), post_modified (sort by last modified time), ID, post_author (sort by the page author's numeric ID), post_name (sort by page slug);  

**hierarchical** - display sub-pages below their parent page [somc_ext hierarchical="0"]; by default: hierarchical="1";  
**exclude** - if you want to exclude some pages from the list you can use this shortcode: [somc_ext exclude="6,7,8"] where exclude parameter accepts comma-separated list of Page IDs;  
**exclude_tree** - if you want to exclude the tree of pages from the list you can use this shortcode: [somc_ext exclude_tree="7,10"] where exclude_tree parameter accepts comma-separated list of Page IDs (all this pages and their subpages will be excluded);  
**include** - if you want to include certain pages into the list of pages you can use this shortcode: [somc_ext include="6,7,8"] where include parameter accepts comma-separated list of Page IDs;  
**meta_key** - if you want to include the pages that have this Custom Field Key you can use this shortcode: [somc_ext meta_key="metakey" meta_value="metaval"];  
**authors** - only include the pages written by the given author(s) [somc_ext authors="6,7,8"];  
**number** - if you want to specify the number of pages to be included into list of pages you can use this shortcode: [somc_ext number="10"]; by default the number is unlimited (number="");  
**offset** - if you want to pass over (or displace) some pages you can use this shortcode: [somc_ext offset="5"]; by default there is no offset (offset="");  
**post_type** - [somc_ext post_type="page"];  
**post_status** - [somc_ext post_status="publish"];  
**class** - if you want to specify the CSS class for list of pages you can use this shortcode: [somc_ext class="listclass"]; by default the class is empty (class="");  
**strip_tags** - if you want to output the content with tags use this shortcode: [somc_ext strip_tags="0"]; by default the strip_tags is enabled (strip_tags="1");  
**strip_shortcodes** - if you want to output the content with shortcode use this shortcode: [somc_ext strip_shortcodes="0"]; by default the strip_shortcodes is enabled (strip_shortcodes="1") and all registered shortcodes are removed;  
**show_child_count** - if you want to show child count you can use this shortcode: [somc_ext show_child_count="1"]; by default the child_count is disabled (show_child_count="0"); If show_child_count="1", but count of subpages=0, than child count is not showing;  
**child_count_template** - if you want to specify the template of child_count you can use this shortcode: [somc_ext show_child_count="1" child_count_template="Subpages: %child_count%"]; by default child_count_template="Subpages: %child_count%";  
**show_meta_key** - if you want to show meta key you can use this shortcode: [somc_ext show_meta_key="your_meta_key"]; by default the show_meta_key is empty (show_meta_key=""); If show_meta_key is enabled, but meta_value is empty, than meta_key is not showing;  
**meta_template** - if you want to specify the template of meta you can use this shortcode: [somc_ext show_meta_key="your_meta_key" meta_template="Meta: %meta%"]; by default meta_template="%meta%";  