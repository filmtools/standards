<?php
namespace FilmTools\Standards;

class TraditionalStandard extends Standard
{



    /**
     * @var string
     */
    public $name = "Traditional / ISO6";

    /**
     * @var float
     */
    public $dmin = TraditionalInterface::DMIN;


    /**
     * @var float
     */
    public $dmax = TraditionalInterface::DMAX;


    /**
     * @var string
     */
    protected $norm_data_file = "normdensities-iso6.csv";
}
