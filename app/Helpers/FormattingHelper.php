<?php
function getToReplaceArray()
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
    return $toReplace;
}

function displayWithFormatting($str)
{
    foreach (getToReplaceArray() as $old => $new)
        $str = str_replace($old, $new, $str);
    $str = preg_replace('~\r\n?~', "\n", $str);
    $str = str_replace("\n\n", '<br/>', $str);
    return $str;
}

function htmlToFormattingForScraper($str)
{
    foreach (getToReplaceArray() as $new => $old)
        $str = str_replace($old, $new, $str);
    return $str;
}

function htmlDomRemoveAllUnwantedTags(&$outertag)
{
    foreach($outertag->find("a") as &$value){
        $value->outertext = $value->text();
    }
    return $outertag;
}
