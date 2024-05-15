package dto

type MejaCreateDTO struct {
    Nama        string `json:"nama" form:"nama" binding:"required,min=3,max=255"`
    Status      string `json:"status" form:"status" binding:"required"`
    Gambar      string  `json:"gambar" form:"gambar" binding:"required"`
    Deskripsi   string `json:"deskripsi" form:"deskripsi" binding:"required"`
}

type MejaUpdateDTO struct {
    ID          uint   `json:"id" form:"id" binding:"required"`
    Nama        string `json:"nama" form:"nama" binding:"required,min=3,max=255"`
    Status      string `json:"status" form:"status" binding:"required"`
    Gambar      string  `json:"gambar" form:"gambar" binding:"required"`
    Deskripsi   string `json:"deskripsi" form:"deskripsi" binding:"required"`
}
