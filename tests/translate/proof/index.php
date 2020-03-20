<?php


//$props = array(
//    'header' => null,
//    'body'  => null,
//    'footer' => null
//);
function templateA(array $props)
{
    $header = $props['header'] ? "<p>{$props['header']}</p>" : '';
    $body = $props['body'] ? "<p>{$props['body']}</p>" : '';
    $footer = $props['footer'] ? "<p>{$props['footer']}</p>" : '';

    return <<<EOT
    <h1>A Message From the Developer Template using a function</h1>
    $header
    $body
    $footer
EOT;

}

$direct_attributes = array(
    'header' => 'hello',
    'body' => 'world',
    'footer' => 'goodbye'
);


//this is attributes in gutenburg
$data = array(
    'title' => 'Blogs',
    'content' => 'hello world',
    'byline' => 'goodbye'
);

$translation = array(
    'title' => 'header',
    'content' => 'body',
    'byline' => 'footer'
);

//foreach ($translate as $key => $value) {
//    $props[$value] = $attributes[$key];
//}

function translate(array $attributes, callable $template, ?array $translation = null)
{

    if ($translation) {
        foreach ($translation as $key => $value) {
            $props[$value] = $attributes[$key];
        }
        return isset($props) ? $template($props) : '';
    }

    return $template($attributes);

}

/**
 * @param callable $template
 * @param array|null $translation
 * @return Closure
 */
function translator(callable $template, ?array $translation = null)
{
    return function (array $attributes) use ($template, $translation) {
        return translate($attributes, $template, $translation);
    };
}


//using direct attributes
$template_with_direct_attributes = templateA($direct_attributes);
echo "\n";
echo "Direct Attributes With Template: \n";
echo $template_with_direct_attributes;
echo "\n";

//using direct attributes with translate
$translate_with_direct_attributes = translate($direct_attributes, 'templateA');
echo "\n";
echo "Direct Attributes With Translation: \n";
echo $translate_with_direct_attributes;
echo "\n";


//using direct attributes with translate and blueprint
$translator_with_blue_print = translator('templateA', $translation);
$translation_for_templateA_translator = $translator_with_blue_print($data);
echo "\n";
echo "Direct Attributes With Translation: \n";
echo $translation_for_templateA_translator;
echo "\n";
