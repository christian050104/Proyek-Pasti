package entity

import "gorm.io/gorm"

type Cart struct {
    gorm.Model
    UserID       uint   `json:"user_id"`
    ProductID    uint   `json:"product_id"`
    ProductImage string `json:"product_image"`
    ProductName  string `json:"product_name"`
    Quantity     int   `json:"quantity"`
    Price        int   `json:"price"`
    Total        int   `json:"total"`
}
