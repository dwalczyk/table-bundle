<?php

namespace DWalczyk\Cruder\TempLibrary\HtmlElement\Twig\Extension;

use DWalczyk\Cruder\Table;
use DWalczyk\Cruder\TempLibrary\HtmlElement\HtmlAttribute;
use DWalczyk\Cruder\TempLibrary\HtmlElement\HtmlAttributeInterface;
use DWalczyk\Cruder\TempLibrary\HtmlElement\HtmlElement;
use Twig\Environment;
use Twig\TwigFunction;

class HtmlElementExtension
{
    public function __construct(private Environment $twig)
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('render_html_elem', [$this, 'renderHtmlElem'], ['is_safe' => true]),
            new TwigFunction('render_html_elem_starting_tag', [$this, 'renderHtmlElemStartingTag'], ['is_safe' => true]),
            new TwigFunction('render_html_elem_closing_tag', [$this, 'renderHtmlElemClosingTag'], ['is_safe' => true]),
            new TwigFunction('render_html_attributes', [$this, 'renderHtmlAttributes'], ['is_safe' => true]),
        ];
    }

    /**
     * @param HtmlAttributeInterface[] $attributes
     */
    public function renderHtmlElem(HtmlElement $htmlElement, ?string $content = null, array $attributes = []): string
    {
        $elem = clone $htmlElement;

        foreach ($attributes as $attribute) {
            $elem->addAttribute($attribute);
        }
        
        return $elem->render($content ?? '');
    }

    /**
     * @param HtmlAttributeInterface[] $attributes
     */
    public function renderHtmlElemStartingTag(HtmlElement $htmlElement,  array $attributes = []): string
    {
        $elem = clone $htmlElement;

        foreach ($attributes as $attribute) {
            $elem->addAttribute($attribute);
        }

        return $elem->renderStartingTag();
    }

    public function renderHtmlElemClosingTag(HtmlElement $htmlElement): string
    {
        return $htmlElement->renderClosingTag();
    }

    /**
     * @param HtmlAttributeInterface[]|string $attributes
     * @return string
     */
    public function renderHtmlAttributes(array $attributes = []): string
    {
        $elem = new HtmlElement('');

        foreach ($attributes as $key => $attribute) {
            if ($attribute instanceof HtmlAttributeInterface) {
                // HtmlAttributeInterface
                $elem->addAttribute($attribute);
            } else {
                // ['attr' => 'value']
                $elem->addAttribute(new HtmlAttribute($key, $attribute));
            }
        }

        return $elem->renderAttributes();
    }
}