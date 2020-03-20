<?php


namespace Trace\Trace\element;


class Element
{
    /** @var string */
    private $tag = 'div';

    /** @var array */
    private $attributes = [];

    /** @var array */
    private $children = [];

    /**
     * Element constructor.
     * @param string $tag
     * @param array $attributes
     * @param array $children
     */
    public function __construct(string $tag, array $attributes, array $children)
    {
        $this->tag = $tag;
        $this->attributes = $attributes;
        $this->children = $children;
    }


}
