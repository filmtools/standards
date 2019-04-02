<?php
namespace FilmTools\Standards;

class KodakStandard extends TraditionalStandard
{
    /**
     * @var string
     */
    public $name = "Kodak Contrast Index";

    /**
     * @var string
     */
    protected $norm_data_file = "normdensities-ci.csv";
}
