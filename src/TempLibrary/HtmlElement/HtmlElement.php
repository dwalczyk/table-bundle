<?php

namespace DWalczyk\Cruder\TempLibrary\HtmlElement;

class HtmlElement
{
    protected string $tag;

    /**
     * @var  HtmlAttributeInterface[] $attributes
     */
    protected array $attributes;

    public function __construct(string $tag, array $attributes = [])
    {
        $this->tag = $tag;

        foreach ($attributes as $attribute) {
            $this->addAttribute($attribute);
        }
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @return HtmlAttributeInterface[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function addAttribute(HtmlAttributeInterface $attribute): static
    {
        $this->attributes[$attribute->getName()] = $attribute;

        return $this;
    }

    public function getAttribute(string $name): ?HtmlAttributeInterface
    {
        return $this->attributes[$name] ?? null;
    }

    public function render(string $content): string
    {
        return $this->renderStartingTag() . $content . $this->renderClosingTag();
    }

    public function renderStartingTag(): string
    {
        $attributesContent = $this->renderAttributes();

        return sprintf('<%s%s>',
            $this->tag,
            strlen($attributesContent) > 0 ? sprintf(' %s', $attributesContent) : '',
        );
    }

    public function renderClosingTag(): string
    {
        return sprintf('</%s>', $this->tag,);
    }

    public function renderAttributes(): string
    {
        $attributesRenders = [];
        foreach ($this->attributes as $attribute) {
            $attributesRenders[] = $attribute->render();
        }

        $content = implode(' ', $attributesRenders);

        return $content;
    }

}