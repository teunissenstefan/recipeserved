<?php
function displayWithFormatting($str)
{
    $toReplace = [
        "<" => "&lt;",
        ">" => "&gt;",

        "[li]" => "<li>",
        "[/li]" => "</li>",
        "[ul]" => "<ul>",
        "[/ul]" => "</ul>",
        "[ol]" => "<ol>",
        "[/ol]" => "</ol>",
        "[b]" => "<b>",
        "[/b]" => "</b>",
        "[strong]" => "<strong>",
        "[/strong]" => "</strong>",
        "[i]" => "<i>",
        "[/i]" => "</i>",
        "[em]" => "<em>",
        "[/em]" => "</em>",
        "[p]" => "<p>",
        "[/p]" => "</p>",
        "[small]" => "<small>",
        "[/small]" => "</small>",
    ];
    foreach($toReplace as $old=>$new)
        $str = str_replace($old,$new, $str);
    return nl2br($str);
}
