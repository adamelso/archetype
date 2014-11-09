<?php

namespace Sylius\Component\Archetype\Builder;

use Sylius\Component\Archetype\Model\DerivativeInterface;
use Sylius\Component\Archetype\Model\ArchetypeInterface;
use Sylius\Component\Attribute\Model\AttributeSubjectInterface;

interface ArchetypeDerivativeBuilderInterface
{
    /**
     * Build the archetype of product.
     *
     * @param ArchetypeInterface  $archetype
     * @param DerivativeInterface $derivative
     */
    public function build(ArchetypeInterface $archetype, DerivativeInterface $derivative);
}
