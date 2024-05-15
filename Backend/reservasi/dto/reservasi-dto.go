// dto/reservasi_dto.go
package dto

import "time"

type ReservasiCreateDTO struct {
	UserID    uint      `json:"user_id" binding:"required"`
	MejaID    uint      `json:"meja_id" binding:"required"`
	BookDate  time.Time `json:"book_date" binding:"required"`
	Status    string    `json:"status" binding:"required"`
	Deskripsi string    `json:"deskripsi"`
}

type ReservasiUpdateDTO struct {
	ID        uint      `json:"id" binding:"required"`
	UserID    uint      `json:"user_id" binding:"required"`
	MejaID    uint      `json:"meja_id" binding:"required"`
	BookDate  time.Time `json:"book_date" binding:"required"`
	Status    string    `json:"status" binding:"required"`
	Deskripsi string    `json:"deskripsi"`
}
