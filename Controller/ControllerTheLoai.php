<?php

require __DIR__."/../Model/DataTheLoai.php";
class ControllerTheLoai
{
    private $allTheLoai;

    /**
     * ControllerTheLoai constructor.
     * @param $allTheLoai
     */
    public function __construct()
    {
        $this->allTheLoai = getAllTheLoai();
    }

    /**
     * @return array
     */
    public function getAllTheLoai()
    {
        return $this->allTheLoai;
    }

    public function addTheLoai2Phim($idphim, $idtheloai){
        addChiTietTheLoai($idphim, $idtheloai);
    }

    public function getTheLoaiFormPhim($idphim){
        return getTheLoaiByIdPhim($idphim);
    }

    public function deleteTheLoaiFromPhim($idphim){
        deleteTheLoaiByIdPhim($idphim);
    }
}
?>