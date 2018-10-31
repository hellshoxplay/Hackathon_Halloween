<?php
namespace Model;

/**
 * Class Map
 *
 */
class Adresses
{
    private $idAdresses;
    private $latitude;
    private $longitude;
    private $markerName;

    /**
     * @return mixed
     */
    public function getIdAdresses()
    {
        return $this->idAdresses;
    }

    /**
     * @param mixed $idAdresses
     */
    public function setIdAdresses($idAdresses): void
    {
        $this->idAdresses = $idAdresses;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getMarkerName()
    {
        return $this->markerName;
    }

    /**
     * @param mixed $markerName
     */
    public function setMarkerName($markerName): void
    {
        $this->markerName = $markerName;
    }


}
