# PHP-getPage

Allows you to get multiple parts of the URL.
_Note: this code doesn't work well on "pretty URLs" such as those used in Laravel._

# Options

For all of these options, it is assumed that the URL will be `http://www.example.com/folder/index.php?sort=true`, unless otherwise stated.

## `'' `- No option

A simple case that will simply return the entire URL with HTTP scheme and all URL parameters.

## `'a'` - Page name, extension, and URL parameters

This will return everything from the name of the page until the end of the URL.

    $url = get_page('a');
    echo $url; // index.php?sort=true

## `'b'` - Full url, excluding extension onwards

Get the entire URL up to, and including, the file name; excluding everything that comes after the file extension.

    $url = get_page('b');
    echo $url; // http://www.example.com/index

Combining both, the `a` and `b` options, it is possible to just return the name of the file and ignore everything else.  
This is useful in the following examples:

    <ul id="nav">
        <li class="button <?= get_page('ab') == 'page1' ? 'active' : 'inactive'; ?>"><a href="page1.php">Page 1</a></li>
        <li class="button <?= get_page('ab') == 'page2' ? 'active' : 'inactive'; ?>"><a href="page2.php">Page 2</a></li>
    </ul>

In the above example, depending on the current active page, that list item will be given the class of `active` and any other page will be given the `inactive` class.

## `'c'` - Entire URL up to, and including the file extension

Self explanatory, I hope! Anyway, here's an example.

    $url = get_page('c');
    echo $url; // http://www.example.com/index.php

## `'d'` - Return the query string

Again, I hope this is quite obvious in what it does. One thing to note is that it strips the question mark (?) from the start of the string.

    $url = get_page('d');
    echo $url; // sort=true

## `'e'` - Returns the domain name

Extracts just the domain from the URL.

    $url = get_page('e');
    echo $url; // example

## `'f'` - Returns the domain with HTTP scheme and Top-Level Domain (TLD)

This is probably easier to describe by just showing the example...

    $url = get_page('f');
    echo $url; // http://www.example.com

## `'g'` - Full URL, excluding the file name

Similar to `b` or `c`, with the exception that this will exclude the file name from the string.

    $url = get_page('g');
    echo $url; // http://www.example.com/folder
