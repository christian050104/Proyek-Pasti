// entity/reservasi.go
package entity

import (
	"gorm.io/gorm"
	"time"
)

type Reservasi struct {
	gorm.Model
	UserID    uint      `gorm:"not null" json:"user_id"`
	MejaID    uint      `gorm:"not null" json:"meja_id"`
	BookDate  time.Time `gorm:"not null" json:"book_date"`
	Status    string    `gorm:"not null" json:"status"`
	Deskripsi string    `json:"deskripsi"`
}
