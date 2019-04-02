<?php
namespace FilmTools\Standards;

class LambrechtWoodhouseStandard extends Standard
{

    /**
     * @var string
     */
    public $name = "Way Beyond Monochrome (Lambrecht/Woodhouse)";


    /**
     * @var float
     */
    public $dmin = LambrechtWoodhouseInterface::DMIN;


    /**
     * @var float
     */
    public $dmax = LambrechtWoodhouseInterface::DMAX;


    /**
     * @var string
     */
    protected $norm_data_file = "normdensities-wbm.csv";
}
