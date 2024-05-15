// entity.go
package entity

import "gorm.io/gorm"

type Meja struct {
    gorm.Model
    Nama      string `gorm:"type:varchar(255)" json:"nama" validate:"required,min=3,max=255"`
    Status    string `gorm:"type:varchar(255)" json:"status" validate:"required"`
    Gambar    string `gorm:"type:varchar(255)" json:"gambar" validate:"required,url"`
    Deskripsi string `gorm:"type:text" json:"deskripsi" validate:"required"`
}
