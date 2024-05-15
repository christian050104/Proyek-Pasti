package entity

import "gorm.io/gorm"

type Product struct {
    gorm.Model
    Name        string  `gorm:"type:varchar(255)" json:"name" validate:"required,min=3,max=255"`
    Description string  `gorm:"type:text" json:"description" validate:"required,min=3"`
    Price       float64 `gorm:"type:decimal(10,2)" json:"price" validate:"required"`
    Stock       int     `gorm:"type:int" json:"stock" validate:"required"`
    Image       string  `gorm:"type:varchar(255)" json:"image" validate:"required,url"`
    CategoryID  uint    `gorm:"type:int" json:"category_id" validate:"required"`
}
