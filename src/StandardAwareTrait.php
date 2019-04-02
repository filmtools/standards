<?php
namespace FilmTools\Standards;

trait StandardAwareTrait
{

    use StandardProviderTrait;


    /**
     * Sets the Standard instance.
     *
     * @param StandardInterface $standard
     * @return self Fluent interface
     */
    public function setStandard( StandardInterface $standard )
    {
        $this->standard = $standard;
        return $this;
    }
}
