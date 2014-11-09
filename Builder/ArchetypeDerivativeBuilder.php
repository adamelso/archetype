<?php

namespace Sylius\Component\Archetype\Builder;

use Sylius\Component\Archetype\Model\DerivativeInterface;
use Sylius\Component\Archetype\Model\ArchetypeInterface;
use Sylius\Component\Attribute\Model\AttributeSubjectInterface;
use Sylius\Component\Attribute\Model\AttributeValueInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Variation\Model\OptionInterface;
use Sylius\Component\Variation\Model\VariableInterface;
use Sylius\Component\Variation\Model\VariantInterface;

class ArchetypeDerivativeBuilder implements ArchetypeDerivativeBuilderInterface
{
    /**
     * Attribute value repository.
     *
     * @var RepositoryInterface
     */
    protected $attributeValueRepository;

    /**
     * Constructor.
     *
     * @param RepositoryInterface $attributeValueRepository
     */
    public function __construct(RepositoryInterface $attributeValueRepository)
    {
        $this->attributeValueRepository = $attributeValueRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function build(ArchetypeInterface $archetype, DerivativeInterface $derivative)
    {
        $this->createAndAssignAttributes($archetype, $derivative);
        $this->createAndAssignOptions($archetype, $derivative);
    }

    /**
     * @param ArchetypeInterface        $archetype
     * @param AttributeSubjectInterface $derivative
     */
    private function createAndAssignAttributes(ArchetypeInterface $archetype, AttributeSubjectInterface $derivative)
    {
        foreach ($archetype->getAttributes() as $attribute) {
            /** @var AttributeValueInterface $attributeValue */
            $attributeValue = $this->attributeValueRepository->createNew();
            $attributeValue->setAttribute($attribute);

            $derivative->addAttribute($attributeValue);
        }
    }

    /**
     * @param ArchetypeInterface $archetype
     * @param VariableInterface  $derivative
     */
    private function createAndAssignOptions(ArchetypeInterface $archetype, VariableInterface $derivative)
    {
        foreach ($archetype->getOptions() as $option) {
            $derivative->addOption($option);
        }
    }
}
