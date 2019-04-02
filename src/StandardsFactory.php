<?php
namespace FilmTools\Standards;

class StandardsFactory
{

    /**
     * @var string
     */
    public $default = "iso6";


    /**
     * @param string $default  Optional: Default standard name, default is "iso6"
     */
    public function __construct( string $default = null ) {
        $this->default = $default;
    }


    /**
     * @param  mixed $name Optional: Standard name, defaults to "iso6"
     * @return Standard
     */
    public function __invoke( string $name = null ) : StandardInterface
    {
        $name = $name ?: $this->default;

        // Configure the min/max density of interest
        switch( $name ):
            case 'traditional':
            case 'iso6':
                $standard = new TraditionalStandard;
                break;
            case 'wbm':
                $standard = new LambrechtWoodhouseStandard;
                break;
            case 'kodak':
            case 'ci':
                $standard = new KodakStandard;
                break;
            case 'ilford':
            case 'gbar':
                $standard = new IlfordStandard;
                break;
            default:
                $msg = sprintf("Unknown Developing standard: '%s'", $name);
                throw new \UnexpectedValueException( $msg );
                break;
        endswitch;

        return $standard;

    }
}
